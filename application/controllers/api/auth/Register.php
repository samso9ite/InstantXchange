<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class Register extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

 
 
	public function index_post()
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
			],
			[
				'field'	=> 'full_name',
				'label'	=> 'Full Name',
				'rules'	=> 'required'
			],
		
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($rules);

		if(!$this->form_validation->run()) {
			$output_data[$this->config->item('rest_status_field_name')] = "empty_fields";
            $output_data[$this->config->item('rest_message_field_name')] = $this->form_validation->error_array();

			$this->response($output_data, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		}

		extract($this->input->post());

		$phone_check = $this->db->where('phone',$phone)->get('users')->num_rows();
		if($phone_check > 0 ) {
			$output_data[$this->config->item('rest_status_field_name')] = "invalid_credentials";
            $output_data[$this->config->item('rest_message_field_name')] = "Phone number has already been registered!";
            $this->response($output_data, REST_Controller::HTTP_BAD_REQUEST);
		}

		$email_check = $this->db->where('email',$email)->get('users')->num_rows();

		if($email_check > 0) { 
			$output_data[$this->config->item('rest_status_field_name')] = "invalid_credentials";
            $output_data[$this->config->item('rest_message_field_name')] = "Email has already been registered!";
            $this->response($output_data, REST_Controller::HTTP_BAD_REQUEST);
		}

		$data = $this->input->post();
		$data['password'] = sha1($password);
		$this->db->insert('users',$data);

		$user_datails = $this->db->select(['full_name','phone','email','accountnumber','bankname','account_name'])->where('email',$email)->get('users')->row();
	    $trade_history = $this->trade->getHistory($email);
	    $token['username'] = $email;
        $date = new DateTime();
        $token['iat'] = $date->getTimestamp();
        $token['exp'] = $date->getTimestamp() + $this->config->item('jwt_token_expire');
        $output_data['token'] = $this->jwt_encode($token);
        $output_data['user_details'] = $user_datails;
        $output_data['trade_history'] = $trade_history;
        $this->response($output_data, REST_Controller::HTTP_OK);
	}
 
 
 
}