<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#polls"><i class="os-icon picons-thin-icon-thin-0385_graph_pie_chart_statistics"></i><span><?php echo get_phrase('polls');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#new"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('create_poll');?></span></a>
			</li>
		  </ul>
		</div>
	</div>

	<div class="content-i">
		<div class="content-box">
			<div class="tab-content">
				<div class="tab-pane active" id="polls">
					<div class="col-lg-12">
						<div class="element-wrapper">
							<div class="element-box lined-primary shadow"><h5 class="form-header"><?php echo get_phrase('polls');?></h5>
		  						<div class="table-responsive">
									<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
										<thead>
											<tr>
												<th><?php echo get_phrase('question');?></th>
												<th class="text-center"><?php echo get_phrase('user');?></th>
												<th class="text-center"><?php echo get_phrase('status');?></th>
												<th class="text-center"><?php echo get_phrase('options');?></th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$polls = $this->db->get('polls')->result_array();
											foreach($polls as $row):
										?>
											<tr>
												<td><?php echo $row['question'];?></td>
												<td class="text-center">
												<?php if($row['user'] == 'all'):?>
													<a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo get_phrase('all');?></a>
												<?php endif;?>
												<?php if($row['user'] == 'admin'):?>
													<a class="btn nc btn-rounded btn-sm btn-info" style="color:white"><?php echo get_phrase('admins');?></a>
												<?php endif;?>
												<?php if($row['user'] == 'teacher'):?>
													<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('teachers');?></a>
												<?php endif;?>
												<?php if($row['user'] == 'parent'):?>
													<a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo get_phrase('parents');?></a>
												<?php endif;?>
												<?php if($row['user'] == 'student'):?>
													<a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('students');?></a>
												<?php endif;?>
												</td>
												<td class="text-center">
													<?php if($row['status'] == 1):?>
														<div class="status-pill green" data-title="Active" data-toggle="tooltip"></div>
													<?php endif;?>
													<?php if($row['status'] == 0):?>
														<div class="status-pill red" data-title="Active" data-toggle="tooltip"></div>
													<?php endif;?>
												</td>
												<td class="row-actions" class="text-center">
													<a href="<?php echo base_url();?>admin/view_poll/<?php echo $row['poll_code'];?>"><i class="picons-thin-icon-thin-0043_eye_visibility_show_visible"></i></a>
													<a class="danger" href="<?php echo base_url();?>admin/polls/delete/<?php echo $row['poll_code'];?>" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
	
				<div class="tab-pane" id="new">
					<div class="col-lg-12">
						<div class="element-wrapper">
	  						<div class="element-box lined-primary shadow">
							<?php echo form_open(base_url() . 'admin/polls/create/' , array('enctype' => 'multipart/form-data'));?>
		  					<h5 class="form-header"><?php echo get_phrase('create_poll');?></h5><br>
		  					<div class="form-group">
			  					<div class="col-sm-12">
			  						<label class="col-form-label" for="" style="text-align: left;"><?php echo get_phrase('question');?></label>
			  						<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0382_graph_columns_statistics"></i>
				  						</div>
										<input class="form-control" placeholder="<?php echo get_phrase('question');?>" name="question" required="" type="text">
									</div>
			  					</div>
							</div>
							<div id="bulk_add_form">
      							<div id="student_entry">
									<div class="form-group">
			  							<div class="col-sm-12">
			  								<label class="col-form-label" for=""><?php echo get_phrase('options');?></label>
			  									<div class="input-group">
													<input class="form-control" name="options[]" placeholder="<?php echo get_phrase('options');?>" required="" type="text">
													<button class="btn btn-sm btn-danger bulk text-center" href="#" onclick="deleteParentElement(this)"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></button>
												</div>
										</div>
				  					</div>
								</div>
								<div id="student_entry_append"></div>
							</div>	
          					<center><a href="#" class="btn btn-rounded btn-success btn-sm" onclick="append_student_entry()">+ <?php echo get_phrase('more_options');?></a></center>							
							<div class="form-group">
				            	<div class="col-sm-12">
            						<label class="col-form-label" for=""> <?php echo get_phrase('users');?></label>
										<select class="form-control" name="user" required="">
											<option value=""><?php echo get_phrase('select');?></option>
											<option value="all"><?php echo get_phrase('all');?></option>
	                						<option value="admin"><?php echo get_phrase('admins');?></option>
                							<option value="student"><?php echo get_phrase('students');?></option>
                							<option value="parent"><?php echo get_phrase('parents');?></option>
                							<option value="teacher"><?php echo get_phrase('teachers');?></option>                	
              							</select>
              					</div>            	
          					</div>
		  					<div class="form-buttons-w">
								<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('save');?></button>
		  					</div>
						<?php echo form_close();?>
		  			</div>
				</div>
			</div>
		</div>
	</div>
  </div>
	</div>
</div>

<script type="text/javascript">

   var blank_student_entry = '';

   	$(document).ready(function() 
   	{
      	blank_student_entry = $('#student_entry').html();
      	for ($i = 1; $i < 1; $i++) 
      	{
        	$("#student_entry").append(blank_student_entry);
      	}
   	});
   	function append_student_entry()
   	{
    	$("#student_entry_append").append(blank_student_entry);
   	}
   	function deleteParentElement(n)
   	{
      	n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
   	}
</script>