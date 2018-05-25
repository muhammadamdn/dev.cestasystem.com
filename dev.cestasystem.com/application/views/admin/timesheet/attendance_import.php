<?php
/* Attendance Import view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_attendance_import_csv_file');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-body add-form collapse in">
        <div class="card-block">
          <p class="card-text"><?php echo $this->lang->line('xin_attendance_description_line1');?></p>
          <p class="card-text"><?php echo $this->lang->line('xin_attendance_description_line2');?></p>
          <h6><a href="<?php echo base_url();?>uploads/csv/sample-csv-attendance.csv" class="btn btn-info"> <i class="fa fa-download"></i> <?php echo $this->lang->line('xin_attendance_download_sample');?> </a></h6>
          <?php $attributes = array('name' => 'import_attendance', 'id' => 'xin-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('user_id' => $session['user_id']);?>
          <?php echo form_open_multipart('admin/timesheet/import_attendance', $attributes, $hidden);?>
            <fieldset class="form-group">
              <label for="logo"><?php echo $this->lang->line('xin_attendance_upload_file');?></label>
              <input type="file" class="form-control-file" id="file" name="file">
              <small><?php echo $this->lang->line('xin_attendance_allowed_size');?></small>
            </fieldset>
            <div class="mt-1">
              <div class="form-actions">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_attendance_import');?> </button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
