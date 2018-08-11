<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	const GAME_TABLE_START = 50;
	const GAME_TABLE_END = 72;
	const SEAT_START = 1;
	const SEAT_END = 8;
	const SEAT_END_OTHER = 7;

	private $seat_other = [50,59,62,63,64];

	function __construct()
	{
		parent::__construct();
	}

	function index() {
		$data = self::standard();
		$this->load->view('list' , $data);
	}

	public function standard() {

		$seats = [
			"table_start"=> self::GAME_TABLE_START,
			"table_end"=> self::GAME_TABLE_END,
			"table"=> self::table()
		];
		return $seats;
	}

	public function winner() {
		$this->load->model('sl_table');
		return explode(",", $this->sl_table->selectAll());
	}

	public function seat($game) {
		$winnner = self::winner();
		if(in_array($game , $this->seat_other)) {
			$seat_max = self::SEAT_END_OTHER;
		} else {
			$seat_max = self::SEAT_END;
		}

		for($seat = self::SEAT_START ; $seat <= $seat_max ; $seat++ ) {
			if(in_array( $game.'_'.$seat , $winnner)) {
				$arrSeat[$seat] = 1;
			} else {
				$arrSeat[$seat] = 0;
			}
		}
		return $arrSeat;
	}

	public function table() {

		for($game = self::GAME_TABLE_START ; $game <= self::GAME_TABLE_END ; $game++) {
			$table[$game] = self::seat($game);
		}
		return $table;
	}
}
