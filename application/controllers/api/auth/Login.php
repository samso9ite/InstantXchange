<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

 
 
	public function index_post()
	{
		extract($this->input->post());
		$rules = [
			[
				'field'	=> 'email',
				'label'	=> 'Email',
				'rules'	=> 'required|valid_email'
			],
			[
				'field'	=> 'password',
				'label'	=> 'Password',
				'rules'	=> 'required'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()) {
			$data = $this->input->post();
			$data['password'] = sha1($data['password']);
			$check = $this->db->where($data)->get('users')->num_rows();

			if($check < 1) {
				$output_data[$this->config->item('rest_status_field_name')] = "invalid_credentials";
                $output_data[$this->config->item('rest_message_field_name')] = "Invalid username or password!";
                $this->response($output_data, REST_Controller::HTTP_UNAUTHORIZED);
                
			}
			else{
			    $user_datails = $this->db->select(['first_name','last_name','phone','email','accountnumber','bankname','account_name', 'updated'])->where('email',$email)->get('users')->row();
			    $trade_history = $this->trade->getHistory($email);
			    $token['email'] = $email;
                $date = new DateTime();
                $token['iat'] = $date->getTimestamp();
                $token['exp'] = $date->getTimestamp() + $this->config->item('jwt_token_expire');
                $output_data['token'] = $this->jwt_encode($token);
                $output_data['user_details'] = $user_datails;
                $output_data['trade_history'] = $trade_history;
                $this->response($output_data, REST_Controller::HTTP_OK);
			}
			
		} else {
			$output_data[$this->config->item('rest_status_field_name')] = "empty_fields";
            $output_data[$this->config->item('rest_message_field_name')] = $this->form_validation->error_array();

			$this->response($output_data, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		}
	}
 
 
 

	public function upload_image()
	{
		$ref = $this->input->get('ref');
		if(!file_exists(FCPATH."/uploads")) {
			mkdir(FCPATH."/uploads/");
			chmod(FCPATH."/uploads/", "777");
		}
		$config['upload_path']          = FCPATH.'/uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('myfile'))
		{
			echo $this->upload->display_errors();
			exit;
		}
		else
		{
			$upl = $this->upload->data();
		}

		$data['imagename'] 	= $upl['file_name'];
		$data['ref']		= $ref;

		$this->db->insert('images',$data);
	}

	public function trade_details($ref) 
	{
		$data['title']		= "Trade Details | ".$ref;
		$data['trade']		= $this->getTrade($ref);
		$data['page']		= "site/trade_details";
		$data['cards'] 		= $this->db->get('available_cards')->result();
		$data['page_title']	= "Trade ".$ref." details";
		$data['images']		= $this->getImages($ref);
		$data['proof']		= $this->getProof($ref);
		$this->load->view('site/templates',$data);
	}

	public function initiate_trade()
	{
		extract($this->input->post());

		if($uploaded == "") {
			echo "Please upload at least one image";
			exit;
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
			'email'			=> $this->getMe('email')
		];

		$this->db->insert_batch('trade_details',$trade_details);
		$this->db->insert('trades',$trade);

		$this->db->where('email',$this->getMe('email'))->set($user)->update('users');

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

        //Todo: Open up so emails can go through
		$result = curl_exec($ch);

		echo 1;
	}

	public function getNaira($card,$amt)
	{
		return $this->db->where('cardtype',$card)->where('usd',$amt)->get('rates')->row()->naira;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

	public function getCantrade()
	{
		$email = $this->getMe('email');
		$tc = $this->db->where('email',$email)->where('status','Pending')->get('trades')->num_rows();

		if($tc > 0) {
			return false;
		}

		return true;
	}
}