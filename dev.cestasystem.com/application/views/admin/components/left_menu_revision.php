<?php
$session = $this->session->userdata('username');
$theme = $this->Xin_model->read_theme_info(1);
// set layout / fixed or static
if($theme[0]->right_side_icons=='true') {
	$icons_right = 'expanded menu-icon-right';
} else {
	$icons_right = '';
}
if($theme[0]->bordered_menu=='true') {
	$menu_bordered = 'menu-bordered';
} else {
	$menu_bordered = '';
}
$user_info = $this->Xin_model->read_user_info($session['user_id']);
if($user_info[0]->is_active!=1) {
	redirect('admin/');
}
$role_user = $this->Xin_model->read_user_role_info($user_info[0]->user_role_id);
if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);
}
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $arr_mod = $this->Xin_model->select_module_class($this->router->fetch_class(),$this->router->fetch_method()); ?>
<!-- menu start-->

<div data-scroll-to-active="true" class="main-menu menu-fixed <?php echo $menu_bordered;?> <?php echo $icons_right;?> <?php echo $theme[0]->menu_color_option;?> menu-accordion menu-shadow">
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class="<?php if(!empty($arr_mod['active']))echo $arr_mod['active'];?> nav-item"><a href="<?php echo site_url('admin/dashboard');?>"><i class="ft-home"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('dashboard_title');?></span></a> </li>
      <?php if(in_array('13',$role_resources_ids) || in_array('88',$role_resources_ids) || in_array('92',$role_resources_ids) || $user_info[0]->user_role_id==1){?>
      <li class="<?php if(!empty($arr_mod['stff_open']))echo $arr_mod['stff_open'];?> has-sub nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('let_staff');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('13',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['emp_active']))echo $arr_mod['emp_active'];?>"><a href="<?php echo site_url('admin/employees');?>"><?php echo $this->lang->line('dashboard_employees');?></a></li>
          <?php } ?>
          <?php  if($user_info[0]->user_role_id==1) { ?>
          <li class="<?php if(!empty($arr_mod['roles_active']))echo $arr_mod['roles_active'];?>"><a href="<?php echo site_url('admin/roles');?>"><?php echo $this->lang->line('xin_role_urole');?></a></li>
          <?php } ?>
          <?php  if(in_array('88',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hremp_active']))echo $arr_mod['hremp_active'];?>"><a href="<?php echo site_url('admin/employees/hr');?>"><?php echo $this->lang->line('left_employees_directory');?></a></li>
          <?php } ?>
          <?php  if(in_array('92',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['importemp_active']))echo $arr_mod['importemp_active'];?>"><a href="<?php echo site_url('admin/employees/import');?>"><?php echo $this->lang->line('xin_import_employees');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('12',$role_resources_ids) || in_array('14',$role_resources_ids) || in_array('15',$role_resources_ids) || in_array('16',$role_resources_ids) || in_array('17',$role_resources_ids) || in_array('18',$role_resources_ids) || in_array('19',$role_resources_ids) || in_array('20',$role_resources_ids) || in_array('21',$role_resources_ids) || in_array('22',$role_resources_ids) || in_array('23',$role_resources_ids)){?>
      <li class="<?php if(!empty($arr_mod['emp_open']))echo $arr_mod['emp_open'];?> nav-item"><a href="#"><i class="ft-globe"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr');?></span></a>
        <ul class="menu-content">
          <?php if($system[0]->module_awards=='true'){?>
          <?php if(in_array('14',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['awar_active']))echo $arr_mod['awar_active'];?>"><a href="<?php echo site_url('admin/awards');?>"><?php echo $this->lang->line('left_awards');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('15',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['tra_active']))echo $arr_mod['tra_active'];?>"><a href="<?php echo site_url('admin/transfers');?>"><?php echo $this->lang->line('left_transfers');?></a></li>
          <?php } ?>
          <?php if(in_array('16',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['res_active']))echo $arr_mod['res_active'];?>"><a href="<?php echo site_url('admin/resignation');?>"><?php echo $this->lang->line('left_resignations');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_travel=='true'){?>
          <?php if(in_array('17',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['trav_active']))echo $arr_mod['trav_active'];?>"><a href="<?php echo site_url('admin/travel');?>"><?php echo $this->lang->line('left_travels');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('18',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pro_active']))echo $arr_mod['pro_active'];?>"><a href="<?php echo site_url('admin/promotion');?>"><?php echo $this->lang->line('left_promotions');?></a></li>
          <?php } ?>
          <?php if(in_array('19',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['compl_active']))echo $arr_mod['compl_active'];?>"><a href="<?php echo site_url('admin/complaints');?>"><?php echo $this->lang->line('left_complaints');?></a></li>
          <?php } ?>
          <?php if(in_array('20',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['warn_active']))echo $arr_mod['warn_active'];?>"><a href="<?php echo site_url('admin/warning');?>"><?php echo $this->lang->line('left_warnings');?></a></li>
          <?php } ?>
          <?php if(in_array('21',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['term_active']))echo $arr_mod['term_active'];?>"><a href="<?php echo site_url('admin/termination');?>"><?php echo $this->lang->line('left_terminations');?></a></li>
          <?php } ?>
          <?php if(in_array('22',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['emp_ll_active']))echo $arr_mod['emp_ll_active'];?>"><a href="<?php echo site_url('admin/employees_last_login');?>"><?php echo $this->lang->line('left_employees_last_login');?></a></li>
          <?php } ?>
          <?php if(in_array('23',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['emp_ex_active']))echo $arr_mod['emp_ex_active'];?>"><a href="<?php echo site_url('admin/employee_exit');?>"><?php echo $this->lang->line('left_employees_exit');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('2',$role_resources_ids) || in_array('3',$role_resources_ids) || in_array('4',$role_resources_ids) || in_array('5',$role_resources_ids) || in_array('6',$role_resources_ids) || in_array('7',$role_resources_ids) || in_array('8',$role_resources_ids) || in_array('9',$role_resources_ids) || in_array('10',$role_resources_ids) || in_array('11',$role_resources_ids) || in_array('96',$role_resources_ids)){?>
      <li class="<?php if(!empty($arr_mod['adm_open']))echo $arr_mod['adm_open'];?> nav-item"><a href="#"><i class="ft-layers"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_organization');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('11',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['ann_active']))echo $arr_mod['ann_active'];?>"><a href="<?php echo site_url('admin/announcement');?>" class="menu-item"><?php echo $this->lang->line('left_announcements');?></a></li>
          <?php } ?>
          <?php if(in_array('9',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pol_active']))echo $arr_mod['pol_active'];?>"><a href="<?php echo site_url('admin/policy');?>" class="menu-item"><?php echo $this->lang->line('left_policies');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_orgchart=='true'){?>
          <?php if(in_array('96',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['org_chart_active']))echo $arr_mod['org_chart_active'];?>"><a href="<?php echo site_url('admin/organization/chart');?>" class="menu-item"><?php echo $this->lang->line('xin_org_chart_lnk');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('3',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['dep_active']))echo $arr_mod['dep_active'];?>"><a href="<?php echo site_url('admin/department');?>" class="menu-item"><?php echo $this->lang->line('left_department');?></a></li>
          <?php } ?>
          <?php if(in_array('4',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['des_active']))echo $arr_mod['des_active'];?>"><a href="<?php echo site_url('admin/designation');?>" class="menu-item"><?php echo $this->lang->line('left_designation');?></a></li>
          <?php } ?>
          <?php if(in_array('5',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['com_active']))echo $arr_mod['com_active'];?>"><a href="<?php echo site_url('admin/company')?>" class="menu-item"><?php echo $this->lang->line('left_company');?></a></li>
          <?php } ?>
          <?php if(in_array('6',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['loc_active']))echo $arr_mod['loc_active'];?>"><a href="<?php echo site_url('admin/location');?>" class="menu-item"><?php echo $this->lang->line('left_location');?></a></li>
          <?php } ?>
          <?php if(in_array('7',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['offsh_active']))echo $arr_mod['offsh_active'];?>"><a href="<?php echo site_url('admin/timesheet/office_shift');?>"><?php echo $this->lang->line('left_office_shifts');?></a></li>
          <?php } ?>
          <?php if(in_array('8',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hol_active']))echo $arr_mod['hol_active'];?>"><a href="<?php echo site_url('admin/timesheet/holidays');?>"><?php echo $this->lang->line('left_holidays');?></a></li>
          <?php } ?>
          <?php if(in_array('10',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['exp_active']))echo $arr_mod['exp_active'];?>"><a href="<?php echo site_url('admin/expense');?>" class="menu-item"><?php echo $this->lang->line('left_expense');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(in_array('118',$role_resources_ids)) { ?>
       <li class="<?php if(!empty($arr_mod['chat_active']))echo $arr_mod['chat_active'];?> nav-item"><a href="<?php echo site_url('admin/chat');?>"><i class="fa fa-comments"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr_chat_box');?></span></a> </li>
      <?php } ?>
      <?php if(in_array('95',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['calendar_hr_active']))echo $arr_mod['calendar_hr_active'];?> nav-item"><a href="<?php echo site_url('admin/calendar/hr');?>"><i class="ft-plus-square"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr_calendar_title');?></span></a> </li>
      <?php } ?>
      <?php if($system[0]->module_assets=='true'){?>
      <?php  if(in_array('24',$role_resources_ids) || in_array('25',$role_resources_ids) || in_array('26',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['asst_open']))echo $arr_mod['asst_open'];?> nav-item"><a href="#"><i class="ft-book"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_assets');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('25',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['asst_active']))echo $arr_mod['asst_active'];?>"><a href="<?php echo site_url('admin/assets');?>"><?php echo $this->lang->line('xin_assets');?></a></li>
          <?php } ?>
          <?php if(in_array('26',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['asst_cat_active']))echo $arr_mod['asst_cat_active'];?>"><a href="<?php echo site_url('admin/assets/category');?>"><?php echo $this->lang->line('xin_acc_category');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_events=='true'){?>
      <?php  if(in_array('97',$role_resources_ids) || in_array('98',$role_resources_ids) || in_array('99',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['hr_events_open']))echo $arr_mod['hr_events_open'];?> nav-item"><a href="#"><i class="fa fa-calendar"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr_events_meetings');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('98',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_events_active']))echo $arr_mod['hr_events_active'];?>"><a href="<?php echo site_url('admin/events');?>"><?php echo $this->lang->line('xin_hr_events');?></a></li>
          <?php } ?>
          <?php if(in_array('99',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_meetings_active']))echo $arr_mod['hr_meetings_active'];?>"><a href="<?php echo site_url('admin/meetings');?>"><?php echo $this->lang->line('xin_hr_meetings');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php  if(in_array('27',$role_resources_ids) || in_array('28',$role_resources_ids) || in_array('29',$role_resources_ids) || in_array('30',$role_resources_ids) || in_array('31',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['attnd_open']))echo $arr_mod['attnd_open'];?> nav-item"><a href="#"><i class="fa fa-clock-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_timesheet');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('28',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['attnd_active']))echo $arr_mod['attnd_active'];?>"><a href="<?php echo site_url('admin/timesheet/attendance');?>"><?php echo $this->lang->line('left_attendance');?></a></li>
          <?php } ?>
          <?php if(in_array('29',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['dtwise_attnd_active']))echo $arr_mod['dtwise_attnd_active'];?>"><a href="<?php echo site_url('admin/timesheet/date_wise_attendance');?>"><?php echo $this->lang->line('left_date_wise_attendance');?></a></li>
          <?php } ?>
          <?php if(in_array('30',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['upd_attnd_active']))echo $arr_mod['upd_attnd_active'];?>"><a href="<?php echo base_url('admin/timesheet/update_attendance');?>"><?php echo $this->lang->line('left_update_attendance');?></a></li>
          <?php } ?>
          <?php if(in_array('31',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['import_attnd_active']))echo $arr_mod['import_attnd_active'];?>"><a href="<?php echo site_url('admin/timesheet/import');?>"><?php echo $this->lang->line('left_import_attendance');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if($system[0]->module_recruitment=='true'){?>
      <?php  if(in_array('48',$role_resources_ids) || in_array('49',$role_resources_ids) || in_array('50',$role_resources_ids) || in_array('51',$role_resources_ids) || in_array('52',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['recruit_open']))echo $arr_mod['recruit_open'];?> nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_recruitment');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('49',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['jb_post_active']))echo $arr_mod['jb_post_active'];?>"><a href="<?php echo site_url('admin/job_post');?>"><?php echo $this->lang->line('left_job_posts');?></a></li>
          <?php } ?>
          <?php if(in_array('50',$role_resources_ids)) { ?>
          <li><a href="<?php echo site_url('frontend/jobs');?>" target="_blank"><?php echo $this->lang->line('left_jobs_listing');?> <small><?php echo $this->lang->line('left_frontend');?></small></a></li>
          <?php } ?>
          <?php if(in_array('51',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['jb_cand_active']))echo $arr_mod['jb_cand_active'];?>"><a href="<?php echo site_url('admin/job_candidates');?>"><?php echo $this->lang->line('left_job_candidates');?></a></li>
          <?php } ?>
          <?php if(in_array('52',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['jb_int_active']))echo $arr_mod['jb_int_active'];?>"><a href="<?php echo site_url('admin/job_interviews');?>"><?php echo $this->lang->line('left_job_interviews');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php  if(in_array('32',$role_resources_ids) || in_array('33',$role_resources_ids) || in_array('34',$role_resources_ids) || in_array('35',$role_resources_ids) || in_array('36',$role_resources_ids) || in_array('37',$role_resources_ids) || in_array('38',$role_resources_ids) || in_array('39',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['payrl_open']))echo $arr_mod['payrl_open'];?> nav-item"><a href="#"><i class="fa fa-money"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_payroll');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('33',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_hourly_active']))echo $arr_mod['pay_hourly_active'];?>"><a href="<?php echo site_url('admin/payroll/hourly_wages');?>"><?php echo $this->lang->line('left_hourly_wages');?></a></li>
          <?php } ?>
          <?php if(in_array('34',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_temp_active']))echo $arr_mod['pay_temp_active'];?>"><a href="<?php echo site_url('admin/payroll/templates');?>"><?php echo $this->lang->line('left_payroll_templates');?></a></li>
          <?php } ?>
          <?php if(in_array('35',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_mang_active']))echo $arr_mod['pay_mang_active'];?>"><a href="<?php echo site_url('admin/payroll/manage_salary');?>"><?php echo $this->lang->line('left_manage_salary');?></a></li>
          <?php } ?>
          <?php if(in_array('36',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_generate_active']))echo $arr_mod['pay_generate_active'];?>"><a href="<?php echo site_url('admin/payroll/generate_payslip');?>"><?php echo $this->lang->line('left_generate_payslip');?></a></li>
          <?php } ?>
          <?php if(in_array('37',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_his_active']))echo $arr_mod['pay_his_active'];?>"><a href="<?php echo site_url('admin/payroll/payment_history');?>"><?php echo $this->lang->line('left_payment_history');?></a></li>
          <?php } ?>
          <?php if(in_array('38',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_advn_active']))echo $arr_mod['pay_advn_active'];?>"><a href="<?php echo site_url('admin/payroll/advance_salary');?>"><?php echo $this->lang->line('xin_advance_salary');?></a></li>
          <?php } ?>
          <?php if(in_array('39',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['pay_advn_rpt_active']))echo $arr_mod['pay_advn_rpt_active'];?>"><a href="<?php echo site_url('admin/payroll/advance_salary_report');?>"><?php echo $this->lang->line('xin_advance_salary_report');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>

      <?php  if(in_array('110',$role_resources_ids) || in_array('111',$role_resources_ids) || in_array('112',$role_resources_ids) || in_array('113',$role_resources_ids) || in_array('114',$role_resources_ids) || in_array('115',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['reports_open']))echo $arr_mod['reports_open'];?> nav-item"><a href="#"><i class="fa fa-bar-chart-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr_report_title');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('111',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_payslip_active']))echo $arr_mod['reports_payslip_active'];?>"><a href="<?php echo site_url('admin/reports/payslip');?>"><?php echo $this->lang->line('xin_hr_reports_payslip');?></a></li>
          <?php } ?>
          <?php if(in_array('112',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_employee_attendance_active']))echo $arr_mod['reports_employee_attendance_active'];?>"><a href="<?php echo site_url('admin/reports/employee_attendance');?>"><?php echo $this->lang->line('xin_hr_reports_attendance_employee');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_training=='true'){?>
          <?php if(in_array('113',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_employee_training_active']))echo $arr_mod['reports_employee_training_active'];?>"><a href="<?php echo site_url('admin/reports/employee_training');?>"><?php echo $this->lang->line('xin_hr_reports_training');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if($system[0]->module_projects_tasks=='true'){?>
          <?php if(in_array('114',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_projects_active']))echo $arr_mod['reports_projects_active'];?>"><a href="<?php echo site_url('admin/reports/projects');?>"><?php echo $this->lang->line('xin_hr_reports_projects');?></a></li>
          <?php } ?>
          <?php if(in_array('115',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_tasks_active']))echo $arr_mod['reports_tasks_active'];?>"><a href="<?php echo site_url('admin/reports/tasks');?>"><?php echo $this->lang->line('xin_hr_reports_tasks');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('116',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_roles_active']))echo $arr_mod['reports_roles_active'];?>"><a href="<?php echo site_url('admin/reports/roles');?>"><?php echo $this->lang->line('xin_hr_report_user_roles_report');?></a></li>
          <?php } ?>
          <?php if(in_array('117',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['reports_employees_active']))echo $arr_mod['reports_employees_active'];?>"><a href="<?php echo site_url('admin/reports/employees');?>"><?php echo $this->lang->line('xin_hr_report_employees');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  if(in_array('57',$role_resources_ids) || in_array('60',$role_resources_ids) || in_array('61',$role_resources_ids) || in_array('61',$role_resources_ids) || in_array('62',$role_resources_ids) || in_array('63',$role_resources_ids) || in_array('89',$role_resources_ids) || in_array('93',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['system_open']))echo $arr_mod['system_open'];?> has-sub nav-item"><a href="#"><i class="ft-settings"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_system');?></span></a>
        <ul class="menu-content">
          <?php if($system[0]->module_language=='true'){?>
          <?php if(in_array('89',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['languages_active']))echo $arr_mod['languages_active'];?>"><a href="<?php echo site_url('admin/languages');?>"><?php echo $this->lang->line('xin_multi_language');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(in_array('60',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['settings_active']))echo $arr_mod['settings_active'];?>"><a href="<?php echo site_url('admin/settings');?>"><?php echo $this->lang->line('left_settings');?></a></li>
          <?php } ?>
          <?php if(in_array('93',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['modules_active']))echo $arr_mod['modules_active'];?>"><a href="<?php echo site_url('admin/settings/modules');?>"><?php echo $this->lang->line('xin_setup_modules');?></a></li>
          <?php } ?>
          <?php if(in_array('94',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['theme_active']))echo $arr_mod['theme_active'];?>"><a href="<?php echo site_url('admin/theme');?>"><?php echo $this->lang->line('xin_theme_settings');?></a> </li>
          <?php } ?>
          <?php if(in_array('61',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['constants_active']))echo $arr_mod['constants_active'];?>"><a href="<?php echo site_url('admin/settings/constants');?>"><?php echo $this->lang->line('left_constants');?></a></li>
          <?php } ?>
          <?php if(in_array('62',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['db_active']))echo $arr_mod['db_active'];?>"><a href="<?php echo site_url('admin/settings/database_backup');?>"><?php echo $this->lang->line('left_db_backup');?></a></li>
          <?php } ?>
          <?php if(in_array('63',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['email_template_active']))echo $arr_mod['email_template_active'];?>"><a href="<?php echo site_url('admin/settings/email_template');?>"><?php echo $this->lang->line('left_email_templates');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(in_array('46',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['leave_active']))echo $arr_mod['leave_active'];?> nav-item"><a href="<?php echo site_url('admin/timesheet/leave');?>"> <i class="ft-calendar"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_leaves');?></span></a></li>
      <?php } ?>
      <?php if($system[0]->module_projects_tasks=='true'){?>
      <?php  if(in_array('44',$role_resources_ids) || in_array('45',$role_resources_ids) || in_array('104',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['project_open']))echo $arr_mod['project_open'];?> nav-item"><a href="#"><i class="fa fa-tasks"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_projects');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('44',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['project_active']))echo $arr_mod['project_active'];?>"><a href="<?php echo site_url('admin/project');?>"><?php echo $this->lang->line('left_projects');?></a></li>
          <?php } ?>
          <?php if(in_array('45',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['task_active']))echo $arr_mod['task_active'];?>"><a href="<?php echo site_url('admin/timesheet/tasks');?>"><?php echo $this->lang->line('left_tasks');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_goal_tracking=='true'){?>
      <?php  if(in_array('106',$role_resources_ids) || in_array('107',$role_resources_ids) || in_array('108',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['goal_tracking_open']))echo $arr_mod['goal_tracking_open'];?> nav-item"><a href="#"><i class="fa fa-trophy"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_hr_goal_tracking');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('107',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['goal_tracking_active']))echo $arr_mod['goal_tracking_active'];?>"><a href="<?php echo site_url('admin/goal_tracking');?>"><?php echo $this->lang->line('xin_hr_goal_tracking');?></a></li>
          <?php } ?>
          <?php if(in_array('108',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['goal_tracking_type_active']))echo $arr_mod['goal_tracking_type_active'];?>"><a href="<?php echo site_url('admin/goal_tracking/type');?>"><?php echo $this->lang->line('xin_hr_goal_tracking_type_se');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_inquiry=='true'){?>
      <?php if(in_array('43',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['ticket_active']))echo $arr_mod['ticket_active'];?> nav-item"><a href="<?php echo site_url('admin/tickets');?>"><i class="fa fa-ticket"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_tickets');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_files=='true'){?>
      <?php if(in_array('47',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['file_active']))echo $arr_mod['file_active'];?> nav-item"><a href="<?php echo site_url('admin/files');?>"><i class="fa fa-files-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_files_manager');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_training=='true'){?>
      <?php  if(in_array('53',$role_resources_ids) || in_array('54',$role_resources_ids) || in_array('55',$role_resources_ids) || in_array('56',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['training_open']))echo $arr_mod['training_open'];?> nav-item"><a href="#"><i class="fa fa-mortar-board"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_training');?></span></a>
        <ul class="menu-content">
          <?php if(in_array('54',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['training_active']))echo $arr_mod['training_active'];?>"><a href="<?php echo site_url('admin/training');?>"><?php echo $this->lang->line('left_training_list');?></a></li>
          <?php } ?>
          <?php if(in_array('55',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['tr_type_active']))echo $arr_mod['tr_type_active'];?>"><a href="<?php echo site_url('admin/training_type');?>"><?php echo $this->lang->line('left_training_type');?></a></li>
          <?php } ?>
          <?php if(in_array('56',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['trainers_active']))echo $arr_mod['trainers_active'];?>"><a href="<?php echo site_url('admin/trainers');?>"><?php echo $this->lang->line('left_trainers_list');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_performance=='true'){?>
      <?php  if(in_array('40',$role_resources_ids) || in_array('41',$role_resources_ids) || in_array('42',$role_resources_ids)) {?>
      <li class="<?php if(!empty($arr_mod['performance_open']))echo $arr_mod['performance_open'];?> nav-item"><a href="#"><i class="ft-wind"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_performance');?></span></a>
        <ul class="menu-content" style="">
          <?php if(in_array('41',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['per_indi_active']))echo $arr_mod['per_indi_active'];?>"><a href="<?php echo site_url('admin/performance_indicator');?>" class="menu-item"><?php echo $this->lang->line('left_performance_xindicator');?></a> </li>
          <?php } ?>
          <?php if(in_array('42',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['per_app_active']))echo $arr_mod['per_app_active'];?>"><a href="<?php echo site_url('admin/performance_appraisal');?>" class="menu-item"><?php echo $this->lang->line('left_performance_xappraisal');?></a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <!-- employeee links-->
      <?php if($user_info[0]->user_role_id!=1) {?>
      <?php if(!in_array('14',$role_resources_ids) || !in_array('15',$role_resources_ids) || !in_array('18',$role_resources_ids) || !in_array('19',$role_resources_ids) || !in_array('20',$role_resources_ids) || !in_array('54',$role_resources_ids) || !in_array('7',$role_resources_ids) || !in_array('42',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['mylink_open']))echo $arr_mod['mylink_open'];?> nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_my_links');?></span></a>
        <ul class="menu-content">
          <?php if($system[0]->module_awards=='true'){?>
          <?php if(!in_array('14',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_awards_active']))echo $arr_mod['hr_awards_active'];?> nav-item"><a href="<?php echo site_url('admin/user/awards');?>"><?php echo $this->lang->line('left_awards');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(!in_array('15',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_transfer_active']))echo $arr_mod['hr_transfer_active'];?> nav-item"><a href="<?php echo site_url('admin/user/transfer');?>"><?php echo $this->lang->line('left_transfers');?></a></li>
          <?php } ?>
          <?php if(!in_array('18',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_promotion_active']))echo $arr_mod['hr_promotion_active'];?> nav-item"><a href="<?php echo site_url('admin/user/promotion');?>"><?php echo $this->lang->line('left_promotions');?></a></li>
          <?php } ?>
          <?php if(!in_array('19',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_complaints_active']))echo $arr_mod['hr_complaints_active'];?> nav-item"><a href="<?php echo site_url('admin/user/complaints');?>"><?php echo $this->lang->line('left_complaints');?></a></li>
          <?php } ?>
          <?php if(!in_array('20',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_warning_active']))echo $arr_mod['hr_warning_active'];?> nav-item"><a href="<?php echo site_url('admin/user/warning');?>"><?php echo $this->lang->line('left_warnings');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_training=='true'){?>
          <?php if(!in_array('54',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_training_active']))echo $arr_mod['hr_training_active'];?> nav-item"><a href="<?php echo site_url('admin/user/training');?>"><?php echo $this->lang->line('left_training');?></a></li>
          <?php } ?>
          <?php } ?>
          <?php if(!in_array('7',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_office_shift_active']))echo $arr_mod['hr_office_shift_active'];?> nav-item"><a href="<?php echo site_url('admin/user/office_shift');?>"><?php echo $this->lang->line('left_office_shift');?></a></li>
          <?php } ?>
          <?php if($system[0]->module_performance=='true'){?>
          <?php if(!in_array('42',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_performance_active']))echo $arr_mod['hr_performance_active'];?> nav-item"><a href="<?php echo site_url('admin/user/performance');?>"><?php echo $this->lang->line('left_performance');?></a></li>
          <?php } ?>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if($system[0]->module_recruitment=='true'){?>
      <?php if(!in_array('51',$role_resources_ids) || !in_array('52',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['rec_open']))echo $arr_mod['rec_open'];?> nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_recruitment');?></span></a>
        <ul class="menu-content">
          <?php if(!in_array('51',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['jobs_applied_active']))echo $arr_mod['jobs_applied_active'];?>"><a href="<?php echo site_url('admin/user/jobs_applied');?>"><?php echo $this->lang->line('left_jobs_applied');?></a></li>
          <?php } ?>
          <?php if(!in_array('52',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['jobs_interviews_active']))echo $arr_mod['jobs_interviews_active'];?>"><a href="<?php echo site_url('admin/user/jobs_interviews');?>"><?php echo $this->lang->line('left_job_interview');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php } ?>
      <?php if(!in_array('37',$role_resources_ids) || !in_array('38',$role_resources_ids) || !in_array('39',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_payslip_open']))echo $arr_mod['hr_payslip_open'];?> nav-item"><a href="#"><i class="fa fa-money"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_payroll');?></span></a>
        <ul class="menu-content">
          <?php if(!in_array('37',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_payslip_active']))echo $arr_mod['hr_payslip_active'];?>"><a href="<?php echo site_url('admin/user/payslip');?>"><?php echo $this->lang->line('left_payslips');?></a></li>
          <?php } ?>
          <?php if(!in_array('38',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_advance_salary_active']))echo $arr_mod['hr_advance_salary_active'];?>"><a href="<?php echo site_url('admin/user/advance_salary');?>"><?php echo $this->lang->line('xin_advance_salary');?></a></li>
          <?php } ?>
          <?php if(!in_array('39',$role_resources_ids)) { ?>
          <li class="<?php if(!empty($arr_mod['hr_advance_salary_report_active']))echo $arr_mod['hr_advance_salary_report_active'];?>"><a href="<?php echo site_url('admin/user/advance_salary_report');?>"><?php echo $this->lang->line('xin_advance_salary_report');?></a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if(!in_array('29',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_attendance_active']))echo $arr_mod['hr_attendance_active'];?> nav-item"><a href="<?php echo site_url('admin/user/attendance');?>"><i class="fa fa-clock-o"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('dashboard_attendance');?></span></a> </li>
      <?php } ?>
      <?php if($system[0]->module_assets=='true'){?>
      <?php if(!in_array('25',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_assets_active']))echo $arr_mod['hr_assets_active'];?> nav-item"><a href="<?php echo site_url('admin/user/assets');?>"><i class="ft-book"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('xin_assets');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php if(!in_array('46',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_leave_active']))echo $arr_mod['hr_leave_active'];?> nav-item"><a href="<?php echo site_url('admin/user/leave');?>"><i class="ft-calendar"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_leave');?></span></a> </li>
      <?php } ?>
      <?php if($system[0]->module_inquiry=='true'){?>
      <?php if(!in_array('43',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_tickets_active']))echo $arr_mod['hr_tickets_active'];?> nav-item"><a href="<?php echo site_url('admin/user/tickets');?>"><i class="fa fa-ticket"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_tickets');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php if($system[0]->module_projects_tasks=='true'){?>
      <?php if(!in_array('45',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_task_active']))echo $arr_mod['hr_task_active'];?> nav-item"><a href="<?php echo site_url('admin/user/tasks');?>"><i class="fa fa-tasks"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_tasks');?> </span></a> </li>
      <?php } ?>
      <?php if(!in_array('44',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_projects_active']))echo $arr_mod['hr_projects_active'];?> nav-item"><a href="<?php echo site_url('admin/user/projects');?>"><i class="fa fa-pencil-square"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_projects');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php if(!in_array('10',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_expense_claims_active']))echo $arr_mod['hr_expense_claims_active'];?> nav-item"><a href="<?php echo site_url('admin/user/expense_claims');?>"><i class="fa fa-usd"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_expense');?></span></a> </li>
      <?php } ?>
      <?php if(!in_array('11',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_announcement_active']))echo $arr_mod['hr_announcement_active'];?> nav-item"><a href="<?php echo site_url('admin/user/announcement');?>"><i class="fa fa-bullhorn"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_announcements');?></span></a> </li>
      <?php } ?>
      <?php if($system[0]->module_travel=='true'){?>
      <?php if(!in_array('17',$role_resources_ids)) { ?>
      <li class="<?php if(!empty($arr_mod['hr_travel_active']))echo $arr_mod['hr_travel_active'];?> nav-item"><a href="<?php echo site_url('admin/user/travel');?>"><i class="fa fa-plane"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_travels');?></span></a> </li>
      <?php } ?>
      <?php } ?>
      <?php } ?>
      <li class="nav-item"><a href="<?php echo site_url('admin/logout');?>"><i class="fa fa-sign-out"></i><span data-i18n="" class="menu-title"><?php echo $this->lang->line('left_logout');?></span></a> </li>
    </ul>
  </div>
</div>
