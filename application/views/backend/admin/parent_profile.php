<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
	<div class="back hidden-sm-down">		
	<a href="<?php echo base_url();?>admin/parents/"><i class="os-icon os-icon-common-07"></i></a>	
</div></ul>
  <div class="content-i">
    <div class="content-box">
    <div class="row">
  <div class="col-sm-5 m-b">
  <?php $profile_info = $this->db->get_where('parent' , array('parent_id' => $parent_id))->result_array();
      foreach($profile_info as $row):?>
  
    <div class="user-profile compact">
      <div class="up-head-w" style="background-image:url(<?php echo base_url();?>uploads/back.jpg)">        
        <div class="up-main-info">
    <div class="user-avatar-w"> 
    <div class="user-avatar">
      <img alt="" src="<?php echo $this->crud_model->get_image_url('parent', $row['parent_id']);?>">
      </div></div>
          <h2 class="up-header">
            <?php echo $row['name'];?>
          </h2>
          <h6 class="up-sub-header">
           <?php echo get_phrase('account_type');?>: 
               <div class="value badge badge-pill badge-success">
                <?php echo get_phrase('parent');?>
              </div>
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
          <div class="infopadd row"><div class="infogi col-sm-2"><?php echo get_phrase('profession');?>:</div> <div class="infogg col-sm-9"> <?php echo $row['profession']; ?></div></div>
        </div>
      </div>
    </div>  
         <div class="element-box" style="border:none">
      <div class="form-header">
      <h6><?php echo get_phrase('assigned_students');?></h6>
      </div>
      <div class="table-responsive">
      <table width="100%" class="table table-lightborder table-lightfont">
      <thead>
      <tr>
      <th style="text-align: left;"><?php echo get_phrase('student');?></th>
      <th style="text-align: center;"><?php echo get_phrase('class');?></th>
      <th style="text-align: center;"><?php echo get_phrase('section');?></th>
      </tr>
      </thead>
      <tbody>
      <?php $students = $this->db->get_where('student', array('parent_id' => $parent_id))->result_array();
      foreach ($students as $subject): ?>
        <tr>
        <?php $class_id = $this->db->get_where('enroll', array('student_id' => $subject['student_id']))->row()->class_id;?>
          <td style="text-align: left;"><img alt="" src="<?php echo base_url();?>uploads/student_image/<?php echo $subject['student_id'];?>.jpg" width="25px" style="border-radius: 10px;margin-right:5px;"><?php echo $subject['name'];?></td>
          <td style="text-align: center;"><a class="btn btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?></a></td>
          <td style="text-align: center;"><a class="btn btn-rounded btn-sm btn-purple" style="color:white"><?php echo $this->db->get_where('section', array('class_id' => $class_id))->row()->name;?></a></td>
        </tr>
      <?php endforeach;?>
      </tbody>
      </table>
      </div>
    </div>
    </div>
  <?php endforeach;?>
</div>

<?php 
    $edit_data = $this->db->get_where('parent' , array('parent_id' => $parent_id))->result_array();
    foreach ($edit_data as $row3):
?>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <?php echo form_open(base_url() . 'admin/parents/update/'.$row3['parent_id'], array('id' => 'formValidate', 'enctype' => 'multipart/form-data'));?>
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
          <input class="form-control" placeholder="" required="" value="<?php echo $row3['name'];?>" name="name" type="text">
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
        <label class="col-form-label" for=""> <?php echo get_phrase('profession');?></label>
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0379_business_suitcase"></i>
          </div>
          <input class="form-control" value="<?php echo $row3['profession'];?>" name="profession" type="text">
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
				<img id="ava" src="<?php echo base_url();?>uploads/parent_image/<?php echo $row['parent_id'];?>.jpg" alt=""/>
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