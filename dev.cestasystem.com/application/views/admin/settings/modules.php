<style type="text/css">
</style>

<section id="configuration"> 
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><?php echo $this->lang->line('xin_modules');?></h4>
					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block card-dashboard">
						<p class="card-text"><?php echo $this->lang->line('xin_setting_module_details');?>
						</p>
                      <?php $attributes = array('name' => 'modules_info', 'id' => 'modules_info', 'autocomplete' => 'off');?>
					  <?php $hidden = array('user_id' => 0);?>
                      <?php echo form_open('admin/settings/modules_info', $attributes, $hidden);?>
						<table class="table table-striped table-bordered dataex-res-configuration">
							<tbody>
								<tr>
									<td style="width:160px;"><?php echo $this->lang->line('left_recruitment');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_recruitment_details');?></td>
									<td style="width:100px;"><input data-group-cls="btn-group-sm" type="checkbox" id="m-recruitment" class="js-switch switch" value="true" <?php if($module_recruitment=='true'):?> checked="checked" <?php endif;?>/></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('left_travels');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_travels_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-travel" <?php if($module_travel=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('left_performance');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_performance_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-performance" <?php if($module_performance=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_acc_accounting');?></td>
									<td><?php echo $this->lang->line('xin_acc_accounting_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-accounting" <?php if($module_accounting=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_hr_goal_tracking');?></td>
									<td><?php echo $this->lang->line('xin_hr_goal_module_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-goal-tracking" <?php if($module_goal_tracking=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_files_manager');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_fmanager_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-files" <?php if($module_files=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_multi_language');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_mlanguage_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-language" <?php if($module_language=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_org_chart_title');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_orgchart_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-orgchart" <?php if($module_orgchart=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('left_awards');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_awards_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-awards" <?php if($module_awards=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_hr_events_meetings');?></td>
									<td><?php echo $this->lang->line('xin_hr_events_meetings_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-events" <?php if($module_events=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('left_training');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_training_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-training" <?php if($module_training=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('left_tickets');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_inquiry_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-inquires" <?php if($module_inquiry=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_hr_m_project_task');?></td>
									<td>- <?php echo $this->lang->line('xin_setting_module_project_details');?><br />
                                    - <?php echo $this->lang->line('xin_setting_module_task_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-project" <?php if($module_projects_tasks=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>
                                <tr>
									<td><?php echo $this->lang->line('xin_assets');?></td>
									<td><?php echo $this->lang->line('xin_setting_module_assets_details');?></td>
									<td><input data-group-cls="btn-group-sm" type="checkbox" class="js-switch switch" id="m-asset" <?php if($module_assets=='true'):?> checked="checked" <?php endif;?> value="true" /></td>
								</tr>								
							</tbody>
						</table>
                        <?php echo form_close(); ?>		
					</div>
				</div>
			</div>
		</div>
	</div>  
</section>
