<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List extends CI_Controller {

	function __construct()
  {
    parent::__construct();
		$this->load->model('sl_table');
  }

	public function index()
	{
		$result =$this->sl_table->selectAll();
        var_dump($result);
		//$this->load->view('welcome_message');
		//$this->load->view('blog', $data);
	}
}
