<?php 
$post_data = base64_decode($infouser);
$explodeinfo = explode("-", $post_data);
// var_dump($this->session->userdata());
// echo $this->session->userdata();
// echo $infouser;

$usertype = $explodeinfo[0];
$user_id  = $explodeinfo[1];
?>
<div class="full-chat-middle">
  <div class="chat-head">
		<div class="row">
		  <div class="col-sm-12">
      <?php echo form_open(base_url() . 'admin/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>
					<select class="form-control rounded" name="reciever" required>
						<option value=""><?php echo get_phrase('receiver');?></option>
             <optgroup label="<?php echo get_phrase('admins');?>">
                <?php
                $admins = $this->db->get('admin')->result_array();
                foreach ($admins as $row):
                    ?>
                    <?php if($this->session->userdata('login_user_id') != $row['admin_id']):?>
                      <option value="admin-<?php echo $row['admin_id']; ?>" <?php if($usertype == 'admin' && $user_id == $row['admin_id']) echo 'selected';?>>
                        <?php echo $row['name']; ?></option>
                    <?php endif;?>
                <?php endforeach; ?>
            </optgroup>
            <optgroup label="<?php echo get_phrase('teachers');?>">
                <?php
                $teachers = $this->db->get('teacher')->result_array();
                foreach ($teachers as $row):
                    ?>
                    <option value="teacher-<?php echo $row['teacher_id']; ?>" <?php if($usertype == 'teacher' && $user_id == $row['teacher_id']) echo 'selected';?>>
                        <?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </optgroup>
            <optgroup label="<?php echo get_phrase('parents');?>">
                <?php
                $parents = $this->db->get('parent')->result_array();
                foreach ($parents as $row):
                    ?>
                    <option value="parent-<?php echo $row['parent_id']; ?>" <?php if($usertype == 'parent' && $user_id == $row['parent_id']) echo 'selected';?>>
                        <?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </optgroup>
						<optgroup label="<?php echo get_phrase('students');?>">
                <?php
                $students = $this->db->get('student')->result_array();
                foreach ($students as $row):
                    ?>
                    <option value="student-<?php echo $row['student_id']; ?>" <?php if($usertype == 'student' && $user_id == $row['student_id']) echo 'selected';?>>
                         <?php echo $row['name']; ?></option>
                <?php endforeach; ?>
            </optgroup>
		</select>
      </div>
		</div>
  </div>
  <div class="chat-content-w">
      <div class="chat-content">
      </div>
  </div>
  <div class="chat-controls b-b">
    <div class="chat-input">
      <input placeholder="<?php echo get_phrase('write_message');?>..." type="text" name="message" required="">
    </div>
    <div class="chat-input-extra">
	   <div class="chat-extra-actions">
		   <input type="file" name="file_name" id="file-3" class="inputfile inputfile-3" style="display:none"/>
		<label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('send_file');?>...</span></label>
		</div>
		<div class="chat-btn">
		  <button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('send');?></button>
		</div>
	  </div>
  </div>
  <?php echo form_close();?>
</div>