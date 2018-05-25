<?php
/*
* Languages - View Page
*/
$session = $this->session->userdata('username');
?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_language');?></h4>
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
          <?php $attributes = array('name' => 'add_language', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/languages/add_language', $attributes, $hidden);?>
            <div class="form-group">
              <label for="account_name"><?php echo $this->lang->line('xin_name');?></label>
              <input type="text" class="form-control" name="language_name" placeholder="<?php echo $this->lang->line('xin_name');?>">
            </div>
            <div class="form-group">
              <label for="account_balance"><?php echo $this->lang->line('xin_code');?></label>
              <input type="text" class="form-control" name="language_code" placeholder="<?php echo $this->lang->line('xin_code');?>">
            </div>
              <div class="form-group">
              <fieldset class="form-group">
                <label for="logo"><?php echo $this->lang->line('xin_flag');?></label>
                <input type="file" class="form-control-file" id="language_flag" name="language_flag">
                <small><?php echo $this->lang->line('xin_error_flag_allow_files');?></small>
              </fieldset>
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
              <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_languages');?></h4>
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
                        <th style="width:100px;"><?php echo $this->lang->line('xin_action');?></th>
                        <th><?php echo $this->lang->line('xin_name');?></th>
                        <th><?php echo $this->lang->line('xin_code');?></th>
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
    </section>
  </div>
</div>
