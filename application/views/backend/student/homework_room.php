<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php 
    $current_homework = $this->db->get_where('homework' , array('homework_code' => $homework_code))->result_array();
    foreach ($current_homework as $row):
?>
<?php $query = $this->db->get_where('deliveries', array('homework_code' => $homework_code, 'student_id' => $this->session->userdata('login_user_id')));?>
<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="#"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework_details');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
  <div class="content-i">
    <div class="content-box">
	<div class="back hidden-sm-down" style="margin-top:-20px;margin-bottom:10px">		
	<a href="<?php echo base_url();?>student/homework/"><i class="os-icon os-icon-common-07"></i></a>	
	</div>
	<div class="row">
	<div class="col-sm-8">
		<div class="pipeline white lined-primary shadow">
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
			<?php if($row['type'] != 1 && $query->num_rows() <= 0):?>
			<div class="b-t padded-v-big">
			<?php echo form_open(base_url() . 'student/delivery/file/'.$homework_code , array('enctype' => 'multipart/form-data'));?>
				<input class="form-control" name="file_name" type="file" required="">
				<input type="hidden" name="class_id" value="<?php echo $row['class_id'];?>">
				<input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
			  <input type="hidden" name="subject_id" value="<?php echo $row['subject_id'];?>">
			  <div class="row m-t">
			  <div class="col-sm-9">
			  <div class="form-group">
				  <textarea class="form-control" placeholder="<?php echo get_phrase('send_teacher_comment');?>" name="comment" rows="1"></textarea>
				</div></div>
				<div class="col-sm-3">
				<div class="form-buttons">
				<button class="btn btn-primary" type="submit"><?php echo get_phrase('send');?></button>
			  </div>
			  </div>
			  </div>
			  <?php echo form_close();?>
			</div>
			<?php endif;?>

			<?php if($row['type'] == 1 && $query->num_rows() <= 0):?>
			<div class="alert alert-info" role="alert"><?php echo get_phrase('no_required');?></div>
			<?php echo form_open(base_url() . 'student/delivery/text/'.$homework_code);?>
			<div class="b-t padded-v-big">
			  <textarea cols="80" id="ckeditor1" required="" name="reply" rows="10"></textarea>
			  <input type="hidden" name="class_id" value="<?php echo $row['class_id'];?>">
			  <input type="hidden" name="section_id" value="<?php echo $row['section_id'];?>">
			  <input type="hidden" name="subject_id" value="<?php echo $row['subject_id'];?>">
			  <div class="row m-t">
			  <div class="col-sm-9">
			  <div class="form-group">
				  <textarea class="form-control" placeholder="<?php echo get_phrase('send_teacher_comment');?>" name="comment" rows="1"></textarea>
				</div></div>
				<div class="col-sm-3">
				<div class="form-buttons text-right">
				<button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('send');?></button>
			  </div>
			  </div>
			  </div>
			</div>
			<?php echo form_close();?>
			<?php endif;?>
			<?php if($query->num_rows() > 0):?>
				<div class="alert alert-success" role="alert"><strong><?php echo get_phrase('success');?>. </strong><?php echo get_phrase('success_delivery');?>.</div>
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
				  <a class="btn btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('unrated');?></a>
				<?php endif;?>
				<?php if($query->num_rows() > 0):?>
				  <a class="btn btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('deliveries', array('homework_code' => $homework_code, 'student_id' => $this->session->userdata('login_user_id')))->row()->mark;?></a>
				<?php endif;?>
				</td>
			  </tr>
			   <tr>
				<th>
				  <?php echo get_phrase('teacher_comment');?>:
				</th>
				<td>
				<?php if($query->num_rows() > 0):?>
				  <?php echo $this->db->get_where('deliveries', array('homework_code' => $homework_code, 'student_id' => $this->session->userdata('login_user_id')))->row()->teacher_comment;?>
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