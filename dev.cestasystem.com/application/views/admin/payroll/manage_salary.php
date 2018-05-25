<?php
/* Manage Salary view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('left_manage_salary');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body collapse in">
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <?php $attributes = array('name' => 'set_salary_details', 'id' => 'set_salary_details', 'autocomplete' => 'off', 'class' => 'm-b-1 add form-hrm');?>
			  <?php $hidden = array('user_id' => $session['user_id']);?>
              <?php echo form_open('admin/payroll/set_salary_details', $attributes, $hidden);?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                      <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>" required>
                        <option value="0"><?php echo $this->lang->line('xin_all_companies');?></option>
                        <?php foreach($all_companies as $company) {?>
                        <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="employee_ajax">
                      <label for="name"><?php echo $this->lang->line('dashboard_single_employee');?></label>
                      <select id="employee_id" name="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>" required>
                        <option value="0"><?php echo $this->lang->line('xin_all_employees');?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_search');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_employee_salaries');?></h4>
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
          <?php $attributes = array('name' => 'user_salary_template', 'id' => 'user_salary_template', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/payroll/user_salary_template', $attributes, $hidden);?>
              <div class="table-responsive" data-pattern="priority-columns">
                <table class="table display nowrap table-striped table-bordered scroll-horizontal" id="xin_table">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_view');?></th>
                      <th><?php echo $this->lang->line('left_company');?></th>
                      <th><?php echo $this->lang->line('xin_employee_name');?></th>
                      <th><?php echo $this->lang->line('dashboard_username');?></th>
                      <th><?php echo $this->lang->line('dashboard_designation');?></th>
                      <th><?php echo $this->lang->line('xin_payroll_hourly');?></th>
                      <th><?php echo $this->lang->line('xin_payroll_monthly');?></th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div id="update_data">
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_update');?> </button>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
