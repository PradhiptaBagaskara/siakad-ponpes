<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>teacher/examroom/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('exam_details');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>teacher/exam_questions/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0067_line_thumb_view"></i><span><?php echo get_phrase('questions');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>teacher/exam_results/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0100_to_do_list_reminder_done"></i><span><?php echo get_phrase('results');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>teacher/exam_edit/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('edit');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
	  <?php $exam = $this->db->get_where('exams', array('exam_code' => $exam_code))->result_array();
	  foreach($exam as $row):
	  ?>
  <div class="content-i">
    <div class="content-box">
	<div class="back hidden-sm-down" style="margin-top:-20px;margin-bottom:10px">		
	<a href="<?php echo base_url();?>teacher/online_exams/"><i class="os-icon os-icon-common-07"></i></a>	
</div>
	<div class="row">	
	<div class="col-sm-8">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo $row['title'];?>
			</h5>
		  </div>
			<p>
			 <?php echo $row['description'];?>
			</p>
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
				  <?php echo get_phrase('start_date');?>:
				</th>
				<td>
				  <?php echo $row['availablefrom'];?> - <?php echo $row['clock_start'];?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('end_date');?>: 
				</th>
				<td>
				 <?php echo $row['availableto'];?> - <?php echo $row['clock_end'];?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('average_required');?>:
				</th>
				<td>
				  <a class="btn btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row['pass'];?>%</a>
				</td>
			  </tr>
			  <tr>
				<th>
				<?php echo get_phrase('total_questions');?>:
				</th>
				<td>
				  <a class="btn btn-rounded btn-sm btn-secondary" style="color:white"><?php echo $row['questions'];?></a>
				</td>
			  </tr>
			  <tr>
				<th>
				<?php echo get_phrase('exam_duration');?>:
				</th>
				<td>
				  <a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['duration'];?> mins.</a>
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
<?php endforeach;?>
</div>