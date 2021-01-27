<?php $status = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;?>
<div class="content-w">
<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				 <?php if($status == 1):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/admins/"><i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i><span><?php echo get_phrase('admins');?></span></a>
        </li>
      <?php endif;?>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/teachers/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/parents/"><i class="os-icon picons-thin-icon-thin-0703_users_profile_group_two"></i><span><?php echo get_phrase('parents');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/add_student/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
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
              <a class="nav-link active" data-toggle="tab" href="#students"><?php echo get_phrase('single_student');?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#bulk"><?php echo get_phrase('student_bulk');?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#import"><?php echo get_phrase('excel_import');?></a>
            </li>
           </ul>
         </div>
        </div>
      <div class="tab-pane active" id="students">
      <div class="col-lg-12">
      <div class="element-wrapper">
        <div class="element-box lined-primary shadow">
		<h5 class="form-header"><?php echo get_phrase('register_form');?></h5>
         <?php echo form_open(base_url() . 'admin/student/create/' , array('enctype' => 'multipart/form-data'));?>
           <div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
              <div class="col-sm-9">
              <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
                 </div>
               <input class="form-control" placeholder="<?php echo get_phrase('name');?>" name="name" type="text">
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
                 <input class="form-control" placeholder="<?php echo get_phrase('username');?>" id="user5" name="username" type="text">
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
               <input class="single-daterange form-control" name="birthday" type="text" value="">
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
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('parent');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0703_users_profile_group_two"></i>
               </div>
              <select class="form-control" name="parent_id">
              <option value=""><?php echo get_phrase('select');?></option>
              <?php $parents = $this->db->get('parent')->result_array();
              foreach($parents as $parent):
              ?>
               <option value="<?php echo $parent['parent_id'];?>"><?php echo $parent['name'];?></option>
               <?php endforeach;?>
              </select>
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
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('roll');?></label>
              <div class="col-sm-9">
              <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0714_identity_card_photo_user_profile"></i>
                 </div>
               <input class="form-control" placeholder="<?php echo get_phrase('roll');?>" name="roll" type="text">
               </div>
              </div>
            </div>
            <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
               </div>
              <select class="form-control" name="class_id" onchange="get_class_sections(this.value);">
               <option value=""><?php echo get_phrase('select');?></option>
               <?php $classes = $this->db->get('class')->result_array();
                  foreach($classes as $class):
               ?>
                  <option value="<?php echo $class['class_id'];?>"><?php echo $class['name'];?></option>
               <?php endforeach;?>
              </select>
              </div>
            </div>
           </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('section');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
               </div>
              <select class="form-control" id="section_selector_holder" name="section_id" required>
                  <option value=""><?php echo get_phrase('select');?></option>
              </select>
              </div>
            </div>
           </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('classroom');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0047_home_flat"></i>
               </div>
              <select class="form-control" name="dormitory_id">
               <option value=""><?php echo get_phrase('select');?></option>
               <?php 
                  $classroom = $this->db->get('dormitory')->result_array();
                  foreach($classroom as $room):
               ?>
                  <option value="<?php echo $room['dormitory_id'];?>"><?php echo $room['number'];?></option>
               <?php endforeach;?>
              </select>
              </div>
            </div>
           </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('school_bus');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0470_bus_transport"></i>
               </div>
              <select class="form-control" name="transport_id">
               <option value=""><?php echo get_phrase('select');?></option>
               <?php 
                  $bus = $this->db->get('transport')->result_array();
                  foreach($bus as $trans):
               ?>
                  <option value="<?php echo $trans['transport_id'];?>"><?php echo $trans['route_name'];?></option>
               <?php endforeach;?>
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
            </div>
           <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('save');?></button>
           </div>
           </div>
         <?php echo form_close();?>
        </div>
      </div>
      </div>
      
      <div class="tab-pane" id="bulk">
      <div class="element-wrapper">
	  <div class="element-box shadow lined-primary">
	  <h5 class="form-header"><?php echo get_phrase('student_bulk');?></h5>
      <?php echo form_open(base_url() . 'admin/student_bulk/add_bulk_student/' , array('class' => 'form-inline justify-content-sm-end selebulk', 'enctype' => 'multipart/form-data'));?>
        <label class="col-form-label" for=""> <?php echo get_phrase('class');?></label>
         <select class="form-control rounded bulk" name="class_id" required="" onchange="get_sections(this.value)">
           <option value=""><?php echo get_phrase('select');?></option>
            <?php $classes = $this->db->get('class')->result_array();
                  foreach($classes as $cl):
               ?>
                  <option value="<?php echo $cl['class_id'];?>"><?php echo $cl['name'];?></option>
               <?php endforeach;?>
         </select>
         <label class="col-form-label" for=""> <?php echo get_phrase('section');?></label>
         <select class="form-control rounded bulk" name="section_id" required="" id="section_holder">
           <option value=""><?php echo get_phrase('select');?></option>
         </select>

   <div id="bulk_add_form">
      <div id="student_entry">
      <div class="form-group row">
        <div class="col-sm-12">
         <div class="input-group">
            <input class="form-control bulk" placeholder="<?php echo get_phrase('name');?>" name="name[]" id="name" required="" type="text">
            <input class="form-control bulk" placeholder="<?php echo get_phrase('roll');?>" name="roll[]" id="roll" type="text">
            <input class="form-control bulk" placeholder="<?php echo get_phrase('username');?>" name="username[]" id="username" required="" type="text">
            <input class="form-control bulk" placeholder="<?php echo get_phrase('password');?>" name="password[]" required="" id="password" type="password">
            <input class="form-control bulk" placeholder="<?php echo get_phrase('phone');?>" name="phone[]" id="phone" type="number">
            <select class="form-control bulk" name="sex[]" id="sex" required="">
               <option value=""><?php echo get_phrase('gender');?></option>
               <option value="Male"><?php echo get_phrase('male');?></option>
               <option value="Female"><?php echo get_phrase('female');?></option>
            </select>
               <button class="btn btn-sm btn-danger bulk text-center" href="#" onclick="deleteParentElement(this)"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></button>
         </div>
        </div>
        </div>
        </div>

        <div id="student_entry_append"></div>
            <button class="btn btn-success btn-rounded savech text-right" style="margin:20px 5px" type="buton" onclick="append_student_entry()">+ <?php echo get_phrase('add_more');?></button>
        <br><hr>
        <button class="btn btn-primary btn-rounded text-left" type="submit"> <?php echo get_phrase('save');?></button>
      </div>
      <?php echo form_close();?>
      </div>
      </div></div>
      
      <div class="tab-pane" id="import">
      <div class="element-box lined-primary shadow">
      <div class="b-b"><h5 class="form-header">
       <?php echo get_phrase('excel_import');?>
      </h5>
        <div class="text-right" style="margin-top:-25px;margin-bottom:25px;"><a href="<?php echo base_url();?>uploads/import/excel.xlsx"><button class="btn btn-primary btn-rounded btn-sm"><i class="picons-thin-icon-thin-0105_download_clipboard_box"></i>  <?php echo get_phrase('download_model');?></button></a></div>
		</div>
		<div style="margin:30px 10px;">
      <?php echo form_open(base_url() . 'admin/student_bulk/excel/' , array('class' => 'form-inline', 'enctype' => 'multipart/form-data'));?>
		<div class="form-group col-sm-4">
            <label class="col-form-label" for=""> <?php echo get_phrase('file');?></label>
              <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0042_attachment"></i>
               </div>
              <input class="form-control" placeholder="<?php echo get_phrase('file');?>" required name="excel" type="file">
              </div>
            </div>
        <div class="col-sm-4">
            <label class="col-form-label" for=""> <?php echo get_phrase('class');?></label>
            <div class="input-group">
               <div class="input-group-addon">
                  <i class="icon-pencil"></i>
               </div>
              <select class="form-control" name="class_id" required onchange="get_sects(this.value);">
               <option value=""><?php echo get_phrase('select');?></option>
                   <?php $classes = $this->db->get('class')->result_array();
                  foreach($classes as $cl):
                  ?>
                     <option value="<?php echo $cl['class_id'];?>"><?php echo $cl['name'];?></option>
                  <?php endforeach;?>
              </select>
              </div>
         </div>
         <div class="col-sm-4">
         <label class="col-form-label" for=""> <?php echo get_phrase('section');?></label>
            <div class="input-group">
            <div class="input-group-addon">
               <i class="icon-pencil"></i>
            </div>
           <select class="form-control" id="section_sele_holder" required name="section_id">
               <option value=""><?php echo get_phrase('select');?></option>
           </select>
           </div>
        </div></div>
      <div class="form-buttons-w">
          <button class="btn btn-primary btn-rounded" type="submit"><?php echo get_phrase('import');?></button>
      </div>
      <?php echo form_close();?>
      </div>
      </div>
      </div>
      
      </div>
      </div>
      </div>


<script type="text/javascript">
    function get_class_sections(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_sects(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_sele_holder').html(response);
            }
        });
    }
</script>


<script type="text/javascript">
   var blank_student_entry ='';
   $(document).ready(function() {
      blank_student_entry = $('#student_entry').html();

      for ($i = 0; $i<7;$i++) {
         $("#student_entry").append(blank_student_entry);
      }
      
   });
   function get_sections(class_id) 
   {
      $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_holder').html(response);
                jQuery('#bulk_add_form').show();
            }
        });
   }

   function append_student_entry()
   {
      $("#student_entry_append").append(blank_student_entry);
   }

   function deleteParentElement(n)
   {
      n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
   }

</script>



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