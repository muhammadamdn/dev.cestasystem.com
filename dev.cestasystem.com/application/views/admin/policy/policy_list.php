<?php
/* Policy view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row m-b-1 animated fadeInRight">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_add_new');?> <?php echo $this->lang->line('xin_policy');?></h4>
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
          <?php $attributes = array('name' => 'add_policy', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open('admin/policy/add_policy', $attributes, $hidden);?>
            <div class="form-body">
              <div class="form-group">
                <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>">
                <label for="company"><?php echo $this->lang->line('module_company_title');?></label>
                <select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_company');?>..." name="company">
                  <option value="0"><?php echo $this->lang->line('xin_all_companies');?></option>
                  <?php foreach($all_companies as $company) {?>
                  <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="title"><?php echo $this->lang->line('xin_title');?></label>
                <input type="text" class="form-control" name="title" placeholder="<?php echo $this->lang->line('xin_title');?>">
              </div>
              <div class="form-group">
                <label for="message"><?php echo $this->lang->line('xin_description');?></label>
                <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description');?>" name="description" id="description"></textarea>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
              </div>
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
              <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_policies');?></h4>
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
                        <th><?php echo $this->lang->line('xin_title');?></th>
                        <th><?php echo $this->lang->line('module_company_title');?></th>
                        <th><?php echo $this->lang->line('xin_created_at');?></th>
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
  </div>
</div>
<style type="text/css">
.trumbowyg-editor { min-height:110px !important; }
</style>