<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/examroom/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('exam_details');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/exam_questions/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0067_line_thumb_view"></i><span><?php echo get_phrase('questions');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/exam_results/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0100_to_do_list_reminder_done"></i><span><?php echo get_phrase('results');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/exam_edit/<?php echo $exam_code;?>/"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('edit');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>

  <div class="content-i">
    <div class="content-box">
	<div class="row">
		  <?php $exam = $this->db->get_where('exams', array('exam_code' => $exam_code))->result_array();
			foreach ($exam as $row): ?>	
	<div class="col-sm-8">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo get_phrase('questions');?></h5>
			<div style="margin: auto 0;text-align:right;"><button class="btn btn-primary btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button">+ <?php echo get_phrase('add');?></button></div>
		  </div>
			<div class="table-responsive">
                <table class="table table-lightborder">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('question');?></th>
					  <th class="text-center"><?php echo get_phrase('answer');?></th>
                      <th class="text-center"><?php echo get_phrase('mark');?></th>
                      <th class="text-center"><?php echo get_phrase('delete');?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $n = 1;
            		$ques = $this->db->get_where('questions', array('exam_code' => $exam_code))->result_array();
        			foreach ($ques as $row1): ?>
                    <tr>
                      	<td><?php echo $n++;?></td>
                      	<td><?php echo $row1['question'];?></td>
					  	<td class="text-center"><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row1['correctanswer'];?></a></td>
                      	<td class="text-center"><?php echo $row1['marks']; ?></td>
					  	<td class="text-center"><a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"  href="<?php echo base_url();?>admin/online_exams/delete_questions/<?php echo $row1['question_id'];?>/<?php echo $exam_code;?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a></td>
                    </tr>
                	<?php endforeach;?>
                  </tbody>
                </table>
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
				  <?php echo get_phrase('start_date');?>:
				</th>
				<td>
				  <?php echo $row['availablefrom'];?> - <?php echo $row['clock_start'];?>
				</td>
			  </tr>
			  <tr>
				<th>
				  <?php echo get_phrase('end_date');?>
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
<?php endforeach;?>

<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade bd-example-modal-lg" id="exampleModal1" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
             <?php echo get_phrase('add_question');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <?php 
                $this->db->select('question_id');
                $this->db->from('questions');
                $this->db->where('exam_id', $row['exam_id']);
                $num_results = $this->db->count_all_results();
                $total = $this->db->get_where('exams',array('exam_code'=>$exam_code))->row()->questions;
           ?>
          <?php if($num_results >= $total):?>
                        <div class="alert alert-danger"><?php echo get_phrase('limit_questions');?> <?php echo $total;?>.</div>
          <?php endif;?>
          <div class="modal-body">
            <?php echo form_open(base_url() . 'admin/online_exams/questions/' . $row['exam_code'], array('enctype' => 'multipart/form-data')); ?>

            	<input type="hidden" class="form-control" name="exam_id" value="<?php echo $row['exam_id'];?>" required>
                <input type="hidden" class="form-control" name="exam_code" value="<?php echo $row['exam_code'];?>" required>

				<div class="form-group">
				  <label> <?php echo get_phrase('question');?></label><textarea class="form-control" rows="3" required="" name="question"></textarea>
				</div>
				<div class="row">			
			  <div class="form-group col-sm-6">
				<label for=""> <?php echo get_phrase('option');?> A</label><input class="form-control" required name="optiona" type="text">
			  </div>
			  <div class="form-group col-sm-6">
				<label for=""> <?php echo get_phrase('option');?> B</label><input class="form-control" required="" name="optionb" type="text">
			  </div></div>
			  <div class="row">			
			  <div class="form-group col-sm-6">
				<label for=""> <?php echo get_phrase('option');?> C</label><input class="form-control" required="" name="optionc" type="text">
			  </div>
			  <div class="form-group col-sm-6">
				<label for=""> <?php echo get_phrase('option');?> D</label><input class="form-control" required="" name="optiond" type="text">
			  </div></div>
			  <div class="row">
			<div class="form-group col-sm-9">
				<label class="col-form-label" for=""><?php echo get_phrase('correct_answer');?></label>
				  <select class="form-control" required="" name="correctanswer">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				  </select>
			  </div>
			  <div class="form-group col-sm-3">
				<label for=""> <?php echo get_phrase('mark');?></label><input class="form-control" name="marks" type="number" required="">
			  </div>
			</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit" <?php if($num_results >= $total) echo 'disabled=""';?>> <?php echo get_phrase('add');?></button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

</div>
</div>
</div>