<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
<div class="back">
	<a href="<?php echo base_url();?>admin/students_area/"><i class="os-icon os-icon-common-07"></i></a>
</div>
</ul>
  <div class="content-i">
    <div class="content-box">
    <div class="row">
  <div class="col-sm-5 m-b">
  <?php $student_info = $this->db->get_where('enroll' , array('student_id' => $student_id , 'year' => $running_year))->result_array(); 
    foreach($student_info as $row): ?>
    <div class="user-profile compact">
      <div class="up-head-w" style="background-image:url(<?php echo base_url();?>uploads/back.jpg)">        
        <div class="up-main-info">
    <div class="user-avatar-w"> 
    <div class="user-avatar">
      <img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>">
      </div></div>
          <h2 class="up-header">
            <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name; ?>
          </h2>
          <h6 class="up-sub-header">
            <?php echo get_phrase('roll');?>: <?php echo $row['roll'];?>
          </h6>
        </div>
        <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
      </div>
    
      <div class="up-controls">
        <div class="row">
          <div class="col-sm-6">
            <div class="value-pair">
              <div class="label">
                <?php echo get_phrase('status');?>:
              </div>
              <?php $status = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->student_session; ?>
              <?php if($status == 1):?>
              <div class="value badge badge-pill badge-success">
              <?php echo get_phrase('active');?>
              </div>
            <?php endif;?>
              <?php if($status != 1):?>
              <div class="value badge badge-pill badge-danger">
               <?php echo get_phrase('inactive');?>
              </div>
            <?php endif;?>
            </div>
          </div>
          <div class="col-sm-6 text-right">
            <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo base_url();?>admin/view_marks/<?php echo $row['student_id'];?>"><i class="icon-graduation"></i><span> <?php echo get_phrase('marks');?></span></a>
          </div>
        </div>
      </div>
    
    
       <div class="padded b-t">
    <div class="row">
          <div class=" col-sm-12">
              <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('username');?>:</div> <div class="infogg col-sm-9"> @<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->username; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('email');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->email; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('phone');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->phone; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('address');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->address; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('birthday');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->birthday; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('gender');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->sex; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('parent');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('parent' , array('parent_id' => $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->parent_id))->row()->name; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('class');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('class' , array('class_id' => $row['class_id']))->row()->name; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('section');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('classroom');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('dormitory' , array('dormitory_id' => $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->dormitory_id))->row()->number; ?></div></div>
        <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('school_bus');?>:</div> <div class="infogg col-sm-9"> <?php echo $this->db->get_where('transport' , array('transport_id' => $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->transport_id))->row()->route_name; ?></div></div>
          </div></div>
      </div> 
    </div>
  <?php endforeach;?>
</div>

<?php 
    $edit_data = $this->db->get_where('student' , array('student_id' => $student_id))->result_array();
    foreach ($edit_data as $row3):
?>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
      <?php echo form_open(base_url() . 'admin/student/do_update/'.$row3['student_id'] , array('id' => 'formValidate', 'enctype' => 'multipart/form-data'));?>
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></div>
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
          <input class="form-control" placeholder="" value="<?php echo $row3['name'];?>" name="name" type="text">
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
            <input class="form-control" name="username" value="<?php echo $row3['username'];?>" type="text">
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
        <label class="col-form-label" for=""> <?php echo get_phrase('addres');?></label>
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
        <div class="col-sm-6">        
        <div class="form-group">
        <label class="col-form-label"> <?php echo get_phrase('gender');?></label>
          <div class="form-check">
          <label class="form-check-label"><input class="form-check-input" name="sex" type="radio" value="Male" <?php if($row3['sex'] == 'Male') echo 'checked';?>><?php echo get_phrase('male');?></label>
          <label class="form-check-label"><input class="form-check-input" name="sex" type="radio" value="Female" style="margin-left:5px;" <?php if($row3['sex'] == 'Female') echo 'checked';?>><?php echo get_phrase('female');?></label>
          </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
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
                <option value="<?php echo $rows['parent_id'];?>" <?php if($rows['parent_id'] == $row3['parent_id']) echo 'selected';?>><?php echo $rows['name'];?></option>
            <?php endforeach;?>
          </select>
          </div>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
        <label class="col-form-label" for=""> <?php echo get_phrase('status');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0168_check_ok_yes_no"></i>
          </div>
          <select class="form-control" name="student_session">
              <option value=""><?php echo get_phrase('select');?></option>
              <option value="1" <?php if($row3['student_session'] == 1) echo 'selected';?>><?php echo get_phrase('active');?></option>
              <option value="2" <?php if($row3['student_session'] != 1) echo 'selected';?>><?php echo get_phrase('inactive');?></option>
          </select>
          </div>
        </div>
        </div>
        </div>
                <div class="row">
        <div class="col-sm-6">
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
            <option value="<?php echo $dorm['dormitory_id'];?>" <?php if($dorm['dormitory_id'] == $row3['dormitory_id']) echo 'selected';?>><?php echo $dorm['number'];?></option>
          <?php endforeach;?>
          </select>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
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
            <option value="<?php echo $bus['transport_id'];?>" <?php if($bus['transport_id'] == $row3['transport_id']) echo 'selected';?>><?php echo $bus['route_name'];?></option>
          <?php endforeach;?>
          </select>
          </div>
        </div>
        </div></div>
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
				<img id="ava" src="<?php echo base_url();?>uploads/student_image/<?php echo $row['student_id'];?>.jpg" alt=""/>
				<span class="update">
					<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>
					<?php echo get_phrase('upload');?>
				</span>
				<input name="userfile" accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/>
			</button></div></div>
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