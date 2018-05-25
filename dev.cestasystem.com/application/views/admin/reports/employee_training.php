<?php
/* Date Wise Attendance Report > EMployees view
*/
?>
<?php $session = $this->session->userdata('username');?>
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
				<?php $attributes = array('name' => 'training_report', 'id' => 'training_report', 'autocomplete' => 'off', 'class' => 'add form-hrm');?>
                <?php $hidden = array('euser_id' => $session['user_id']);?>
                <?php echo form_open('admin/reports/training_report', $attributes, $hidden);?>
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
                      <input class="form-control training_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="start_date" name="start_date" type="text" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input class="form-control training_date" placeholder="<?php echo $this->lang->line('xin_select_date');?>" readonly id="end_date" name="end_date" type="text" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>" required>
                        <option value=""></option>
                        <?php foreach($get_all_companies as $company) {?>
                        <option value="<?php echo $company->company_id?>" <?php /*?><?php if($company_id==$company->company_id):?> selected 
						<?php endif;?><?php */?>><?php echo $company->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" id="employee_ajax">
                      <select name="employee_id" id="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>" required>
                        <option value="">All</option>
                        <!--<?php foreach($result as $employee) {?>
                        <option value="<?php echo $employee->user_id;?>" <?php if($session['user_id']==$employee->user_id):?> selected <?php endif;?>> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
                        <?php } ?>-->
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
        <h4 class="card-title"><?php echo $this->lang->line('xin_view');?> <?php echo $this->lang->line('xin_hr_reports_training');?></h4>
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
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('xin_employee');?></th>
                    <th><?php echo $this->lang->line('left_training_type');?></th>
                    <th><?php echo $this->lang->line('xin_trainer');?></th>
                    <th><?php echo $this->lang->line('xin_training_duration');?></th>
                    <th><?php echo $this->lang->line('xin_cost');?></th>
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
