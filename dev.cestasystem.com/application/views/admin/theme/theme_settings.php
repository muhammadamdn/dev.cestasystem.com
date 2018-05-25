<?php
/* Settings view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $file_setting = $this->Xin_model->read_file_setting_info(1);?>
<?php $system = $this->Xin_model->read_setting_info(1); ?>
<section id="basic-listgroup">
  <div class="row match-heights">
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body collapse in">
          <div class="card-blocks">
            <div class="list-group"> <a class="list-group-item list-group-item-action nav-tabs-link" href="#page_layout" data-profile="1" data-profile-block="page_layout" data-toggle="tab" aria-expanded="true" id="setting_1"> <i class="ft-layers"></i> <?php echo $this->lang->line('xin_page_layouts');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#nav_menu" data-profile="2" data-profile-block="nav_menu" data-toggle="tab" aria-expanded="true" id="setting_2"> <i class="ft-monitor"></i> <?php echo $this->lang->line('xin_theme_nav_menu');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#color_system" data-profile="3" data-profile-block="color_system" data-toggle="tab" aria-expanded="true" id="setting_3"> <i class="ft-droplet"></i> <?php echo $this->lang->line('xin_theme_color_system');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#notification" data-profile="4" data-profile-block="notification" data-toggle="tab" aria-expanded="true" id="setting_4"> <i class="ft-alert-circle"></i> <?php echo $this->lang->line('xin_notification_position');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#form_design" data-profile="5" data-profile-block="form_design" data-toggle="tab" aria-expanded="true" id="setting_5"> <i class="ft-edit"></i> <?php echo $this->lang->line('xin_theme_form_design');?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#company_logo" data-profile="6" data-profile-block="company_logo" data-toggle="tab" aria-expanded="true" id="setting_6"> <i class="ft-image"></i> <?php echo $this->lang->line('xin_system_logos');?> </a> <?php if($system[0]->module_orgchart=='true'){?><a class="list-group-item list-group-item-action nav-tabs-link" href="#org_chart" data-profile="7" data-profile-block="org_chart" data-toggle="tab" aria-expanded="true" id="setting_7"> <i class="fa fa-sitemap"></i> <?php echo $this->lang->line('xin_org_chart_title');?> </a><?php } ?> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="page_layout">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_page_layouts');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php $attributes = array('name' => 'page_layouts_info', 'id' => 'page_layouts_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('theme_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/page_layouts/', $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_page_headers');?></label>
                      <select class="form-control" name="page_header" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_page_headers');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="breadcrumbs_basic" <?php if($page_header=='breadcrumbs_basic'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_breadcrumbs_basic');?></option>
                        <option value="breadcrumbs_top" <?php if($page_header=='breadcrumbs_top'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_breadcrumbs_top');?></option>
                        <option value="breadcrumbs_bottom" <?php if($page_header=='breadcrumbs_bottom'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_breadcrumbs_bottom');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_breadcrumbs');?></small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_footer_layout');?></label>
                      <select class="form-control" name="footer_layout" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_footer_layout');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="footer-light" <?php if($footer_layout=='footer-light'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_footer_light');?></option>
                        <option value="footer-dark" <?php if($footer_layout=='footer-dark'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_footer_dark');?></option>
                        <option value="footer-transparent" <?php if($footer_layout=='footer-transparent'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_footer_transparent');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_footer_layout');?></small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_show_dashboard_cards');?></label>
                      <select class="form-control" name="statistics_cards" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_show_dashboard_cards');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="0" <?php if($statistics_cards=='0'){?> selected <?php }?>>0</option>
                        <option value="4" <?php if($statistics_cards=='4'){?> selected <?php }?>>4</option>
                        <option value="8" <?php if($statistics_cards=='8'){?> selected <?php }?>>8</option>
                        <option value="12" <?php if($statistics_cards=='12'){?> selected <?php }?>>12</option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_statistics_cards');?></small> </div>
                  </div>
                </div>
               <div class="row">   
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_statistics_cards_background');?></label>
                      <select class="form-control" name="statistics_cards_background" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_statistics_cards_background');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="basic_color" <?php if($statistics_cards_background=='basic_color'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_statistics_cards_background_basic_clr');?></option>
                        <option value="gradient_color" <?php if($statistics_cards_background=='gradient_color'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_statistics_cards_background_gradient');?></option>
                        <option value="icon_section" <?php if($statistics_cards_background=='icon_section'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_statistics_cards_background_icon_section');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_bg_clr_statistics_cards');?></small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_employee_cards');?></label>
                      <select class="form-control" name="employee_cards" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_employee_cards');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="simple_employee_cards" <?php if($employee_cards=='simple_employee_cards'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_simple_employee_cards');?></option>
                        <option value="employee_cards_border" <?php if($employee_cards=='employee_cards_border'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_simple_employee_cards_border');?></option>
                        <option value="employee_cards_box_shadow" <?php if($employee_cards=='employee_cards_box_shadow'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_simple_employee_cards_box_shadow');?></option>
                        <option value="employee_cards_stats" <?php if($employee_cards=='employee_cards_stats'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_bordered_employee_cards_stats');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_employee_cards');?></small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_employee_cards_border_color');?></label>
                      <select class="form-control" name="card_border_color" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_employee_cards_border_color');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="border-pink" <?php if($card_border_color=='border-pink'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_pink');?></option>
                        <option value="border-blue" <?php if($card_border_color=='border-blue'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_blue');?></option>
                        <option value="border-amber" <?php if($card_border_color=='border-amber'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_yellow');?></option>
                        <option value="border-red" <?php if($card_border_color=='border-red'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_red');?></option>
                        <option value="border-black" <?php if($card_border_color=='border-black'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_black');?></option>
                        <option value="border-success" <?php if($card_border_color=='border-success'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_border_cards_success');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_employee_card_border_clr');?></small> <br />
                      <small class="text-muted"><?php echo $this->lang->line('xin_theme_set_employee_card_border_clr_note');?></small></div>
                  </div>
                </div>
               <div class="row">   
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="company_name" data-trigger="hover"> <?php echo $this->lang->line('xin_boxed_layout');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_boxed_layout_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_boxed_layout');?>"> <i class="ft-help-circle"></i></button>
                      </label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="boxed-layout" <?php if($boxed_layout=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="nav_menu" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_nav_menu');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php $attributes = array('name' => 'nav_menu_info', 'id' => 'nav_menu_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('theme_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/nav_menu/', $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_theme_compact_menu');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_theme_compact_menu_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_theme_compact_menu');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="collapsed-sidebar" <?php if($compact_menu=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_theme_flipped_menu');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_theme_flipped_menu_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_theme_flipped_menu');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="flipped-navigation" <?php if($flipped_menu=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_theme_right_side_icons');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_theme_right_side_icons_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_theme_right_side_icons');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="right-side-icons" <?php if($right_side_icons=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_theme_bordered_menu');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_theme_bordered_menu_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_theme_bordered_menu');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="bordered-navigation" <?php if($bordered_menu=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="notification" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_notification_position');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php $attributes = array('name' => 'notification_position_info', 'id' => 'notification_position_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('theme_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/notification_position_info/', $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('dashboard_position');?></label>
                      <select class="form-control" name="notification_position" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_position');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="toast-top-right" <?php if($notification_position=='toast-top-right'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_right');?></option>
                        <option value="toast-bottom-right" <?php if($notification_position=='toast-bottom-right'){?> selected <?php }?>><?php echo $this->lang->line('xin_bottom_right');?></option>
                        <option value="toast-bottom-left" <?php if($notification_position=='toast-bottom-left'){?> selected <?php }?>><?php echo $this->lang->line('xin_bottom_left');?></option>
                        <option value="toast-top-left" <?php if($notification_position=='toast-top-left'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_left');?></option>
                        <option value="toast-top-center" <?php if($notification_position=='toast-top-center'){?> selected <?php }?>><?php echo $this->lang->line('xin_top_center');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_set_position_for_notifications');?></small> </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_close_button');?></label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="sclose_btn" <?php if($notification_close_btn=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="company_name"><?php echo $this->lang->line('xin_progress_bar');?></label>
                      <br>
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="snotification_bar" <?php if($notification_bar=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="company_logo" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_system_logos');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse">
          <div class="card-block">
            <?php $attributes = array('name' => 'logo_info', 'id' => 'logo_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('company_logo' => 'UPDATE');?>
            <?php echo form_open_multipart('admin/settings/logo_info/'.$company_info_id, $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-6">
                  <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_first_logo');?></label>
                      <input type="file" class="form-control-file" id="p_file" name="p_file">
                    </fieldset>
                    <?php if($logo!='' && $logo!='no file') {?>
                    <img src="<?php echo base_url().'uploads/logo/'.$logo;?>" width="70px" style="margin-left:30px;" id="u_file">
                    <?php } else {?>
                    <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file">
                    <?php } ?>
                    <br>
                    <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_best_main_logo_size');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_logo_whit_background_light_text');?></small> </div>
                </div>
                <div class="col-md-6">
                  <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_favicon');?></label>
                      <input type="file" class="form-control-file" id="favicon" name="favicon">
                    </fieldset>
                    <?php if($favicon!='' && $favicon!='no file') {?>
                    <img src="<?php echo base_url().'uploads/logo/favicon/'.$favicon;?>" width="16px" style="margin-left:30px;" id="favicon1">
                    <?php } else {?>
                    <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="16px" style="margin-left:30px;" id="favicon1">
                    <?php } ?>
                    <br>
                    <small>- <?php echo $this->lang->line('xin_logo_files_only_favicon');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_best_logo_size_favicon');?></small></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_signin_page_logo_title');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse">
          <div class="card-block">
            <?php $attributes = array('name' => 'singin_logo', 'id' => 'singin_logo', 'autocomplete' => 'off');?>
			<?php $hidden = array('company_logo' => 'UPDATE');?>
            <?php echo form_open_multipart('admin/admin/singin_logo/', $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-6">
                  <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_logo');?></label>
                      <input type="file" class="form-control-file" id="p_file3" name="p_file3">
                    </fieldset>
                    <?php if($sign_in_logo!='' && $sign_in_logo!='no file') {?>
                    <img src="<?php echo base_url().'uploads/logo/signin/'.$sign_in_logo;?>" width="70px" style="margin-left:30px;" id="u_file3">
                    <?php } else {?>
                    <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file3">
                    <?php } ?>
                    <br>
                    <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_best_signlogo_size');?></small></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_job_page_logo_title');?> <small>(<?php echo $this->lang->line('left_frontend');?>)</small></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse">
          <div class="card-block">
            <?php $attributes = array('name' => 'job_logo', 'id' => 'job_logo', 'autocomplete' => 'off');?>
			<?php $hidden = array('job_logo' => 'UPDATE');?>
            <?php echo form_open_multipart('admin/settings/job_logo/', $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-6">
                  <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_logo');?></label>
                      <input type="file" class="form-control-file" id="p_file4" name="p_file4">
                    </fieldset>
                    <?php if($job_logo!='' && $job_logo!='no file') {?>
                    <img src="<?php echo base_url().'uploads/logo/job/'.$job_logo;?>" width="70px" style="margin-left:30px;" id="u_file4">
                    <?php } else {?>
                    <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file4">
                    <?php } ?>
                    <br>
                    <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_best_signlogo_size');?> </small></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_payroll_logo_title');?> <small>(<?php echo $this->lang->line('xin_for_pdf');?>)</small></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse">
          <div class="card-block">
            <?php $attributes = array('name' => 'payroll_logo', 'id' => 'payroll_logo_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('payroll_logo' => 'UPDATE');?>
            <?php echo form_open_multipart('admin/settings/payroll_logo/', $attributes, $hidden);?>
              <div class="row">
                <div class="col-md-6">
                  <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_logo');?></label>
                      <input type="file" class="form-control-file" id="p_file5" name="p_file5">
                    </fieldset>
                    <?php if($payroll_logo!='' && $payroll_logo!='no file') {?>
                    <img src="<?php echo base_url().'uploads/logo/payroll/'.$payroll_logo;?>" width="70px" style="margin-left:30px;" id="u_file5">
                    <?php } else {?>
                    <img src="<?php echo base_url().'uploads/logo/no_logo.png';?>" width="70px" style="margin-left:30px;" id="u_file5">
                    <?php } ?>
                    <br>
                    <small>- <?php echo $this->lang->line('xin_logo_files_only');?></small><br />
                    <small>- <?php echo $this->lang->line('xin_best_signlogo_size');?></small></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                  </div>
                </div>
              </div>
           <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php if($system[0]->module_orgchart=='true'){?>
    <div class="col-md-9 current-tab animated fadeInRight" id="org_chart" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_org_chart_title');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php $attributes = array('name' => 'orgchart_info', 'id' => 'orgchart_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('iorgchart_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/orgchart/', $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_org_chart_layout');?></label>
                      <select class="form-control" name="org_chart_layout" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_org_chart_layout');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="r2l" <?php if($org_chart_layout=='r2l'){?> selected <?php }?>><?php echo $this->lang->line('xin_org_chart_r2l');?></option>
                        <option value="l2r" <?php if($org_chart_layout=='l2r'){?> selected <?php }?>><?php echo $this->lang->line('xin_org_chart_l2r');?></option>
                        <option value="t2b" <?php if($org_chart_layout=='t2b'){?> selected <?php }?>><?php echo $this->lang->line('xin_org_chart_t2b');?></option>
                        <option value="b2t" <?php if($org_chart_layout=='b2t'){?> selected <?php }?>><?php echo $this->lang->line('xin_org_chart_b2t');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_org_chart_set_layout');?></small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label for="export_file_title"><?php echo $this->lang->line('xin_org_chart_export_file_title');?></label>
                    <input class="form-control" placeholder="<?php echo $this->lang->line('xin_org_chart_export_file_title');?>" name="export_file_title" type="text" value="<?php echo $export_file_title;?>">
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_org_chart_export_file_title_details');?>
                      </small>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="export_orgchart" data-trigger="hover"> <?php echo $this->lang->line('xin_org_chart_export');?>
                        <button type="button" class="btn itheme-btn btn-icon btn-pure primary" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_org_chart_export_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_org_chart_export');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="export_orgchart" <?php if($export_orgchart=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                  </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="export_orgchart" data-trigger="hover"> <?php echo $this->lang->line('xin_org_chart_zoom');?>
                        <button type="button" class="btn btn-icon btn-pure primary itheme-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_org_chart_zoom_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_org_chart_zoom');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="org_chart_zoom" <?php if($org_chart_zoom=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                  </div>
                  </div>   
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="export_orgchart" data-trigger="hover"> <?php echo $this->lang->line('xin_org_chart_pan');?>
                        <button type="button" class="btn btn-icon btn-pure primary itheme-btn" data-toggle="popover" data-placement="top" data-content="<?php echo $this->lang->line('xin_org_chart_pan_details');?>" data-trigger="hover" data-original-title="<?php echo $this->lang->line('xin_org_chart_pan');?>"><i class="ft-help-circle"></i></button>
                      </label>
                      
                      <div class="pull-xs-left m-r-1">
                        <input type="checkbox" class="js-switch switch" data-group-cls="btn-group-sm"  data-color="#3e70c9" data-secondary-color="#ddd" id="org_chart_pan" <?php if($org_chart_pan=='true'):?> checked="checked" <?php endif;?> value="true" />
                      </div>
                  </div>
                  </div>
                </div>    
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="col-md-9 current-tab animated fadeInRight" id="color_system" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_color_system');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <?php
			$lnk_active=''; $dlnk_active=''; if($is_semi_dark==1):
				$lnk_active = 'active';
			else:
				$dlnk_active = 'active';
			endif;
		?>
        <div class="card-body collapse in">
          <div class="customizer border-left-lighten-4 d-xl-block open">
            <?php $attributes = array('name' => 'color_system_info', 'id' => 'color_system_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('color_system_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/color_system/', $attributes, $hidden);?>
              <div class="customizer-content p-2 ps-container ps-theme-dark ps-active-yy" data-ps-id="a204864a-f74e-b4f5-8a7e-409b0cca029a">
                <ul class="nav nav-tabs nav-underline nav-justified color-options">
                  <li class="nav-item"> <a class="nav-link nav-semi-dark <?php echo $lnk_active;?>" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="#clrOpt2" aria-expanded="false"><?php echo $this->lang->line('xin_theme_semi_dark');?></a> </li>
                  <li class="nav-item"> <a class="nav-link nav-dark <?php echo $dlnk_active;?>" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3" aria-expanded="false"><?php echo $this->lang->line('xin_theme_dark');?></a> </li>
                </ul>
                <input type="hidden" id="menu_color_option" name="menu_color_option" value="<?php echo $menu_color_option;?>" />
                <div class="tab-content px-1 pt-1">
                  <div role="tabpanel" class="tab-pane <?php echo $lnk_active;?>" id="clrOpt2" aria-labelledby="color-opt-2">
                    <div class="row">
                      <div class="col-md-4">
                        <p></p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-default'):?> checked="checked" <?php endif;?> class="custom-control-input bg-default" data-bg="bg-default" id="opt-default" value="bg-default">
                          <span class="bg-blue-grey custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_default');?></span> </label>
                        <p></p>
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-primary'):?> checked="checked" <?php endif;?> class="custom-control-input bg-primary" data-bg="bg-primary" id="opt-primary" value="bg-primary">
                          <span class="bg-primary custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_primary');?></span> </label>
                        <p></p>
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-danger'):?> checked="checked" <?php endif;?> class="custom-control-input bg-danger" data-bg="bg-danger" id="opt-danger" value="bg-danger">
                          <span class="bg-danger custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_danger');?></span> </label>
                        <p></p>
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-success'):?> checked="checked" <?php endif;?> class="custom-control-input bg-success" data-bg="bg-success" id="opt-success" value="bg-success">
                          <span class="bg-success custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_success');?></span> </label>
                        <p></p>
                      </div>
                      <div class="col-md-4">
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-blue'):?> checked="checked" <?php endif;?> class="custom-control-input bg-blue" data-bg="bg-blue" id="opt-blue" value="bg-blue">
                          <span class="bg-blue custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_blue');?></span> </label>
                        <p></p>
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-cyan'):?> checked="checked" <?php endif;?> class="custom-control-input bg-cyan" data-bg="bg-cyan" id="opt-cyan" value="bg-cyan">
                          <span class="bg-cyan custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_cyan');?></span> </label>
                        <p></p>
                        <p> </p>
                        <label class="display-inline-block custom-control custom-radio">
                          <input type="radio" name="nav_sdark_color" <?php if($semi_dark_color=='bg-pink'):?> checked="checked" <?php endif;?> class="custom-control-input bg-pink" data-bg="bg-pink" id="opt-pink" value="bg-pink">
                          <span class="bg-pink custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_pink');?></span> </label>
                        <p></p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane <?php echo $dlnk_active;?>" id="clrOpt3" aria-labelledby="color-opt-3">
                    <div class="row">
                      <div class="col-md-6">
                        <h3><?php echo $this->lang->line('xin_theme_solid');?></h3>
                        <input type="hidden" name="is_semi_dark" id="is_semi_dark" value="<?php echo $is_semi_dark;?>" />
                        <div class="col-md-6">
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-blue-grey'):?> checked="checked" <?php endif;?> class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="solid-blue-grey" value="bg-blue-grey">
                            <span class="bg-blue-grey custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_default');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-primary'):?> checked="checked" <?php endif;?> class="custom-control-input bg-primary" data-bg="bg-primary" id="solid-primary" value="bg-primary">
                            <span class="bg-primary custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_primary');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-danger'):?> checked="checked" <?php endif;?> class="custom-control-input bg-danger" data-bg="bg-danger" id="solid-danger" value="bg-danger">
                            <span class="bg-danger custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_danger');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-success'):?> checked="checked" <?php endif;?> class="custom-control-input bg-success" data-bg="bg-success" id="solid-success" value="bg-success">
                            <span class="bg-success custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_success');?></span> </label>
                          <p></p>
                        </div>
                        <div class="col-md-6">
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-blue'):?> checked="checked" <?php endif;?> class="custom-control-input bg-blue" data-bg="bg-blue" id="solid-blue" value="bg-blue">
                            <span class="bg-blue custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_blue');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-cyan'):?> checked="checked" <?php endif;?> class="custom-control-input bg-cyan" data-bg="bg-cyan" id="solid-cyan" value="bg-cyan">
                            <span class="bg-cyan custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_cyan');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-pink'):?> checked="checked" <?php endif;?> class="custom-control-input bg-pink" data-bg="bg-pink" id="solid-pink" value="bg-pink">
                            <span class="bg-pink custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_pink');?></span> </label>
                          <p></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <h3><?php echo $this->lang->line('xin_theme_dradient');?></h3>
                        <div class="col-md-6">
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue1" <?php if($top_nav_dark_color=='bg-gradient-x-grey-blue'):?> checked="checked" <?php endif;?> value="bg-gradient-x-grey-blue">
                            <span class="bg-blue-grey custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_default');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-primary'):?> checked="checked" <?php endif;?> class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary1" value="bg-gradient-x-primary">
                            <span class="bg-primary custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_primary');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-danger'):?> checked="checked" <?php endif;?> class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger1" value="bg-gradient-x-danger">
                            <span class="bg-danger custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_danger');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-success'):?> checked="checked" <?php endif;?> class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success1" value="bg-gradient-x-success">
                            <span class="bg-success custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_success');?></span> </label>
                          <p></p>
                        </div>
                        <div class="col-md-6">
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-blue'):?> checked="checked" <?php endif;?> class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue1" value="bg-gradient-x-blue">
                            <span class="bg-blue custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_blue');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-cyan'):?> checked="checked" <?php endif;?> class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan1" value="bg-gradient-x-cyan">
                            <span class="bg-cyan custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_cyan');?></span> </label>
                          <p></p>
                          <p> </p>
                          <label class="display-inline-block custom-control custom-radio">
                            <input type="radio" name="nav_dark_color" <?php if($top_nav_dark_color=='bg-gradient-x-pink'):?> checked="checked" <?php endif;?> class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink1" value="bg-gradient-x-pink">
                            <span class="bg-pink custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_theme_pink');?></span> </label>
                          <p></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <h5 class="mt-1 mb-1 text-bold-500"><?php echo $this->lang->line('xin_theme_menu_color_opt');?></h5>
                <div class="form-group"> 
                  <!-- Outline Button group -->
                  <?php
				  	$act =''; $act1 ='';
                  	if($menu_color_option=='menu-light'){
						$act = 'active';
					} else {
						$act1 = 'active';
					}
				  ?>
                  <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info <?php echo $act;?>" data-sidebar="menu-light"><?php echo $this->lang->line('xin_theme_light_menu');?></button>
                    <button type="button" class="btn btn-outline-info <?php echo $act1;?>" data-sidebar="menu-dark"><?php echo $this->lang->line('xin_theme_dark_menu');?></button>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab animated fadeInRight" id="form_design" style="display:none;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $this->lang->line('xin_theme_form_design');?></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php $attributes = array('name' => 'form_design_info', 'id' => 'form_design_info', 'autocomplete' => 'off');?>
			<?php $hidden = array('form_design_info' => 'UPDATE');?>
            <?php echo form_open('admin/theme/form_design/', $attributes, $hidden);?>
              <div class="box box-block bg-white">
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="notification_position"><?php echo $this->lang->line('xin_theme_form_design_input');?></label>
                      <select class="form-control" name="form_design" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_theme_form_design_input');?>">
                        <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
                        <option value="basic_form" <?php if($form_design=='basic_form'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_default_input_design');?></option>
                        <option value="modern_form" <?php if($form_design=='modern_form'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_modern_form_design');?></option>
                        <option value="rounded_form" <?php if($form_design=='rounded_form'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_rounded_form_design');?></option>
                        <option value="default_square_form" <?php if($form_design=='default_square_form'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_default_square_form_design');?></option>
                        <option value="medium_square_form" <?php if($form_design=='medium_square_form'){?> selected <?php }?>><?php echo $this->lang->line('xin_theme_medium_square_form_design');?></option>
                      </select>
                      <br />
                      <small class="text-muted"><i class="ft-arrow-up"></i> <?php echo $this->lang->line('xin_theme_set_form_design');?></small> </div>
                  </div>
                  <div class="col-md-12">
                    <p>
                      <label for="xin_theme_form_design"><strong><?php echo $this->lang->line('xin_theme_basic_form_design');?></strong></label>
                    </p>
                    <img class="img-thumbnail img-fluid" src="<?php echo base_url('skin/img/form_input_designs.png');?>" />
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save');?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
