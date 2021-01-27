<?php $is_owner = $this->db->get_where('admin' , array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;
?>
<div class="content-w">
	<ul class="breadcrumb hidden-xs-down hidden-sm-down">
		<div class="back">
			<a href="<?php echo base_url();?>admin/admins/"><i class="os-icon os-icon-common-07"></i></a>
		</div>
	</ul>
  <div class="content-i">
    <div class="content-box">
    <div class="row">
  <div class="col-sm-5 m-b">
  <?php $profile_info = $this->db->get_where('admin' , array('admin_id' => $admin_id))->result_array();
      foreach($profile_info as $row):?>
  
    <div class="user-profile compact">
      <div class="up-head-w" style="background-image:url(<?php echo base_url();?>uploads/back.jpg)">        
        <div class="up-main-info">
    <div class="user-avatar-w"> 
    <div class="user-avatar">
      <img alt="" src="<?php echo $this->crud_model->get_image_url('admin', $row['admin_id']);?>">
      </div></div>
          <h2 class="up-header">
            <?php echo $row['name'];?>
          </h2>
          <h6 class="up-sub-header">
            <?php echo get_phrase('account_type');?>: 
            <?php if($is_owner == 1):?>
               <div class="value badge badge-pill badge-success">
                <?php echo get_phrase('super_admin');?>
              </div>
            <?php endif;?>
            <?php if($is_owner == 2):?>
               <div class="value badge badge-pill badge-primary">
                <?php echo get_phrase('admin');?>
              </div>
            <?php endif;?>
          </h6>
        </div>
        <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
      </div>
  
    
    <div class="padded b-t">
      <div class="row">
        <div class="col-sm-12">
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('username');?>:</div> <div class="infogg col-sm-9"> @<?php echo $row['username']; ?></div></div>
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('email');?>:</div> <div class="infogg col-sm-9"> <?php echo $row['email']; ?></div></div>
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('phone');?>:</div> <div class="infogg col-sm-9"> <?php echo $row['phone']; ?></div></div>
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('address');?>:</div> <div class="infogg col-sm-9"> <?php echo $row['address']; ?></div></div>
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('birthday');?>:</div> <div class="infogg col-sm-9"> <?php echo $row['birthday']; ?></div></div>
        </div>
      </div>
    </div>  
    </div>
  <?php endforeach;?>
</div>

<?php 
    $edit_data = $this->db->get_where('admin' , array('admin_id' => $admin_id))->result_array();
    foreach ($edit_data as $row3):
?>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <?php echo form_open(base_url() . 'admin/admins/edit/'.$row3['admin_id'], array('id' => 'formValidate', 'enctype' => 'multipart/form-data'));?>
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></div>
              </div>
              <div class="element-info-text">
                <h5 class="element-inner-header"><?php echo get_phrase('personal_information');?></h5>
              </div>
            </div>
          </div>
        <div class="form-group">
          <label class="col-form-label" for=""> <?php echo get_phrase('name');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
            </div>
          <input class="form-control" placeholder="" value="<?php echo $row3['name'];?>" name="name" type="text" required>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <label class="col-form-label" for=""><?php echo get_phrase('username');?></label>
          <div class="input-group">
            <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0313_email_at_sign"></i> 
            </div>
            <input class="form-control" name="username" value="<?php echo $row3['username'];?>" type="text" required>
          </div>
          </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('email');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
          </div>
          <input class="form-control" value="<?php echo $row3['email'];?>" name="email" type="email">
          </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('phone');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0289_mobile_phone_call_ringing_nfc"></i>
          </div>
          <input class="form-control" value="<?php echo $row3['phone'];?>" name="phone" type="phone">
        </div>
        </div></div>
		<div class="col-sm-6">
        <div class="form-group">
          <label class="col-form-label" for=""> <?php echo get_phrase('birthday');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0447_gift_wrapping"></i>
          </div>
          <input class="single-daterange form-control" value="<?php echo $row3['birthday'];?>" name="birthday" type="text" value="">
          </div>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('address');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0535_navigation_location_drop_pin_map"></i>
          </div>
          <input class="form-control" value="<?php echo $row3['address'];?>" name="address" type="text">
          </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">  
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('update_password');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0136_rotation_lock"></i>
          </div>
          <input class="form-control" placeholder="<?php echo get_phrase('new_password');?>" name="password" type="password">
          </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-6">        
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('photo');?></label>
          <div class="profile-side-user">
          <button type="button" class="avatar-preview avatar-preview-128">
				<img id="ava" src="<?php echo base_url();?>uploads/admin_image/<?php echo $row['admin_id'];?>.jpg" alt=""/>
				<span class="update">
					<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>
					<?php echo get_phrase('upload');?>
				</span>
				<input name="userfile" accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/>
			</button></div></div>
        </div>
        </div>
        <br>
        <h3><?php echo get_phrase('user_permissions');?></h3><br>

        <div class="row">
          <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['messages'] == 1) echo "checked";?> name="messages" value="1" type="checkbox"><?php echo get_phrase('messages');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
             <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['users'] == 1) echo "checked";?> name="users" value="1" type="checkbox"><?php echo get_phrase('users');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['notify'] == 1) echo "checked";?> name="notify" value="1" type="checkbox"><?php echo get_phrase('notifications');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['information'] == 1) echo "checked";?> name="info" value="1" type="checkbox"><?php echo get_phrase('information');?></label>
          </div>
          </div>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['marks'] == 1) echo "checked";?> name="marks" value="1" type="checkbox"><?php echo get_phrase('marks');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['academic'] == 1) echo "checked";?> name="academic" value="1" type="checkbox"><?php echo get_phrase('academic');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
         <div class="form-group">        
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['attendance'] == 1) echo "checked";?> name="attendance" value="1" type="checkbox"><?php echo get_phrase('attendance');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['schedules'] == 1) echo "checked";?> name="schedules" value="1" type="checkbox"><?php echo get_phrase('schedules');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['news'] == 1) echo "checked";?> name="noticeboard" value="1" type="checkbox"><?php echo get_phrase('noticeboard');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['library'] == 1) echo "checked";?> name="library" value="1" type="checkbox"><?php echo get_phrase('library');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['be'] == 1) echo "checked";?> name="behavior" value="1" type="checkbox"><?php echo get_phrase('behavior');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['acc'] == 1) echo "checked";?> name="accounting" value="1" type="checkbox"><?php echo get_phrase('accounting');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>

        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['files'] == 1) echo "checked";?> name="teacher_files" value="1" type="checkbox"><?php echo get_phrase('teacher_files');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['class'] == 1) echo "checked";?> name="classrooms" value="1" type="checkbox"><?php echo get_phrase('classrooms');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>

        <div class="row">
          <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['school'] == 1) echo "checked";?> name="school_bus" value="1" type="checkbox"><?php echo get_phrase('school_bus');?></label>
          </div>
          </div>
        </div>
        </div>

      <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['polls'] == 1) echo "checked";?> name="polls" value="1" type="checkbox"><?php echo get_phrase('polls');?></label>
          </div>
          </div>
        </div>
        </div>
      </div>

        <div class="row">
          <div class="col-sm-6">
         <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['settings'] == 1) echo "checked";?> name="system_settings" value="1" type="checkbox"><?php echo get_phrase('system_settings');?></label>
          </div>
          </div>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" <?php if($row['academic_se'] == 1) echo "checked";?> name="academic_settings" value="1" type="checkbox"><?php echo get_phrase('academic_settings');?></label>
          </div>
          </div>
        </div>
      </div>
      </div>
          <div class="form-buttons-w">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('update');?></button>
          </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
      <?php endforeach;?>
      </div>
    </div>
  </div>
</div>