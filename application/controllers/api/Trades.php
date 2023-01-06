<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Trades extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

 
	public function index_get()
	{
	    
	     try
        {
            $token_data = $this->jwt_decode($this->jwt_token());
            $trade_history = $this->trade->getAllUsersTrade($token_data['email']);
            foreach($trade_history as $trade){
                $trade->images = $this->getImages($trade->ref_code);
                $trade->proof = $this->getProof($trade->ref_code);
            }
            $this->response($trade_history, REST_Controller::HTTP_OK);
        }
        catch (Exception $e)
        {
            $output_data[$this->config->item('rest_status_field_name')] = "invalid_token";
            $output_data[$this->config->item('rest_message_field_name')] = $e->getMessage();
            $this->response($output_data, REST_Controller::HTTP_UNAUTHORIZED);
        }
	}
 
 
	public function index_post()
	{
		extract($this->input->post());
		
		$ref = $this->trade->getRef();
		
		$email = $this->jwt_decode($this->jwt_token())['email'];
		
		//upload all images
		if(!file_exists(FCPATH."/uploads")) {
			mkdir(FCPATH."/uploads/");
			chmod(FCPATH."/uploads/", "777");
		}
		$config['upload_path']          = FCPATH.'/uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name']			= TRUE;


        $this->load->library('upload', $config);

        $images = array();

        foreach ($_FILES['images']['name'] as $key => $image) {
            $_FILES['images[]']['name']= $_FILES['images']['name'][$key];
            $_FILES['images[]']['type']= $_FILES['images']['type'][$key];
            $_FILES['images[]']['tmp_name']= $_FILES['images']['tmp_name'][$key];
            $_FILES['images[]']['error']= $_FILES['images']['error'][$key];
            $_FILES['images[]']['size']= $_FILES['images']['size'][$key];

            $fileName = $image;

            //$images[] = $fileName;

            // $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $images[] = $this->upload->data()['file_name'];
            } else {
                $output_data[$this->config->item('rest_status_field_name')] = "upload_error";
                $output_data[$this->config->item('rest_message_field_name')] =$this->upload->display_errors();
                $this->response($output_data, REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        

		if(count($images) < 1) {
			$output_data[$this->config->item('rest_status_field_name')] = "trade_error";
            $output_data[$this->config->item('rest_message_field_name')] ="Please upload at least one image";
            $this->response($output_data, REST_Controller::HTTP_BAD_REQUEST);
		}
		else{
		    foreach($images as $image)
		    $image_data['imagename'] 	= $image;
	     	$image_data['ref']		= $ref;

	     	$this->db->insert('images',$image_data);
		}
 
		$filled = false;
		foreach($qty as $row) {
			if($row > 0) {
				$filled = true;
				break;
			}
		}

		if(!$filled) {
			echo "Please specify number of cards";
			exit;
		}
		$totaln   	= 0;
		$trade_details = [];
		foreach($qty as $key => $row) {
			if($row < 1) {
				continue;
			}
			$c['ref']				= $ref;
			$c['giftcardtype']		= $cardtype;
			$c['usd']				= $key;
			$c['naira']				= $this->getNaira($cardtype,$key);
			$c['quantity']			= $row;
			$trade_details[]		= $c;

			$totaln 				+= $c['naira'] * $c['quantity'];
		}

		$user = [
			'bankname'		=> $bank,
			'accountnumber'	=> $account_number,
			'account_name'	=> $account_name
		];

		$trade = [
			'ref_code'		=> $ref,
			'type'			=> $cardtype,
			'amount_naira'	=> $totaln,
			'bank'			=> $bank,
			'account_number'=> $account_number,
			'account_name'	=> $account_name,
			'phone'			=> $phone,
			'status'		=> 'PENDING',
			'email'			=>  $email
		];

		$this->db->insert_batch('trade_details',$trade_details);
		$this->db->insert('trades',$trade);

		$this->db->where('email',$email)->set($user)->update('users');

		$ch = curl_init();

		$msg = "A new request has been initiated on LetxChange by ".$account_name;
		$msg .= "<br /><br />The request was initated at ".date('d M, Y h:i a');

		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:'.MAIL_API_KEY);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.MAIL_API_DOMAIN.'/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
			'from' => 'Instant Exchange <no-reply@moverstrans.com>',
			'to' => 'exchangeservice23@gmail.com',
			'subject' => 'New Trade Initiated by '.$account_name,
			'html' => $msg
		));

		$result = curl_exec($ch);
		
		$response_data['message'] = "Trade Created";
		$response_data['image'] = $trade;
			$response_data['ref'] = $ref ;


		$this->response($response_data, REST_Controller::HTTP_OK);
	}

    private function getImages($ref)
	{
		return $this->db->where('ref',$ref)->get('images')->result();
	}

	private function getProof($ref) 
	{
		return $this->db->where('ref',$ref)->get('pay_images')->result();
	}
	
	
	public function getNaira($card,$amt)
	{
		return $this->db->where('cardtype',$card)->where('usd',$amt)->get('rates')->row()->naira;
	}
 

// 	public function getCantrade()
// 	{
// 		$email = $this->getMe('email');
// 		$tc = $this->db->where('email',$email)->where('status','Pending')->get('trades')->num_rows();

// 		if($tc > 0) {
// 			return false;
// 		}

// 		return true;
// 	}
}