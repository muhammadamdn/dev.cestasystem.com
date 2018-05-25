<?php $system = $this->Xin_model->read_setting_info(1); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $this->lang->line('xin_hr_calendar_options');?></h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          </ul>
        </div>
      </div>
      <input type="hidden" id="exact_date" value="" />
      <div class="card-body collapse in">
        <div class="card-block">
          <div class="row">
            <div class="col-md-3">
              <div id='external-events'>
                <div id="external-events-listing" class="fc-events-container">
                  <div class='fc-event' data-color='#2D95BF'><?php echo $this->lang->line('left_holidays');?></div>
                  <div class='fc-event' data-color='#48CFAE'><?php echo $this->lang->line('xin_hr_calendar_lv_request');?></div>
                  <?php if($system[0]->module_travel=='true'){?>
                  <div class='fc-event' data-color='#50C1E9'><?php echo $this->lang->line('xin_hr_calendar_trvl_request');?></div>
                  <?php } ?>
                  <div class='fc-event' data-color='#FB6E52'><?php echo $this->lang->line('xin_hr_calendar_upc_birthday');?></div>
                  <?php if($system[0]->module_training=='true'){?>
                  <div class='fc-event' data-color='#ED5564'><?php echo $this->lang->line('xin_hr_calendar_tranings');?></div>
                  <?php } ?>
                  <?php if($system[0]->module_projects_tasks=='true'){?>
                  <div class='fc-event' data-color='#F8B195'><?php echo $this->lang->line('left_projects');?></div>
                  <div class='fc-event' data-color='#6C5B7B'><?php echo $this->lang->line('left_tasks');?></div>
                  <?php } ?>
                  <?php if($system[0]->module_events=='true'){?>
                  <div class='fc-event' data-color='#355C7D'><?php echo $this->lang->line('xin_hr_events');?></div>
                  <div class='fc-event' data-color='#547A8B'><?php echo $this->lang->line('xin_hr_meetings');?></div>
                  <?php } ?>
                  <?php if($system[0]->module_goal_tracking=='true'){?>
                  <div class='fc-event' data-color='#3EACAB'><?php echo $this->lang->line('xin_hr_goals_title');?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div id='calendar_hr'></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
