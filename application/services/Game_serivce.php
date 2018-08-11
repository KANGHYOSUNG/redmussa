<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Game_serivce {

    const GAME_TABLE_START = 50;
    const GAME_TABLE_END = 72;
    const SEAT_START = 1;
    const SEAT_END = 8;
    const SEAT_END_OTHER = 7;

    private $seat_other = [50,59,62,63,64];

    function __construct() {
        $_ci =& get_instance();
        $this->_ci = $_ci;
        $this->_ci->load->model('sl_table');
    }

    function winner() {
    	return explode(",", $this->_ci->sl_table->selectSeatByAll());
    }

    function seat($game) {
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

    function table() {

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

    function update($data) {
        return $this->_ci->sl_table->updateSeat($data);
    }
}
