<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Users_model extends CI_Model
	{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	public function get_users() {
	  return $this->db->get("xin_users");
	}
		
	public function get_all_users() {
	  $query = $this->db->get("xin_users");
	  return $query->result();
	}
	 
	public function read_users_info($id) {
	
		$condition = "user_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	// check email address
	public function check_user_email($email) {
	
		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('xin_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
		/*if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}*/
	}
	
	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_users', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
		
	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('user_id', $id);
		$this->db->delete('xin_users');
		
	}
	
	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_users',$data)) {
			return true;
		} else {
			return false;
		}		
	}
	
	// Function to update record without photo > in table
	public function update_record_no_photo($data, $id){
		$this->db->where('user_id', $id);
		if( $this->db->update('xin_users',$data)) {
			return true;
		} else {
			return false;
		}		
	}
}
?>