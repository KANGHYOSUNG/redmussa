<?php
class Cardgame extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function selectAll() {
        $this->db->select('*');
        $this->db->from('cardgame');
        $data=$this->db->get();
        return $data->result();
    }
}  
?>
