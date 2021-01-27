<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>student/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/forum/"><i class="os-icon picons-thin-icon-thin-0281_chat_message_discussion_bubble_reply_conversation"></i><span><?php echo get_phrase('forum');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/study_material/"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('study_material');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/syllabus/"><i class="os-icon picons-thin-icon-thin-0008_book_reading_read_manual"></i><span><?php echo get_phrase('syllabus');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
	<div class="content-i">
	<div class="content-box">
	<div class="col-lg-12">
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('online_exams');?></h5><br>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('title');?></th>
					<th><?php echo get_phrase('subject');?></th>
					<th><?php echo get_phrase('teacher');?></th>
					<th><?php echo get_phrase('start_date');?></th>
					<th><?php echo get_phrase('limit_date');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$count    = 1;
				$class_id = $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id') , 'year' => $running_year))->row()->class_id;
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
					<td><?php if($row['type'] == "admin"):?><?php echo $this->db->get_where('admin' , array('admin_id'=> $row['teacher_id']))->row()->name; ?><?php endif;?><?php if($row['type'] == "teacher"):?><?php echo $this->db->get_where('teacher' , array('teacher_id'=> $row['teacher_id']))->row()->name; ?><?php endif;?></td>
					<td><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['availablefrom'];?> <?php echo $row['clock_start'];?></a></td>
					<td><a class="btn btn-rounded btn-sm btn-danger" style="color:white"><?php echo $row['availableto'];?> <?php echo $row['clock_end'];?></a></td>
					<td class="text-center">
					<?php 
						$examstat = $this->db->get_where('student_question',array('exam_code'=>$row['exam_code'],'student_id'=>$this->session->userdata('login_user_id')))->row();
					?>
					<?php if(date('m/d/Y H:i') < $dbstart && $examstat && $examstat->answered != 'answered'):?>
						<a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('no_start');?></a>
					<?php endif;?>
					<?php if(date('m/d/Y H:i') >= $dbend &&  $examstat && $examstat->answered != 'answered'):?>
						<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('exam_finish');?></a>
					<?php endif;?>
					<?php if($examstat && $examstat->answered != 'answered' && $query > 0 && date('m/d/Y H:i') >= $dbstart && date('m/d/Y H:i') < $dbend):?><a class="btn btn-rounded btn-sm btn-success" href="<?php echo base_url();?>student/examroom/<?php echo $row['exam_code'];?>"><?php echo get_phrase('take_exam');?></a>
					<?php endif;?>
					<?php if($query <= 0 && date('m/d/Y H:i') < $dbend && date('m/d/Y H:i') >= $dbstart):?>
						<a class="btn nc btn-rounded btn-sm btn-info" style="color:white"><?php echo get_phrase('no_questions');?></a>
					<?php endif;?>
					<?php if($examstat && $examstat->answered == 'answered'):?>
						<a class="btn btn-rounded btn-sm btn-primary" href="<?php echo base_url();?>student/exam_results/<?php echo $row['exam_code'];?>" style="color:white"><?php echo get_phrase('view_results');?></a>
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
</div>
</div>