<?php
$session = $this->session->userdata('username');
$system = $this->Xin_model->read_setting_info(1);
$layout = $this->Xin_model->system_layout();
$user_info = $this->Xin_model->read_user_info($session['user_id']);
//material-design
$theme = $this->Xin_model->read_theme_info(1);
// set layout / fixed or static
if($theme[0]->boxed_layout=='true') {
	$lay_fixed = 'container boxed-layout';
} else {
	$lay_fixed = '';
}
if($theme[0]->compact_menu=='true') {
	$menu_collapsed = 'menu-collapsed';
} else {
	$menu_collapsed = '';
}
if($theme[0]->flipped_menu=='true') {
	$menu_flipped = 'menu-flipped';
} else {
	$menu_flipped = '';
}
if($this->router->fetch_class() =='chat'){
	$chat_app = 'chat-application';
} else {
	$chat_app = '';
}
?>
<?php $this->load->view('admin/components/htmlheader');?>
<body class="vertical-layout vertical-menu-modern 2-columns <?php //echo $menu_flipped;?> fixed-navbar <?php echo $menu_collapsed;?> <?php echo $lay_fixed;?> <?php echo $chat_app;?> menu-expanded pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- navbar-fixed-top-->
    <?php $this->load->view('admin/components/header');?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php $this->load->view('admin/components/left_menu');?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <?php if($this->router->fetch_class() !='dashboard' && $this->router->fetch_class() !='profile' && $this->router->fetch_method() !='profile' && $this->router->fetch_class() !='chat'){?>
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <?php if($theme[0]->page_header=='breadcrumbs_top'){ ?>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard/');?>"><?php echo $this->lang->line('xin_e_details_home');?></a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo $breadcrumbs;?>
                  </li>
                </ol>
              </div>
            </div>
            <h3 class="content-header-title mb-0"><?php echo $breadcrumbs;?></h3>
            <?php } ?>
            <?php if($theme[0]->page_header=='breadcrumbs_basic'){ ?>
            <h3 class="content-header-title mb-0"><?php echo $breadcrumbs;?></h3>
            <?php } ?>
            <?php if($theme[0]->page_header=='breadcrumbs_bottom'){ ?>
            <h3 class="content-header-title mb-0"><?php echo $breadcrumbs;?></h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard/');?>"><?php echo $this->lang->line('xin_e_details_home');?></a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo $breadcrumbs;?>
                  </li>
                </ol>
              </div>
            </div>
            <?php } ?>
          </div>
          <?php if($theme[0]->page_header=='breadcrumbs_basic'){ ?>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard/');?>"><?php echo $this->lang->line('xin_e_details_home');?></a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo $breadcrumbs;?>
                  </li>
                </ol>
            </div>
          </div>
          <?php } else { ?>
          <div class="content-header-right col-md-6 col-xs-12 mb-2">
            <div role="group" aria-label="Button group with nested dropdown" class="btn-group float-md-right">
              <?php if($user_info[0]->user_role_id==1): ?>
              <div role="group" class="btn-group">
                <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-toggles dropdown-menu-right" onClick="window.location='<?php echo site_url('admin/settings');?>'"><i class="ft-settings icon-left"></i> <?php echo $this->lang->line('left_settings');?></button>
              </div>
              <a href="<?php echo site_url('admin/timesheet/tasks/');?>" class="btn btn-outline-primary"><i class="fa fa-pencil-square"></i></a>
              <a href="<?php echo site_url('admin/project/');?>" class="btn btn-outline-primary"><i class="ft-pie-chart"></i></a>
              <?php else:?>
              <div role="group" class="btn-group">
                <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-menu-right" onClick="window.location='<?php echo site_url('admin/profile');?>'">
                <i class="ft-user icon-left"></i> <?php echo $this->lang->line('header_my_profile');?></button>
              </div>
              <a href="<?php echo site_url('admin/user/tickets');?>" class="btn btn-outline-primary"><i class="fa fa-ticket"></i></a>
              <a href="<?php echo site_url('admin/user/projects');?>" class="btn btn-outline-primary"><i class="fa fa-pencil-square"></i></a>
              <?php endif;?>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        <div class="content-body">
        <!-- Stats -->
        <?php // get the required layout..?>
		<?php echo $subview;?>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php $this->load->view('admin/components/footer');?>
    
    <?php $this->load->view('admin/components/htmlfooter');?>
  </body>
</html>