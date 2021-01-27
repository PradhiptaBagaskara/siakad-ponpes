<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
		<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></i><span><?php echo get_phrase('students_area');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>

 <div class="content-i">	
	<div class="content-box">
	  <?php echo form_open(base_url() . 'teacher/students_area/', array('class' => 'form m-b'));?>
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
		<div class="row">
		<?php $students = $this->db->get_where('enroll' , array('class_id' => $id , 'year' => $running_year))->result_array();
               foreach($students as $row):?>
		<div class="col-sm-4 m-b">
		<div class="pipeline-item">
		  <div class="pi-foot">
			<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>style/cms/img/school1.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;?></span></a>
		  </div>
		  <div class="pi-controls">
			<div class="pi-settings os-dropdown-trigger">
			  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
			  <div class="os-dropdown">
				<div class="icon-w">
				  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
				</div>
				<ul>
				  <li>
					<a href="<?php echo base_url();?>teacher/view_marks/<?php echo $row['student_id'];?>"><i class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></i><span><?php echo get_phrase('marks');?></span></a>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		  <div class="pi-body">
			<div class="avatar">
			  <img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>">
			</div>
			<div class="pi-info">
			  <div class="h6 pi-name"><?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?><br>
				<small><?php echo get_phrase('roll');?>: <?php echo $this->db->get_where('enroll' , array('student_id' => $row['student_id']))->row()->roll;?></small>
			  </div>
			  <div class="pi-sub">
				<?php echo $this->db->get_where('class' , array('class_id' => $id))->row()->name;?><br>
				<?php echo get_phrase('section');?>: <?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;?>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	<?php endforeach;?>
	</div></div>
	  <?php $query = $this->db->get_where('section' , array('class_id' => $id));
           if ($query->num_rows() > 0):
           $sections = $query->result_array();
        foreach ($sections as $row): ?>
	<div class="tab-pane" id="tab<?php echo $row['section_id'];?>">
	<div class="row">
		<?php $students = $this->db->get_where('enroll' , array('class_id'=> $id , 'section_id' => $row['section_id'] , 'year' => $running_year))->result_array();
                foreach($students as $row2):?>
		<div class="col-sm-4 m-b">
		<div class="pipeline-item">
		  <div class="pi-foot">
			<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>style/cms/img/school1.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;?></span></a>
		  </div>
		  <div class="pi-controls">
			<div class="pi-settings os-dropdown-trigger">
			  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
			  <div class="os-dropdown">
				<div class="icon-w">
				  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
				</div>
				<ul>
				  <li>
					<a href="<?php echo base_url();?>teacher/view_marks/<?php echo $row2['student_id'];?>"><i class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></i><span><?php echo get_phrase('marks');?></span></a>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		  <div class="pi-body">
			<div class="avatar">
			  <img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row2['student_id']);?>">
			</div>
			<div class="pi-info">
			  <div class="h6 pi-name"><?php echo $this->db->get_where('student' , array('student_id' => $row2['student_id']))->row()->name;?><br>
				<small><?php echo get_phrase('roll');?>: <?php echo $this->db->get_where('enroll' , array('student_id' => $row2['student_id']))->row()->roll;?></small>
			  </div>
			  <div class="pi-sub">
				<?php echo $this->db->get_where('class' , array('class_id' => $id))->row()->name;?><br>
				<?php echo get_phrase('section');?>: <?php echo $this->db->get_where('section' , array('section_id' => $row2['section_id']))->row()->name;?>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	<?php endforeach;?>
	</div>
	</div>
	 <?php endforeach;?>
        <?php endif;?>
	
	</div>
  </div>
</div>
</div>