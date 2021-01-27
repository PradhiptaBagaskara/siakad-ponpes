<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>

<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/homeworkroom/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework_details');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/homework_details/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0100_to_do_list_reminder_done"></i><span><?php echo get_phrase('deliveries');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/homework_edit/<?php echo $homework_code;?>/"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('edit');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
	  <?php $current_homework = $this->db->get_where('homework' , array('homework_code' => $homework_code))->result_array();
	foreach ($current_homework as $row):
?>
  <div class="content-i">
    <div class="content-box">
	<div class="back hidden-sm-down" style="margin-top:-20px;margin-bottom:10px">		
	<a href="<?php echo base_url();?>admin/homework/"><i class="os-icon os-icon-common-07"></i></a>	
	</div>	
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
			<div class="b-t padded-v-big">
			<?php echo get_phrase('delivery_date');?>: <a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date_end'];?></a> </td>
			</div>
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
				  <?php echo get_phrase('total_students');?>:
				</th>
				<td>
				  <a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); echo $this->db->count_all_results('enroll');?></a>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('delivered');?>:
				</th>
				<td>
				  <a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $this->db->where('homework_code', $homework_code); echo $this->db->count_all_results('deliveries');?></a>
				</td>
			  </tr>
			  <tr>
				<th>
				 <?php echo get_phrase('undeliverable');?>:
				</th>
				<td>
					<?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $all = $this->db->count_all_results('enroll');?>
					<?php $this->db->where('class_id', $row['class_id']); $this->db->where('section_id', $row['section_id']); $this->db->where('homework_code', $homework_code); $deliveries = $this->db->count_all_results('deliveries');?>

				  <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $all - $deliveries; ?></a>
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