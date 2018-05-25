<?php
/* Employee Directory view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $countries = $this->Xin_model->get_countries();?>

<div class="row" id="user-profile-cards-with-cover-image">
  <?php foreach ($results as $employee) { ?>
  <?php $designation = $this->Designation_model->read_designation_information($employee->designation_id);?>
  <?php
if(!is_null($designation)){
	$designation_name = strtolower($designation[0]->designation_name);
  } else {
	$designation_name = '--';	
  }
?>
  <?php
if($employee->profile_picture!='' && $employee->profile_picture!='no file') {
	$u_file = base_url().'uploads/profile/'.$employee->profile_picture;
} else {
	if($employee->gender=='Male') { 
		$u_file = base_url().'uploads/profile/default_male.jpg';
	} else {
		$u_file = base_url().'uploads/profile/default_female.jpg';
	}
}

if($employee->is_active==1):
	$status = '<span class="tag tag-success">'.$this->lang->line('xin_employees_active').'</span>';
else:
	$status = '<span class="tag tag-danger">'.$this->lang->line('xin_employees_inactive').'</span>';
endif;
// get company
$company = $this->Xin_model->read_company_info($employee->company_id);
if(!is_null($company)){
	$comp_name = $company[0]->name;
} else {
	$comp_name = '--';	
}
?>
<?php $theme = $this->Xin_model->read_theme_info(1);?>
<?php
if($theme[0]->employee_cards=='simple_employee_cards'){
	$bx_shdw = '';
	$brdr_clr = '';
} else if($theme[0]->employee_cards=='employee_cards_border'){ 
	$bx_shdw = '';
	$brdr_clr = $theme[0]->card_border_color.' border-lighten-2';
} else if($theme[0]->employee_cards=='employee_cards_box_shadow'){ 
	$bx_shdw = 'box-shadow-2';
	$brdr_clr = '';
}
?>
<?php if($theme[0]->employee_cards!='employee_cards_stats'){?>
<div class="col-xl-3 col-md-6 col-xs-12">
        <div class="card <?php echo $bx_shdw;?> <?php echo $brdr_clr;?>">
            <div class="text-xs-center">
                <div class="card-block">
                    <img src="<?php echo $u_file;?>" class="rounded-circle  height-150" alt="<?php echo $employee->first_name.' '.$employee->last_name;?>">
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="<?php echo site_url()?>admin/employees/detail/<?php echo $employee->user_id;?>"><?php echo $employee->first_name.' '.$employee->last_name;?></a></h4>
                    <h6 class="card-subtitle text-muted"><?php echo ucwords($designation_name);?></h6>
                </div>
                <div class="text-xs-center">
                    <a href="<?php echo $employee->facebook_link;?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook">
                    <span class="fa fa-facebook"></span></a>
                    <a href="<?php echo $employee->twitter_link;?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                    <span class="fa fa-twitter"></span></a>
                    <a href="<?php echo $employee->linkdedin_link;?>" class="btn btn-social-icon mb-1 btn-outline-linkedin">
                    <span class="fa fa-linkedin font-medium-4"></span></a>
                </div>
            </div>
        </div>
    </div>
  <?php } else {?>  
    <div class="col-xl-4 col-md-6 col-xs-12">
        <div class="card profile-card-with-stats box-shadow-2">
            <div class="text-xs-center">
                <div class="card-block">
                    <img src="<?php echo $u_file;?>" class="rounded-circle  height-150" alt="<?php echo $employee->first_name.' '.$employee->last_name;?>">
                </div>
                <div class="card-block">
                    <h4 class="card-title"><a href="<?php echo site_url()?>admin/employees/detail/<?php echo $employee->user_id;?>"><?php echo $employee->first_name.' '.$employee->last_name;?></a></h4>
                      <ul class="list-inline list-inline-pipe">
                        <li><i class="fa fa-phone"></i> <?php echo $employee->contact_no;?></li>
                      </ul>
                      <h6 class="card-subtitle text-muted"><i class="fa fa-envelope-o"></i> <?php echo $employee->email;?></h6>
                      <ul class="list-inline list-inline-pipe">
                        <li><i class="ft-umbrella"></i> <?php echo $comp_name;?></li>
                      </ul>
                      <h6 class="card-subtitle text-muted"><?php echo ucwords($designation_name);?></h6>
                </div>
                <div class="card-block">
                    <a href="<?php echo site_url()?>admin/employees/detail/<?php echo $employee->user_id;?>">
          <button type="button" class="btn btn-outline-primary btn-md btn-round mr-1"><i class="ft-user"></i> <?php echo $this->lang->line('xin_profile');?></button>
                </div>
            </div>
        </div>
    </div>
    <?php } //cards?>
  <?php } ?>
</div>
<div class="row">
  <div class="col-xl-6 col-lg-12 mb-1">
    <div class="text-xs-center">
      <nav aria-label="Page navigation">
        <ul class="pagination-cards pagination-lg mb-1">
          <?php foreach ($links as $link) { ?>
          <li class="page-item"><?php echo $link;?></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/app-assets/css/pages/users.css">
