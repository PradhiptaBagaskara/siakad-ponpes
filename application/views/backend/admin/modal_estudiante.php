<?php  $edit_data = $this->db->get_where('student' , array('student_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'admin/student/do_updates/'.$row['student_id'], array('enctype' => 'multipart/form-data')); ?>
          <br>
          <div class="form-group">
          <label class="col-form-label" for=""> <?php echo get_phrase('name');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
            </div>
          <input class="form-control" placeholder="" value="<?php echo $row['name'];?>" name="name" type="text">
          </div>
        </div>
         <div class="form-group">
          <label class="col-form-label" for=""><?php echo get_phrase('username');?></label>
          <div class="input-group">
            <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0313_email_at_sign"></i> 
            </div>
            <input class="form-control" name="username" value="<?php echo $row['username'];?>" type="text">
          </div>
          </div>
          <div class="form-group">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('email');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
          </div>
          <input class="form-control" value="<?php echo $row['email'];?>" name="email" type="email">
          </div>
        </div>
        </div>
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('phone');?></label>
          <div class="input-group">
          <div class="input-group-addon">
			<i class="picons-thin-icon-thin-0289_mobile_phone_call_ringing_nfc"></i>
          </div>
          <input class="form-control" value="<?php echo $row['phone'];?>" name="phone" type="phone">
        </div>
        </div>
         <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('addres');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0535_navigation_location_drop_pin_map"></i>
          </div>
          <input class="form-control" value="<?php echo $row['address'];?>" name="address" type="text">
          </div>
        </div>
        </div>
       <div class="form-group">
        <label class="col-form-label"> <?php echo get_phrase('gender');?></label>
          <div class="form-check">
          <label class="form-check-label"><input class="form-check-input" name="sex" type="radio" value="Male" <?php if($row['sex'] == 'Male') echo 'checked';?>><?php echo get_phrase('male');?></label>
          <label class="form-check-label"><input class="form-check-input" name="sex" type="radio" value="Female" style="margin-left:5px;" <?php if($row['sex'] == 'Female') echo 'checked';?>><?php echo get_phrase('female');?></label>
          </div>
        </div>
        </div>

<div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('parent');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0703_users_profile_group_two"></i>
          </div>
          <select class="form-control" name="parent_id">
              <option value=""><?php echo get_phrase('select');?></option>
              <?php $parents = $this->db->get('parent')->result_array();
                foreach($parents as $rows):
              ?>
                <option value="<?php echo $rows['parent_id'];?>" <?php if($rows['parent_id'] == $row['parent_id']) echo 'selected';?>><?php echo $rows['name'];?></option>
            <?php endforeach;?>
          </select>
          </div>
        </div>
<div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('status');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0168_check_ok_yes_no"></i>
          </div>
          <select class="form-control" name="student_session">
              <option value=""><?php echo get_phrase('select');?></option>
              <option value="1" <?php if($row['student_session'] == 1) echo 'selected';?>><?php echo get_phrase('active');?></option>
              <option value="2" <?php if($row['student_session'] != 1) echo 'selected';?>><?php echo get_phrase('inactive');?></option>
          </select>
          </div>
        </div>
<div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('classroom');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0047_home_flat"></i>
          </div>
          <select class="form-control" name="dormitory_id">
            <option value=""><?php echo get_phrase('select');?></option>
            <?php $dorms = $this->db->get('dormitory')->result_array();
            foreach($dorms as $dorm):
            ?>
            <option value="<?php echo $dorm['dormitory_id'];?>" <?php if($dorm['dormitory_id'] == $row['dormitory_id']) echo 'selected';?>><?php echo $dorm['number'];?></option>
          <?php endforeach;?>
          </select>
          </div>
        </div>
<div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('school_bus');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0470_bus_transport"></i>
          </div>
          <select class="form-control" name="transport_id">
          <option value=""><?php echo get_phrase('select');?></option>
            <?php $trans = $this->db->get('transport')->result_array();
            foreach($trans as $bus):
            ?>
            <option value="<?php echo $bus['transport_id'];?>" <?php if($bus['transport_id'] == $row['transport_id']) echo 'selected';?>><?php echo $bus['route_name'];?></option>
          <?php endforeach;?>
          </select>
          </div>
        </div>
        </div>
<div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('update_password');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0136_rotation_lock"></i>
          </div>
          <input class="form-control" placeholder="<?php echo get_phrase('new_password');?>" name="password" type="password">
          </div>
        </div>
 <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('photo');?></label>
          <div class="profile-side-user">
          <button type="button" class="avatar-preview avatar-preview-128">
				<img id="ava" src="<?php echo base_url();?>uploads/student_image/<?php echo $row['student_id'];?>.jpg" alt=""/>
				<span class="update">
					<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>
					<?php echo get_phrase('upload');?>
				</span>
				<input name="userfile" accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/>
			</button></div></div>



          <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>