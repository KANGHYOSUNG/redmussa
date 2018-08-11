<?php
class Sl_table extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectAll() {
        $this->db->select('*');
        $this->db->from('sl_table');
        $data=$this->db->get();
        return $data->result_array()[0]['table_date'];
    }
}
?>
