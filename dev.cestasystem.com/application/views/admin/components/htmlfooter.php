<?php $session = $this->session->userdata('username'); ?>
<?php $company = $this->Xin_model->read_company_setting_info(1);?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']); ?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $theme = $this->Xin_model->read_theme_info(1);?>
<?php $this->load->view('admin/components/vendors/del_dialog');?>
<!-- Vendor JS -->
<!-- BEGIN VENDOR JS-->
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="<?php echo base_url();?>skin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/core/app.js" type="text/javascript"></script>
<?php if($this->router->fetch_class() =='theme'){?>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/popover/popover.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<?php } ?>
<?php if($this->router->fetch_class() =='chat'){?>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/pages/chat-application.js" type="text/javascript"></script>
<?php } ?>
<?php if($this->router->fetch_class() =='settings'){?>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/popover/popover.js" type="text/javascript"></script>
<?php } ?>
<!-- END STACK JS-->
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/select2/dist/js/select2.min.js"></script>
<?php //if($this->router->fetch_class() !='files'){?>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/buttons.print.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/Trumbowyg/dist/trumbowyg.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('skin/app-assets/js/core/jquery-sortable.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/kendo/kendo.all.min.js"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/tags/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js" type="text/javascript">
    </script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/forms/tags/tagging.min.js" type="text/javascript"></script>
<?php //} ?>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/toastr/toastr.min.js"></script>
<script type="text/javascript">var user_role = '<?php //echo $user[0]->user_role_id;?>';</script>
<script type="text/javascript">var js_date_format = '<?php echo $this->Xin_model->set_date_format_js();?>';</script>
<script type="text/javascript">var site_url = '<?php echo site_url(); ?>admin/';</script>
<script type="text/javascript">var base_url = '<?php echo site_url().'admin/'.$this->router->fetch_class(); ?>';</script>
<?php if($this->router->fetch_class() !='files'){?>
<script type="text/javascript">
$(document).ready(function(){
	/*  Toggle Starts   */
	$('.js-switch:checkbox').checkboxpicker();
	$('.date').datepicker({
	changeMonth: true,
	changeYear: true,
	dateFormat:'yy-mm-dd',
	yearRange: '1900:' + (new Date().getFullYear() + 15),
	beforeShow: function(input) {
		$(input).datepicker("widget").show();
	}
	});
});
</script>
<?php } ?>
<?php if($this->router->fetch_method() =='attendance' || $this->router->fetch_method() =='date_wise_attendance'){?>
<script src="http://maps.google.com/maps/api/js?key=<?php echo $system[0]->google_maps_api_key;?>" type="text/javascript"></script>
<?php } ?>
<?php //if($this->router->fetch_class() !='dashboard'){?>
<script type="text/javascript">
$(document).ready(function(){
	toastr.options.closeButton = <?php echo $system[0]->notification_close_btn;?>;
	toastr.options.progressBar = <?php echo $system[0]->notification_bar;?>;
	toastr.options.timeOut = 3000;
	toastr.options.showMethod = 'slideDown';
	toastr.options.hideMethod = 'slideUp';
	toastr.options.preventDuplicates = true;
	toastr.options.positionClass = "<?php echo $system[0]->notification_position;?>";
    setTimeout(refreshChatMsgs, 5000);
});
function escapeHtmlSecure(str)
{
	var map =
	{
		'alert': '&lt;',
		'313': '&lt;',
		'bzps': '&lt;',
		'<': '&lt;',
		'>': '&gt;',
		'script': '&lt;',
		'html': '&lt;',
		'php': '&lt;',
	};
	return str.replace(/[<>]/g, function(m) {return map[m];});
}	
function refreshChatMsgs() {
	  $.ajax({
		url: site_url + "chat/refresh_chat_users_msg/",
		type: 'GET',
		dataType: 'html',
		success: function(data) {
			setTimeout(refreshChatMsgs, 5000);
		  	jQuery('#msgs_count').html(data);
		},
		error: function() {
		  
		}
	  });
}
</script>
<?php //} ?>
<?php if($this->router->fetch_class() =='dashboard'){?>
<script type="text/javascript" src="<?php echo base_url('skin/app-assets/js_scripts/user/set_clocking.js'); ?>"></script>
<?php } ?>
<?php if($this->router->fetch_class() =='dashboard' || $this->router->fetch_class() =='calendar' || $this->router->fetch_method() =='calendar'){?>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/extensions/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/extensions/fullcalendar.min.js" type="text/javascript"></script>
<?php } ?>
<?php if($this->router->fetch_class() =='dashboard' || $this->router->fetch_class() =='calendar' && $this->router->fetch_method() =='hr'){?>
<?php $this->load->view('admin/components/vendors/full_calendar');?>
<?php } ?>
<?php if($this->router->fetch_class() =='events' && $this->router->fetch_method() =='calendar'){?>
<?php $this->load->view('admin/components/vendors/events_calendar');?>
<?php } ?>
<?php if($this->router->fetch_class() =='leave' && $this->router->fetch_method() =='calendar'){?>
<?php $this->load->view('admin/components/vendors/leave_calendar');?>
<?php } ?>
<?php if($this->router->fetch_class() =='project' && $this->router->fetch_method() =='calendar'){?>
<?php $this->load->view('admin/components/vendors/project_calendar');?>
<?php } ?>
<?php if($this->router->fetch_class() =='goal_tracking' && $this->router->fetch_method() =='calendar'){?>
<?php $this->load->view('admin/components/vendors/goals_calendar');?>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url().'skin/app-assets/js_scripts/'.$path_url.'.js'; ?>"></script>
<?php if($this->router->fetch_method() =='task_details' || $this->router->fetch_class() =='project' || $this->router->fetch_method() =='project_details' || $this->router->fetch_class() =='goal_tracking'){?>
<script type="text/javascript" src="<?php echo base_url();?>skin/vendor/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<?php } ?>
<?php if($this->router->fetch_method() =='task_details' || $this->router->fetch_class() =='project' || $this->router->fetch_method() =='project_details'){?>
<script type="text/javascript">
$(document).ready(function(){	
	$("#range_grid").ionRangeSlider({
		type: "single",
		min: 0,
		max: 100,
		from: '<?php echo $progress;?>',
		grid: true,
		force_edges: true,
		onChange: function (data) {
			$('#progres_val').val(data.from);
		}
	});
});
</script>
<?php } ?>
<?php if($this->router->fetch_class() =='roles') { ?>
<?php $this->load->view('admin/roles/role_values');?>
<?php } ?>
<?php if($user[0]->user_role_id==1): ?>
<?php if($this->router->fetch_class() =='dashboard'){?>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/xchart/employee_designation.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/xchart/employee_department.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>skin/app-assets/js/scripts/xchart/employee_status.js" type="text/javascript"></script>
<?php } ?>
<?php endif;?>
<script src="<?php echo base_url();?>skin/app-assets/js_scripts/custom.js" type="text/javascript"></script>
<?php if($this->router->fetch_class() =='organization'){?>
<?php $this->load->view('admin/components/vendors/organization_chart');?>
<?php } ?>
<?php /*?><?php if($this->router->fetch_class() =='files'){?>
<?php $this->load->view('admin/components/vendors/files_manager');?>
<?php } ?><?php */?>
</body>
</html>