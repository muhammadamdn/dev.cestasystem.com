<?php
/* Company view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('module_company_title');?></h4>
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
          <?php $attributes = array('name' => 'add_company', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open_multipart('admin/company/add_company', $attributes, $hidden);?>
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="company_name"><?php echo $this->lang->line('xin_company_name');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name');?>" name="name" type="text">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="email"><?php echo $this->lang->line('xin_company_type');?></label>
                        <select class="form-control" name="company_type" data-plugin="xin_select" data-placeholder="<?php echo $this->lang->line('xin_company_type');?>">
                          <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                          <?php foreach($get_company_types as $ctype) {?>
                          <option value="<?php echo $ctype->type_id;?>"> <?php echo $ctype->name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="trading_name"><?php echo $this->lang->line('xin_company_trading');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_trading');?>" name="trading_name" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="registration_no"><?php echo $this->lang->line('xin_company_registration');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_registration');?>" name="registration_no" type="text">
                      </div>
                      <div class="col-md-6">
                        <label for="contact_number"><?php echo $this->lang->line('xin_contact_number');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_contact_number');?>" name="contact_number" type="number">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="email"><?php echo $this->lang->line('xin_email');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_email');?>" name="email" type="email">
                      </div>
                      <div class="col-md-6">
                        <label for="website"><?php echo $this->lang->line('xin_website');?></label>
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_website_url');?>" name="website" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="xin_gtax"><?php echo $this->lang->line('xin_gtax');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_gtax');?>" name="xin_gtax" type="text">
                  </div>
                  <div class="form-group">
                    <label for="address"><?php echo $this->lang->line('xin_address');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_1');?>" name="address_1" type="text">
                    <br>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_2');?>" name="address_2" type="text">
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_city');?>" name="city" type="text">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_state');?>" name="state" type="text">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" placeholder="<?php echo $this->lang->line('xin_zipcode');?>" name="zipcode" type="text">
                      </div>
                    </div>
                    <br>
                    <select class="form-control" name="country" data-plugin="xin_select" data-placeholder="<?php echo $this->lang->line('xin_country');?>">
                      <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                      <?php foreach($all_countries as $country) {?>
                      <option value="<?php echo $country->country_id;?>"> <?php echo $country->country_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label for="email"><?php echo $this->lang->line('dashboard_username');?></label>
                  <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_username');?>" name="username" type="text">
                </div>
                <div class="col-md-3">
                  <label for="website"><?php echo $this->lang->line('xin_employee_password');?></label>
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_password');?>" name="password" type="text">
                </div>
                <div class="col-md-6">
                  <fieldset class="form-group">
                    <label for="logo"><?php echo $this->lang->line('xin_company_logo');?></label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                    <small><?php echo $this->lang->line('xin_company_file_type');?></small>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_companies');?></h4>
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
                    <th><?php echo $this->lang->line('module_company_title');?></th>
                    <th><?php echo $this->lang->line('xin_email');?></th>
                    <th><?php echo $this->lang->line('xin_website');?></th>
                    <th><?php echo $this->lang->line('xin_city');?></th>
                    <th><?php echo $this->lang->line('xin_country');?></th>
                    <th><?php echo $this->lang->line('xin_added_by');?></th>
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
