<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Languages_model extends CI_Model
	{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_languages()
	{
	  return $this->db->get("xin_languages");
	}
	 
	 public function read_language_information($id) {
	
		$condition = "language_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_languages');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}	
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_languages', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('language_id', $id);
		$this->db->delete('xin_languages');
		
	}
	
	// Function to update record in table
	public function active_lang_record($data, $id){
		$this->db->where('language_id', $id);
		if( $this->db->update('xin_languages',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('language_id', $id);
		if( $this->db->update('xin_languages',$data)) {
			return true;
		} else {
			return false;
		}		
	}
}
?>