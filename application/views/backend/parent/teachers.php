<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
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
							<h5 class="form-header"><?php echo get_phrase('teachers');?>: <?php echo $row2['name'];?></h5><br>
		  						<div class="table-responsive">
									<table width="100%" class="table table-lightborder table-lightfont">
										<thead>
											<tr>
												<th>#</th>
												<th><?php echo get_phrase('subject');?></th>
												<th><?php echo get_phrase('teacher');?></th>
												<th><?php echo get_phrase('send_message');?></th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$n = 1;
											$class_id     = $this->db->get_where('enroll', array('student_id' => $row2['student_id']))->row()->class_id;
											$teacher_list = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
										    foreach($teacher_list as $row):
										?>
											<?php $data = "teacher" ."-".$row['teacher_id'];
											  $send_data = base64_encode($data);
											?>
											<tr>
												<td><?php echo $n++;?></td>
												<td><?php echo $row['name'];?></td>
												<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name;?></td>
												<td><a class="btn btn-rounded btn-sm btn-success" style="color:white" href="<?php echo base_url();?>parents/message/message_new/<?php echo $send_data;?>"><i class="picons-thin-icon-thin-0317_send_post_paper_plane"></i> <?php echo get_phrase('send_message');?></a></td>
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