<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/forum/"><i class="os-icon picons-thin-icon-thin-0281_chat_message_discussion_bubble_reply_conversation"></i><span><?php echo get_phrase('forum');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/study_material/"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('study_material');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/unit_content/"><i class="os-icon picons-thin-icon-thin-0008_book_reading_read_manual"></i><span><?php echo get_phrase('syllabus');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
	<div class="content-i">
	<div class="content-box">	
	<div class="col-lg-12">	
	<div style="margin-bottom:15px;text-align:right;"><button class="btn btn-primary btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button">+ <?php echo get_phrase('new_exam');?></button></div>
	<div class="element-wrapper">	
		<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('online_exams');?></h5><br>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('title');?></th>
				<th class="text-center"><?php echo get_phrase('class');?></th>
				<th class="text-center"><?php echo get_phrase('section');?></th>
				<th><?php echo get_phrase('subject');?></th>
				<th><?php echo get_phrase('start');?></th>
				<th><?php echo get_phrase('end');?></th>
				<th class="text-center"><?php echo get_phrase('options');?></th>
			</tr>
			</thead>
			<tbody>
			<?php
    				$this->db->order_by('exam_id', 'desc');
    				$post = $this->db->get('exams')->result_array();
    				foreach ($post as $row):
        		?>
    			<?php  if ($this->session->userdata('login_user_id') == $row['teacher_id']) { ?>
				<tr>
					<td><?php echo $row['title'];?></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></a></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo $this->crud_model->get_type_name_by_id('section',$row['section_id']);?></a></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('subject',$row['subject_id']);?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['availablefrom'];?> <?php echo $row['clock_start'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $row['availableto'];?> <?php echo $row['clock_end'];?></a></td>
					<td class="row-actions">
						<a href="<?php echo base_url();?>admin/examroom/<?php echo $row['exam_code'];?>"><i class="picons-thin-icon-thin-0043_eye_visibility_show_visible"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/manage_exams/delete/<?php echo $row['exam_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
					</td>
				</tr>
				    <?php } ?>
				<?php endforeach; ?>
			</tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade bd-example-modal-lg" id="exampleModal1" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo get_phrase('new_exam');?></h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url() . 'admin/create_exam/create/' , array('enctype' => 'multipart/form-data'));?>
				<div class="row">
				<div class="col-sm-4">
				<div class="form-group">
				<label class="col-form-label" for=""><?php echo get_phrase('class');?></label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="os-icon picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
				   	<select name="class_id" class="form-control" id="class_id" onchange="get_class_subject(this.value); get_class_sections(this.value);">
                        <option value=""><?php echo get_phrase('select');?></option>
                       	<?php $classes = $this->db->get('class')->result_array();
							foreach($classes as $row): ?>
							<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach; ?>
                    </select>
				  </div>
				</div></div>
				<div class="col-sm-4">
			  <div class="form-group">
				<label class="col-form-label" for=""><?php echo get_phrase('section');?></label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
					</div>
				  <select class="form-control" name="section_id" id="section_selector_holder" required="">
						<option value=""><?php echo get_phrase('select');?></option>
				  </select>
				  </div>
				</div></div>
				<div class="col-sm-4">
				<div class="form-group">
				<label class="col-form-label" for=""><?php echo get_phrase('subject');?></label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
					</div>
				  <select class="form-control" name="subject_id" id="subject_selector_holder" required="">
						<option value=""><?php echo get_phrase('select');?></option>
				  </select>
				  </div>
			  </div>
				</div></div>
			  <div class="form-group">
				<label for=""> <?php echo get_phrase('title');?></label><input class="form-control" required="" name="title" required="" type="text">
			  </div>
			  <div class="form-group">
				  <label> <?php echo get_phrase('description');?></label><textarea cols="80" id="ckeditor1" required name="description" rows="2"></textarea>
				</div>
			  <div class="row">
				  <div class="col-sm-3">
					<div class="form-group">
					  <label for=""> <?php echo get_phrase('start_date');?></label><input class="single-daterange form-control" required="" name="availablefrom" type="text" value="">
					</div>
				  </div>
				  <div class="col-sm-3">
					  <label for=""> <?php echo get_phrase('start_hour');?></label><div class="input-group clockpicker" data-align="top" data-autoclose="true">
					<input type="text" required="" class="form-control" name="clock_start" value="09:30">
					<span class="input-group-addon">
						<span class="picons-thin-icon-thin-0029_time_watch_clock_wall"></span>
					</span>
					</div>
				  </div>
				  <div class="col-sm-3">
					<div class="form-group">
					  <label for=""> <?php echo get_phrase('end_date');?></label><input class="single-daterange form-control" name="availableto" required type="text" value="">
					</div>
				  </div>
				  <div class="col-sm-3">
					  <label for=""> <?php echo get_phrase('end_hour');?></label><div class="input-group clockpicker" data-align="top" data-autoclose="true">
					<input type="text" required="" name="clock_end" class="form-control" value="09:30">
					<span class="input-group-addon">
						<span class="picons-thin-icon-thin-0029_time_watch_clock_wall"></span>
					</span>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-4">
					<div class="form-group">
					<label for=""> <?php echo get_phrase('total_questions');?></label><input class="form-control" required placeholder="Questions" type="number" name="questions">
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
					<label for=""> <?php echo get_phrase('exam_duration');?></label><input class="form-control" required="" type="number" name="duration">
					</div>
				  </div>
				  <div class="col-sm-4">
					<div class="form-group">
					<label for=""> <?php echo get_phrase('average_required');?></label><input class="form-control" name="pass" required="" type="text">
					</div>
				  </div>
				</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('save');?></button>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
	</div>  
</div>
</div>

<script type="text/javascript">
    function get_class_sections(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_class_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_subject/' + class_id,
            success: function (response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });
    }
</script>