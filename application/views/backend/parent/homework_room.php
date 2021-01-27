<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php 
    $encode_data = base64_decode($homework_code);
    $data = explode("-", $encode_data);
    $homework = $data[0];
    $student = $data[1];
?>
<?php 
    $current_homework = $this->db->get_where('homework' , array('homework_code' => $homework))->result_array();
    foreach ($current_homework as $row):
?>
<?php $query = $this->db->get_where('deliveries', array('homework_code' => $homework, 'student_id' => $student));?>
<div class="content-w">
	 <ul class="breadcrumb hidden-xs-down hidden-sm-down">
	<div class="back hidden-sm-down">		
	<a href="<?php echo base_url();?>parents/homework/"><i class="os-icon os-icon-common-07"></i></a>	
</div></ul> 
  <div class="content-i">
    <div class="content-box">
	<div class="row">
	
	<div class="col-sm-8">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo $row['title'];?>
			</h5>
			<div class="pipeline-header-numbers">
			  <div class="pipeline-count">
				<i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i> <?php echo $row['date_end'];?> <br>
				<i class="os-icon picons-thin-icon-thin-0025_alarm_clock_ringer_time_morning"></i> <?php echo $row['time_end'];?>
			  </div>
			</div>
		  </div>
			<p>
			 <?php echo $row['description'];?>
			</p>
			<?php if($row['file_name'] != ""):?>
			<div class="b-t padded-v-big">
				<?php echo get_phrase('file');?>: <a class="btn btn-rounded btn-sm btn-primary" href="<?php echo base_url() . 'uploads/homework/' . $row['file_name']; ?>" style="color:white"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <?php echo $row['file_name'];?></a>
			</div>
			<?php endif;?>

			<?php if($query->num_rows() > 0):?>
				<div class="alert alert-success" role="alert"><strong><?php echo $this->db->get_where('student', array('student_id' => $student))->row()->name;?>. </strong><?php echo get_phrase('delivered_homework');?>.</div>
			<?php else:?>
				<div class="alert alert-danger" role="alert"><strong><?php echo $this->db->get_where('student', array('student_id' => $student))->row()->name;?>. </strong> <?php echo get_phrase('no_delivered');?>.</div>
			<?php endif;?>
		</div>
		</div>
	
	<div class="col-sm-4">
		<div class="pipeline white lined-secondary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo get_phrase('information');?>
			</h5>
		  </div>
		  <div class="table-responsive">
		  <table class="table table-lightbor table-lightfont">
			  <tr>
				<th>
				  <?php echo get_phrase('subject');?>:
				</th>
				<td>
				  <?php echo $this->crud_model->get_type_name_by_id('subject',$row['subject_id']);?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('class');?>:
				</th>
				<td>
				 <?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('section');?>:
				</th>
				<td>
				  <?php echo $this->crud_model->get_type_name_by_id('section',$row['section_id']);?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('limit_date');?>:
				</th>
				<td>
				  <?php echo get_phrase('allowed_deliveries');?> <a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date_end'];?> <?php echo $row['time_end'];?></a>.
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('status');?>:
				</th>
				<td>
				 	<?php if($query->num_rows() <= 0):?>
				  		<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('no_delivered');?></a>
					<?php endif;?>
					<?php if($query->num_rows() > 0):?>
				  		<a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo get_phrase('submitted_for_review');?></a>
					<?php endif;?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('mark');?>:
				</th>
				<td>
				<?php if($query->num_rows() <= 0):?>
				  <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('unrated');?></a>
				<?php endif;?>
				<?php if($query->num_rows() > 0):?>
				  <a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('deliveries', array('homework_code' => $homework_code, 'student_id' => $student))->row()->mark;?></a>
				<?php endif;?>
				</td>
			  </tr>
			   <tr>
				<th>
				  <?php echo get_phrase('teacher_comment');?>:
				</th>
				<td>
				<?php if($query->num_rows() > 0):?>
				  <?php echo $this->db->get_where('deliveries', array('homework_code' => $homework_code, 'student_id' => $student))->row()->teacher_comment;?>
				<?php endif;?>
				</td>
			  </tr>
		  </table>
		</div>
		</div>
		<div class="pipeline white lined-warning">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo get_phrase('students');?>
			</h5>
		  </div>
		  <div class="users-list-w">
		   <?php $students   =   $this->db->get_where('enroll' , array('class_id' => $row['class_id'], 'section_id' => $row['section_id'] , 'year' => $running_year))->result_array();
                foreach($students as $row2):?>
			  <div class="user-w">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row2['student_id']); ?>">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          <?php echo $this->db->get_where('student' , array('student_id' => $row2['student_id']))->row()->name; ?>
                        </h6>
                        <div class="user-role">
                          <?php echo get_phrase('roll');?>: <strong><?php echo $this->db->get_where('enroll' , array('student_id' => $row2['student_id']))->row()->roll; ?></strong>
                        </div>
                      </div>
                    </div>
			<?php endforeach;?>
		  </div>
		</div>
	</div>
</div>
</div></div>
</div>
<?php endforeach;?>