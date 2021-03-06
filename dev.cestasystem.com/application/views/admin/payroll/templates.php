<?php
/* Payroll Template view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_setup');?> <?php echo $this->lang->line('xin_payroll_template');?></h4>
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
          <?php $attributes = array('name' => 'add_template', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/payroll/add_template', $attributes, $hidden);?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                     <div class="col-md-3">
                      <div class="form-group">
                        <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                        <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                          <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                          <?php foreach($all_companies as $company) {?>
                          <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="salary_grades"><?php echo $this->lang->line('xin_name_of_template');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_name_of_template');?>" name="salary_grades" type="text">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="basic_salary" class="control-label"><?php echo $this->lang->line('xin_payroll_basic_salary');?></label>
                          <input class="form-control salary" placeholder="<?php echo $this->lang->line('xin_payroll_basic_salary');?>" name="basic_salary" type="text">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="overtime_rate" class="control-label"><?php echo $this->lang->line('xin_payroll_overtime_rate');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_payroll_overtime_rate');?>" name="overtime_rate" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="house_rent_allowance"><?php echo $this->lang->line('xin_Payroll_house_rent_allowance');?></label>
                          <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="house_rent_allowance" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="medical_allowance"><?php echo $this->lang->line('xin_payroll_medical_allowance');?></label>
                          <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="medical_allowance" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="travelling_allowance"><?php echo $this->lang->line('xin_payroll_travel_allowance');?></label>
                          <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="travelling_allowance" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="dearness_allowance"><?php echo $this->lang->line('xin_payroll_dearness_allowance');?></label>
                          <input class="form-control salary allowance" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="dearness_allowance" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="provident_fund"><?php echo $this->lang->line('xin_payroll_provident_fund_de');?></label>
                          <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="provident_fund" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tax_deduction"><?php echo $this->lang->line('xin_payroll_tax_deduction_de');?></label>
                          <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="tax_deduction" type="text" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="security_deposit"><?php echo $this->lang->line('xin_payroll_security_deposit');?></label>
                          <input class="form-control deduction" placeholder="<?php echo $this->lang->line('xin_amount');?>" name="security_deposit" type="text" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-right">
                    <h4 class="form-section"><?php echo $this->lang->line('xin_payroll_total_salary_details');?></h4>
                    <table class="table table-bordered custom-table">
                      <tbody>
                        <tr>
                          <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_gross_salary');?> :</th>
                          <td class="hidden-print"><input type="text" name="gross_salary" readonly id="total" class="form-control"></td>
                        </tr>
                        <tr>
                          <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_allowance');?> :</th>
                          <td class="hidden-print"><input type="text" name="total_allowance" readonly id="total_allowance" class="form-control"></td>
                        </tr>
                        <tr>
                          <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_total_deduction');?> :</th>
                          <td class="hidden-print"><input type="text" name="total_deduction" readonly id="total_deduction" class="form-control"></td>
                        </tr>
                        <tr>
                          <th class="vertical-td" style="text-align:right;"><?php echo $this->lang->line('xin_payroll_net_salary');?> :</th>
                          <td class="hidden-print"><input type="text" name="net_salary" readonly id="net_salary" class="form-control"></td>
                        </tr>
                      </tbody>
                    </table>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_payroll_templates');?></h4>
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
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('xin_payroll_template');?></th>
                    <th><?php echo $this->lang->line('xin_payroll_basic_salary');?></th>
                    <th><?php echo $this->lang->line('xin_payroll_net_salary');?></th>
                    <th><?php echo $this->lang->line('xin_payroll_total_allowance');?></th>
                    <th><?php echo $this->lang->line('xin_created_by');?></th>
                    <th><?php echo $this->lang->line('xin_created_date');?></th>
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
