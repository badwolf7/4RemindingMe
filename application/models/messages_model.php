<?php
class messages_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_messages($slug = FALSE){
		if($slug === FALSE){
			$query = $this->db->get('messages');
			return $query->result_array();
		}
		$query = $this->db->order_by('when', 'desc')->get_where('messages', array('carrier' => $slug));
		return $query->row_array();
	}
}