<?php
/*
* Tickets view
*/
$session = $this->session->userdata('username');
?>
<?php $user_info = $this->Exin_model->read_employee_info($session['user_id']);?>
<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_create_new_ticket');?></h4>
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
          <?php $attributes = array('name' => 'add_ticket', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('company' => $user_info[0]->company_id,);?>
          <?php echo form_open('admin/user/add_ticket', $attributes, $hidden);?>
          <?php
				$data = array(
				  'name'        => 'user_id',
				  'id'          => 'user_id',
				  'value'       => $session['user_id'],
				  'type'  		=> 'hidden',
				  'class'       => 'form-control',
				);
			echo form_input($data);
			?>
            <?php
				$data1 = array(
				  'name'        => 'employee_id',
				  'id'          => 'employee_id',
				  'value'       => $session['user_id'],
				  'type'  		=> 'hidden',
				  'class'       => 'form-control',
				);
			echo form_input($data1);
			?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('module_company_title');?></label>
                    <select disabled="disabled" class="form-control" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                      <?php foreach($all_companies as $company) {?>
                      <option value="<?php echo $company->company_id;?>" <?php if($user_info[0]->company_id==$company->company_id):?> selected="selected" <?php endif;?>> <?php echo $company->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="task_name"><?php echo $this->lang->line('xin_subject');?></label>
                      <input class="form-control" placeholder="<?php echo $this->lang->line('xin_subject');?>" name="subject" type="text" value="">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="ticket_priority" class="control-label"><?php echo $this->lang->line('xin_p_priority');?></label>
                          <select name="ticket_priority" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_priority');?>">
                            <option value=""></option>
                            <option value="1"><?php echo $this->lang->line('xin_low');?></option>
                            <option value="2"><?php echo $this->lang->line('xin_medium');?></option>
                            <option value="3"><?php echo $this->lang->line('xin_high');?></option>
                            <option value="4"><?php echo $this->lang->line('xin_critical');?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description"><?php echo $this->lang->line('xin_ticket_description');?></label>
                      <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_ticket_description');?>" name="description" cols="30" rows="5" id="description"></textarea>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_tickets');?></h4>
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
                    <th><?php echo $this->lang->line('xin_ticket_code');?></th>
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('dashboard_single_employee');?></th>
                    <th><?php echo $this->lang->line('xin_subject');?></th>
                    <th><?php echo $this->lang->line('xin_p_priority');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_date');?></th>
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
