<?php
	
class Elogin_model extends CI_Model {
     
	 function __construct() {
          // Call the Model constructor
          parent::__construct();
     }
	 
	 // get setting info
	public function read_setting_info($id) {
	
		$condition = "setting_id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('xin_system_setting');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	// Read data using username and password
	public function login($data) {
	
		$system = $this->read_setting_info(1);
		if($system[0]->employee_login_id=='username'):		
			$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' and is_active='1'";
		else:
			$condition = "email =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' and is_active='1'";
		endif;
		//$condition = "(username =" . "'" . $data['username'] . "' OR email =" . "'" . $data['username'] . "') AND " . "password =" . "'" . $data['password'] . "' and is_active='1'";
		
		$this->db->select('*');
		$this->db->from('xin_employees');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
	
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_em_info($username) {
	
		$condition = "username =" . "'" . $username . "' OR email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('xin_employees');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	// Read data from database to show data in admin page
	public function read_user_info_session_id($user_id) {
	
		$condition = "company_id =" . "'" . $user_id . "'";
		$this->db->select('*');
		$this->db->from('xin_companies');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}
?>