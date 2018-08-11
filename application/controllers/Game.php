<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Game extends REST_Controller {

	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->service('Game_serivce' , 'game' , TRUE);
    }

	function index_get() {
		$this->load->view('list' , $this->game->table());
	}

	function index_post() {
		$data = [
			"add" => $this->post("add"),
			"remove" => $this->input->post("remove")
		];
		$result = $this->game->update($data);

		if(empty($result)) {
			$this->response('fail update', 500);
		} else {
			$this->response('success', 200);
		}
	}
}
