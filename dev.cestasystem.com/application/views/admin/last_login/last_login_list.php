<?php
/* Employees Last Login view
*/
?>
<?php $session = $this->session->userdata('username');?>

<section id="decimal">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('left_employees_last_login');?></h4>
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
                    <th><?php echo $this->lang->line('xin_employees_id');?></th>
                    <th><?php echo $this->lang->line('xin_employees_full_name');?></th>
                    <th><?php echo $this->lang->line('dashboard_username');?></th>
                    <th><?php echo $this->lang->line('left_company');?></th>
                    <th><?php echo $this->lang->line('dashboard_last_login');?> </th>
                    <th><?php echo $this->lang->line('xin_employee_role');?></th>
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
