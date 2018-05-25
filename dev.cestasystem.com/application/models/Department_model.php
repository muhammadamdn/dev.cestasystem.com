<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class department_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function get_departments()
	{
	  return $this->db->get("xin_departments");
	}

	// Start Cesta
  // get my Department
	public function get_my_departments($comp_id)
	{
		$comp_id = array('company_id' => $comp_id);
		return $this->db->get_where('xin_departments', $comp_id);
	}



	 public function read_department_information($id) {

		$condition = "department_id =". $this->db->escape($id);
		$this->db->select('*');
		$this->db->from('xin_departments');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	// get single record > company | locations
	 public function ajax_location_information($id) {

		$condition = "company_id =". $this->db->escape($id);
		$this->db->select('*');
		$this->db->from('xin_office_location');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	// get single record > company | employees
	 public function ajax_company_employee_info($id) {

		$condition = "company_id =" . $this->db->escape($id);
		$this->db->select('*');
		$this->db->from('xin_employees');
		$this->db->where($condition);
		$this->db->limit(100);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	// Function to add record in table
	public function add($data){
		$this->db->insert('xin_departments', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Function to Delete selected record from table
	public function delete_record($id){
		$this->db->where('department_id', $id);
		$this->db->delete('xin_departments');

	}

	// Function to update record in table
	public function update_record($data, $id){
		$this->db->where('department_id', $id);
		$data = $this->security->xss_clean($data);
		if( $this->db->update('xin_departments',$data)) {
			return true;
		} else {
			return false;
		}
	}

	// get all departments
	public function all_departments()
	{
	  $query = $this->db->query("SELECT * from xin_departments");
  	  return $query->result();
	}
}
?>