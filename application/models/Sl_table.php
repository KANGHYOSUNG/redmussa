<?php
class Sl_table extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectSeatByAll() {
        $this->db->select('*');
        $this->db->from('sl_table');
        $data=$this->db->get();
        return $data->result_array()[0]['table_date'];
    }

    public function updateSeat($data) {

        $winnerseat =$this->selectSeatByAll();

		$intens = array_diff(explode(",", $winnerseat) , explode(",", $data['remove']));
		$intens = array_diff($intens,explode(",", $data['add']));
		$seats = implode(array_merge( $intens, explode(",", $data['add'])) , ",");

        $this->db->set('table_date', $seats);
        $this->db->set('red_update_state', 'true');
        $this->db->set('red_modestate', '0');
        $this->db->where('red_index', 1);
        $this->db->update('sl_table');
		//$query = "UPDATE sl_table SET table_date='$customArray', red_update_state='true', red_modestate='0' WHERE red_index=1";
        if ($this->db->affected_rows() > 0) {
          return TRUE;
        } else{
          return FALSE;
        }
    }
}
?>
