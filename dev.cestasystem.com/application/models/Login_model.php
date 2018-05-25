<?php
	
	class Login_model extends CI_Model
	{
     function __construct()
     {
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
			$condition = "username =" . "'" . $data['username'] . "' AND  is_active='1'";
		else:
			$condition = "email =" . "'" . $data['username'] . "' AND is_active='1'";
		endif;
		
		$this->db->select('*');
		$this->db->from('xin_employees');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
	    $options = array('cost' => 12);
		$password_hash = password_hash($data['password'], PASSWORD_BCRYPT, $options);
		if ($query->num_rows() == 1) {
			$rw_password = $query->result();
			if(password_verify($data['password'],$rw_password[0]->password)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	// Read data using email and password > frontend user
	public function frontend_user_login($data) {
	
		$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "' and is_active='1'";
		
		$this->db->select('*');
		$this->db->from('xin_users');
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
	public function read_user_information($username) {
	
		$system = $this->read_setting_info(1);
		if($system[0]->employee_login_id=='username'):		
			$condition = "username =" . "'" . $username . "'";
		else:
			$condition = "email =" . "'" . $username . "'";
		endif;
			
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
	
		$condition = "user_id =" . "'" . $user_id . "'";
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
	public function read_frontend_user_info_session($email) {
	
		$condition = "email =" . "'" . $email . "'";
			
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
	
	

}
?>