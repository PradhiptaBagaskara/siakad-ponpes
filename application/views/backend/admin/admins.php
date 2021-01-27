<?php $status = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;?>
<div class="content-w">
  <?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->users == 1):?>
    <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
        <?php if($status == 1):?>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/admins"><i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i><span><?php echo get_phrase('admins');?></span></a>
				</li>
      <?php endif;?>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/teachers"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/parents"><i class="os-icon picons-thin-icon-thin-0703_users_profile_group_two"></i><span><?php echo get_phrase('parents');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/add_student"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
				</li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/admissions"><i class="os-icon picons-thin-icon-thin-0706_user_profile_add_new"></i><span><?php echo get_phrase('admissions');?></span></a>
        </li>
			  </ul>
			</div>
		  </div>
  <?php if($status == 1):?>
	<div class="content-i">
    <div class="content-box">
    <div class="tab-content">
	<div class="os-tabs-w">
      <div class="os-tabs-controls">
        <ul class="nav nav-tabs upper">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#admins"><?php echo get_phrase('admins');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('new');?></a>
        </li>
        </ul>
      </div>
      </div>
    <div class="tab-pane active" id="admins">
    <div class="col-lg-12">
    <div class="element-wrapper">
      <div class="element-box shadow lined-primary">
        <div class="table-responsive">
        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
          <thead>
            <tr>
              <th><?php echo get_phrase('name');?></th>
              <th><?php echo get_phrase('username');?></th>
              <th><?php echo get_phrase('email');?></th>
              <th><?php echo get_phrase('birthday');?></th>
              <th><?php echo get_phrase('account_type');?></th>
              <th><?php echo get_phrase('options');?></th>
            </tr>
          </thead>
          <tbody>
          <?php $admins = $this->db->get('admin')->result_array();
          foreach($admins as $row):
          ?>
            <tr>
              <td><img alt="" src="<?php echo base_url();?>uploads/admin_image/<?php echo $row['admin_id'];?>.jpg" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $row['name']; ?></td>
              <td style="text-align: center;"><?php echo $row['username']; ?></td>
              <td style="text-align: center;"><?php echo $row['email']; ?></td>
              <td style="text-align: center;"><?php echo $row['birthday']; ?></td>
              <td style="text-align: center;">
              <?php if($row['owner_status'] == 1):?>
                <div class="pt-btn">
                  <a class="btn nc btn-secondary btn-sm btn-rounded"><font color="white"><?php echo get_phrase('super_admin');?></font></a>
                </div>
              <?php endif;?>
              <?php if($row['owner_status'] != 1):?>
                <div class="pt-btn">
                  <a class="btn nc btn-success btn-sm btn-rounded"><font color="white"><?php echo get_phrase('admin');?></font></a>
                </div>
              <?php endif;?>
              </td>
              <td>
              <?php if($this->session->userdata('login_user_id') != $row['admin_id']):?>
                <a href="<?php echo base_url();?>admin/admin_profile/<?php echo $row['admin_id'];?>/"><button class="btn btn-primary btn-rounded btn-sm"><i class="os-icon os-icon-user-male-circle"></i> <?php echo get_phrase('profile');?></button></a>
              <?php endif;?>
              <?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status == 1):?>
                <a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/admins/delete/<?php echo $row['admin_id'];?>"><button class="btn btn-danger btn-sm btn-rounded"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a>
              <?php endif;?>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
    </div>
    </div>
    
    <div class="tab-pane" id="new">
    <div class="col-lg-12">
    <div class="element-wrapper">
      <div class="element-box lined-primary shadow">
      <?php echo form_open(base_url() . 'admin/admins/create/' , array('enctype' => 'multipart/form-data'));?>
        <h5 class="form-header"><?php echo get_phrase('add_new');?></h5><br>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
            </div>
          <input class="form-control" placeholder="<?php echo get_phrase('name');?>" required="" name="name" type="text">
          </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('username');?></label>
          <div class="col-sm-9">
          <div class="input-group">
            <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0313_email_at_sign"></i> 
            </div>
            <input class="form-control" placeholder="<?php echo get_phrase('username');?>" id="user5" name="username" required="" type="text">
          </div>
          <small><span id="result5"></span></small>
          </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('email');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
          </div>
          <input class="form-control" placeholder="user@adomain.edu" type="email" name="email">
          </div>
        </div>
        </div>
         <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('phone');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0289_mobile_phone_call_ringing_nfc"></i>
          </div>
          <input class="form-control" type="number" name="phone">
          </div>
        </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('address');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0535_navigation_location_drop_pin_map"></i>
          </div>
          <input class="form-control" type="text" name="address">
          </div>
        </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('birthday');?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0447_gift_wrapping"></i>
          </div>
          <input class="single-daterange form-control" name="birthday" type="text" value="">
          </div>
          </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('password');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0136_rotation_lock"></i>
          </div>
          <input class="form-control" placeholder="<?php echo get_phrase('password');?>" name="password" required type="password">
          </div>
        </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('account_type');?></label>
        <div class="col-sm-9">
          <div class="input-group">
          <div class="input-group-addon">
            <i class="picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i>
          </div>
          <select class="form-control" name="type" required="">
          <option value="1"><?php echo get_phrase('super_admin');?></option>
          <option value="2"><?php echo get_phrase('admin');?></option>
          </select>
          </div>
        </div>
        </div>
        <div class="form-group row">
        <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('photo');?></label>
        <div class="col-sm-9 profile-side-user">
          <button type="button" class="avatar-preview avatar-preview-128">
				<img id="ava" src="<?php echo base_url();?>style/cms/img/avatar-1-256.png" alt=""/>
				<span class="update">
					<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>
					<?php echo get_phrase('upload');?>
				</span>
				<input name="userfile" accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/>
			</button></div>
        </div><br><br>
        <h3><?php echo get_phrase('user_permissions');?></h3><br>

        <div class="row">
          <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="messages" value="1" type="checkbox"><?php echo get_phrase('messages');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
             <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="users" value="1" type="checkbox"><?php echo get_phrase('users');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="notify" value="1" type="checkbox"><?php echo get_phrase('notifications');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="info" value="1" type="checkbox"><?php echo get_phrase('information');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="marks" value="1" type="checkbox"><?php echo get_phrase('marks');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="academic" value="1" type="checkbox"><?php echo get_phrase('academic');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="attendance" value="1" type="checkbox"><?php echo get_phrase('attendance');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="schedules" value="1" type="checkbox"><?php echo get_phrase('schedules');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="noticeboard" value="1" type="checkbox"><?php echo get_phrase('noticeboard');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="library" value="1" type="checkbox"><?php echo get_phrase('library');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="behavior" value="1" type="checkbox"><?php echo get_phrase('behavior');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="accounting" value="1" type="checkbox"><?php echo get_phrase('accounting');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="teacher_files" value="1" type="checkbox"><?php echo get_phrase('teacher_files');?></label>
          </div>
          </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="classrooms" value="1" type="checkbox"><?php echo get_phrase('classrooms');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="school_bus" value="1" type="checkbox"><?php echo get_phrase('school_bus');?></label>
          </div>
          </div>
        </div>
        </div>

      <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input" name="polls" value="1" type="checkbox"><?php echo get_phrase('polls');?></label>
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
            <label class="form-check-label"><input class="form-check-input" name="system_settings" value="1" type="checkbox"><?php echo get_phrase('system_settings');?></label>
          </div>
          </div>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
          <div class="form-check">
            <label class="form-check-label"><input class="form-check-input"  name="academic_settings" value="1" type="checkbox"><?php echo get_phrase('academic_settings');?></label>
          </div>
          </div>
        </div>
      </div>
      </div>

        </div>
        <div class="form-buttons-w">
        <button class="btn btn-primary btn-rounded" type="submit"><?php echo get_phrase('save');?></button>
        </div>
        </div>
      <?php echo form_close();?>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  <?php endif;?>
  </div>
    <?php endif;?>
  </div>



  <script type="text/javascript">
$(document).ready(function(){         
      var query;          
      $("#user5").keyup(function(e){
             query = $("#user5").val();
             $("#result5").queue(function(n) {                     
                        $.ajax({
                              type: "POST",
                              url: '<?php echo base_url();?>register/search_user',
                              data: "c="+query,
                              dataType: "html",
                              error: function(){
                                    alert("¡Error!");
                              },
                              success: function(data)
                              { 
                                if (data == "success") 
                                {            
                                    texto = "<b style='color:#ff214f'>El usuario ya existe, por favor elige otro.</b>"; 
                                    $("#result5").html(texto);
                                    $('button[type="submit"]').attr('disabled','disabled');
                                }
                                else { 
                                    texto = ""; 
                                    $("#result5").html(texto);
                                    $('button[type="submit"]').removeAttr('disabled');
                                }
                                n();
                              }
                  });                           
             });                       
      });                       
});
</script>