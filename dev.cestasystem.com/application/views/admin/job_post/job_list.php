<?php
/* Job List/Post view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_job');?></h4>
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
			<?php $attributes = array('name' => 'add_job', 'id' => 'xin-form', 'autocomplete' => 'off');?>
            <?php $hidden = array('_user' => $session['user_id']);?>
            <?php echo form_open('admin/job_post/add_job', $attributes, $hidden);?>
            <div class="bg-white">
              <div class="box-block">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
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
                 </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="title"><?php echo $this->lang->line('xin_e_details_jtitle');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_jtitle');?>" name="job_title" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="job_type"><?php echo $this->lang->line('xin_job_type');?></label>
                          <select class="form-control" name="job_type" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_job_type');?>">
                            <option value=""></option>
                            <?php foreach($all_job_types as $job_type) {?>
                            <option value="<?php echo $job_type->job_type_id?>"><?php echo $job_type->type?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" id="designation_ajax">
                          <label for="designation"><?php echo $this->lang->line('dashboard_designation');?></label>
                          <select class="form-control" name="designation_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_designation');?>">
                            <option value=""></option>
                            <?php foreach($all_designations as $designation) {?>
                            <option value="<?php echo $designation->designation_id?>"><?php echo $designation->designation_name?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                          <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status');?>">
                            <option value="1"><?php echo $this->lang->line('xin_published');?></option>
                            <option value="2"><?php echo $this->lang->line('xin_unpublished');?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="vacancy"><?php echo $this->lang->line('xin_number_of_positions');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_number_of_positions');?>" name="vacancy" type="text" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date_of_closing" class="control-label"><?php echo $this->lang->line('xin_date_of_closing');?></label>
                          <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_date_of_closing');?>" readonly name="date_of_closing" type="text" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gender"><?php echo $this->lang->line('xin_employee_gender');?></label>
                          <select class="form-control" name="gender" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_employee_gender');?>">
                            <option value="0"><?php echo $this->lang->line('xin_gender_male');?></option>
                            <option value="1"><?php echo $this->lang->line('xin_gender_female');?></option>
                            <option value="2"><?php echo $this->lang->line('xin_job_no_preference');?></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="experience" class="control-label"><?php echo $this->lang->line('xin_job_minimum_experience');?></label>
                          <select class="form-control" name="experience" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_job_minimum_experience');?>">
                            <option value="0"><?php echo $this->lang->line('xin_job_fresh');?></option>
                            <option value="1"><?php echo $this->lang->line('xin_job_experience_define_1year');?></option>
                            <option value="2"><?php echo $this->lang->line('xin_job_experience_define_2years');?></option>
                            <option value="3"><?php echo $this->lang->line('xin_job_experience_define_3years');?></option>
                            <option value="4"><?php echo $this->lang->line('xin_job_experience_define_4years');?></option>
                            <option value="5"><?php echo $this->lang->line('xin_job_experience_define_5years');?></option>
                            <option value="6"><?php echo $this->lang->line('xin_job_experience_define_6years');?></option>
                            <option value="7"><?php echo $this->lang->line('xin_job_experience_define_7years');?></option>
                            <option value="8"><?php echo $this->lang->line('xin_job_experience_define_8years');?></option>
                            <option value="9"><?php echo $this->lang->line('xin_job_experience_define_9years');?></option>
                            <option value="10"><?php echo $this->lang->line('xin_job_experience_define_10years');?></option>
                            <option value="11"><?php echo $this->lang->line('xin_job_experience_define_plus_10years');?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="long_description"><?php echo $this->lang->line('xin_long_description');?></label>
                      <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_long_description');?>" name="long_description" cols="30" rows="15" id="long_description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="short_description"><?php echo $this->lang->line('xin_short_description');?></label>
                  <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_short_description');?>" name="short_description" cols="30" rows="3"></textarea>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_jobs');?></h4>
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
              <table class="table display nowrap table-striped table-bordered scroll-horizontal" id="xin_table">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action');?></th>
                    <th><?php echo $this->lang->line('xin_rec_employer_title');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_title');?></th>
                    <th><?php echo $this->lang->line('xin_acc_category');?></th>
                    <th><?php echo $this->lang->line('xin_job_type');?></th>
                    <th><?php echo $this->lang->line('xin_no_of_positions');?></th>
                    <th><?php echo $this->lang->line('xin_closing_date');?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
                    <th><?php echo $this->lang->line('xin_role_added_date');?></th>
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
