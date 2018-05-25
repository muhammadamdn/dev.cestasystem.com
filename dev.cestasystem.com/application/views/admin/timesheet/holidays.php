<?php
/* Holidays view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_holiday');?></h4>
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
          <?php $attributes = array('name' => 'add_holiday', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/timesheet/add_holiday', $attributes, $hidden);?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="first_name"><?php echo $this->lang->line('left_company');?></label>
                  <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company');?>">
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
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_event_name');?></label>
                  <input type="text" class="form-control" name="event_name" placeholder="<?php echo $this->lang->line('xin_event_name');?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="start_date"><?php echo $this->lang->line('xin_start_date');?></label>
                  <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_start_date');?>" readonly name="start_date" type="text">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="end_date"><?php echo $this->lang->line('xin_end_date');?></label>
                  <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_end_date');?>" readonly name="end_date" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description"><?php echo $this->lang->line('xin_description');?></label>
                  <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" id="description"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="is_publish"><?php echo $this->lang->line('dashboard_xin_status');?></label>
                  <select name="is_publish" class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_status');?>">
                    <option value="1"><?php echo $this->lang->line('xin_published');?></option>
                    <option value="0"><?php echo $this->lang->line('xin_unpublished');?></option>
                  </select>
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
  <div class="col-md-8">
    <section id="decimal">
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('left_holidays');?></h4>
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
                  <table class="table table-striped table-bordered scroll-horizontal dataTable" id="xin_table" style="width:100%;">
                    <thead>
                      <tr>
                        <th style="width:100px;"><?php echo $this->lang->line('xin_action');?></th>
                        <th><?php echo $this->lang->line('left_company');?></th>
                        <th><?php echo $this->lang->line('xin_event_name');?></th>
                        <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
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
  </div>
</div>
<style type="text/css">
.trumbowyg-editor { min-height:110px !important; }
</style>
