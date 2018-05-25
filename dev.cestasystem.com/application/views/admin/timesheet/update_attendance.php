<?php
/* Update Attendance view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('left_update_attendance');?></h4>
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
              <?php $attributes = array('name' => 'update_attendance_report', 'id' => 'update_attendance_report', 'autocomplete' => 'off');?>
              <?php $hidden = array('user_id' => $session['user_id']);?>
              <?php echo form_open('admin/timesheet/update_attendance', $attributes, $hidden);?>
              <?php
				$data = array(
				  'name'        => 'emp_id',
				  'id'          => 'emp_id',
				  'value'       => $session['user_id'],
				  'type'   		=> 'hidden',
				  'class'       => 'form-control',
				);
			
				echo form_input($data);
				?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="date"><?php echo $this->lang->line('xin_e_details_date');?></label>
                    <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_e_details_date');?>" readonly id="attendance_date" name="attendance_date" type="text" value="<?php echo date('Y-m-d');?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
                    <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>" required>
                      <option value=""></option>
                      <?php foreach($get_all_companies as $company) {?>
                      <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" id="employee_ajax">
                    <label for="employee"><?php echo $this->lang->line('xin_employee');?></label>
                    <select name="employee_id" id="employee_id" class="form-control employee-data" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>" required>
                    </select>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_get');?> </button>
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
  <!--<button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-modal-data"> <i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>-->
  <div class="col-md-8">
    <section id="decimal">
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><?php echo $this->lang->line('left_update_attendance');?> </h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <button class="btn btn-sm btn-primary" id="add_attendance_btn" data-toggle="modal" style="display:none;" data-target=".add-modal-data"> <i class="fa fa-plus icon"></i> <?php echo $this->lang->line('xin_add_new');?></button>
                  </li>
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
                        <th><?php echo $this->lang->line('xin_in_time');?></th>
                        <th><?php echo $this->lang->line('xin_out_time');?></th>
                        <th><?php echo $this->lang->line('dashboard_total_work');?></th>
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
  </div>
</div>
