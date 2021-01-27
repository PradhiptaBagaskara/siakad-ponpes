<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/system_settings/"><i class="os-icon picons-thin-icon-thin-0050_settings_panel_equalizer_preferences"></i><span><?php echo get_phrase('system_settings');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/sms/"><i class="os-icon picons-thin-icon-thin-0287_mobile_message_sms"></i><span><?php echo get_phrase('sms');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/email/"><i class="os-icon picons-thin-icon-thin-0315_email_mail_post_send"></i><span><?php echo get_phrase('email_settings');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/translate/"><i class="os-icon picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i><span><?php echo get_phrase('translate');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/database/"><i class="picons-thin-icon-thin-0356_database"></i><span><?php echo get_phrase('database');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
    <div class="content-box">    

	<div class="row">
		<div class="col-sm-6">
      <div class="element-box lined-primary shadow">
		  <h5 class="form-header"><?php echo get_phrase('create_backup');?></h5><br>
		  <?php echo form_open(base_url() . 'admin/database/create');?>
		  <br><br><hr><br><br>
            <center><button class="btn btn-rounded btn-rounded btn-primary" type="submit"> <?php echo get_phrase('create');?> </button></center>

          <?php echo form_close();?>
		</div>
		</div>
	
	<div class="col-sm-6">
      <div class="element-box lined-success shadow">
		  <h5 class="form-header"><?php echo get_phrase('restore_backup');?></h5><br>
		<?php echo form_open(base_url() . 'admin/database/restore', array('enctype' => 'multipart/form-data'));?>

			 <div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> <?php echo get_phrase('file');?> (.sql)</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0356_database"></i>
				</div>
			  <input class="form-control" name="file_name" type="file" required="">
			  </div>
			</div>
			</div>

		   <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('restore');?></button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
	</div>	
	</div>
</div>
</div>