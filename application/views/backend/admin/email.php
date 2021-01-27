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
				  <a class="nav-link active" href="<?php echo base_url();?>admin/email/"><i class="os-icon picons-thin-icon-thin-0315_email_mail_post_send"></i><span><?php echo get_phrase('email_settings');?></span></a>
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
	<div class="element-box lined-primary shadow">
	    <?php echo form_open(base_url() . 'admin/email/update');?>
	<div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('smtp_host');?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0315_email_mail_post_send"></i>
            </div>
          <input class="form-control" style="text-transform: lowercase;" placeholder="ssl://smtp.googlemail.com" required="" value="<?php echo $this->email->smtp_host;?>" name="smtp_host" type="text">
          </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('smtp_port');?></label>
          <div class="col-sm-9">
          <div class="input-group">
            <div class="input-group-addon">
			<i class="picons-thin-icon-thin-0365_network_connection_computers"></i>
            </div>
            <input class="form-control" placeholder="465" value="<?php echo $this->email->smtp_port;?>" name="smtp_port" required="" type="text">
          </div>
          </div>
        </div>
		<div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('smtp_timeout');?></label>
          <div class="col-sm-9">
          <div class="input-group">
            <div class="input-group-addon">
			<i class="picons-thin-icon-thin-0027_stopwatch_timer_running_time"></i>
            </div>
            <input class="form-control" placeholder="30" name="smtp_timeout" value="<?php echo $this->email->smtp_timeout;?>" required="" type="text">
          </div>
          </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('smtp_user');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0321_email_mail_post_at"></i>
          </div>
          <input class="form-control" placeholder="test@example.com" value="<?php echo $this->email->smtp_user;?>" required="" type="text" name="smtp_user">
          </div>
        </div>
		</div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('smtp_password');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0136_rotation_lock"></i>
          </div>
          <input class="form-control" placeholder="<?php echo get_phrase('password');?>" value="<?php echo $this->email->smtp_pass;?>" name="smtp_pass" value="" required type="password">
          </div>
        </div>
        </div>
		<div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('charset');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0544_world_earth_worldwide_international_language"></i>
          </div>
          <input class="form-control" placeholder="UTF-8" style="text-transform: lowercase;" value="<?php echo $this->email->charset;?>" name="char_set" type="text">
          </div>
        </div>
        </div>
		<div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('mail_type');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
          </div>
          <input class="form-control" placeholder="html" onkeypress="this.value = this.value.toLowerCase();" value="<?php echo $this->email->mailtype;?>" name="mail_type" style="text-transform: lowercase;" type="text">
          </div>
        </div>
        </div>
        
        <div class="form-buttons-w text-right">
        <button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('save');?></button>
        </div>
        <?php echo form_close();?>
	</div>
      <div class="element-box shadow lined-success">
	  <h5 class="form-header"><?php echo get_phrase('email_templates');?></h5>
	  <div class="row">
	 <div class="col-sm-3">
	  <div class="app-email-w">
    <div class="ae-side-menu">
      <ul class="ae-main-menu">
            <?php 
		$email_templates	=	$this->db->get('email_template')->result_array();
		foreach ($email_templates as $row):
   	    ?>
           <li class="nav-item <?php if ($row['email_template_id'] == $current_email_template_id) echo 'active';?>" style="color:#fff">
            <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#email<?php echo $row['email_template_id'];?>"><i class="picons-thin-icon-thin-0315_email_mail_post_send acty"></i><span><?php echo get_phrase($row['task']);?></span></a>
        </li>
<?php endforeach;?>
      </ul>
    </div>
	</div>
	</div>
	<div class="col-sm-9">
	<div class="tab-content">
     <?php foreach ($email_templates as $row): ?>
	<div class="tab-pane <?php if ($row['email_template_id'] == $current_email_template_id) echo 'active';?>" id="email<?php echo $row['email_template_id'];?>">
	 <?php echo form_open(base_url() . 'admin/email/template/' . $row['email_template_id']);?>
          <h5 class="form-header">
           <?php echo get_phrase($row['task']);?>
          </h5>
          <div class="form-group">
            <label for=""> <?php echo get_phrase('email_subject');?></label><input class="form-control" name="subject" placeholder="" value="<?php echo $row['subject'];?>" type="text">
          </div>
		  <div class="form-group">
             <label for=""> <?php echo get_phrase('email_body');?></label> <textarea id="mymce" name="body" cols="100%" rows="10"><?php echo $row['body'];?></textarea>
            </div>
          <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('save');?></button>
          </div>
        <?php echo form_close();?>	  
	</div>
     <?php endforeach;?>	
        </form>	  
	</div>
	</div>
      </div>
     </div>
    </div>
   </div>
  </div>
</div>
