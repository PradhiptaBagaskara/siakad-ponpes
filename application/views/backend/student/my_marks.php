<?php $min = $this->db->get_where('academic_settings' , array('type' =>'minium_mark'))->row()->description;?>
<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>student/my_marks/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('marks');?></span></a>
            </li>
          </ul>
        </div>
      </div>
	 
	 <div class="content-i">
    <div class="content-box">
			<div class="row">	
							<div class="col-sm-12">	
				<?php 
					$student_info =   $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id') , 'year' => $running_year))->result_array(); 
    				foreach($student_info as $row): ?>
					<div class="pipeline white lined-secondary shadow">
		  				<div class="pipeline-header">
							<h5 class="pipeline-name"><?php echo get_phrase('information');?></h5>
		  				</div>
		 				<div class="pipeline-item">
		  					<div class="pi-foot">
								<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>uploads/logo.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;?></span></a>
		  					</div>
		  						<div class="pi-body bglogo">
									<div class="avatar">
			  							<img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>">
									</div>
									<div class="pi-info">
			  							<div class="h6 pi-name">
											<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?><br>
											<small><?php echo get_phrase('roll');?>: <?php echo $this->db->get_where('enroll' , array('student_id' => $row['student_id']))->row()->roll;?></small>
			  							</div>
			  							<div class="pi-sub">
											<?php echo get_phrase('class');?>: <?php echo $this->crud_model->get_class_name($row['class_id']); ?><br>
        									<?php echo get_phrase('section');?>: <?php echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name; ?>
			  							</div>
									</div>
		  						</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
				<?php 
    				$student_info = $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id') , 'year' => $running_year))->result_array();
    				$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
    				foreach ($student_info as $row1):
    				foreach ($exams as $row2):
				?>
				<div class="col-sm-12">
					<div class="element-box lined-primary shadow">
    					<h5 class="form-header"><?php echo get_phrase('your_marks');?><br>
	  						<small><?php echo $row2['name'];?></small>
    					</h5>
    					<div class="table-responsive">
      						<table class="table table-lightborder">
        						<thead>
          							<tr>
            							<th><?php echo get_phrase('subject');?></th>
										<th><?php echo get_phrase('teacher');?></th>
										<th><?php echo get_phrase('mark');?></th>
                    <th><?php echo get_phrase('grade');?></th>
										<th><?php echo get_phrase('comment');?></th>
										<th><?php echo get_phrase('view_all');?></th>
          							</tr>
        						</thead>
        						<tbody>
        							<?php 
                            			$subjects = $this->db->get_where('subject' , array('class_id' => $row1['class_id'] , 'year' => $running_year))->result_array();
                            			foreach ($subjects as $row3): 
                                 		$obtained_mark_query = $this->db->get_where('mark' , array(
                                    	'subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'],'class_id' => $row1['class_id'], 'student_id' => $this->session->userdata('login_user_id'),'year' => $running_year));

                             			if($obtained_mark_query->num_rows() > 0) 
                                		{
                                    		$marks = $obtained_mark_query->result_array();
                                		}
	                                    foreach ($marks as $row4):
                            		?>
          							<tr>
            							<td><?php echo $row3['name'];?></td>
            							<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher',$row3['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->crud_model->get_type_name_by_id('teacher', $row3['teacher_id']); ?></td>
										<td><?php $mark = $this->db->get_where('mark' , array('subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'], 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->labtotal;?>
            <?php if($mark < $min || $mark == 0):?>
              <a class="btn btn-rounded btn-sm btn-danger" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'], 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->labtotal == 0) echo '0'; else echo $mark;?></a>
              <?php endif;?>
              <?php if($mark >= $min):?>
                <a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php echo $this->db->get_where('mark' , array('subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'], 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->labtotal;?></a>
              <?php endif;?></td>
              <td><?php echo $grade = $this->crud_model->get_grade($this->db->get_where('mark' , array('subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'], 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->labtotal);?></td>
              							<td><?php echo $this->db->get_where('mark' , array('subject_id' => $row3['subject_id'], 'exam_id' => $row2['exam_id'], 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->comment; ?></td>
										<?php $data = base64_encode($row2['exam_id']."-".$this->session->userdata('login_user_id')."-".$row3['subject_id']); ?>
            <td><a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>student/subject_marks/<?php echo $data;?>"><?php echo get_phrase('view_all');?></a></td>
          							</tr>
          							<?php endforeach; endforeach;?>
        						</tbody>	
      						</table>
    					</div>
  					</div>
				</div>	
				<?php endforeach; endforeach; ?>
			</div>
		</div>
	</div>
</div>