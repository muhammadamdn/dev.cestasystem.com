<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$company_info = $this->Xin_model->read_company_setting_info(1);
$user = $this->Xin_model->read_employee_info($session['user_id']);
$theme = $this->Xin_model->read_theme_info(1);
?>
<?php $site_lang = $this->load->helper('language');?>
<?php $wz_lang = $site_lang->session->userdata('site_lang');?>
<?php
if(empty($wz_lang)):
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/gb.gif">';
elseif($wz_lang == 'english'):
	$lang_code = $this->Xin_model->get_language_info($wz_lang);
	$flg_icn = $lang_code[0]->language_flag;
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/'.$flg_icn.'">';
else:
	$lang_code = $this->Xin_model->get_language_info($wz_lang);
	$flg_icn = $lang_code[0]->language_flag;
	$flg_icn = '<img src="'.base_url().'uploads/languages_flag/'.$flg_icn.'">';
endif;
?>
<?php
$role_user = $this->Xin_model->read_user_role_info($user[0]->user_role_id);
if(!is_null($role_user)){
	$role_resources_ids = explode(',',$role_user[0]->role_resources);
} else {
	$role_resources_ids = explode(',',0);	
}
//$designation_info = $this->Xin_model->read_designation_info($user_info[0]->designation_id);
// set color
if($theme[0]->is_semi_dark==1):
	$light_cls = 'navbar-semi-dark navbar-shadow';
	$ext_clr = '';
else:
	$light_cls = 'navbar-dark';
	$ext_clr = $theme[0]->top_nav_dark_color;
endif;
// set layout / fixed or static
if($theme[0]->boxed_layout=='true'){
	$lay_fixed = 'container boxed-layout';
} else {
	$lay_fixed = '';
}
?>

<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top <?php echo $lay_fixed;?> <?php echo $light_cls;?> <?php echo $ext_clr;?>">
  <div class="navbar-wrapper">
    <div class="navbar-header <?php echo $theme[0]->semi_dark_color;?>">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item"><a href="<?php echo site_url('admin/dashboard');?>" class="navbar-brand"><img alt="HR Sale" src="<?php echo base_url();?>uploads/logo/<?php echo $company_info[0]->logo;?>" class="brand-logo" style="width:32px;">
            <h2 class="brand-text"><?php echo $system[0]->application_name;?></h2></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs is-active"><i class="ft-menu"></i></a></li>
          <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
          <?php  if(in_array('94',$role_resources_ids)) { ?>
          <li class="nav-item hidden-sm-down"><a href="<?php echo site_url('admin/theme');?>" class="nav-link">
          <i class="ficon fa fa-columns"></i></a></li>
          <?php } ?>
          <?php if($system[0]->module_recruitment=='true'){?>
		  <?php if($system[0]->enable_job_application_candidates=='yes'){?>
		  <?php  if(in_array('91',$role_resources_ids)) { ?>
          <li class="nav-item">
          <a href="<?php echo site_url();?>frontend/jobs/" target="_blank" class="nav-link">
          <?php echo $this->lang->line('header_apply_jobs');?></a></li>
          <?php } } } ?>
          <?php if($system[0]->module_accounting=='true'){?>
          <?php if(in_array('71',$role_resources_ids) || in_array('72',$role_resources_ids) || in_array('73',$role_resources_ids) || in_array('74',$role_resources_ids) || in_array('75',$role_resources_ids) || in_array('76',$role_resources_ids) || in_array('77',$role_resources_ids) || in_array('78',$role_resources_ids) || in_array('79',$role_resources_ids) || in_array('80',$role_resources_ids) || in_array('81',$role_resources_ids) || in_array('82',$role_resources_ids) || in_array('83',$role_resources_ids) || in_array('84',$role_resources_ids) || in_array('85',$role_resources_ids) || in_array('86',$role_resources_ids)){?>
          <li class="dropdown nav-item mega-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggles nav-link"><?php echo $this->lang->line('xin_acc_accounting');?></a>
            <ul class="mega-dropdown-menu dropdown-menu row">
              <?php if(in_array('71',$role_resources_ids) || in_array('72',$role_resources_ids) || in_array('73',$role_resources_ids)){?>
              <li class="col-md-2">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-university"></i> <?php echo $this->lang->line('xin_acc_accounts');?></h6>
                <ul class="drilldown-menu">
                  <li class="menu-list">
                    <ul>
                      <?php if(in_array('72',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/bank_cash');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_account_list');?></a></li>
                      <?php } ?>
                      <?php if(in_array('73',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/account_balances');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_account_balances');?></a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <?php } ?>
        <?php if(in_array('74',$role_resources_ids) || in_array('75',$role_resources_ids) || in_array('76',$role_resources_ids) || in_array('77',$role_resources_ids) || in_array('78',$role_resources_ids)){?>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-money"></i> <?php echo $this->lang->line('xin_acc_transactions');?></h6>
                <ul class="drilldown-menu">
                  <li class="menu-list">
                    <ul>
                      <?php if(in_array('75',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/deposit');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_deposit');?></a></li>
                      <?php } ?>
                      <?php if(in_array('76',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/expense');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_expense');?></a></li>
                      <?php } ?>
                      <?php if(in_array('77',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/transfer');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_transfer');?></a></li>
                      <?php } ?>
                      <?php if(in_array('78',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/transactions');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_view_transactions');?></a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <?php } ?>
         <?php if(in_array('79',$role_resources_ids) || in_array('80',$role_resources_ids) || in_array('81',$role_resources_ids)){?>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-exchange"></i> <?php echo $this->lang->line('xin_acc_payees_payers');?></h6>
                <ul class="drilldown-menu">
                  <li class="menu-list">
                    <ul>
                      <?php if(in_array('80',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/payees');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_payees');?></a></li>
                      <?php } ?>
                      <?php if(in_array('81',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/payers');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_payers');?></a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <?php } ?>
        <?php if(in_array('82',$role_resources_ids) || in_array('83',$role_resources_ids) || in_array('84',$role_resources_ids) || in_array('85',$role_resources_ids) || in_array('86',$role_resources_ids)){?>
              <li class="col-md-4">
                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-bar-chart-o"></i> <?php echo $this->lang->line('xin_acc_reports');?></h6>
                <ul class="drilldown-menu">
                  <li class="menu-list">
                    <ul>
                      <?php if(in_array('83',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/account_statement');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_account_statement');?></a></li>
                      <?php } ?>
                      <?php if(in_array('84',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/expense_report');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_expense_reports');?></a></li>
                      <?php } ?>
                      <?php if(in_array('85',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/income_report');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_income_reports');?></a></li>
                      <?php } ?>
                      <?php if(in_array('86',$role_resources_ids)) { ?>
                      <li><a href="<?php echo site_url('admin/accounting/transfer_report');?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('xin_acc_transfer_report');?></a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php } ?>
          <?php } ?>
        </ul>
        <?php $unread_msgs = $this->Xin_model->get_single_unread_message($session['user_id']);?>
        <ul class="nav navbar-nav float-xs-right">
          <li class="dropdown dropdown-notification nav-item">
          <a href="<?php echo site_url('admin/chat');?>" class="nav-link nav-link-label"><i class="fa fa-comments"></i>
          <span id="msgs_count"><?php if($unread_msgs > 0) {?>
          <span class="tag tag-pill tag-default tag-danger tag-default tag-up"><?php echo $unread_msgs;?></span>
          <?php } ?>
          </span>
          </a>
          </li> 
          <li class="dropdown dropdown-language nav-item"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link"><?php echo $flg_icn;?>
          <span class="selected-language"></span></a>
            <div aria-labelledby="dropdown-flag" class="dropdown-menu">
            <?php $languages = $this->Xin_model->all_languages();?>
            <?php foreach($languages as $lang):?>
            <?php $flag = '<img src="'.base_url().'uploads/languages_flag/'.$lang->language_flag.'">';?>
            <a href="<?php echo site_url('admin/dashboard/set_language/').$lang->language_code;?>" class="dropdown-item">
            <i class="flag-icon"><?php echo $flag;?></i> <?php echo $lang->language_name;?></a>
            <?php endforeach;?>
            <?php if($system[0]->module_language=='true'){?>
            <?php  if(in_array('89',$role_resources_ids)) { ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('admin/languages')?>" class="dropdown-item"><i class="fa fa-cog"></i> <?php echo $this->lang->line('left_settings');?></a>
            <?php } ?>
            <?php } ?>
            </div>
          </li>
          <?php  if(in_array('61',$role_resources_ids) || in_array('93',$role_resources_ids) || in_array('63',$role_resources_ids) || in_array('92',$role_resources_ids) || in_array('62',$role_resources_ids) || in_array('94',$role_resources_ids) || in_array('96',$role_resources_ids) || in_array('60',$role_resources_ids) || $user[0]->user_role_id==1) { ?>
          <li class="dropdown dropdown-settings nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-settings"></i></a>
            <div aria-labelledby="dropdown-flag" class="dropdown-menu">
            <?php  if(in_array('61',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/settings/constants')?>" class="dropdown-item"><i class="fa fa-align-justify"></i> <?php echo $this->lang->line('left_constants');?></a>
            <?php } ?>
            <?php  if($user[0]->user_role_id==1) { ?>
            <a href="<?php echo site_url('admin/roles')?>" class="dropdown-item"><i class="fa fa-user-o"></i> <?php echo $this->lang->line('xin_role_urole');?></a>
            <?php } ?>
            <?php  if(in_array('93',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/settings/modules')?>" class="dropdown-item"><i class="fa fa-life-ring"></i> <?php echo $this->lang->line('xin_setup_modules');?></a>
            <?php } ?>
            <?php  if(in_array('63',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/settings/email_template')?>" class="dropdown-item"><i class="fa fa-envelope-o"></i> <?php echo $this->lang->line('left_email_templates');?></a>
            <?php } ?>
            <?php  if(in_array('92',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/employees/import')?>" class="dropdown-item"><i class="fa fa-user"></i> <?php echo $this->lang->line('xin_import_employees');?></a>
            <?php } ?>
            <?php  if(in_array('62',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/settings/database_backup')?>" class="dropdown-item"><i class="fa fa-database"></i> <?php echo $this->lang->line('header_db_log');?></a>
            <?php } ?>
            <?php  if(in_array('94',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/theme')?>" class="dropdown-item"><i class="fa fa-columns"></i> <?php echo $this->lang->line('xin_theme_settings');?></a>
            <?php } ?>
            <?php if($system[0]->module_orgchart=='true'){?>
            <?php  if(in_array('96',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/organization/chart')?>" class="dropdown-item"><i class="fa fa-sitemap"></i> <?php echo $this->lang->line('xin_org_chart_title');?></a>
            <?php } ?>
            <?php } ?>
            <?php  if(in_array('60',$role_resources_ids)) { ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('admin/settings')?>" class="dropdown-item"><i class="fa fa-cog"></i> <?php echo $this->lang->line('header_configuration');?></a>
            <?php } ?>
            </div>
          </li>
          <?php } ?>
          <?php  if($user[0]->user_role_id==1) { ?>
          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-bell"></i></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2"><?php echo $this->lang->line('xin_leave_app');?></span></h6>
              </li>
              <li class="list-group scrollable-container">
				<?php foreach($this->Xin_model->get_last_leave_applications() as $leave_notify){?>
                <?php $employee_info = $this->Xin_model->read_user_info($leave_notify->employee_id);?>
                <?php
					if(!is_null($employee_info)){
						$emp_name = $employee_info[0]->first_name. ' '.$employee_info[0]->last_name;
					} else {
						$emp_name = '--';	
					}
                ?>
                <?php //$el_type = $this->Xin_model->read_leave_type($leave_notify->leave_type_id);?>
                <a href="<?php echo site_url()?>admin/timesheet/leave_details/id/<?php echo $leave_notify->leave_id;?>/" class="list-group-item">
                <div class="media">
                    <div class="media-left valign-middle"><i class="ft-calendar icon-bg-circle bg-cyan"></i></div>
                    <div class="media-body">
                      <h6 class="media-heading"><?php echo $emp_name;?></h6>
                      <p class="notification-text font-small-3 text-muted"><?php echo $this->lang->line('header_has_applied_for_leave');?></p><small>
                        <time class="media-meta text-muted"><?php echo $this->Xin_model->set_date_format($leave_notify->applied_on);?></time></small>
                    </div>
                  </div></a>
                  <?php } ?>
                  </li>
              <li class="dropdown-menu-footer"><a href="<?php echo site_url('admin/timesheet/leave');?>" class="dropdown-item text-muted text-xs-center"><?php echo $this->lang->line('xin_read_all');?></a></li>
            </ul>
          </li>   
          <?php } ?>     
          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="modal" data-target=".policy" class="nav-link nav-link-label"><i class="fa fa-leaf"></i></a>
          </li>         
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">
          <?php  if($user[0]->profile_picture!='' && $user[0]->profile_picture!='no file') {?>
            <img src="<?php  echo base_url().'uploads/profile/'.$user[0]->profile_picture;?>" alt="" id="user_avatar" 
            class="b-a-radius-circle user_profile_avatar">
            <?php } else {?>
            <?php  if($user[0]->gender=='Male') { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_male.jpg';?>
            <?php } else { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_female.jpg';?>
            <?php } ?>
            <img src="<?php  echo $de_file;?>" alt="" id="user_avatar" class=" b-a-radius-circle user_profile_avatar">
            <?php  } ?>
            
            <i></i></span><span class="user-name"><?php echo $user[0]->first_name.' '.$user[0]->last_name;?></span></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="<?php echo site_url('admin/profile');?>" class="dropdown-item"><i class="ft-user"></i> <?php echo $this->lang->line('header_my_profile');?></a>
            <?php if(in_array('60',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/settings');?>" class="dropdown-item"><i class="ft-settings"></i> <?php echo $this->lang->line('left_settings');?></a>
            <?php } ?>
            <a href="<?php echo site_url('admin/auth/lock')?>" class="dropdown-item"><i class="ft-lock"></i> <?php echo $this->lang->line('xin_lock_user');?></a>
            <?php if(in_array('87',$role_resources_ids)) { ?>
            <a href="<?php echo site_url('admin/log/changelog')?>" class="dropdown-item"><i class="ft-file"></i> <?php echo $this->lang->line('hd_changelog');?></a>
            <?php } ?>
            <a href="<?php echo site_url('admin/profile?change_password=true')?>" class="dropdown-item"><i class="fa fa-key"></i> <?php echo $this->lang->line('header_change_password');?></a>
            <div class="dropdown-divider"></div><a href="<?php echo site_url('admin/logout');?>" class="dropdown-item"><i class="ft-power"></i> <?php echo $this->lang->line('header_sign_out');?></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>