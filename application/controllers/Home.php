<?php 
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('loggedin') === true) {
			redirect('home');
		}

		$data['page']		= "site/newhome";
		$data['title']		= "Buy Gift Cards Online - ".strtoupper(APPNAME);
		$data['cards']		= $this->db->get('available_cards')->result();
		$data['amazon']		= $this->trade->getRate('amazon');
		$data['google']		= $this->trade->getRate('google');
		$data['itunes']		= $this->trade->getRate('itunes');
		$data['steam']		= $this->trade->getRate('steam');
		$data['ebay']		= $this->trade->getRate('ebay');
		$data['nike']		= $this->trade->getRate('nike');
		$data['apple']		= $this->trade->getRate('apple');
		$data['sephora']	= $this->trade->getRate('sephora');
		$data['testimony']	= $this->trade->testimony(6);
		$this->load->view('site/templates',$data);
	}

	public function privacy()
	{
		$data['page']			= "site/policy";
		$data['page_title']		= "Privacy Policy";
		$data['title']			= "Privacy Policy";
		
		$this->load->view('site/templates',$data);
	}

	public function contact()
	{
		$data['page']			= "site/contact";
		$data['page_title']		= "Contact Us";
		$data['title']			= "Contact Us";
		
		$this->load->view('site/templates',$data);
	}

	public function testimony()
	{
		if($this->input->post()) {
			extract($this->input->post());

			$ans = $first + $last;

			if($verify_contact != $ans) {
				$this->session->set_flashdata('testimony','<div class="alert alert-danger">Incorrect Security Answer</div>');
				redirect('testimony');
			}

			$name = $name == "" ? "Anonymous":$name;

			$input = [
				'name'			=> $name,
				'testimony'		=> $message_contact,
				'status'		=> 'pending'
			];

			$this->db->insert('testimonies',$input);

			$this->session->set_flashdata('testimony','<div class="alert alert-success">Testimony sent for Review.</div>');
			redirect('testimony');
		}

		$data['page']			= "site/newtestimony";
		$data['title']			= "Testimonies to ".APPNAME;
		$data['testimony']		= $this->trade->testimony();
		$this->load->view('site/templates',$data);
	}

	public function ajax_register()
	{

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
			],
			[
				'field'	=> 'phone',
				'label'	=> 'Phone',
				'rules'	=> 'required'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if(!$this->form_validation->run()) {
			echo validation_errors();
			exit;
		}

		extract($this->input->post());

		$phone_check = $this->db->where('phone',$phone)->get('users')->num_rows();
		if($phone_check > 0 ) {
			echo "Phone number has already been registered";
			exit;
		}

		$email_check = $this->db->where('email',$email)->get('users')->num_rows();

		if($email_check > 0) {
			echo "Email has already been registered";
			exit;
		}

		$data = $this->input->post();
		$data['password'] = sha1($password);
		$this->db->insert('users',$data);

		$this->session->set_userdata(['loggedin'=>true,'loggedin_email'=>$email]);

		echo 1;
	}

	public function welcome()
	{
		if($this->session->userdata('loggedin') == "") {
			redirect('');
		}
		$me 				= $this->getMe();
		$data['updated']	= $this->getMe('updated');
		$data['user']		= $this->session->userdata('loggedin_email');
		$data['title']		= "Welcome ".$this->session->userdata('email')." | ".APPNAME;
		$data['page_title']	= "Welcome ".$data['user'];
		$data['trade']		= $this->trade->getTrade($me->email);
		$data['tradeBitcoin'] = $this->trade->getTradeBitcoin($me->email);
		$data['history']	= $this->trade->getHistory($me->email);
		$data['bitcoin_history']	= $this->trade->getHistoryBitcoin($me->email);
		$data['page']		= "site/homepage";
		$data['cards']		= $this->db->get('available_cards')->result();

		$this->load->view('site/templates',$data);
	}

	public function profile()
	{
		if($this->session->userdata('loggedin') == "") {
			redirect('');
		}
		$me 				= $this->getMe();
		$data['user']		= $this->session->userdata('loggedin_email');
		$data['title']		= "Welcome ".$this->session->userdata('email')." | ".APPNAME;
		$data['page_title']	= $data['user'];
		$data['page']		= "site/profile";
		$this->load->view('site/templates',$data);
	}


	public function getMe($field = "")
	{
		$me = $this->db->where('email',$this->session->userdata('loggedin_email'))->get('users')->row();
		if($field != "") {
			return $me->$field;
		}

		return $me;
	}

	public function ajax_login()
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
				echo 'Invalid Username/Password';
				exit;
			}
			$this->session->set_userdata(['loggedin'=>true,'loggedin_email'=>$email]);
			echo 1;
		} else {
			echo validation_errors();
		}
	}

	public function login()
	{
		extract($this->input->post());
		if($this->input->post()) {
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
					$this->session->set_flashdata('message','<div class="alert alert-danger">Invalid Username/Password</div>');
					redirect('login');
				}
				$this->session->set_userdata(['loggedin'=>true,'loggedin_email'=>$email]);
				redirect();
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">'.validation_errors().'</div>');
			}
		}
		$data['cards']		= $this->db->get('available_cards')->result();
		$data['title']		= "Login | ".APPNAME;
		$data['page']		= "site/newlogin";
		$this->load->view('site/templates',$data);
	}

	public function register() 
	{
		$data['title']	= "Register for an account | ".APPNAME;
		$data['cards']	= $this->db->get('available_cards')->result();
		$data['page']	= "site/registers";
		$this->load->view('site/templates',$data);
	}

	public function new_trade()
	{
		if($this->session->userdata('loggedin') == "") {
			redirect('login');
		}
		
		$data['cards'] 			= $this->db->get('available_cards')->result();
		$data['user']			= $this->session->userdata('loggedin_email');
		$data['page_title']		= "Choose Giftcard";
		$data['title']			= "Choose Giftcard Type | ". APPNAME;
		$data['page']			= "site/choosecard";
		$data['amazon']			= $this->trade->getRate('amazon');
		$data['google']			= $this->trade->getRate('google');
		$data['itunes']			= $this->trade->getRate('itunes');
		$data['steam']			= $this->trade->getRate('steam');
		$data['ebay']			= $this->trade->getRate('ebay');
		$data['nike']			= $this->trade->getRate('nike');
		$data['apple']			= $this->trade->getRate('apple');
		$data['sephora']		= $this->trade->getRate('sephora');

		$this->load->view('site/templates',$data);
	}

	public function new_bitcoin_trade()
	{
		if($this->session->userdata('loggedin') == "") {
			redirect('login');
		}
		
		$data['user']			= $this->session->userdata('loggedin_email');
		$data['page_title']		= "Trade Bitcoin";
		$data['title']			= "Bitcoin Trade | ". APPNAME;
		$data['page']			= "site/trade_bitcoin";
		$data['bitcoin_rate'] 	= $this->getBitcoinRates();
		$this->load->view('site/templates',$data);
	}

	public function trade($type) 
	{
		if($this->session->userdata('loggedin') == "") {
			redirect('login');
		}

		$data['me']				= $this->getMe();
		$data['card']			= $this->db->where('cardname',$type)->get('available_cards')->row();
		$data['type']			= $type;
		$data['cards'] 			= $this->db->get('available_cards')->result();
		$data['user']			= $this->session->userdata('loggedin_email');
		$data['page_title']		= "Sell ".ucfirst($type)." Giftcard";
		$data['title']			= "Trade ".ucfirst($type)." | ". APPNAME;
		$data['page']			= "site/sellcard";
		$data['cantrade']		= $this->getCantrade();
		$data['rate']			= $this->trade->getRate($type);
		$this->load->view('site/templates',$data);
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

	public function trade_bitcoin_details($ref) 
	{
		$data['title']		= "Trade Details | ".$ref;
		$data['trade']		= $this->getTradeBitcoin($ref);
		$data['page']		= "site/trade_bitcoin_details";
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

		// $user = [
		// 	'bankname'		=> $bank,
		// 	'accountnumber'	=> $account_number,
		// 	'account_name'	=> $account_name
		// ];

		$trade = [
			'ref_code'		=> $ref,
			'type'			=> $cardtype,
			'amount_naira'	=> $totaln,
			'bank'			=> (!empty($bankname)) ? $bankname : NULL,
			'account_number'=> (!empty($account_number)) ? $account_number : NULL,
			'account_name'	=> (!empty($account_name)) ? $account_name : NULL,
			'phone'			=>  $phone,
			'bank_default'	=>  (!empty($bank_default)) ? $bank_default : NULL,
			'status'		=> 'PENDING',
			'email'			=> $this->getMe('email')
		];

		$this->db->insert_batch('trade_details',$trade_details);
		$this->db->insert('trades',$trade);

		// $this->db->where('email',$this->getMe('email'))->set($user)->update('users');

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

	// public function update_account()
	// {
	// 	extract($this->input->post());
	// 	$user = [
	// 		'bankname'		=> $bankname,
	// 		'accountnumber'	=> $account_number,
	// 		'account_name'	=> $account_name
	// 	];
	// 	$this->db->where('email',$this->getMe('email'))->set($user)->update('users');
	// }
	public function update_account()
	{
		extract($this->input->post());
		$profile_data = [
			'bankname'			=> $bankname,
			'accountnumber'		=> $account_number,
			'account_name'		=> $account_name,
			'updated' => true
		];
		// $this->db->insert('profile',$profile_data);
		$this->db->where('email',$this->getMe('email'))->set($profile_data)->update('users');
		echo 1;
	}

	public function trade_bitcoin()
	{
		extract($this->input->post());

		if($uploaded == "") {
			echo "Please upload at least one image";
			exit;
		}
		// $user = [
		// 	'bankname'		=> $bank,
		// 	'accountnumber'	=> $account_number,
		// 	'account_name'	=> $account_name
		// ];
		// $bank_info = $this->db->where('account_number',$bank_default)->get('users')->row();
		$trade = [
			'ref_code'		=> $ref,
			'transaction_id'=> $transaction_id,
			'bank_default'	=>  (!empty($bank_default)) ? $bank_default : NULL,
			'bank' 			=> (!empty($bankname)) ? $bankname : NULL,
			'account_number'=> (!empty($account_number)) ? $account_number : NULL,
			'account_name'	=> (!empty($account_name)) ? $account_name : NULL,
			'status'		=> 'PENDING',
			'email'			=> $this->getMe('email')
		];

		// $this->db->insert_batch('trade_details',$trade_details);
		$this->db->insert('trade_bitcoin',$trade);

		// $this->db->where('email',$this->getMe('email'))->set($user)->update('users');

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


	public function profile_update()
	{
		extract($this->input->post());
		// $data['details'] = $this->trade->getProfile($me->email);

		// if($uploaded == "") {
		// 	echo "Please upload at least one image";
		// 	exit;
		// }
		
		$profile_data = [
			'bankname'			=> $bankname,
			'accountnumber'		=> $accountnumber,
			'account_name'		=> $account_name,
			's_bankname'		=> $s_bankname,
			's_accountnumber'	=> $s_accountnumber,
			's_account_name'	=> $s_account_name,
			'updated' => true
		];
		// $this->db->insert('profile',$profile_data);
		$this->db->where('email',$this->getMe('email'))->set($profile_data)->update('users');
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
	public function getTrade($ref)
	{
		$data = [];
		$trade = $this->db->where('ref_code',$ref)->get('trades')->row();

		if($trade == "") {
			return false;
		}

		$data['trade']	= $trade;

		$details = $this->db->where('ref',$ref)->get('trade_details')->result();

		$data['details']	= $details;

		return $data;
	}
	
	public function getTradeBitcoin($ref)
	{
		$data = [];
		$trade = $this->db->where('ref_code',$ref)->get('trade_bitcoin')->row();

		if($trade == "") {
			return false;
		}

		$data['trade']	= $trade;

		return $data;
	}

	public function getImages($ref)
	{
		return $this->db->where('ref',$ref)->get('images')->result();
	}

	public function getProof($ref) 
	{
		return $this->db->where('ref',$ref)->get('pay_images')->result();
	}

	public function getBitcoinRates()
	{
		return $this->db->get('bitcoin_rate')->result();
	}
}