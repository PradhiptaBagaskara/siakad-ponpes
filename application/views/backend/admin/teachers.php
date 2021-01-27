<?php $status = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;?>
<div class="content-w">
    <?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->users == 1):?>
<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				   <?php if($status == 1):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/admins/"><i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i><span><?php echo get_phrase('admins');?></span></a>
        </li>
      <?php endif;?>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/teachers/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/parents/"><i class="os-icon picons-thin-icon-thin-0703_users_profile_group_two"></i><span><?php echo get_phrase('parents');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/add_student/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
				</li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/admissions/"><i class="os-icon picons-thin-icon-thin-0706_user_profile_add_new"></i><span><?php echo get_phrase('admissions');?></span></a>
        </li>
			  </ul>
			</div>
		  </div>
     <div class="content-i">
      <div class="content-box">
      <div class="tab-content">
      <div class="os-tabs-w">
         <div class="os-tabs-controls">
           <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#teachers"><?php echo get_phrase('teachers');?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('new');?></a>
            </li>
           </ul>
         </div>
        </div>
      <div class="tab-pane active" id="teachers">
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
                     <th><?php echo get_phrase('salary');?></th>
                     <th><?php echo get_phrase('options');?></th>
                  </tr>
               </thead>
               <tbody>
               <?php 
                $this->db->order_by('teacher_id', 'desc');
                $teachers = $this->db->get('teacher')->result_array();
               foreach($teachers as $row):
               ?>
                  <tr>
                     <td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $row['name']; ?></td>
                     <td><?php echo $row['username']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['birthday']; ?></td>
                     <td><div class="pt-btn"><a class="btn nc btn-success btn-sm btn-rounded"><font color="white">$<?php echo $row['salary']; ?></font></a></div></td>
                     <td><a href="<?php echo base_url();?>admin/teacher_profile/<?php echo $row['teacher_id'];?>/"><button class="btn btn-primary btn-rounded btn-sm"><i class="os-icon os-icon-user-male-circle"></i> <?php echo get_phrase('profile');?></button></a> <a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/teachers/delete/<?php echo $row['teacher_id'];?>"><button class="btn btn-danger btn-rounded btn-sm"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a></td>
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
         <?php echo form_open(base_url() . 'admin/teachers/create/' , array('enctype' => 'multipart/form-data'));?>
           <h5 class="form-header"><?php echo get_phrase('new');?></h5><br>
           <div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
              <div class="col-sm-9">
              <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
                 </div>
               <input class="form-control" placeholder="<?php echo get_phrase('name');?>" name="name" required="" type="text">
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
                 <input class="form-control" placeholder="<?php echo get_phrase('username');?>" id="user5" required="" name="username" type="text">
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
              <input class="form-control" placeholder="user@school.edu" name="email" type="email">
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
              <input class="form-control" placeholder="<?php echo get_phrase('phone');?>" name="phone" type="number">
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
              <input class="form-control" placeholder="<?php echo get_phrase('address');?>" name="address" type="text">
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
               <input class="single-daterange form-control" name="birthday" placeholder="Fecha de Cumpleaños" type="text" value="">
               </div>
              </div>
            </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('salary');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i>
               </div>
              <input class="form-control" placeholder="<?php echo get_phrase('salary');?>" name="salary" type="text">
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
              <input class="form-control" placeholder="<?php echo get_phrase('password');?>" name="password" type="password">
              </div>
            </div>
           </div>
           <div class="form-group row">
            <label class="col-sm-3 col-form-label"> <?php echo get_phrase('gender');?></label>
            <div class="col-sm-9">
              <div class="form-check">
               <label class="form-check-label"><input checked="" class="form-check-input" name="sex" type="radio" value="Male"><?php echo get_phrase('male');?></label>
               <label class="form-check-label"><input class="form-check-input" name="sex" type="radio" value="Female" style="margin-left:5px;"><?php echo get_phrase('female');?></label>
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
            </div>
           <div class="form-buttons-w" >
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