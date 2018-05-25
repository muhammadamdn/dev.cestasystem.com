<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$session = $this->session->userdata('username');
if(empty($session)){ 
	redirect('admin/');
}
if(isset($_GET['jd']) && isset($_GET['from_id']) && isset($_GET['to_id']) && $_GET['data']=='chat'){
	
	$fid = $this->input->get('from_id');
	$tid = $this->input->get('to_id');
	
?>
<?php $fuser_info = $this->Xin_model->read_user_info($tid); ?>
<?php $f_name = $fuser_info[0]->first_name.' '.$fuser_info[0]->last_name;?> 
<div class="modal-header bg-primary white">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="myModalLabel8">Chat With <?php echo $f_name;?></h4>
</div>
<div class="modal-body" style="overflow:auto; height:500px;">
<div class="content-wrapper">
<div class="content-header row"> </div>
  <div class="content-body">
    <section class="chat-app-window">
      <div class="chats" id="mchatbox">
          <?php
		  foreach($this->Chat_model->get_messages() as $msgs){
			if(($tid==$msgs->to_id && $msgs->from_id==$fid) || ($fid==$msgs->to_id && $msgs->from_id==$tid)) {
				
			if($session['user_id']!=$msgs->from_id){
				$user_info = $this->Xin_model->read_user_info($msgs->to_id);
				//send
				if($user_info[0]->profile_picture!='' && $user_info[0]->profile_picture!='no file') {
					$de_file = base_url().'uploads/profile/'.$user_info[0]->profile_picture;
				} else {
					if($user_info[0]->gender=='Male') { 
						$de_file = base_url().'uploads/profile/default_male.jpg';
					} else { 
						$de_file = base_url().'uploads/profile/default_female.jpg';
					} 
				}
				$data = array(
				'is_read' => 1,
				);
				$result = $this->Chat_model->update_chat_status($data,$msgs->from_id,$session['user_id'] );
				?>
          <div class="chat chat-left">
            <div class="chat-avatar"> <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title=""> <img src="<?php echo $de_file;?>" alt="avatar"> </a> </div>
            <div class="chat-body">
              <div class="chat-content">
                <p><?php echo $msgs->message_content;?></p>
              </div>
            </div>
          </div>
          <?php
		  } else {
			$fuser_info = $this->Xin_model->read_user_info($msgs->from_id);
			//from
			if($fuser_info[0]->profile_picture!='' && $fuser_info[0]->profile_picture!='no file') {
				$fde_file = base_url().'uploads/profile/'.$fuser_info[0]->profile_picture;
			} else {
				if($fuser_info[0]->gender=='Male') { 
					$fde_file = base_url().'uploads/profile/default_male.jpg';
				} else { 
					$fde_file = base_url().'uploads/profile/default_female.jpg';
				} 
			}
			?>
          <div class="chat">
            <div class="chat-avatar"> <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title=""> <img src="<?php echo $fde_file;?>" alt="avatar"> </a> </div>
            <div class="chat-body">
              <div class="chat-content">
                <p><?php echo $msgs->message_content;?></p>
              </div>
            </div>
          </div>
          <?php
		  }
			}
		}
		?>
        </div>
    </section>
    <section class="chat-app-form">
      <?php $attributes = array('name' => 'send_chat', 'id' => 'xin-form', 'autocomplete' => 'off', 'class'=>'chat-app-input');?>
	  <?php $hidden = array('_method' => 'EDIT', '_token' => $tid, 'ext_name' => $fid);?>
      <?php echo form_open('admin/chat/send_chat/', $attributes, $hidden);?>
      
		<?php
            $data1 = array(
              'type'        => 'hidden',
			  'name'        => 'to_id',
              'id'          => 'mtid',
              'value'       => $tid,
              'class'       => 'form-control',
            );
        
        echo form_input($data1);
        ?>
        <?php
            $data2 = array(
              'type'        => 'hidden',
			  'name'        => 'from_id',
              'id'          => 'mfid',
              'value'       => $fid,
              'class'       => 'form-control',
            );
        
        echo form_input($data2);
        ?>
        <?php
            $data3 = array(
              'type'        => 'hidden',
			  'name'        => 'message_frm',
              'id'          => 'mfid',
              'value'       => $tid,
              'class'       => 'form-control',
            );
        
        echo form_input($data3);
        ?>
                
                <!--<input name="to_id" id="mtid" value="<?php echo $tid; ?>" type="hidden">
        <input name="from_id" id="mfid" value="<?php echo $fid; ?>" type="hidden">
        <input name="message_frm" id="mfid" value="<?php echo $tid; ?>" type="hidden">-->
        <fieldset class="form-group position-relative has-icon-left col-xs-10 m-0">
          <input type="text" name="message_content" class="form-control" id="message_content" placeholder="Type your message">
        </fieldset>
        <fieldset class="form-group position-relative has-icon-left col-xs-2 m-0">
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o hidden-lg-up"></i> <span class="hidden-md-down">Send</span></button>
        </fieldset>
      <?php echo form_close(); ?>
      <audio id="chatAudio"><source src="<?php echo base_url().'uploads/chat_sound/notify.ogg'; ?>" type="audio/ogg"><source src="<?php echo base_url().'uploads/chat_sound/notify.mp3';?>" type="audio/mpeg"><source src="<?php echo base_url().'uploads/chat_sound/notify.wav';?>" type="audio/wav"></audio>
					<audio id="chatAudioSent"><source src="<?php echo base_url().'uploads/chat_sound/button_tiny.ogg';?>" type="audio/ogg"><source src="<?php echo base_url().'uploads/chat_sound/button_tiny.mp3';?>" type="audio/mpeg"><source src="<?php echo base_url().'uploads/chat_sound/button_tiny.wav';?>" type="audio/wav"></audio>
    </section>
  </div></div>
</div>
<script type="text/javascript">
var first_run = 0;
	function mrefreshMessages() {
		var rfromId = $('#mfid').val();
		var rtoId = $('#mtid').val();
		$('.chat-application').removeClass('pace-done');
		$('.chat-application').removeClass('pace-running');
		$('.pace').removeClass('pace-inactive');
		if(rfromId!='' && rtoId!='') {
		
		  $.ajax({
			url: "<?php echo site_url('admin/chat/refresh_chatbox');?>?from_id=<?php echo $fid;?>&to_id=<?php echo $tid; ?>",
			type: 'GET',
			dataType: 'html',
			success: function(data) {
				$('.chat-application').removeClass('pace-done');
			  $('.chat-application').removeClass('pace-running');
			  $('.pace').removeClass('pace-inactive');
			  
			  prev_chat = $("#mchatbox").html();			  
			  jQuery('#mchatbox').html(data);
			  curr_chat = $("#mchatbox").html();
			  setTimeout(mrefreshMessages, 3000);
			  $('.chat-application').removeClass('pace-done');
			  $('.chat-application').removeClass('pace-running');
			  $('.pace').removeClass('pace-inactive');
			  //jQuery('#chat_app_window').animate({ scrollTop: $('#chat_app_window').prop("scrollHeight")}, 0);
			  if(curr_chat != prev_chat) {
				prev_chat = curr_chat;
				if(first_run===0) {
					first_run = 1;
				} else {
					if(prev_chat!='<div class="chats" id="mchatbox"></div>' ) {
						$('#chatAudio')[0].play();
						
					}
				}
			}
						
			},
			error: function() {
			 
			}
		  });
		}
	}
$(document).ready(function(){
setTimeout(mrefreshMessages, 5000);
});
$(document).ready(function(){
	  $("#xin-form").submit(function(e){
		var fd = new FormData(this);
		var text = $("#message_content").val();
		
		if(text.length == 0){
			return false;
		}			
		var obj = $(this), action = obj.attr("name");
		fd.append("is_ajax", 2);

		fd.append("form", action);
	
		e.preventDefault();
		$(".save").prop("disabled", true);
		$.ajax({
			url: e.target.action,
			type: "POST",
			data:  fd,
			contentType: false,
			cache: false,
			processData:false,
			success: function(JSON)
			{
				
				var siteUrl = "<?php echo site_url('admin/chat/refresh_chatbox');?>?from_id=<?php echo $fid;?>&to_id=<?php echo $tid; ?>";
				$.get(siteUrl, function(data, status){
				jQuery("#mchatbox").html(data);
				$("#message_content").val("");
				$("#message_content").focus();
				$("#chatAudioSent")[0].play();
				jQuery(".chat-app-window").animate({ scrollTop: $(".chat-app-window").prop("scrollHeight")}, 0);
				});
				
			},
			error: function() 
			{
				$(".save").prop("disabled", false);
			} 	        
	   });
	});
});	
</script>
<?php }
?>
