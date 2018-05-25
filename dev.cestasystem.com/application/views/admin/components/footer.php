<?php $system = $this->Xin_model->read_setting_info(1);?>
<?php $theme = $this->Xin_model->read_theme_info(1);?>
<?php
if($theme[0]->fixed_layout=='true') {
	$lay_fixed = 'navbar-fixed-bottom';
} else {
	$lay_fixed = 'footer-static';
}
?>
<footer class="footer <?php echo $lay_fixed;?> <?php echo $theme[0]->footer_layout;?> navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">
    <?php if($system[0]->enable_current_year=='yes'):?>
    <?php echo date('Y');?>
    <?php endif;?>
    © <?php echo $system[0]->footer_text;?> <?php echo $this->Xin_model->hrsale_version();?>
    <?php if($system[0]->enable_page_rendered=='yes'):?>
    - 
    <?php echo $this->lang->line('xin_page_rendered_text');?> <strong>{elapsed_time}</strong> <?php echo $this->lang->line('xin_rendered_seconds');?>. <?php echo  (ENVIRONMENT === 'development') ?  ''.$this->lang->line('xin_codeigniter_version').' <strong>' . CI_VERSION . '</strong>' : '' ?>
    <?php endif; ?>
    </span> <span class="float-md-right d-xs-block d-md-inline-block hidden-md-down"><?php echo $this->lang->line('xin_hand_crafted');?> <i class="ft-heart pink"></i></span></p>
</footer>