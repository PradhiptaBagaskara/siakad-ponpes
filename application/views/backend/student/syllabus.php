<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
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
			  <a class="nav-link active" href="<?php echo base_url();?>student/syllabus/"><i class="os-icon picons-thin-icon-thin-0008_book_reading_read_manual"></i><span><?php echo get_phrase('syllabus');?></span></a>
			</li>
		  </ul>
	  </div></div>
 <div class="content-i">
	<div class="content-box">
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('syllabus');?></h5><br>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('type');?></th>
					<th><?php echo get_phrase('title');?></th>
					<th><?php echo get_phrase('subject');?></th>
					<th><?php echo get_phrase('upload_by');?></th>
					<th><?php echo get_phrase('date');?></th>
					<th><?php echo get_phrase('download');?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$count = 1; 
				$class_id = $this->db->get_where('enroll', array('student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->class_id;
            	$syllabus = $this->db->get_where('academic_syllabus', array('class_id' => $class_id, 'year' => $running_year))->result_array();
            	foreach ($syllabus as $row):
            ?>
				<tr>
					<td><i class="picons-thin-icon-thin-0077_document_file_pdf_adobe_acrobat" style="font-size:25px"></i></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $this->db->get_where('subject', array('subject_id' => $row['subject_id']))->row()->name; ?></td>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url($row['uploader_type'], $row['uploader_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where($row['uploader_type'], array($row['uploader_type'] . '_id' => $row['uploader_id']))->row()->name; ?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date']; ?></a></td>
					<td><a class="btn btn-rounded btn-sm btn-secondary" style="color:white" href="<?php echo base_url(); ?>student/download_unit_content/<?php echo $row['academic_syllabus_code']; ?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
	</div>
  </div>