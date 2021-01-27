<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>parents/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>parents/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>parents/study_material/"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('study_material');?></span></a>
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
						<div class="element-box lined-primary">
							<h5 class="form-header"><?php echo get_phrase('study_material');?>: <?php echo $this->db->get_where('student', array('student_id' => $row2['student_id']))->row()->name;?></h5>
							  <div class="table-responsive">
									<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
										<thead>
											<tr>
												<th><?php echo get_phrase('type');?></th>
												<th><?php echo get_phrase('title');?></th>
												<th><?php echo get_phrase('description');?></th>
												<th><?php echo get_phrase('subject');?></th>
												<th><?php echo get_phrase('date');?></th>
												<th><?php echo get_phrase('download');?></th>
											</tr>
										</thead>
										<tbody>
											<?php 
        										$class_id   = $this->db->get_where('enroll', array('student_id' => $row2['student_id'], 'year' => $running_year))->row()->class_id;
        										$this->db->order_by("timestamp", "desc");
        										$study_material_info = $this->db->get_where('document', array('class_id' => $class_id))->result_array();
								        		foreach ($study_material_info as $row) { ?>   
												<tr>
													<td><?php if($row['file_type'] == 'PDF'):?>
													<i class="picons-thin-icon-thin-0077_document_file_pdf_adobe_acrobat" style="font-size:25px"></i>
													<?php endif;?>
													<?php if($row['file_type'] == 'Zip'):?>
														<i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:25px"></i>
													<?php endif;?>
													<?php if($row['file_type'] == 'RAR'):?>
														<i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:25px"></i>
													<?php endif;?>
													<?php if($row['file_type'] == 'Doc'):?>
														<i class="picons-thin-icon-thin-0078_document_file_word_office_doc_text" style="font-size:25px"></i>
													<?php endif;?>
													<?php if($row['file_type'] == 'Image'):?>
														<i class="picons-thin-icon-thin-0082_image_photo_file" style="font-size:25px"></i>
													<?php endif;?>
													<?php if($row['file_type'] == 'Other'):?>
														<i class="picons-thin-icon-thin-0111_folder_files_documents" style="font-size:25px"></i>
													<?php endif;?></td>
													<td><?php echo $row['title']?></td>
													<td><?php echo $row['description']?></td>
													<td><?php echo $this->db->get_where('subject' , array('subject_id' => $row['subject_id'] ))->row()->name;?></td>
													<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo date("d M, Y", $row['timestamp']); ?></a></td>			
													<td><a class="btn btn-rounded btn-sm btn-secondary" style="color:white" href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a></td>
												</tr>
												<?php } ?>
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