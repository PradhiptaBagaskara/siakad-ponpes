<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/attendance/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/teacher_attendance/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/teacher_attendance_report/"><i class="os-icon picons-thin-icon-thin-0386_graph_line_chart_statistics"></i><span><?php echo get_phrase('teacher_attendance_report');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<?php echo form_open(base_url() . 'admin/attendance_selector/', array('class' => 'form m-b'));?>
	  <div class="row">
		<div class="col-sm-4">
		  <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('class');?>:</label> 
		  	<select name="class_id" class="form-control" required="" onchange="select_section(this.value)">
				<option value=""><?php echo get_phrase('select');?></option>
				<?php
					$classes = $this->db->get('class')->result_array();
					foreach($classes as $row):                        
				?>                
				<option value="<?php echo $row['class_id'];?>"
					><?php echo $row['name'];?></option>            
				<?php endforeach;?>
			</select>
		  </div>
		</div>
		<div class="col-sm-3">
		  <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('section');?>:</label> 
		  	<select class="form-control" name="section_id" required id="section_holder">
            	<option value=""><?php echo get_phrase('select');?></option>
			</select>
		  </div>
		</div>
		<div class="col-sm-3">
		  <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('date');?>:</label> 
		  <input class="single-daterange form-control" placeholder="Date" required="" name="timestamp" type="text" value=""> </div>
		</div>
		<div class="col-sm-2">
		  <div class="form-group"> <button class="btn btn-rounded btn-primary btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('view');?></span></button></div>
		</div>
	  </div>
	  <input type="hidden" name="year" value="<?php echo $running_year;?>">
	<?php echo form_close();?>
  </div>
</div>
</div>


<script type="text/javascript">
    function select_section(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_sectionss/' + class_id,
            success:function (response)
            {
                jQuery('#section_holder').html(response);
            }
        });
    }
</script>