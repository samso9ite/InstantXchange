<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

class News extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
 
	public function index_get()
	{
	    $news = $this->db->get('news')->result();
	    
        $this->response($news, REST_Controller::HTTP_OK);
    	 
	}
 
 
  
}