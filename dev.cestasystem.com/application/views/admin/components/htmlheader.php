<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $favicon = base_url().'uploads/logo/favicon/'.$company[0]->favicon;?>
<?php $theme = $this->Xin_model->read_theme_info(1);?>
<?php if($theme[0]->flipped_menu=='true'){
$ver_tem = 'rtl';
} else {
	$ver_tem = 'ltr';
}
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="<?php echo $ver_tem;?>" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $title;?></title>
    <link rel="apple-touch-icon" href="<?php echo $favicon;?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon;?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <?php if($theme[0]->flipped_menu=='true'){?>    
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/custom-rtl.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css-rtl/pages/timeline.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/assets/css/style-rtl.css">
    <!-- END Custom CSS-->
    <?php } else { ?>
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/extensions/pace.css">
    
    
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/colors.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css"
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/pages/timeline.css">
    <!-- END Page Level CSS-->
    <?php if($this->router->fetch_class() =='chat') { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/pages/chat-application.css">
    <?php } ?>
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/assets/css/style.css">
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/charts/morris.css">
    <!-- END Custom CSS-->
    <link href="<?php echo base_url();?>skin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/plugins/forms/switch.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/xin_custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/Trumbowyg/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/kendo/kendo.common.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/kendo/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/clockpicker/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/ion.rangeSlider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php echo base_url();?>skin/vendor/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/forms/tags/tagging.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/forms/tags/bootstrap-tagsinput.css">
    <?php if($theme[0]->form_design=='modern_form'):?>
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/xin_modern_form.css">
    <?php elseif($theme[0]->form_design=='rounded_form'):?>
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/xin_rounded_form.css">
    <?php elseif($theme[0]->form_design=='default_square_form'):?>
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/xin_default_square_form.css">
    <?php elseif($theme[0]->form_design=='medium_square_form'):?>
    <link rel="stylesheet" href="<?php echo base_url();?>skin/app-assets/css/xin_medium_square_form.css">
    <?php endif;?>
    <?php if($this->router->fetch_class() =='dashboard' || $this->router->fetch_class() =='calendar' || $this->router->fetch_method() =='calendar'){?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/plugins/calendars/fullcalendar.css">
    <?php } ?>
    <?php if($this->router->fetch_class() =='project' && $this->router->fetch_method() =='detail' || $this->router->fetch_method() =='project_details'){?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>skin/app-assets/css/pages/project.css">
    <?php } ?>
    
    
    
  </head>