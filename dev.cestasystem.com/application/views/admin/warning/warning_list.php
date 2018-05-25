<?php
/* Warning view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_warning');?></h4>
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
          <?php $attributes = array('name' => 'add_warning', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/warning/add_warning', $attributes, $hidden);?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
                      <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
                        <option value=""></option>
                        <?php foreach($get_all_companies as $company) {?>
                        <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group" id="employee_ajax">
                      <label for="warning_to"><?php echo $this->lang->line('xin_warning_to');?></label>
                      <select name="warning_to" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="type"><?php echo $this->lang->line('xin_warning_type');?></label>
                          <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_warning_type');?>" name="type">
                            <option value=""></option>
                            <?php foreach($all_warning_types as $warning_type) {?>
                            <option value="<?php echo $warning_type->warning_type_id?>"><?php echo $warning_type->type;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="subject"><?php echo $this->lang->line('xin_subject');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_subject');?>" name="subject" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" id="warning_employee_ajax">
                          <label for="warning_by"><?php echo $this->lang->line('xin_warning_by');?></label>
                          <select name="warning_by" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="warning_date"><?php echo $this->lang->line('xin_warning_date');?></label>
                          <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_warning_date');?>" readonly name="warning_date" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                      <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="30" rows="10" id="description"></textarea>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_warnings');?></h4>
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
              <table class="table table-striped table-bordered dataTable" id="xin_table">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
                    <th><?php echo $this->lang->line('xin_warning_date');?></th>
                    <th><?php echo $this->lang->line('xin_subject');?></th>
                    <th><?php echo $this->lang->line('xin_warning_type');?></th>
                    <th><?php echo $this->lang->line('xin_approval_status');?></th>
                    <th><?php echo $this->lang->line('xin_warning_by');?></th>
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
