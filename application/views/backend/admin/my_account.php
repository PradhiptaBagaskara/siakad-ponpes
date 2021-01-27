<?php 
   require_once "face/config.php";
   $redirectURL = base_url()."auth/facebook/";
   $permissions = ['email'];
   $loginURL = $helper->getLoginUrl($redirectURL, $permissions);
?>
<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
		<div class="back">
			<a href="<?php echo base_url();?>admin/panel/"><i class="os-icon os-icon-common-07"></i></a>
		</div></ul>
  <div class="content-i">
    <div class="content-box">
    <div class="row">
  <div class="col-sm-5 m-b">
  <?php $profile_info = $this->db->get_where('admin' , array('admin_id' => $this->session->userdata('login_user_id')))->result_array();
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
            <?php if($row['owner_status'] == 1):?>
               <div class="value badge badge-pill badge-success">
                <?php echo get_phrase('super_admin');?>
              </div>
            <?php endif;?>
            <?php if($row['owner_status'] == 2):?>
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
     <hr>
    <h5 class="text-center">Your linked accounts</h5>
    <?php $photo = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->fb_photo;?>
    <?php $name = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->fb_name;?>
    <?php $id = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->fb_id;?>
    <?php $salir = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->logoutURL;?>

    <?php $gid = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->g_oauth;?>
    <?php $fname = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->g_fname;?>
    <?php $lname = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->g_lname;?>
    <?php $gphoto = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->g_picture;?>
    <?php $gemail = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->g_email;?>

    <div class="pricing-plans row no-gutters">
      <div class="pricing-plan col-sm-6">
        <div class="plan-head">
          <div class="plan-image">
            <?php if($photo != ""):?>
              <img alt="" src="<?php echo $photo;?>">
            <?php else:?>
              <img src="<?php echo base_url();?>uploads/facebook.png">
            <?php endif;?>
          </div>
          <div class="plan-name">
            Facebook<?php if($name != ""):?><br><small><?php echo $name;?></small><?php endif;?>
          </div>
        </div>
        <div class="plan-body"><br><br>
          <div class="plan-btn-w">
            <?php if($id == ""):?>
              <a class="btn btn-success btn-rounded" href="<?php echo $loginURL;?>">Link</a>
            <?php else:?>
              <a class="btn btn-danger btn-rounded" href="<?php echo base_url();?>admin/my_account/remove_facebook/">Unlink</a>
            <?php endif;?>
          </div>
        </div>
      </div>
      <div class="pricing-plan col-sm-6">
        <div class="plan-head">
          <div class="plan-image">
            <?php if($gid != ""):?>
              <img alt="" src="<?php echo $gphoto;?>">
            <?php else:?>
              <img src="<?php echo base_url();?>uploads/google.png">
            <?php endif;?>
          </div>
          <div class="plan-name">
            <?php if($gid != ""):?><?php echo $fname ." ". $lname;?><br><span style="font-size:10px;"><?php echo $gemail;?></span><?php else:?>Google<?php endif;?>
          </div>
        </div>
        <div class="plan-body"><br><br>
          <div class="plan-btn-w">
            <?php if($gid == ""):?>
              <a class="btn btn-success btn-rounded" href="<?php echo $output;?>">Link</a>
            <?php else:?>
              <a class="btn btn-danger btn-rounded" href="<?php echo base_url();?>admin/my_account/remove_google/">Unlink</a>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>




    </div>
  <?php endforeach;?>
</div>

<?php 
    $edit_data = $this->db->get_where('admin' , array('admin_id' => $this->session->userdata('login_user_id')))->result_array();
    foreach ($edit_data as $row3):
?>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <?php echo form_open(base_url() . 'admin/my_account/update/'.$this->session->userdata('login_user_id'), array('id' => 'formValidate', 'enctype' => 'multipart/form-data'));?>
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
          <input class="form-control" value="<?php echo $row3['name'];?>" name="name" type="text">
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
            <input class="form-control" name="username" value="<?php echo $row3['username'];?>" id="user5" required type="text">
          </div>
          <small><span id="result5"></span></small>
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
				<img id="ava" src="<?php echo base_url();?>uploads/admin_image/<?php echo $this->session->userdata('login_user_id');?>.jpg" alt=""/>
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
