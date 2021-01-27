<?php $title = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description; ?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo get_phrase('create_account');?>| <?php echo $title;?></title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="<?php echo base_url();?>style/cms/favicon.png" rel="shortcut icon">
    <link href="<?php echo base_url();?>style/cms/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>style/cms/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/icon_fonts_assets/picons-thin/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>style/cms/css/main.css?version=3.1" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>
  </head>
    <body class="auth-wrapper login" style="background: url('<?php echo base_url();?>uploads/bglogin.jpg');background-size: cover;background-repeat: no-repeat;">
  <script type="text/javascript">var baseurl = '<?php echo base_url();?>';</script>
      <div class="auth-box-w register" style="margin-bottom:2rem;">
        <div class="logo-wy">
          <a href="<?php echo base_url();?>"><img alt="" src="<?php echo base_url();?>uploads/logo-color.png" width="50%"></a>
        </div>
    <div class="content-i">
    <div class="content-box" style="padding-bottom:0px">
     <div class="tab-content">
    <div class="os-tabs-w">
      <div class="os-tabs-controls">
        <ul class="nav nav-tabs upper centered">
        <li class="nav-item">
          <a class="nav-link active" style="" data-toggle="tab" href="#teachers"><i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teacher');?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#students"><i class="picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('student');?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#parents"><i class="picons-thin-icon-thin-0703_users_profile_group_two"></i><span><?php echo get_phrase('parent');?></span></a>
        </li>
        </ul>
      </div>
      </div>
     <div class="tab-pane active" id="teachers">
     <div class="col-lg-12">
    <div class="element-wrapper">
    <?php echo form_open(base_url() . 'register/create_account/teacher/' , array('enctype' => 'multipart/form-data'));?>
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
                 <input class="form-control" placeholder="<?php echo get_phrase('username');?>" required=""  id="username" name="username" type="text">
               </div>
               <small><span id="result2"></span></small>
              </div>
            </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('email');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
               </div>
              <input class="form-control" placeholder="user@school.edu" name="email" required=""e type="email">
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
              <input class="form-control" placeholder="<?php echo get_phrase('phone');?>" required="" name="phone" type="number">
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
       <div class="buttons-w">
            <input class="btn btn-rounded btn-primary" type="submit" value="<?php echo get_phrase('create_account');?>">
          </div>
          <?php echo form_close();?>
          </div>
    </div></div>
    
    <div class="tab-pane" id="students">
    <div class="col-lg-12">
    <div class="element-wrapper">
        <?php echo form_open(base_url() . 'register/create_account/student/' , array('enctype' => 'multipart/form-data'));?>
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
                 <input class="form-control" placeholder="<?php echo get_phrase('username');?>" id="user2" name="username" type="text">
               </div>
               <small><span id="result4"></span></small>
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
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
               </div>
              <select class="form-control" name="class_id" onchange="get_sections(this.value);">
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
              <select class="form-control" id="section_holder" name="section_id">
                  <option value=""><?php echo get_phrase('select');?></option>
              </select>
              </div>
            </div>
           </div>
           <div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('roll');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0714_identity_card_photo_user_profile"></i>
               </div>
              <input class="form-control" placeholder="<?php echo get_phrase('roll');?>" name="roll" type="text" required="">
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
              <select class="form-control" name="parent_id" required="">
              <option value=""><?php echo get_phrase('select');?></option> 
              <?php $parents = $this->db->get('parent')->result_array();
                foreach($parents as $row):
              ?>
                <option value="<?php echo $row['parent_id'];?>"><?php echo $row['name'];?></option>
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
            <div class="buttons-w">
              <input class="btn btn-rounded btn-primary" type="submit" value="<?php echo get_phrase('create_account');?>">
            </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
    
    <div class="tab-pane" id="parents">
    <div class="col-lg-12">
    <div class="element-wrapper">
    <?php echo form_open(base_url() . 'register/create_account/parent/' , array('enctype' => 'multipart/form-data'));?>
           <div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
              <div class="col-sm-9">
              <div class="input-group">
               <div class="input-group-addon">
                  <i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
                 </div>
               <input class="form-control" placeholder="<?php echo get_phrase('name');?>" required name="name" type="text">
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
              <input class="form-control" placeholder="<?php echo get_phrase('phone');?>" name="phone" type="phone">
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
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('profession');?></label>
            <div class="col-sm-9">
               <div class="input-group">
               <div class="input-group-addon">
               <i class="picons-thin-icon-thin-0379_business_suitcase"></i>
               </div>
              <input class="form-control" placeholder="<?php echo get_phrase('profession');?>" name="profession" type="text">
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
              <input class="form-control" placeholder="<?php echo get_phrase('password');?>" name="password" required="" type="password">
              </div>
            </div>
           </div>
          <div class="buttons-w">
            <input class="btn btn-rounded btn-primary" type="submit" value="<?php echo get_phrase('create_account');?>">
          </div>
          <?php echo form_close();?>
      </div>
    </div>
    </div>
    </div>
      </div>
    </div>
    </div>

    <script type="text/javascript">
       function get_sections(class_id) 
   {
      $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_holder').html(response);
            }
        });
   }
    </script>
    <script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/neon-login.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url();?>style/cms/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/moment/moment.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/dropzone/dist/dropzone.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/bootstrap/js/dist/util.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="<?php echo base_url();?>style/cms/js/main.js?version=3.2.1"></script>
    <script src="<?php echo base_url();?>style/cms/js/toastr.js"></script>
    <script src="<?php echo base_url();?>style/cms/bower_components/dragula.js/dist/dragula.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>style/cms/js/toastr.js"></script>
    <?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
  toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>

<script type="text/javascript">
  toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>

<?php endif;?>
<script type="text/javascript">
$(document).ready(function(){         
      var query;          
      $("#username").keyup(function(e){
             query = $("#username").val();
             $("#result2").queue(function(n) {                     
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
                                    $("#result2").html(texto);
                                    $('input[type="submit"]').attr('disabled','disabled');
                                }
                                else { 
                                    texto = ""; 
                                    $("#result2").html(texto);
                                    $('input[type="submit"]').removeAttr('disabled');
                                }
                                n();
                              }
                  });                           
             });                       
      });                       
});
</script>
<script type="text/javascript">
$(document).ready(function(){         
      var query;          
      $("#user2").keyup(function(e){
             query = $("#user2").val();
             $("#result4").queue(function(n) 
             {                     
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
                                    $("#result4").html(texto);
                                    $('input[type="submit"]').attr('disabled','disabled');
                                }
                                else { 
                                    texto = ""; 
                                    $("#result4").html(texto);
                                    $('input[type="submit"]').removeAttr('disabled');
                                }
                                n();
                              }
                  });                           
             });                       
      });                       
});
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
                                    $('input[type="submit"]').attr('disabled','disabled');
                                }
                                else { 
                                    texto = ""; 
                                    $("#result5").html(texto);
                                    $('input[type="submit"]').removeAttr('disabled');
                                }
                                n();
                              }
                  });                           
             });                       
      });                       
});
</script>

  </body>
</html>