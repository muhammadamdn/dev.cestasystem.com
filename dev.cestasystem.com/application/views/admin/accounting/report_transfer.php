<?php
/* Accounting > Transfer Report view
*/
?>
<?php $session = $this->session->userdata('username');?>

<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_acc_transfer_report');?></h4>
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
          <?php $attributes = array('name' => 'report_accounting', 'id' => 'hrm-form', 'autocomplete' => 'off');?>
          <?php $hidden = array('re_user_id' => $session['user_id']);?>
          <?php echo form_open('admin/accounting/report_accounting', $attributes, $hidden);?>
          <?php
				$data = array(
				  'name'        => 'user_id',
				  'id'          => 'user_id',
				  'type'        => 'hidden',
				  'value' => $session['user_id'],
				  'class'       => 'form-control',
				);
			
			echo form_input($data);
			?>
            <form class="add form-hrm report-params" method="post" name="report_accounting" id="hrm-form" action="report_accounting">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_e_details_frm_date');?>" readonly id="from_date" name="from_date" type="text" value="<?php echo date('Y-m-d')?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_e_details_to_date');?>" readonly id="to_date" name="to_date" type="text" value="<?php echo date('Y-m-d')?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get');?></button>
                </div>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row match-height">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title" id="basic-layout-tooltip"><?php echo $this->lang->line('xin_acc_transfer_report');?></h4>
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
          <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-striped table-bordered dataTable" id="xin_table" style="width:100%;">
              <thead>
                <tr>
                  <th><?php echo $this->lang->line('xin_e_details_date');?></th>
                  <th><?php echo $this->lang->line('xin_acc_from_account');?></th>
                  <th><?php echo $this->lang->line('xin_acc_to_account');?></th>
                  <th><?php echo $this->lang->line('xin_acc_ref_no');?></th>
                  <th><?php echo $this->lang->line('xin_acc_payment');?></th>
                  <th><?php echo $this->lang->line('xin_amount');?></th>
                </tr>
              </thead>
              <tfoot id="get_footer">
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
