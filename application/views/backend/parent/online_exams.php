<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>parents/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>parents/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>parents/study_material/"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('study_material');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>parents/syllabus/"><i class="os-icon picons-thin-icon-thin-0008_book_reading_read_manual"></i><span><?php echo get_phrase('syllabus');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
	<div class="content-i">
	 <div class="content-box">
	<div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
			  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                   foreach ($children_of_parent as $row):
                    ?>
                    <li class="nav-item">
                    	<?php $active = $n++;?>
				  		<a class="nav-link <?php if($active == 1) echo 'active';?>" data-toggle="tab" href="#<?php echo $row['username'];?>"><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 25px;margin-right:5px;"> <?php echo $row['name'];?></a>
					</li>
                <?php endforeach; ?>
			  </ul>
			</div>
		  </div>
      	  <div class="tab-content">
      	  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                foreach ($children_of_parent as $row2):
            ?>
        	<?php $active = $n++;?>
	 		<div class="tab-pane <?php if($active == 1) echo 'active';?>" id="<?php echo $row2['username'];?>">
				<div class="col-lg-12">
					<div class="element-wrapper">
						<div class="element-box lined-primary shadow">
							<h5 class="form-header"><?php echo get_phrase('online_exams');?>: <?php echo $row2['name'];?></h5><br>
		  						<div class="table-responsive">
									<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
										<thead>
											<tr>
												<th><?php echo get_phrase('title');?></th>
												<th><?php echo get_phrase('subject');?></th>
												<th><?php echo get_phrase('start_date');?></th>
												<th><?php echo get_phrase('end_date');?></th>
												<th><?php echo get_phrase('results');?></th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$count    = 1;
												$class_id = $this->db->get_where('enroll' , array('student_id' => $row2['student_id'] , 'year' => $running_year))->row()->class_id;
												$exams = $this->db->get_where('exams' , array('class_id' => $class_id)); 
												$exam = $exams->result_array();
												foreach ($exam as $row):
												$this->db->where('exam_code', $row['exam_code']);
								        		$exam_ques = $this->db->get('questions');       
								        		$query = $exam_ques->num_rows();
											?>
											<?php $dbstart = $row['availablefrom'].' '.$row['clock_start'];?>
											<?php $dbend = $row['availableto'].' '.$row['clock_end'];?>
												<tr>
													<td><?php echo $row['title'];?></td>
													<td><?php echo $this->db->get_where('subject' , array('subject_id'=> $row['subject_id']))->row()->name; ?></td>
													<td><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['availablefrom'];?> <?php echo $row['clock_start'];?></a></td>
													<td><a class="btn btn-rounded btn-sm btn-danger" style="color:white"><?php echo $row['availableto'];?> <?php echo $row['clock_end'];?></a></td>
													<td>
													<?php if($this->db->get_where('student_question',array('exam_code'=>$row['exam_code'],'student_id' => $row2['student_id']))->row()->answered == 'answered'):?>
														<?php $data = $row['exam_code']."-".$row2['student_id'];
															$encode_data = base64_encode($data);
														?>
															<a class="btn btn-rounded btn-sm btn-primary" href="<?php echo base_url();?>parents/exam_results/<?php echo $encode_data;?>" style="color:white"><?php echo get_phrase('view_results');?></a>
														<?php else: ?>
															<?php echo get_phrase('no_data');?>
														<?php endif;?>
													</td>
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
		  						</div>
							</div>
	  					</div>
					</div>
				</div>  
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>