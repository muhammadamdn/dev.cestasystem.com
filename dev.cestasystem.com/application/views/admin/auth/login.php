<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $site_lang = $this->load->helper('language');?>
<?php $wz_lang = $site_lang->session->userdata('site_lang');?>
<?php $favicon = base_url().'uploads/logo/favicon/'.$company[0]->favicon;?>
<?php
$session = $this->session->userdata('username');
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
if($system[0]->enable_auth_background=='yes'):
	$auth_bg = 'bg-full-screen-image-admin-login';
else:
	$auth_bg = '';
endif;
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $title; ?></title>
<link rel="apple-touch-icon" href="<?php echo $favicon;?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon;?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/feather/style.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/extensions/pace.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/forms/icheck/custom.css">
<!-- END VENDOR CSS-->
<!-- BEGIN STACK CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/colors.css">
<!-- END STACK CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/pages/login-register.css">
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/toastr/toastr.min.css">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/animate.css">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/assets/css/style.css">
<!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-menu-modern" data-col="1-column" class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page <?php echo $auth_bg;?>">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-body">
      <section class="flexbox-container animated fadeInDownBig">
        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
          <div class="card border-grey border-lighten-3 m-0">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav" style="margin-left:20px;">
                <li class="dropdown dropdown-language nav-item"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" style="line-height:1;"> <?php echo $flg_icn;?><span class="selected-language"></span></a>
                  <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                    <?php $languages = $this->Xin_model->all_languages();?>
                    <?php foreach($languages as $lang):?>
                    <?php $flag = '<img src="'.base_url().'uploads/languages_flag/'.$lang->language_flag.'">';?>
                    <a href="<?php echo site_url('admin/dashboard/set_language/').$lang->language_code;?>" class="dropdown-item"> <i class="flag-icon"><?php echo $flag;?></i> <?php echo $lang->language_name;?></a>
                    <?php endforeach;?>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-header no-border">
              <div class="card-title text-xs-center">
                <div class="p-1"><img src="<?php echo base_url();?>uploads/logo/signin/<?php echo $company[0]->sign_in_logo;?>" alt="hrsale logo"></div>
              </div>
              <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span> <?php echo $this->lang->line('xin_admin_login');?><?php echo $company[0]->company_name;?></span></h6>
            </div>
            <?php
				if($system[0]->employee_login_id=='username'):
					$login_txt = $this->lang->line('xin_login_username');
					$ilogn_info = 'fionagrace';
					$ilogn_info2 = 'jhonsmith';
				else:
					$login_txt = $this->lang->line('xin_login_email');
					$ilogn_info = 'administrator@hrsale.com';
					$ilogn_info2 = 'jsmt12@hrsale.com';
				endif;?>
            <div class="card-body collapse in">
              <div class="card-block">
                <?php $attributes = array('class' => 'form-horizontal form-simple', 'name' => 'hrm-form', 'id' => 'hrm-form', 'data-redirect' => 'dashboard', 'data-form-table' => 'login', 'data-is-redirect' => '1', 'autocomplete' => 'off');?>
				<?php $hidden = array('user_id' => 0);?>
                <?php echo form_open('admin/auth/login', $attributes, $hidden);?>
                  <fieldset class="form-group position-relative has-icon-left mb-0">
                    <input type="text" class="form-control form-control-lg input-lg" id="iusername" name="iusername" placeholder="<?php echo $login_txt;?>" autocomplete="off">
                    <div class="form-control-position"> <i class="ft-user"></i> </div>
                  </fieldset>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input type="password" class="form-control form-control-lg input-lg" id="ipassword" name="ipassword" placeholder="Enter Password" autocomplete="off">
                    <div class="form-control-position"> <i class="fa fa-key"></i> </div>
                  </fieldset>
                  <fieldset class="form-group row">
                    <div class="col-md-12 col-xs-12 text-xs-right text-md-right"><a href="<?php echo site_url('admin/auth/forgot_password');?>" class="card-link"><i class="ft-unlock"></i> <?php echo $this->lang->line('xin_forgot_password_link');?></a></div>
                  </fieldset>
                  <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block save', 'content' => '<i class="saveinfo ft-unlock"></i> '.$this->lang->line('xin_login'))); ?>
                <?php echo form_close(); ?>
              </div>
            </div>
            <div class="card-footer">
              <?php if($system[0]->enable_current_year=='yes'):?>
              <?php echo date('Y');?>
              <?php endif;?>
              © <?php echo $system[0]->footer_text;?>
              <?php if($system[0]->enable_page_rendered=='yes'):?>
              - <?php echo $this->lang->line('xin_page_rendered_text');?> <strong>{elapsed_time}</strong> seconds.
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="<?php echo base_url();?>skin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END STACK JS-->
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = <?php echo $system[0]->notification_close_btn;?>;
	toastr.options.progressBar = <?php echo $system[0]->notification_bar;?>;
	toastr.options.timeOut = 3000;
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "<?php echo $system[0]->notification_position;?>";
	var site_url = '<?php echo site_url(); ?>';
});
</script>
<script type="text/javascript">var site_url = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url();?>skin/app-assets/js_scripts/xin_login.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".login-as").click(function(){
		var uname = jQuery(this).data('username');
		var password = jQuery(this).data('password');
		jQuery('#iusername').val(uname);
		jQuery('#ipassword').val(password);
	});
});
</script>
</body>
</html>
