<?php
/*
* Account Balances - Finance View
*/
$session = $this->session->userdata('username');
$currency = $this->Xin_model->currency_sign(0);
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $bankcash = $this->Finance_model->get_bankcash();?>
<?php
$account_balance = 0;;
foreach($bankcash->result() as $r) {
	// account balance
	$account_balance += $r->account_balance;
}
?>

<div class="row m-b-1 animated fadeInRight">
  <section id="decimal">
    <div class="row">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_acc_account_balances');?></h4>
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
                <input type="hidden" id="current_currency" value="<?php $curr = explode('0',$currency); echo $curr[0];?>" />
                <table class="table table-striped table-bordered dataTable" id="xin_table">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_acc_account');?></th>
                      <th><?php echo $this->lang->line('xin_acc_balance');?></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="1" style="text-align:right"><?php echo $this->lang->line('xin_acc_total');?>:</th>
                      <th><?php echo $this->Xin_model->currency_sign($account_balance);?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
