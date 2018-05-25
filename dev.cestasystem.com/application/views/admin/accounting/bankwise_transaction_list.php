<?php
/*
* All Transactions> Bank Wise - Finance View
*/
$session = $this->session->userdata('username');
$currency = $this->Xin_model->currency_sign(0);
?>
<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php
$ac_id = $this->uri->segment(3);
$transactions = $this->Finance_model->get_bankwise_transactions($ac_id);
?>
<?php
$balance2 = 0; $total_amount = 0; $transaction_credit = 0; $transaction_debit = 0;
foreach($transactions->result() as $r) {
	// balance
	if($r->transaction_debit == 0) {
		$balance2 = $balance2 - $r->transaction_credit;
	} else {
		$balance2 = $balance2 + $r->transaction_debit;
	}
	// total amount
	$total_amount += $r->total_amount;
	// credit
	$transaction_credit += $r->transaction_credit;
	// debit
	$transaction_debit += $r->transaction_debit;
}
?>

<div class="row m-b-1 animated fadeInRight">
  <section id="decimal">
    <div class="row">
      <div class="col-xs-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?php echo $this->lang->line('xin_list_all');?> <?php echo $this->lang->line('xin_acc_transactions');?></h4>
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
                      <th><?php echo $this->lang->line('xin_e_details_date');?></th>
                      <th><?php echo $this->lang->line('xin_acc_accounts');?></th>
                      <th><?php echo $this->lang->line('xin_type');?></th>
                      <th><?php echo $this->lang->line('xin_amount');?></th>
                      <th><?php echo $this->lang->line('xin_acc_credit');?></th>
                      <th><?php echo $this->lang->line('xin_acc_debit');?></th>
                      <th><?php echo $this->lang->line('xin_acc_balance');?></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="3">&nbsp;</th>
                      <th><?php echo $this->lang->line('xin_total_amount');?>: <?php echo $this->Xin_model->currency_sign($total_amount);?></th>
                      <th><?php echo $this->lang->line('xin_acc_credit');?>: <?php echo $this->Xin_model->currency_sign($transaction_credit);?></th>
                      <th><?php echo $this->lang->line('xin_acc_debit');?>: <?php echo $this->Xin_model->currency_sign($transaction_debit);?></th>
                      <th><?php echo $this->lang->line('xin_acc_balance');?>: <?php echo $this->Xin_model->currency_sign($balance2);?></th>
                    </tr>
                  </tfoot>
                </table>
                <input type="hidden" value="<?php echo $this->uri->segment(3);?>" id="current_segment" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
