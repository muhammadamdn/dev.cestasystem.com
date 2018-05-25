
<?php $session = $this->session->userdata('username');?>
<?php $fuser_info = $this->Xin_model->read_user_info($session['user_id']); ?>
<?php
if($fuser_info[0]->online_status==1):
	$stgm = 'avatar-online';
	$status_title = "I'm Available";
elseif($fuser_info[0]->online_status==3):
	$stgm = 'avatar-busy';
	$status_title = "I'm Busy";
else:
	$stgm = 'avatar-away';
	$status_title = "I'm Away";
endif;
?>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<div class="modal fade text-xs-left chatbox-single" id="chatbox-single" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" id="chat_modal">  
</div>
</div>
</div>
<div class="sidebar-left sidebar-fixed">
  <div class="sidebar">
    <div class="sidebar-content card hidden-md-down">
      <div class="card-block chat-fixed-search">
          <div class="media-left"> <span class="current-status avatar avatar-md <?php echo $stgm;?>">
          	<?php  if($fuser_info[0]->profile_picture!='' && $fuser_info[0]->profile_picture!='no file') {?>
            <img class="media-object rounded-circle" src="<?php  echo base_url().'uploads/profile/'.$fuser_info[0]->profile_picture;?>" alt=""> <i></i> </span>
            <?php } else {?>
            <?php  if($fuser_info[0]->gender=='Male') { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_male.jpg';?>
            <?php } else { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_female.jpg';?>
            <?php } ?>
            <img class="media-object rounded-circle" src="<?php  echo $de_file;?>" alt=""> <i></i> </span>
            <?php  } ?>
            <?php $f_name = $fuser_info[0]->first_name.' '.$fuser_info[0]->last_name;?> 
             </div>
          <div class="media-body">
            <h6 class="list-group-item-heading">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $f_name;?></a> <div class="dropdown-menu" style="top: 50%; left: 70px;">
                
                <a class="dropdown-item online-status" href="#" data-status-id="1" data-status-title="I'm Available" data-avatar-status="avatar-online">Available</a>
                <a class="dropdown-item online-status" href="#" data-status-id="2" data-status-title="I'm Away" data-avatar-status="avatar-away">Away</a>
                <a class="dropdown-item online-status" href="#" data-status-id="3" data-status-title="I'm Busy" data-avatar-status="avatar-busy">Busy</a>
                
            </div><span class="font-small-3 float-xs-right primary"></span></h6> 
            <p class="list-group-item-text text-muted" id="hr_status"><?php echo $status_title;?></p>
          </div>
      </div>
      <div id="users-list" class="list-group position-relative">
        <div class="users-list-padding" id="chat_users">
        <?php foreach($all_active_employees as $active_employees):?>
        <?php if($active_employees->user_id!=$session['user_id']):?>
        <?php if ($active_employees->is_logged_in == 0):?>
		<?php $bgm = 'avatar-away';?>
        <?php else:
			if($active_employees->online_status==1):
         		$bgm = 'avatar-online';
			elseif($active_employees->online_status==3):
				$bgm = 'avatar-busy';
			else:
				$bgm = 'avatar-away';
			endif;	
		?>
        <?php endif;?>
        <button href="#" class="list-group-item list-group-item-action media no-border" id="set_box_<?php echo $active_employees->user_id;?>" data-from-id="<?php echo $session['user_id'];?>" data-to-id="<?php echo $active_employees->user_id;?>" data-toggle="modal" data-target=".chatbox-single">
          <div class="media-left"> <span class="avatar avatar-md <?php echo $bgm; ?>">
          	<?php  if($active_employees->profile_picture!='' && $active_employees->profile_picture!='no file') {?>
            <img class="media-object rounded-circle" src="<?php  echo base_url().'uploads/profile/'.$active_employees->profile_picture;?>" alt=""> <i></i> </span>
            <?php } else {?>
            <?php  if($active_employees->gender=='Male') { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_male.jpg';?>
            <?php } else { ?>
            <?php 	$de_file = base_url().'uploads/profile/default_female.jpg';?>
            <?php } ?>
            <img class="media-object rounded-circle" src="<?php  echo $de_file;?>" alt=""> <i></i> </span>
            <?php  } ?>
            <?php $fname = $active_employees->first_name.' '.$active_employees->last_name;?> 
             </div>
          <?php $unread_msgs = $this->Chat_model->get_unread_message($active_employees->user_id,$session['user_id']);?>  
          <?php $last_chat = $this->Chat_model->last_user_message($active_employees->user_id,$session['user_id']);?>
          <?php 
		  	if(!is_null($last_chat)){
				$last_chat_date = $this->Chat_model->timeAgo($last_chat[0]->message_date);
				$message_content = $last_chat[0]->message_content;
			} else {
				$last_chat_date = '--';
				$message_content = 'No Message.';
			}
			?>
          <div class="media-body">
            <h6 class="list-group-item-heading"><?php echo $fname;?> <span class="font-small-3 float-xs-right primary"><?php echo $last_chat_date;?></span></h6>
            <p class="list-group-item-text text-muted"><i class="ft-check primary font-small-2"></i> <?php echo $message_content;?> 
            <span class="float-xs-right primary"><?php
		  	if($unread_msgs > 0) { ?>
				<span class="tag tag-pill tag-primary">
				<?php echo $unread_msgs;?></span>
			<?php } else {
			}
		  ?> </span></p>
          </div>
          </button> 
          <?php endif;?>
          <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="content-right" id="">
	<div class="content-wrapper">
		<div class="content-header row"> </div>
		<div class="content-body">
		  <section id="chat_app_windows" class="chat-app-window scrollable-container" style="text-align: left;">
			<div class="mb-1" style="margin-top: 30px;">
            <h4><img src="<?php echo base_url();?>uploads/logo/signin/<?php echo $company[0]->sign_in_logo;?>" /></h4>
            <h4 class="">Welcome To <?php echo $company[0]->company_name;?> Chat Application</h4>
            <h4 class="">Hello <?php echo $f_name;?>!</h4>
            <p>&nbsp;</p>
            <p><?php echo $company[0]->company_name;?> Chat Application is quite hot and easy-to-use for internal communication, at the moment it offers only private messages.</p>
            <p>To get started, select a user from the left tab.</p>
            <p>Chat immediately as you start your work day. You can use private messages for direct, one-on-one communication</p>
            </div>
        </section>
        </div>
     </div>
</div>
