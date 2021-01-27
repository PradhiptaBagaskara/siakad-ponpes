<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/system_settings/"><i class="os-icon picons-thin-icon-thin-0050_settings_panel_equalizer_preferences"></i><span><?php echo get_phrase('system_settings');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/sms/"><i class="os-icon picons-thin-icon-thin-0287_mobile_message_sms"></i><span><?php echo get_phrase('sms');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/email/"><i class="os-icon picons-thin-icon-thin-0315_email_mail_post_send"></i><span><?php echo get_phrase('email_settings');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/translate/"><i class="os-icon picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i><span><?php echo get_phrase('translate');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/database/"><i class="picons-thin-icon-thin-0356_database"></i><span><?php echo get_phrase('database');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
    <div class="content-box">
    	<?php echo form_open(base_url() . 'admin/sms/update', array('class' => 'form m-b'));?>
			  <div class="row">
			  	<div class="col-sm-3">
			  	</div>
			  	<?php $status = $this->db->get_where('settings', array('type' => 'sms_status'))->row()->description;?>
				<div class="col-sm-4">
				  <div class="form-group">
					<label class="gi" for=""><?php echo get_phrase('sms_service');?>:</label>
						<select class="form-control" name="sms_status" required>
							<option value="deactivate" <?php if($status == 'deactivate') echo 'selected';?>><?php echo get_phrase('disabled');?></option>
					    	<option value="clickatell" <?php if($status == 'clickatell') echo 'selected';?>>Clickatell</option>
                            <option value="twilio" <?php if($status == 'twilio') echo 'selected';?>>Twilio</option>
                            <option value="android" <?php if($status == 'android') echo 'selected';?>>Android</option>
                  		</select>
				  </div>
				</div>
				<div class="col-sm-2"><br>
				  	<button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('update');?></button>
				  </div>
			  </div>
	<?php echo form_close();?>
	<div class="row">
		<div class="col-sm-4">
      <div class="element-box shadow shadow lined-primary">
		  <h5 class="form-header">Clickatell</h5><br>
		  <?php echo form_open(base_url() . 'admin/sms/clickatell');?>
			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Clickatell Username</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0304_chat_contact_support_help_conversation"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_username'))->row()->description;?>" name="clickatell_username" required>
			  </div>
			</div>
			</div>
			
			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Clickatell Password</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0136_rotation_lock"></i>
				</div>
			  <input class="form-control" type="password" value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_password'))->row()->description;?>" name="clickatell_password" required>
			  </div>
			</div>
			</div>

			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Clickatell API ID</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0286_mobile_message_sms"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_api'))->row()->description;?>" name="clickatell_api" required>
			  </div>
			</div>
			</div>

		   <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('update');?></button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
		<div class="col-sm-4">
      <div class="element-box shadow lined-danger">
		  <h5 class="form-header">Twilio</h5><br>
		  <?php echo form_open(base_url() . 'admin/sms/twilio');?>
			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Twilio Account SID</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0304_chat_contact_support_help_conversation"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'twilio_account'))->row()->description;?>" name="twilio_account">
			  </div>
			</div>
			</div>

			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Authentication Token</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0136_rotation_lock"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'authentication_token'))->row()->description;?>" name="authentication_token">
			  </div>
			</div>
			</div>


			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Registered Phone Number</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0286_mobile_message_sms"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'registered_phone'))->row()->description;?>" name="registered_phone" required>
			  </div>
			</div>
			</div>

		   <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-danger" type="submit"> <?php echo get_phrase('update');?> </button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
	
	<div class="col-sm-4">
      <div class="element-box shadow lined-success">
		  <h5 class="form-header">Android</h5><br>
		<?php echo form_open(base_url() . 'admin/sms/android');?>

		<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> Device ID</label>
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0286_mobile_message_sms"></i>
				</div>
			  <input class="form-control" type="text" value="<?php echo $this->db->get_where('settings', array('type' => 'android_email'))->row()->description;?>" name="android_email">
			  </div>
			</div>
			</div>


			<div class="form-group row">
			  <div class="col-sm-12">
			  <label class="col-form-label" for=""> API Token</label>
			  <div class="input-group">
			  	<textarea class="form-control" rows="7" name="android_device" required=""><?php echo $this->db->get_where('settings', array('type' => 'android_device'))->row()->description;?></textarea>
			  </div>
			</div>
			</div>

		   <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('update');?> </button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
	<div class="col-sm-12">
      <div class="element-box shadow lined-primary">
		  <h5 class="form-header"><?php echo get_phrase('notify_send');?></h5><br>
		<?php echo form_open(base_url() . 'admin/sms/services');?>
		  <div class="row">
			<fieldset class="form-group col-sm-6">
            <legend><span><?php echo get_phrase('for_parents');?></span></legend>

		  <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($this->db->get_where('settings', array('type' => 'absences'))->row()->description == 1) echo 'checked';?> type="checkbox" name="absences" value="1"><?php echo get_phrase('absences');?></label>
          </div>
		  <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($this->db->get_where('settings', array('type' => 'students_reports'))->row()->description == 1) echo 'checked';?> type="checkbox" name="students_reports" value="1"><?php echo get_phrase('students_reports');?></label>
          </div>
		  <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($this->db->get_where('settings', array('type' => 'p_new_invoice'))->row()->description == 1) echo 'checked';?> type="checkbox" name="p_new_invoice" value="1"><?php echo get_phrase('new_invoice');?></label>
          </div>
          </fieldset>
		  <fieldset class="form-group col-sm-6">
            <legend><span><?php echo get_phrase('for_students');?></span></legend>

		  <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($this->db->get_where('settings', array('type' => 's_new_invoice'))->row()->description == 1) echo 'checked';?> type="checkbox" name="s_new_invoice" value="1"><?php echo get_phrase('new_invoice');?></label>
          </div>
          </fieldset>
		  </div>
		   <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('apply');?></button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
	</div>	
	</div>
</div>
</div>