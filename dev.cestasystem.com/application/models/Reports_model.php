<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	// get payslip list> reports
	public function get_payslip_list($cid,$eid,$re_date) {
	  if($eid=='' || $eid==0){
		  return $query = $this->db->query("SELECT * from xin_make_payment where payment_date = '".$re_date."' and company_id = '".$cid."'");
	  } else {
	 	 return $query = $this->db->query("SELECT * from xin_make_payment where employee_id='".$eid."' and payment_date = '".$re_date."' and company_id = '".$cid."'");
	  }
	}
	// get training list> reports
	public function get_training_list($cid,$sdate,$edate) {
		  return $query = $this->db->query("SELECT * FROM `xin_training` where company_id='".$cid."' and start_date >= '".$sdate."' and finish_date <= '".$edate."'");
	}
	// get project list> reports
	public function get_project_list($projId,$projStatus) {
		
		  if($projId==0 && $projStatus==4) {
			  return $query = $this->db->query("SELECT * FROM `xin_projects`");
		  } else if($projId==0 && $projStatus!=4) {
			  return $query = $this->db->query("SELECT * FROM `xin_projects` where status='".$projStatus."'");
		  } else if($projId!=0 && $projStatus==4) {
			  return $query = $this->db->query("SELECT * FROM `xin_projects` where project_id='".$projId."'");
		  } else if($projId!=0 && $projStatus!=4) {
		  	return $query = $this->db->query("SELECT * FROM `xin_projects` where project_id='".$projId."' and status='".$projStatus."'");
		  }
	}
	
	// get task list> reports
	public function get_task_list($taskId,$taskStatus) {
		
		  if($taskId==0 && $taskStatus==4) {
			  return $query = $this->db->query("SELECT * FROM xin_tasks");
		  } else if($taskId==0 && $taskStatus!=4) {
			  return $query = $this->db->query("SELECT * FROM xin_tasks where task_status='".$taskStatus."'");
		  } else if($taskId!=0 && $taskStatus==4) {
			  return $query = $this->db->query("SELECT * FROM xin_tasks where task_id='".$taskId."'");
		  } else if($taskId!=0 && $taskStatus!=4) {
		  	return $query = $this->db->query("SELECT * FROM xin_tasks where task_id='".$taskId."' and task_status='".$taskStatus."'");
		  }
	}
	
	// get roles list> reports
	public function get_roles_employees($role_id) {
		  if($role_id==0) {
		 	 return $query = $this->db->query("SELECT * FROM xin_employees");
		  } else {
			  return $query = $this->db->query("SELECT * FROM xin_employees where user_role_id = '".$role_id."'");
		  }
	}
	
	// get employees list> reports
	public function get_employees_reports($company_id,$department_id,$designation_id) {
		  if($company_id==0 && $department_id==0 && $designation_id==0) {
		 	 return $query = $this->db->query("SELECT * FROM xin_employees");
		  } else if($company_id!=0 && $department_id==0 && $designation_id==0) {
		 	 return $query = $this->db->query("SELECT * FROM xin_employees where company_id = '".$company_id."'");
		  } else if($company_id!=0 && $department_id!=0 && $designation_id==0) {
		 	 return $query = $this->db->query("SELECT * FROM xin_employees where company_id = '".$company_id."' and department_id = '".$department_id."'");
		  } else if($company_id!=0 && $department_id!=0 && $designation_id!=0) {
		 	 return $query = $this->db->query("SELECT * FROM xin_employees where company_id = '".$company_id."' and department_id = '".$department_id."' and designation_id = '".$designation_id."'");
		  } else {
			  return $query = $this->db->query("SELECT * FROM xin_employees");
		  }
	}
	
}
?>