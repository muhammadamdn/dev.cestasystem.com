<?php
/* Database Backup Log view
*/
?>
<?php $session = $this->session->userdata('username');?>

<section id="decimal">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_backup_log');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li>
				<?php $attributes = array('name' => 'del_backup', 'id' => 'del_backup', 'autocomplete' => 'off');?>
                <?php $hidden = array('user_id' => $session['user_id']);?>
                <?php echo form_open('admin/settings/delete_db_backup', $attributes, $hidden);?>
                <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_delete_old_backup');?></button>
                <?php echo form_close(); ?>
              </li>
              <li>
                <?php $attributes = array('name' => 'db_backup', 'id' => 'db_backup', 'autocomplete' => 'off');?>
                <?php $hidden = array('user_id' => $session['user_id']);?>
                <?php echo form_open('admin/settings/create_database_backup', $attributes, $hidden);?>
                  <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_create_backup');?></button>
                <?php echo form_close(); ?>
              </li>
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
                    <th><?php echo $this->lang->line('xin_database_file');?></th>
                    <th><?php echo $this->lang->line('xin_e_details_date');?></th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- responsive --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
