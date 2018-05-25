<?php
/* Payroll > Advance Salary view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']); ?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_request');?> <?php echo $this->lang->line('xin_advance_salary');?></h4>
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
          <?php $attributes = array('name' => 'add_advance_salary', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id'], 'employee_id' => $session['user_id']);?>
          <?php echo form_open('admin/user/add_advance_salary', $attributes, $hidden);?>
            <?php foreach($all_companies as $company) {?>
			<?php if($user[0]->company_id==$company->company_id):?>
            <input type="hidden" name="company" value="<?php echo $company->company_id;?>">
            <?php endif; }?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                    <select disabled="disabled" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                      <?php foreach($all_companies as $company) {?>
                      <option value="<?php echo $company->company_id;?>" <?php if($user[0]->company_id==$company->company_id):?> selected="selected"<?php endif;?>> <?php echo $company->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="employee"><?php echo $this->lang->line('xin_award_month_year');?></label>
                      <input class="form-control d_month_year" placeholder="<?php echo $this->lang->line('xin_award_month_year');?>" readonly name="month_year" type="text">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="end_date"><?php echo $this->lang->line('xin_amount');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="amount" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edu_role"><?php echo $this->lang->line('xin_one_time_deduct');?></label>
                          <select name="one_time_deduct" class="select2 one_time_deduct" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_one_time_deduct');?>">
                            <option value="1"><?php echo $this->lang->line('xin_yes');?></option>
                            <option value="0"><?php echo $this->lang->line('xin_no');?></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="edu_role"><?php echo $this->lang->line('xin_emi_salary');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_monthly_installment');?>" name="monthly_installment" type="text" id="monthly_installment" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description"><?php echo $this->lang->line('xin_reason');?></label>
                      <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_reason');?>" name="reason" cols="30" rows="15" id="reason"></textarea>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_advance_salaries');?></h4>
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
                    <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
                    <th><?php echo $this->lang->line('xin_amount');?></th>
                    <th><?php echo $this->lang->line('xin_award_month_year');?></th>
                    <th><?php echo $this->lang->line('xin_one_time_deduct');?></th>
                    <th><?php echo $this->lang->line('xin_emi_salary');?></th>
                    <th><?php echo $this->lang->line('xin_created_at');?></th>
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
</section>
<style type="text/css">
.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
