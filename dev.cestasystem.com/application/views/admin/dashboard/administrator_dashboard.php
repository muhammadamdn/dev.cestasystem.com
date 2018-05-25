<?php $theme = $this->Xin_model->read_theme_info(1);?>
<?php
$session = $this->session->userdata('username');
$user_info = $this->Exin_model->read_user_info($session['user_id']);
?>
<?php
	if($theme[0]->statistics_cards_background=='basic_color'){
		$bgclr = '';
		$clr_typ = '';
	} else if($theme[0]->statistics_cards_background=='gradient_color'){
		$bgclr = '';
		$clr_typ = 'bg-darken-2';
	} else {
		$bgclr = '';
		$clr_typ = 'bg-darken-2';
	}
	if($user_info[0]->profile_picture!='' && $user_info[0]->profile_picture!='no file') {
		$lde_file = base_url().'uploads/profile/'.$user_info[0]->profile_picture;
	} else { 
		if($user_info[0]->gender=='Male') {  
			$lde_file = base_url().'uploads/profile/default_male.jpg'; 
		} else {  
			$lde_file = base_url().'uploads/profile/default_female.jpg';
		}
	}
$last_login =  new DateTime($user_info[0]->last_login_date);
// get designation
$designation = $this->Designation_model->read_designation_information($user_info[0]->designation_id);
if(!is_null($designation)){
	$designation_name = $designation[0]->designation_name;
} else {
	$designation_name = '--';	
}
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $announcement = $this->Announcement_model->get_new_announcements();?>
<?php foreach($announcement as $new_announcement):?>
<?php
	$current_date = strtotime(date('Y-m-d'));
	$announcement_end_date = strtotime($new_announcement->end_date);
	if($current_date <= $announcement_end_date) {
?>
<div class="alert alert-success alert-dismissible fade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong><?php echo $new_announcement->title;?>:</strong> <?php echo $new_announcement->summary;?> <a href="#" class="alert-link" data-toggle="modal" data-target=".view-modal-annoucement" data-announcement_id="<?php echo $new_announcement->announcement_id;?>"><?php echo $this->lang->line('xin_view');?></a>
</div>
<?php } ?>
<?php endforeach;?>
<?php if($theme[0]->statistics_cards=='4' || $theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row">
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-warning <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-users font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>warning white media-body">
            <h5><?php echo $this->lang->line('xin_people');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/employees');?>"><i class="ft-arrow-up"></i><?php echo $this->Employees_model->get_total_employees();?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-danger <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-shuffle font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>danger white media-body">
            <h5><?php echo $this->lang->line('module_company_title');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/company');?>"><i class="ft-arrow-up"></i><?php echo $this->Xin_model->get_all_companies();?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-primary <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-calendar font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>primary white media-body">
            <h5><?php echo $this->lang->line('left_leave');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/timesheet/leave');?>"> <?php echo $this->lang->line('xin_performance_management');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-success <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-settings font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>success white media-body">
            <h5><?php echo $this->lang->line('xin_configure_hr');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/settings');?>"> <?php echo $this->lang->line('left_settings');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($theme[0]->statistics_cards=='8' || $theme[0]->statistics_cards=='12'){?>
<div class="row">
<?php if($system[0]->module_projects_tasks=='true'){?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-success <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-pie-chart font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>success white media-body">
            <h5><?php echo $this->lang->line('dashboard_projects');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/project');?>"><i class="ft-arrow-up"></i><?php echo $this->Xin_model->get_all_projects();?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-primary <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-list font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>primary white media-body">
            <h5><?php echo $this->lang->line('xin_tasks');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/timesheet/tasks');?>"><i class="ft-arrow-up"></i><?php echo $this->Xin_model->get_all_tasks();?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-success <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-list-alt font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>success white media-body">
            <h5><?php echo $this->lang->line('xin_view');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/designation');?>"> <?php echo $this->lang->line('left_designation');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-primary <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-calendar font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>primary white media-body">
            <h5><?php echo $this->lang->line('xin_view');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/timesheet/office_shift');?>"> <?php echo $this->lang->line('left_office_shifts');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->module_files=='true'){?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-danger <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-files-o font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>danger white media-body">
            <h5><?php echo $this->lang->line('xin_e_details_document');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/files');?>"><?php echo $this->lang->line('xin_performance_management');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-danger <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-plane font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>danger white media-body">
            <h5><?php echo $this->lang->line('xin_view');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/timesheet/holidays');?>"> <?php echo $this->lang->line('left_holidays');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-warning <?php echo $clr_typ;?> media-left media-middle"> <i class="ft-layout font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>warning white media-body">
            <h5><?php echo $this->lang->line('xin_theme_title');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/theme');?>"><?php echo $this->lang->line('left_settings');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($theme[0]->statistics_cards=='12'){?>
<div class="row">
<?php if($system[0]->module_training=='true'){?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-warning <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-mortar-board font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>warning white media-body">
            <h5><?php echo $this->lang->line('left_training');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/training');?>"> <?php echo $this->lang->line('xin_performance_management');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-warning <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-life-ring font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>warning white media-body">
            <h5><?php echo $this->lang->line('xin_setup');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/settings/modules');?>"> <?php echo $this->lang->line('xin_modules');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->module_travel=='true'){?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-danger <?php echo $clr_typ;?> media-left media-middle"> <i class="icon-plane font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>danger white media-body">
            <h5><?php echo $this->lang->line('xin_travel');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/travel');?>"> <?php echo $this->lang->line('xin_requests');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-danger <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-clock-o font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>danger white media-body">
            <h5><?php echo $this->lang->line('xin_view');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/timesheet/attendance');?>"> <?php echo $this->lang->line('dashboard_attendance');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php if($system[0]->module_inquiry=='true'){?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-primary <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-ticket font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>primary white media-body">
            <h5><?php echo $this->lang->line('left_tickets');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/tickets');?>"><i class="ft-arrow-up"></i> <?php echo $this->Xin_model->get_all_tickets();?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-primary <?php echo $clr_typ;?> media-left media-middle"> <i class="fa fa-building-o font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>primary white media-body">
            <h5><?php echo $this->lang->line('xin_view');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/department');?>"> <?php echo $this->lang->line('left_department');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-xl-3 col-lg-6 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <div class="p-2 text-xs-center bg-success <?php echo $clr_typ;?> media-left media-middle"> <i class="ft-user-check font-large-2 white"></i> </div>
          <div class="p-2 bg-<?php echo $bgclr;?>success white media-body">
            <h5><?php echo $this->lang->line('xin_permission');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/roles');?>"> <?php echo $this->lang->line('xin_roles');?></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php $this->load->view('admin/calendar/calendar_hr');?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('xin_employee_department_txt');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                  <div class="col-md-7">
                    <div class="overflow-scrolls" style="overflow:auto; height:200px;">
                        <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                               <?php $c_color = array('#00A5A8','#FF4558','#16D39A','#8A2BE2','#D2691E','#6495ED','#DC143C','#006400','#556B2F','#9932CC');?>
                                <?php $j=0;foreach($this->Department_model->all_departments() as $department) { ?>
                                <?php
									$condition = "department_id =" . "'" . $department->department_id . "'";
									$this->db->select('*');
									$this->db->from('xin_employees');
									$this->db->where($condition);
									$query = $this->db->get();
									// check if department available
									if ($query->num_rows() > 0) {
								?>
                                <tr>
                                    <td><div style="width:4px;height:0;border:5px solid <?php echo $c_color[$j];?>; margin-top:-5px; overflow:hidden; position:absolute; "></div></td>
                                    <td><?php echo htmlspecialchars_decode($department->department_name);?> (<?php echo $query->num_rows();?>)</td>
                                </tr>
                                <?php $j++; } ?>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                  <div class="col-md-5">
                  <canvas id="employee_department" height="200" width="" style="display: block;  height: 200px;"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('xin_employee_designation_txt');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                  <div class="col-md-7">
                    <div class="overflow-scrolls" style="overflow:auto; height:200px;">
                        <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                               <?php $c_color2 = array('#9932CC','#556B2F','#16D39A','#DC143C','#D2691E','#8A2BE2','#FF976A','#FF4558','#00A5A8','#6495ED');?>
                                <?php $k=0;foreach($this->Designation_model->all_designations() as $designation) { ?>
                                <?php
									$condition1 = "designation_id =" . "'" . $designation->designation_id . "'";
									$this->db->select('*');
									$this->db->from('xin_employees');
									$this->db->where($condition1);
									$query1 = $this->db->get();
									// check if department available
									if ($query1->num_rows() > 0) {
								?>
                                <tr>
                                    <td><div style="width:4px;height:0;border:5px solid <?php echo $c_color2[$k];?>; margin-top:-5px; overflow:hidden; position:absolute; "></div></td>
                                    <td><?php echo htmlspecialchars_decode($designation->designation_name);?> (<?php echo $query1->num_rows();?>)</td>
                                </tr>
                                <?php $k++; } ?>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-5">
                  <canvas id="employee_designation" height="200" width="" style="display: block; height: 200px;"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="card-block cleartfix">
          <div class="media">
            <div class="media-left media-middle"> <i class="icon-bar-chart warning font-large-2 mr-2"></i> </div>
            <div class="media-body">
              <h4><?php echo $this->lang->line('dashboard_total_expenses');?></h4>
              <span><a href="<?php echo site_url('admin/expense');?>"><?php echo $this->lang->line('xin_view');?> <i class="ft-arrow-right"></i></a></span> </div>
            <?php $exp_am = $this->Expense_model->get_total_expenses();?>
            <div class="media-right media-middle">
              <h1><?php echo $this->Xin_model->currency_sign($exp_am[0]->exp_amount);?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card-block cleartfix">
          <div class="media">
            <div class="media-left media-middle"> <i class="ft-package primary font-large-2 mr-2"></i> </div>
            <div class="media-body">
              <h4><?php echo $this->lang->line('dashboard_total_salaries');?></h4>
              <span><a href="<?php echo site_url('admin/payroll/payment_history');?>"><?php echo $this->lang->line('xin_view');?> <i class="ft-arrow-right"></i></a></span> </div>
            <?php $all_sal = $this->Xin_model->get_total_salaries_paid();?>
            <div class="media-right media-middle">
              <h1><?php echo $this->Xin_model->currency_sign($all_sal[0]->paid_amount);?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('xin_employee_status_txt');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                	<div class="col-md-5">
                    <div class="overflow-scrolls">
                        <div class="table-responsive">
                        <?php
						$current_month = date('Y-m-d');
						$working = $this->Xin_model->current_month_day_attendance($current_month);
						$query = $this->Xin_model->all_employees_status();
						$total = $query->num_rows();
						// absent
						$abs = $total - $working;
						?>
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><div style="width:4px;height:0;border:5px solid #20A464;top: 15px;overflow:hidden; position:absolute; "></div></td>
                                    <td><?php echo $this->lang->line('xin_emp_working');?> (<?php echo $working;?>)</td>
                                </tr>
                                <tr>
                                    <td><div style="width:4px;height:0;border:5px solid #DE2925;top: 56px;overflow:hidden; position:absolute; "></div></td>
                                    <td><?php echo $this->lang->line('xin_absent');?> (<?php echo $abs;?>)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-7">
                    <div class="overflow-scrolls">
                        <div id="employee_status" class="height-200 echart-container" style="min-width:400px;"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
      <div class="card text-xs-center">
      <div class="card-body px-1">
      <div class="card-header mb-2">
            <span class="danger"><?php echo $this->lang->line('dashboard_total_employees');?></span>
            <h3 class="display-4 blue-grey darken-1"><?php echo $total;?></h3>
        </div>
        <div id="recent-buyers" class="list-group position-relative" style="height: 132px;">
          <ul class="list-inline clearfix mt-3">
                <li class="border-right-blue-grey border-right-lighten-2 pr-2">
                    <h1 class="blue-grey darken-1 text-bold-400"><?php echo $this->Xin_model->male_employees();?>%</h1>
                    <span class="success"><i class="icon-male"></i> <?php echo $this->lang->line('xin_gender_male');?></span>
                </li>
                <li class="pl-2">
                    <h1 class="blue-grey darken-1 text-bold-400"><?php echo $this->Xin_model->female_employees();?>%</h1>
                    <span class="warning darken-2"><i class="icon-female"></i> <?php echo $this->lang->line('xin_gender_female');?></span>
                </li>
            </ul>
        </div>
      </div>
    </div>
   </div>
   <div class="col-xl-3 col-md-6 col-sm-12">
			<div class="card">
            <div class="card-header">
            <h4 class="card-title"><?php echo $this->lang->line('xin_quick_links');?></h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              </ul>
            </div>
          </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?php echo site_url('admin/employees');?>"><i class="ft-user-plus"></i> <?php echo $this->lang->line('xin_add_your_staff');?></a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('admin/timesheet/tasks');?>"><i class="fa fa-tasks"></i> <?php echo $this->lang->line('xin_add_tasks');?></a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('admin/project');?>"><i class="fa fa-pencil-square"></i> <?php echo $this->lang->line('xin_add_projects');?></a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('admin/assets');?>"><i class="ft-book"></i> <?php echo $this->lang->line('xin_add_assets');?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<!--/ Stats --> 
<!--.. -->
<div class="row match-height">
  <div class="col-xl-8 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $this->lang->line('left_payment_history');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <div class="card-block">
          <p><?php echo $this->lang->line('dashboard_total_salaries');?> <?php echo $this->Xin_model->currency_sign($all_sal[0]->paid_amount);?>. <span class="float-xs-right"><a href="<?php echo site_url('admin/payroll/payment_history');?>" target="_blank"><?php echo $this->lang->line('xin_all_payslips');?> <i class="ft-arrow-right"></i></a></span></p>
        </div>
        <div class="table-responsive">
          <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
            <thead>
              <tr>
                <th><?php echo $this->lang->line('xin_employee_name');?></th>
                <th><?php echo $this->lang->line('xin_paid_amount');?></th>
                <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                <th><?php echo $this->lang->line('xin_payment_month');?></th>
                <th><?php echo $this->lang->line('xin_payslip');?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_last_payment_history as $last_payments):?>
              <?php $user = $this->Xin_model->read_user_info($last_payments->employee_id);?>
              <?php if(!is_null($user)){?>
              <?php $full_name = $user[0]->first_name.' '.$user[0]->last_name;?>
              <?php
				 $month_payment = date("F, Y", strtotime($last_payments->payment_date));
				 $p_amount = $this->Xin_model->currency_sign($last_payments->payment_amount);
				 ?>
              <tr>
                <td class="text-truncate"><a target="_blank" href="<?php echo site_url().'admin/employees/detail/'.$last_payments->employee_id;?>/"><?php echo $full_name;?></a></td>
                <td class="text-truncate"><?php echo $p_amount;?></td>
                <td class="text-truncate"><span class="tag tag-success"><?php echo $this->lang->line('xin_payment_paid');?></span></td>
                <td class="text-truncate"><?php echo $month_payment;?></td>
                <td class="text-truncate"><a target="_blank" href="<?php echo site_url().'admin/payroll/payslip/id/'.$last_payments->make_payment_id;?>/"><?php echo $this->lang->line('xin_payslip');?></a></td>
              </tr>
              <?php } ?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $this->lang->line('dashboard_new');?> <?php echo $this->lang->line('dashboard_employees');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body px-1">
        <div id="recent-buyers" class="list-group height-300 position-relative">
          <?php foreach($last_four_employees as $employee) {?>
          <?php 
			if($employee->profile_picture!='' && $employee->profile_picture!='no file') {
				$de_file = 'uploads/profile/'.$employee->profile_picture;
			} else { 
				if($employee->gender=='Male') {  
				$de_file = 'uploads/profile/default_male.jpg'; 
				} else {  
				$de_file = 'uploads/profile/default_female.jpg';
				}
			}
			$fname = $employee->first_name.' '.$employee->last_name;
			// get designation
			$designation = $this->Designation_model->read_designation_information($employee->designation_id);
			if(!is_null($designation)){
				$designation_name = $designation[0]->designation_name;
			  } else {
				$designation_name = '--';	
			  }
			?>
          <a href="<?php echo site_url();?>admin/employees/detail/<?php echo $employee->user_id;?>/" class="list-group-item list-group-item-action media no-border">
          <div class="media-left"> <span class="avatar avatar-md"><img class="media-object rounded-circle" src="<?php echo base_url().$de_file;?>" alt="Generic placeholder image"> <i></i> </span> </div>
          <div class="media-body">
            <h6 class="list-group-item-heading"><?php echo $fname;?></h6>
            <p class="list-group-item-text"><span class="tag tag-warning"><?php echo $designation_name;?></span></p>
          </div>
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ .. --> 

