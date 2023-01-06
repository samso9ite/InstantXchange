<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Rate extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

 
	public function index_get()
	{
	    
	    
	    $cards = $this->db->get('available_cards')->result();

		foreach($cards as $card){
		    $card->rates = $this->trade->getRate($card->cardname);
		}
		
        $this->response($cards, REST_Controller::HTTP_OK);
    	 
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