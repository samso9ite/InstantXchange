<?php 
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('admin') == "") {
			redirect('admin/login');
		}

		$data['title']	= "Welcome | Admin";
		$data['page']	= "admin/home";
		$data['trade']	= $this->getTrades();
		$data['trades']	= $this->getAllTrades();
		$this->load->view('admin/template',$data);
	}

	public function bitcoin_trades()
	{
		if($this->session->userdata('admin') == "") {
			redirect('admin/login');
		}

		$data['title']	= "Welcome | Admin";
		$data['page']	= "admin/bitcoin_trades";
		$data['trade']	= $this->getBitcoinTrades();
		$data['trades']	= $this->getAllBitcoinTrades();
		$this->load->view('admin/template',$data);
	}


	public function login() 
	{
		if($this->session->userdata('admin') != "") {
			redirect('admin');
		}

		if($this->input->post()) {
			$data = $this->input->post();
	 

			$rules = [
				[
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required'
				],
				[
					'field'	=> 'password',
					'label'	=> 'Password',
					'rules'	=> 'required'
				]
			];

			$this->load->library('form_validation');
			$this->form_validation->set_rules($rules);

			if( !$this->form_validation->run() ) {
				$this->session->set_flashdata('amessage','<div class="alert alert-danger">'.validation_errors().'</div>');
				redirect('admin/login');
			}

			$login = $this->db->where($data)->get('admin')->num_rows();
			if($login > 0) {
				$this->session->set_userdata('admin','logged');
				redirect('admin');
			}

			$this->session->set_flashdata('amessage','<div class="alert alert-danger">Invalid Username/Password</div>');
			redirect('admin/login');
		}

		$data['title']	= "Login | Admin";
		$this->load->view('admin/login',$data);
	}

	public function upload_payimage()
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

		$data['image'] 		= $upl['file_name'];
		$data['ref']		= $ref;

		$this->db->insert('pay_images',$data);

		echo 1;
	}

	public function close($ref) 
	{
		$this->db->where('ref_code',$ref)->set('status','completed')->update('trade_bitcoin');
		redirect('admin');
	}
	public function close_trade($ref) 
	{
		$this->db->where('ref_code',$ref)->set('status','completed')->update('trades');
		redirect('admin');
	}

	public function cancel() 
	{
		extract($this->input->post());
		$data = [
			'ref_confirmed'	=> $ref,
			'comment'		=> $comment,
			'status'		=> 'Cancelled'
		];
		$this->db->where('ref_code',$data['ref_confirmed'])->set($data)->update('trade_bitcoin');
		redirect('admin');
	}
	public function trade_cancel() 
	{
		extract($this->input->post());
		$data = [
			'ref_confirmed'	=> $ref,
			'comment'		=> $comment,
			'status'		=> 'Cancelled'
		];
		$this->db->where('ref_code',$data['ref_confirmed'])->set($data)->update('trades');
		redirect('admin');
	}

	public function getTrades()
	{
		return $this->db->where('status','Pending')->get('trades')->result();
	}

	public function getAllTrades()
	{
		return $this->db->where('status <>','Pending')->get('trades')->result();
	}

	public function getBitcoinTrades()
	{
		return $this->db->where('status','Pending')->get('trade_bitcoin')->result();
	}

	public function getAllBitcoinTrades()
	{
		return $this->db->where('status <>','Pending')->get('trade_bitcoin')->result();
	}

	public function getImages($ref)
	{
		return $this->db->where('ref',$ref)->get('images')->result();
	}

	public function bitcoin_rate()
	{
		$data['title']	= "Bitcoin Rate";
		$data['page']	= "admin/bitcoin_rate"; 
		$data['btc_rate']	= $this->getBitcoinRates();
		$this->load->view('admin/template', $data);
	}

	public function set_bitcoin_rate()
	{
		extract($this->input->post());
		$data = [
			'rate'			=> $rate,
			'amount'		=> $amount,
		];
		$this->db->insert('bitcoin_rate', $data);
		redirect('admin/bitcoin_rate');
	}

	public function update_bitcoin_rate($id)
	{
		extract($this->input->post());
		$data = [
			'rate'			=> $rate,
			'amount'		=> $amount,
		];
		$this->db->insert('bitcoin_rate', $data);
		$this->db->where('id',$id)->set($data)->update('bitcoin_rate');
		redirect('admin/bitcoin_rate');
	}

	public function getBitcoinRates()
	{
		return $this->db->get('bitcoin_rate')->result();
	}

	public function deleteBitcoinRates($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("bitcoin_rate");
		redirect('admin/bitcoin_rate');
		return;
	}
	
}