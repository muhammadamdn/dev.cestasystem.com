<?php
/* Tasks report view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $_tasks = $this->Timesheet_model->get_tasks();?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_hr_report_filters');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body collapse in">
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <?php $attributes = array('name' => 'roles_report', 'id' => 'roles_report', 'autocomplete' => 'off', 'class' => 'add form-hrm');?>
                <?php $hidden = array('euser_id' => $session['user_id']);?>
                <?php echo form_open('admin/reports/roles_report', $attributes, $hidden);?>
                <?php
                    $data = array(
                      'name'        => 'user_id',
                      'id'          => 'user_id',
                      'type'        => 'hidden',
                      'value'   	   => $session['user_id'],
                      'class'       => 'form-control',
                    );
                
                echo form_input($data);
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->lang->line('xin_hr_report_user_roles');?></label>
                      <select class="form-control" name="role_id" id="role_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_hr_report_user_roles');?>" required>
                        <option value="0"><?php echo $this->lang->line('xin_hr_reports_roles_all');?></option>
                        <?php foreach($all_user_roles as $user_role) {?>
                        <option value="<?php echo $user_role->role_id?>"><?php echo $user_role->role_name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_get');?> </button>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $this->lang->line('xin_view');?> <?php echo $this->lang->line('xin_hr_report_user_roles_report');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body collapse in">
        <div class="card-block card-dashboard">
          <div class="table-responsive" data-pattern="priority-columns">
            <table class="table display nowrap table-striped table-bordered scroll-horizontal" id="xin_table" style="width:100%;">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line('xin_employees_id');?></th>
                  <th><?php echo $this->lang->line('xin_employees_full_name');?></th>
                  <th><?php echo $this->lang->line('left_company');?></th>
                  <th><?php echo $this->lang->line('dashboard_email');?></th>
                  <th><?php echo $this->lang->line('xin_employee_role');?></th>
                  <th><?php echo $this->lang->line('xin_designation');?></th>
                  <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
