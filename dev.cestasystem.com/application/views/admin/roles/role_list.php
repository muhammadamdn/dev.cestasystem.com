<?php
/* User Roles view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_role_set');?> <?php echo $this->lang->line('xin_employee_role');?></h4>
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
          <div class="row m-b-1">
            <div class="col-md-12">
                <?php $attributes = array('name' => 'add_role', 'id' => 'xin-form', 'autocomplete' => 'off');?>
				<?php $hidden = array('_user' => $session['user_id']);?>
                <?php echo form_open('admin/roles/add_role', $attributes, $hidden);?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="role_name"><?php echo $this->lang->line('xin_role_name');?></label>
                          <input class="form-control" placeholder="<?php echo $this->lang->line('xin_role_name');?>" name="role_name" type="text" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
                      <select class="form-control" name="company_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
                        <option value=""></option>
                        <?php foreach($get_all_companies as $company) {?>
                        <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  </div>

                  <!-- Start Cesta -->
                    <div class="row">
                      <input type="checkbox" name="role_resources[]" value="0" checked style="display:none;"/>
                      <!--
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="role_access"><?php //echo $this->lang->line('xin_role_access');?></label>
                          <select class="form-control custom-select" id="role_access" data-plugin="select_hrm" name="role_access"  data-placeholder="<?php echo $this->lang->line('xin_role_access');?>">
                            <option value="">&nbsp;</option>
                            <option value="1"><?php //echo $this->lang->line('xin_role_all_menu');?></option>
                            <option value="1"><?php// echo $this->lang->line('xin_role_cmenu');?></option>
                          </select>
                        </div>
                      </div>
                      -->
                    </div>

                    <!-- End Cesta -->

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-actions">
                            <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> '.$this->lang->line('xin_save'))); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="resources"><?php echo $this->lang->line('xin_role_resource');?></label>
                          <div id="all_resources">
                            <div class="demo-section k-content">
                              <div>
                                <div id="treeview_r1"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div id="all_resources">
                            <div class="demo-section k-content">
                              <div>
                                <div id="treeview_r2"></div>
                              </div>
                            </div>
                          </div>
                        </div>
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
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_roles');?></h4>
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
                    <th><?php echo $this->lang->line('xin_role_rid');?></th>
                    <th><?php echo $this->lang->line('xin_role_name');?></th>
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('xin_role_menu_per');?></th>
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
<style type="text/css">
.k-in { display:none !important; }
</style>
