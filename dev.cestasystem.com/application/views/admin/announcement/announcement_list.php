<?php
/* Announcement view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_announcement');?></h4>
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
          <?php $attributes = array('name' => 'add_announcement', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/announcement/add_announcement', $attributes, $hidden);?>
            <div class="form-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title"><?php echo $this->lang->line('xin_title');?></label>
                  <input class="form-control" placeholder="<?php echo $this->lang->line('xin_title');?>" name="title" type="text" value="">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                      <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                      <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="designation" class="control-label"><?php echo $this->lang->line('module_company_title');?></label>
                      <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
                        <option value=""></option>
                        <?php foreach($get_all_companies as $company) {?>
                        <option value="<?php echo $company->company_id?>"><?php echo $company->name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" id="department_ajax">
                      <label for="department" class="control-label"><?php echo $this->lang->line('xin_department');?></label>
                      <select class="form-control" name="department_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_department');?>">
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                  <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" cols="8" rows="6" id="description"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="summary"><?php echo $this->lang->line('xin_summary');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_summary');?>" name="summary" cols="30" rows="3" id="summary"></textarea>
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
</div>
<section id="decimal">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_announcements');?></h4>
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
                    <th><?php echo $this->lang->line('xin_title');?></th>
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('xin_summary');?></th>
                    <th><?php echo $this->lang->line('xin_published_for');?></th>
                    <th><?php echo $this->lang->line('xin_start_date');?></th>
                    <th><?php echo $this->lang->line('xin_end_date');?></th>
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
<script type="text/javascript">var announcement_url = '<?php echo site_url("announcement") ?>';</script>