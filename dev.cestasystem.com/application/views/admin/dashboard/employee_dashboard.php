<?php 
$session = $this->session->userdata('username');
$user_info = $this->Exin_model->read_user_info($session['user_id']);
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
<div class="row">
<?php if($system[0]->module_awards=='true'){?>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="fa fa-trophy font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-primary white media-body">
                        <h5><?php echo $this->lang->line('left_awards');?></h5>
                        <h5 class="text-bold-400">
                        <a class="white" href="<?php echo site_url('admin/user/awards');?>"><i class="ft-arrow-up"></i> <?php echo $this->Exin_model->total_employee_awards_dash();?></a></h5>
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
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="fa fa-clock-o font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-primary white media-body">
                        <h5><?php echo $this->lang->line('xin_view');?></h5>
                        <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/user/attendance');?>"> <?php echo $this->lang->line('dashboard_attendance');?></a></h5>
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
                    <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                        <i class="fa fa-usd font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-danger white media-body">
                        <h5><?php echo $this->lang->line('xin_expense');?></h5>
                        <h5 class="text-bold-400">
                        <a class="white" href="<?php echo site_url('admin/user/expense_claims');?>"><i class="ft-arrow-up"></i> <?php echo $this->Exin_model->total_employee_expense_dash();?></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="icon-calendar font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-warning white media-body">
                        <h5><?php echo $this->lang->line('left_leave');?></h5>
            <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/user/leave');?>"> <?php echo $this->lang->line('xin_performance_management');?></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($system[0]->module_travel=='true'){?>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                        <i class="icon-plane font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-success white media-body">
                        <h5><?php echo $this->lang->line('xin_travel');?></h5>
                        <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/user/travel');?>"> <?php echo $this->lang->line('xin_requests');?></a></h5>
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
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="fa fa-money font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-primary white media-body">
                        <h5><?php echo $this->lang->line('xin_view');?></h5>
                        <h5 class="text-bold-400"><a class="white" href="<?php echo site_url('admin/user/payslip');?>"> <?php echo $this->lang->line('left_payslips');?></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php } ?>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-12">
        <div class="card" style="height:422px;">
            <div class="text-xs-center">
                <div class="card-block">
                    <img src="<?php echo $lde_file;?>" class="rounded-circle  height-150" alt="<?php echo $user_info[0]->first_name. ' ' .$user_info[0]->last_name;?>">
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a class="text-black" href="<?php echo site_url();?>admin/profile/"><?php echo $user_info[0]->first_name. ' ' .$user_info[0]->last_name;?></a></h4>
                    <h6 class="card-subtitle text-muted"><?php echo $designation_name;?></h6>
                </div>
                <p class="text-muted pb-0-5"><?php echo $this->lang->line('dashboard_last_login');?>: <?php echo $this->Xin_model->set_date_format($user_info[0]->last_login_date).' '.$last_login->format('h:i a');?></p>
                <?php
				$att_date =  date('d-M-Y');
				$attendance_date = date('d-M-Y');
				// get office shift for employee
				$get_day = strtotime($att_date);
				$day = date('l', $get_day);
				$strtotime = strtotime($attendance_date);
				$new_date = date('d-M-Y', $strtotime);
				// office shift
				$u_shift = $this->Timesheet_model->read_office_shift_information($user_info[0]->office_shift_id);
				
				// get clock in/clock out of each employee
				if($day == 'Monday') {
					if($u_shift[0]->monday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_monday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->monday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->monday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Tuesday') {
					if($u_shift[0]->tuesday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_tuesday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->tuesday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->tuesday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Wednesday') {
					if($u_shift[0]->wednesday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_wednesday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->wednesday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->wednesday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Thursday') {
					if($u_shift[0]->thursday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_thursday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->thursday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->thursday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Friday') {
					if($u_shift[0]->friday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_friday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->friday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->friday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Saturday') {
					if($u_shift[0]->saturday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_saturday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->saturday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->saturday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				} else if($day == 'Sunday') {
					if($u_shift[0]->sunday_in_time==''){
						$office_shift = $this->lang->line('dashboard_today_sunday_shift');
					} else {
						$in_time =  new DateTime($u_shift[0]->sunday_in_time. ' ' .$attendance_date);
						$out_time =  new DateTime($u_shift[0]->sunday_out_time. ' ' .$attendance_date);
						$clock_in = $in_time->format('h:i a');
						$clock_out = $out_time->format('h:i a');
						$office_shift = $this->lang->line('dashboard_office_shift').': '.$clock_in.' '.$this->lang->line('dashboard_to').' '.$clock_out;
					}
				}
			  ?>
              <?php 
			  	if($system[0]->system_ip_restriction == 'yes'){
					if($system[0]->system_ip_address == $this->input->ip_address()){?>
                <div class="text-xs-center">
                    <div class="text-xs-center pb-0-5">
                  <form name="set_clocking" id="set_clocking" method="post" action="<?php echo site_url('admin/timesheet/set_clocking');?>">
                    <input type="hidden" name="timeshseet" value="<?php echo $user_info[0]->user_id;?>">
                    <?php $attendances = $this->Timesheet_model->attendance_time_checks($user_info[0]->user_id); $dat = $attendances->result();?>
                    <?php if($attendances->num_rows() < 1) {?>
                    <input type="hidden" value="clock_in" name="clock_state" id="clock_state">
                    <input type="hidden" value="" name="time_id" id="time_id">
                    <button class="btn btn-primary btn-block text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-right"></i> <?php echo $this->lang->line('dashboard_clock_in');?></button>
                    <?php } else {?>
                    <input type="hidden" value="clock_out" name="clock_state" id="clock_state">
                    <input type="hidden" value="<?php echo $dat[0]->time_attendance_id;?>" name="time_id" id="time_id">
                    <button class="btn btn-warning btn-block text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-left"></i> <?php echo $this->lang->line('dashboard_clock_out');?></button>
                    <?php } ?>
                  <?php echo form_close(); ?>
                </div>
                </div>
               <?php } } else {?>
               <div class="text-xs-center">
                    <div class="text-xs-center pb-0-5">
                  <form name="set_clocking" id="set_clocking" method="post" action="<?php echo site_url('admin/timesheet/set_clocking');?>">
                    <input type="hidden" name="timeshseet" value="<?php echo $user_info[0]->user_id;?>">
                    <?php $attendances = $this->Timesheet_model->attendance_time_checks($user_info[0]->user_id); $dat = $attendances->result();?>
                    <?php if($attendances->num_rows() < 1) {?>
                    <input type="hidden" value="clock_in" name="clock_state" id="clock_state">
                    <input type="hidden" value="" name="time_id" id="time_id">
                    <button class="btn btn-primary btn-block text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-right"></i> <?php echo $this->lang->line('dashboard_clock_in');?></button>
                    <?php } else {?>
                    <input type="hidden" value="clock_out" name="clock_state" id="clock_state">
                    <input type="hidden" value="<?php echo $dat[0]->time_attendance_id;?>" name="time_id" id="time_id">
                    <button class="btn btn-warning btn-block text-uppercase" type="submit" id="clock_btn"><i class="fa fa-arrow-circle-left"></i> <?php echo $this->lang->line('dashboard_clock_out');?></button>
                    <?php } ?>
                  <?php echo form_close(); ?>
                </div>
                </div>
               <?php } ?> 
                <div class="card-block">
                    <a href="<?php echo site_url('admin/profile');?>" class="btn btn-outline-primary btn-md btn-round mr-1"><i class="ft-user"></i> <?php echo $this->lang->line('xin_profile');?></a>
                    <a href="<?php echo site_url('admin/logout');?>" class="btn btn-outline-danger btn-md btn-round mr-1"><i class="ft-power"></i> <?php echo $this->lang->line('left_logout');?></a>
                </div>
            </div>
        </div>
    </div>
    
    <?php if($system[0]->module_projects_tasks=='true'){?>                            
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('dashboard_my_tasks');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive height-200">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                            <th><?php echo $this->lang->line('xin_action');?></th>
                            <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
                            <th><?php echo $this->lang->line('dashboard_xin_end_date');?></th>
                            <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                            <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $task = $this->Timesheet_model->get_tasks();?>
                        <?php $dId = array(); $i=1; $ct_tasks = 0;
						$ovt_tasks = 0; $tot_tasks=0; foreach($task->result() as $et):
                         // $aw_name = $hrm->e_award_type($emp_award->award_type_id);
                         $asd = array($et->assigned_to);
                         $aim = explode(',',$et->assigned_to);
                         foreach($aim as $dIds) {
                             if($session['user_id'] === $dIds) {
                                $dId[] = $session['user_id'];
							// task end date		
							$tdate = $this->Xin_model->set_date_format($et->end_date);
							// task progress
							if($et->task_progress <= 20) {
								$progress_class = 'progress-danger';
								$tag_class = 'tag-danger';
							} else if($et->task_progress > 20 && $et->task_progress <= 50){
								$progress_class = 'progress-warning';
								$tag_class = 'tag-warning';
							} else if($et->task_progress > 50 && $et->task_progress <= 75){
								$progress_class = 'progress-info';
								$tag_class = 'tag-info';
							} else {
								$progress_class = 'progress-success';
								$tag_class = 'tag-success';
							}
							 
							// project progress
							if($et->task_status == 0) {
								$status = $this->lang->line('xin_not_started');
							} else if($et->task_status ==1){
								$status = $this->lang->line('xin_in_progress');
							} else if($et->task_status ==2){
								$status = $this->lang->line('xin_completed');
							} else {
								$status = $this->lang->line('xin_deffered');
							}
							// task project
							$prj_task = $this->Project_model->read_project_information($et->project_id);
							if(!is_null($prj_task)){
								$prj_name = $prj_task[0]->title;
							} else {
								$prj_name = '--';
							}
							
							// tasks completed
							$c_task = $this->Exin_model->get_completed_tasks($et->task_id);
							$ct_tasks += $c_task;
							// tasks overdue
							$ov_task = $this->Exin_model->get_overdue_tasks($et->task_id);
							$ovt_tasks += $ov_task;
							// todo tasks
							$tod_task = $this->Exin_model->get_todo_tasks($et->task_id);
							$tot_tasks += $tod_task;
							?>
                         	<tr>
                                <td><?php echo '<span data-toggle="tooltip" data-placement="top" title="'.$this->lang->line('xin_view_details').'"><a href="'.site_url().'admin/user/task_details/id/'.$et->task_id.'/"><button type="button" class="btn btn-secondary btn-sm m-b-0-0 waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i></button></a></span>';?></td>
                                <td class="text-truncate"><?php echo $et->task_name;?><br /><a href="<?php echo site_url();?>admin/user/project_details/<?php echo $et->project_id;?>/"><?php echo $prj_name;?></a></td>
                                <td class="text-truncate"><i class="fa fa-calendar position-left"></i> <?php echo $tdate;?></td>
                                <td class="text-truncate"><span class="tag tag-default <?php echo $tag_class;?>"><?php echo $status;?></span></td>
                                <td class="text-truncate"><p class="m-b-0-5"><?php echo $this->lang->line('dashboard_completed');?> <span class="pull-xs-right">
			  <?php echo $et->task_progress;?>%</span></p>
                <progress class="progress <?php echo $progress_class;?> progress-sm d-inline-block mb-0" value="<?php echo $et->task_progress;?>" max="100"><?php echo $et->task_progress;?>%</progress></td>
                            </tr>
                            <?php }
							} ?>
						<?php $i++; endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
            <div class="card-block">
                <div class="row">
                <div class="col-xl-4 col-lg-6 col-xs-12 border-right-blue-grey border-right-lighten-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="fa fa-calendar danger font-large-2 float-xs-left"></i>
                                    </div>
                                    <div class="media-body text-xs-right">
                                        <h3><?php echo $ovt_tasks;?></h3>
                                        <span><?php echo $this->lang->line('xin_task_due');?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-12 border-right-blue-grey border-right-lighten-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="fa fa-tasks warning font-large-2 float-xs-left"></i>
                                    </div>
                                    <div class="media-body text-xs-right">
                                        <h3><?php echo $tot_tasks;?></h3>
                                        <span><?php echo $this->lang->line('xin_task_todo');?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <i class="ft-check success font-large-2 float-xs-left"></i>
                                    </div>
                                    <div class="media-body text-xs-right">
                                        <h3><?php echo $ct_tasks;?></h3>
                                        <span><?php echo $this->lang->line('xin_task_done');?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php } else {?>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('dashboard_personal_details');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body px-1">
                <div id="recent-buyers" class="list-group scrollable-container height-350 position-relative">
                  <div class="table-responsive" data-pattern="priority-columns">
                <table width="" class="table table-striped m-md-b-0">
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_fullname');?></th>
                      <td><?php echo $first_name.' '.$last_name;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_employee_id');?></th>
                      <td><?php echo $employee_id;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_username');?></th>
                      <td><?php echo $username;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_email');?></th>
                      <td><?php echo $email;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_designation');?></th>
                      <td><?php echo $designation_name;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('left_department');?></th>
                      <td><?php echo $department_name;?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_dob');?></th>
                      <td><?php echo $this->Xin_model->set_date_format($date_of_birth);?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('dashboard_contact');?>#</th>
                      <td><?php echo $contact_no;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('dashboard_recruitment');?> <?php echo $this->lang->line('dashboard_timeline');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body px-1">
                <div id="recent-buyers" class="list-group scrollable-container height-350 position-relative">
                  <?php foreach($all_jobs as $job):?>
					<?php $jtype = $this->Job_post_model->read_job_type_information($job->job_type); ?>
                    <?php
						if(!is_null($jtype)){
							$jt_type = $jtype[0]->type;
						} else {
							$jt_type = '--';	
						}
					  ?>
                    <?php $job_designation = $this->Designation_model->read_designation_information($job->designation_id);?>
                    <?php
						if(!is_null($job_designation)){
							$designation_name = $job_designation[0]->designation_name;
						} else {
							$designation_name = '--';	
						}
					  ?>
                    <?php $department = $this->Department_model->read_department_information($job_designation[0]->department_id);?>
                    <?php
						if(!is_null($department)){
							$department_name = $department[0]->department_name;
						} else {
							$department_name = '--';	
						}
					  ?>
					  <a href="<?php echo site_url();?>frontend/jobs/detail/<?php echo $job->job_id;?>/" class="list-group-item list-group-item-action media no-border">
                        <div class="media-body">
                            <h6 class="list-group-item-heading"><?php echo $job->job_title;?> <span class="float-xs-right pt-1"><span class="tag tag-warning ml-1"><?php echo $jt_type;?></span></span></h6>
                            <p class="list-group-item-text"><span class="tag tag-primary"><?php echo $designation_name;?></span></p>
                        </div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
  </div>

<!--/ Stats -->
<!--Product sale & buyers -->
<div class="row match-height">
    <?php if($system[0]->module_projects_tasks=='true'){?>
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('dashboard_my_projects');?></h4>
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
                    <p><?php echo $this->lang->line('xin_my_assigned_projects');?> <span class="float-xs-right"><a href="<?php echo site_url('admin/user/projects');?>"><?php echo $this->lang->line('xin_more_projects');?> <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive" style="height:250px;">
                    <table id="recent-orderss" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                        <tr>
                             <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
                             <th><?php echo $this->lang->line('xin_p_priority');?></th>
                             <th><?php echo $this->lang->line('dashboard_project_date');?></th>
                             <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                             <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $project = $this->Project_model->get_projects();?>
						<?php $dId = array(); $i=1; foreach($project->result() as $pj):
                         // $aw_name = $hrm->e_award_type($emp_award->award_type_id);
                         $asd = array($pj->assigned_to);
                         $aim = explode(',',$pj->assigned_to);
                         foreach($aim as $dIds) {
                             if($session['user_id'] === $dIds) {
                                $dId[] = $session['user_id'];
							// project date		
							$pdate = $this->Xin_model->set_date_format($pj->end_date);
							// project progress
							if($pj->project_progress <= 20) {
								$progress_class = 'progress-danger';
							} else if($pj->project_progress > 20 && $pj->project_progress <= 50){
								$progress_class = 'progress-warning';
							} else if($pj->project_progress > 50 && $pj->project_progress <= 75){
								$progress_class = 'progress-info';
							} else {
								$progress_class = 'progress-success';
							}
							 
							// project progress
							if($pj->status == 0) {
								$status = $this->lang->line('xin_not_started');
							} else if($pj->status ==1){
								$status = $this->lang->line('xin_in_progress');
							} else if($pj->status ==2){
								$status = $this->lang->line('xin_completed');
							} else {
								$status = $this->lang->line('xin_deffered');
							}
							// priority
							if($pj->priority == 1) {
								$priority = '<span class="tag tag-danger">'.$this->lang->line('xin_highest').'</span>';
							} else if($pj->priority ==2){
								$priority = '<span class="tag tag-danger">'.$this->lang->line('xin_high').'</span>';
							} else if($pj->priority ==3){
								$priority = '<span class="tag tag-primary">'.$this->lang->line('xin_normal').'</span>';
							} else {
								$priority = '<span class="tag tag-success">'.$this->lang->line('xin_low').'</span>';
							}
							?>
                     		<tr>
                                <td class="text-truncate"><a href="<?php echo site_url();?>admin/user/project_details/<?php echo $pj->project_id;?>/"><?php echo $pj->title;?></a></td>
                                <td class="text-truncate"><?php echo $priority;?></td>
                                <td class="text-truncate"><i class="fa fa-calendar position-left"></i> <?php echo $pdate;?></td>
                                <td class="text-truncate"><?php echo $status;?></td>
                                <td class="text-truncate"><p class="m-b-0-5"><?php echo $this->lang->line('dashboard_completed');?> <span class="pull-xs-right"><?php echo $pj->project_progress;?>%</span></p>
                                <progress class="progress <?php echo $progress_class;?> progress-sm d-inline-block mb-0" value="<?php echo $pj->project_progress;?>" max="100"><?php echo $pj->project_progress;?>%</progress></td>
                            </tr>
                            <?php }
								} ?>
						<?php $i++; endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php //} else {?>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $this->lang->line('dashboard_recruitment');?> <?php echo $this->lang->line('dashboard_timeline');?></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body px-1">
                <div id="recent-buyers" class="list-group scrollable-container height-300 position-relative">
                  <?php foreach($all_jobs as $job):?>
					<?php $jtype = $this->Job_post_model->read_job_type_information($job->job_type); ?>
                    <?php
						if(!is_null($jtype)){
							$jt_type = $jtype[0]->type;
						} else {
							$jt_type = '--';	
						}
					  ?>
                    <?php $job_designation = $this->Designation_model->read_designation_information($job->designation_id);?>
                    <?php
						if(!is_null($job_designation)){
							$designation_name = $job_designation[0]->designation_name;
						} else {
							$designation_name = '--';	
						}
					  ?>
                    <?php $department = $this->Department_model->read_department_information($job_designation[0]->department_id);?>
                    <?php
						if(!is_null($department)){
							$department_name = $department[0]->department_name;
						} else {
							$department_name = '--';	
						}
					  ?>
					  <a href="<?php echo site_url();?>frontend/jobs/detail/<?php echo $job->job_id;?>/" class="list-group-item list-group-item-action media no-border">
                        <div class="media-body">
                            <h6 class="list-group-item-heading"><?php echo $job->job_title;?> <span class="float-xs-right pt-1"><span class="tag tag-warning ml-1"><?php echo $jt_type;?></span></span></h6>
                            <p class="list-group-item-text"><span class="tag tag-primary"><?php echo $designation_name;?></span></p>
                        </div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<!--/ Product sale & buyers -->