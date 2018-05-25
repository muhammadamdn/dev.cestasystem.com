<?php
/* Task List view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_task');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body add-form collapse">
        <div class="card-block">
          <?php $attributes = array('name' => 'add_task', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/timesheet/add_task', $attributes, $hidden);?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                      <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <?php foreach($all_companies as $company) {?>
                        <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="task_name"><?php echo $this->lang->line('dashboard_xin_title');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title');?>" name="task_name" type="text" value="">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                          <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                          <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="task_hour" class="control-label"><?php echo $this->lang->line('xin_estimated_hour');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_estimated_hour');?>" name="task_hour" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group" id="project_ajax">
                          <label for="project_ajax" class="control-label"><?php echo $this->lang->line('xin_project');?></label>
                          <select class="form-control" name="project_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_project');?>">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" id="employee_ajax">
                          <label for="employees" class="control-label"><?php echo $this->lang->line('xin_assigned_to');?></label>
                          <select multiple class="form-control" name="assigned_to[]" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_single_employee');?>">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                      <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="15" id="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                </div>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<section id="decimal">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_worksheets');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block card-dashboard">
            <div class="table-responsive" data-pattern="priority-columns">
              <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
                    <th><?php echo $this->lang->line('xin_end_date');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                    <th><?php echo $this->lang->line('xin_assigned_to');?></th>
                    <th><?php echo $this->lang->line('xin_created_by');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_progress');?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
