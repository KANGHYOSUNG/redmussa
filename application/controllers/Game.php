<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Game extends REST_Controller {

	const GAME_TABLE_START = 50;
	const GAME_TABLE_END = 72;
	const SEAT_START = 1;
	const SEAT_END = 8;
	const SEAT_END_OTHER = 7;

	private $seat_other = [50,59,62,63,64];

	function __construct($config = 'rest') {
        parent::__construct($config);
		$this->load->model('sl_table');
    }

	function index_get() {
		$data = self::table();
		$this->load->view('list' , $data);
	}

	function index_post() {
		$message = [
			"add" => $this->post("add"),
			"remove" => $this->input->post("remove")
		];
		$result = $this->sl_table->updateSeat($message);
		if(empty($result)) {
			$this->response('fail update', 500);
		} else {
			$this->response('success', 200);	
		}
	}

	function health() {
		//var_dump( site_url() );
	}

	private function winner() {
		return explode(",", $this->sl_table->selectSeatByAll());
	}

	private function seat($game) {
		$winnner = self::winner();
		if(in_array($game , $this->seat_other)) {
			$seat_max = self::SEAT_END_OTHER;
		} else {
			$seat_max = self::SEAT_END;
		}

		for($seat = self::SEAT_START ; $seat <= $seat_max ; $seat++ ) {
			if(in_array( $game.'_'.$seat , $winnner)) {
				$arrSeat[$game.'_'.$seat] = 1;
			} else {
				$arrSeat[$game.'_'.$seat] = 0;
			}
		}
		return $arrSeat;
	}

	private function table() {

		for($game = self::GAME_TABLE_START ; $game <= self::GAME_TABLE_END ; $game++) {
			$table[$game] = self::seat($game);
		}

		$seats = [
			"table_start"=> self::GAME_TABLE_START,
			"table_end"=> self::GAME_TABLE_END,
			"table"=> $table
		];
		return $seats;
	}

}
