<?php $system = $this->Xin_model->read_setting_info(1);?>
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
if($system[0]->enable_auth_background=='yes'):
	$auth_bg = 'bg-full-screen-image-admin-ulock';
else:
	$auth_bg = '';	
endif;
?>
<?php
$session_id = $this->session->userdata('user_id');
$iresult = $this->Login_model->read_user_info_session_id($session_id['user_id']);
?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title><?php echo $title;?></title>
<link rel="apple-touch-icon" href="<?php echo base_url();?>skin/app-assets/images/ico/apple-icon-120.png">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>skin/app-assets/images/ico/favicon.ico">
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
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/assets/css/style.css">
<!-- END Custom CSS-->
<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/toastr/toastr.min.css">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/animate.css">
</head>
<body data-open="click" data-menu="vertical-menu-modern" data-col="1-column" class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page <?php echo $auth_bg;?>">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row"> </div>
    <div class="content-body">
      <section class="flexbox-container animated fadeInDownBig">
        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
          <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav" style="margin-left:20px;">
                <li class="dropdown dropdown-language nav-item"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" style="line-height:1;"><?php echo $flg_icn;?><span class="selected-language"></span></a>
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
            <div class="card-header no-border text-xs-center">
              <?php  if($iresult[0]->profile_picture!='' && $iresult[0]->profile_picture!='no file') {?>
              <img src="<?php  echo base_url().'uploads/users/'.$iresult[0]->profile_picture;?>" alt="unlock-user" class="rounded-circle img-fluid center-block">
              <?php } else {?>
              <?php  if($iresult[0]->gender=='Male') { ?>
              <?php 	$de_file = base_url().'uploads/users/default_male.jpg';?>
              <?php } else { ?>
              <?php 	$de_file = base_url().'uploads/users/default_female.jpg';?>
              <?php } ?>
              <img src="<?php  echo $de_file;?>" alt="unlock-user" class="rounded-circle img-fluid center-block">
              <?php  } ?>
              <h5 class="card-title mt-1"><?php echo $iresult[0]->first_name;?> <?php echo $iresult[0]->last_name;?></h5>
            </div>
            <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2"><span>Unlock your account</span></p>
            <div class="card-body collapse in">
              <div class="card-block">
                <?php $attributes = array('name' => 'xin-form', 'id' => 'xin-form', 'class' => 'form-horizontal', 'autocomplete' => 'off');?>
				<?php $hidden = array('_method' => 'forgott_pass');?>
                <?php echo form_open('admin/auth/unlock/', $attributes, $hidden);?>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input type="password" name="ipassword" class="form-control form-control-lg input-lg" id="ipassword" placeholder="Enter Password">
                    <div class="form-control-position"> <i class="fa fa-key"></i> </div>
                  </fieldset>
                  <fieldset class="form-group row">
                    <div class="col-md-6 col-xs-12 text-xs-center text-sm-left"> </div>
                    <div class="col-md-6 col-xs-12 float-sm-left text-xs-center text-sm-right"><a href="<?php echo site_url('admin/auth/forgot_password');?>" class="card-link"><i class="ft-unlock"></i> <?php echo $this->lang->line('xin_forgot_password_link');?></a></div>
                  </fieldset>
                  <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i class="ft-unlock"></i> <?php echo $this->lang->line('xin_hr_unlock');?></button>
                  <a href="<?php echo site_url('admin/logout');?>" class="btn btn-outline-danger btn-lg btn-block"><i class="ft-power"></i> <?php echo $this->lang->line('left_logout');?></a>
                <?php echo form_close(); ?>
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
<!-- END PAGE VENDOR JS--> 
<!-- BEGIN STACK JS--> 
<script src="<?php echo base_url();?>skin/app-assets/js/core/app-menu.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>skin/app-assets/js/core/app.js" type="text/javascript"></script> 
<!-- END STACK JS--> 
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/toastr/toastr.min.js"></script> 
<script type="text/javascript">var site_url = '<?php echo site_url(); ?>';</script> 
<script type="text/javascript">
    $(document).ready(function(){
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 3000;
        toastr.options.positionClass = "toast-top-center";
        
        /* Add data */ /*Form Submit*/
        $("#xin-form").submit(function(e){
        e.preventDefault();
            var obj = $(this), action = obj.attr('name');
            $('.save').prop('disabled', true);
            $.ajax({
                type: "POST",
                url: e.target.action,
                data: obj.serialize()+"&is_ajax=1&add_type=forgot_password&form="+action,
                cache: false,
                success: function (JSON) {
                    if (JSON.error != '') {
                        toastr.error(JSON.error);
                        $('.save').prop('disabled', false);
                    } else {
                        toastr.success(JSON.result);
                        window.location = site_url+'admin/dashboard?module=dashboard';
                        $('.save').prop('disabled', false);
                    }
                }
            });
        });
    });
    </script>
</body>
</html>