<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
		<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></i> <span><?php echo get_phrase('students_area');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>

 <div class="content-i">	
	<div class="content-box">
	  <?php echo form_open(base_url() . 'admin/students/', array('class' => 'form m-b'));?>
			  <div class="row">
				<div class="col-sm-4">
				  <div class="form-group">
					<label class="gi" for=""><?php echo get_phrase('class');?>:</label>
					<select class="form-control" onchange="submit();" name="class_id">
					<option value=""><?php echo get_phrase('select');?></option>
					<?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                  	?>
                     <option value="<?php echo $row['class_id'];?>" <?php if($id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
                  <?php endforeach;?>
					</select>
				  </div>
				</div>
			  </div>
	<?php echo form_close();?>
	
	<div class="os-tabs-w">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#all"><?php echo get_phrase('all');?></a>
			</li>
			<?php $query = $this->db->get_where('section' , array('class_id' => $id)); 
               if ($query->num_rows() > 0):
               $sections = $query->result_array();
               foreach ($sections as $rows):?>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#tab<?php echo $rows['section_id'];?>"><?php echo get_phrase('section');?> <?php echo $rows['name'];?></a>
			</li>
			<?php endforeach;?>
			<?php endif;?>
		  </ul>
		</div>
	  </div>
	 
	<div class="tab-content">
	<div class="tab-pane active" id="all">
        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
          <thead>
            <tr>
              <th><?php echo get_phrase('name');?></th>
              <th><?php echo get_phrase('roll');?></th>
              <th><?php echo get_phrase('class');?></th>
              <th><?php echo get_phrase('section');?></th>
              <th><?php echo get_phrase('profile');?></th>
              <th><?php echo get_phrase('options');?></th>
            </tr>
          </thead>
          <tbody>
         	<?php $students = $this->db->get_where('enroll' , array('class_id' => $id , 'year' => $running_year))->result_array();
               foreach($students as $row):?>
            <tr>
              <td><img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?></td>
              <td style="text-align: center;"><?php echo $this->db->get_where('enroll' , array('student_id' => $row['student_id']))->row()->roll;?></td>
              <td style="text-align: center;">
                <div class="pt-btn">
                  <a class="btn nc btn-secondary btn-sm btn-rounded"><font color="white"><?php echo $this->db->get_where('class' , array('class_id' => $id))->row()->name;?></font></a>
                </div>
              </td>
              <td style="text-align: center;">
                <div class="pt-btn">
                  <a class="btn nc btn-success btn-sm btn-rounded"><font color="white"><?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?></font></a>
                </div>
              </td>
              <td><a href="<?php echo base_url();?>admin/student_portal/<?php echo $row['student_id'];?>/"><button class="btn btn-primary btn-rounded btn-sm"><i class="os-icon os-icon-user-male-circle"></i> <?php echo get_phrase('profile');?></button></a></td>
              <td>
              	<a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_estudiante/<?php echo $row['student_id'];?>');" href="#"><button class="btn btn-primary btn-sm btn-rounded"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i> <?php echo get_phrase('edit');?></button></a>

                <a onClick="return confirm('<?php echo get_phrase('confirm_delete_student');?>')" href="<?php echo base_url();?>admin/delete_student/<?php echo $row['student_id'];?>/"><button class="btn btn-danger btn-sm btn-rounded"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
		</div>
	  <?php $query = $this->db->get_where('section' , array('class_id' => $id));
           if ($query->num_rows() > 0):
           $sections = $query->result_array();
        foreach ($sections as $row): ?>
	<div class="tab-pane" id="tab<?php echo $row['section_id'];?>">
        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
          <thead>
            <tr>
              <th><?php echo get_phrase('name');?></th>
              <th><?php echo get_phrase('roll');?></th>
              <th><?php echo get_phrase('class');?></th>
              <th><?php echo get_phrase('section');?></th>
              <th><?php echo get_phrase('profile');?></th>
              <th><?php echo get_phrase('options');?></th>
            </tr>
          </thead>
          <tbody>
         	<?php $students = $this->db->get_where('enroll' , array('class_id'=> $id , 'section_id' => $row['section_id'] , 'year' => $running_year))->result_array();
                foreach($students as $row2):?>
            <tr>
              <td><img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row2['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student' , array('student_id' => $row2['student_id']))->row()->name;?></td>
              <td style="text-align: center;"><?php echo $this->db->get_where('enroll' , array('student_id' => $row2['student_id']))->row()->roll;?></td>
              <td style="text-align: center;">
                <div class="pt-btn">
                  <a class="btn nc btn-secondary btn-sm btn-rounded"><font color="white"><?php echo $this->db->get_where('class' , array('class_id' => $id))->row()->name;?></font></a>
                </div>
              </td>
              <td style="text-align: center;">
                <div class="pt-btn">
                  <a class="btn nc btn-success btn-sm btn-rounded"><font color="white"><?php echo $this->db->get_where('section' , array('section_id' => $row2['section_id']))->row()->name;?></font></a>
                </div>
              </td>
              <td><a href="<?php echo base_url();?>admin/student_portal/<?php echo $row2['student_id'];?>/"><button class="btn btn-primary btn-rounded btn-sm"><i class="os-icon os-icon-user-male-circle"></i> <?php echo get_phrase('profile');?></button></a></td>
              <td>
              	<a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_estudiante/<?php echo $row2['student_id'];?>');" href="#"><button class="btn btn-primary btn-sm btn-rounded"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i> <?php echo get_phrase('edit');?></button></a>

                <a onClick="return confirm('<?php echo get_phrase('confirm_delete_student');?>')" href="<?php echo base_url();?>admin/delete_student/<?php echo $row2['student_id'];?>/"><button class="btn btn-danger btn-sm btn-rounded"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
	</div>
	 <?php endforeach;?>
        <?php endif;?>
	
	</div>
  </div>
</div>
</div>