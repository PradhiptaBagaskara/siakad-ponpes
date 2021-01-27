<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php $class_info = $this->db->get('class')->result_array(); ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
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
	<div style="margin-bottom:15px;text-align:right;"><button class="btn btn-primary btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button">+ <?php echo get_phrase('add_homework');?></button></div>
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('homework');?></h5>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-lightborder table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('title');?></th>
				<th class="text-center"><?php echo get_phrase('class');?></th>
				<th class="text-center"><?php echo get_phrase('section');?></th>
				<th class="text-center"><?php echo get_phrase('subject');?></th>
				<th><?php echo get_phrase('delivery_date');?></th>
				<th class="text-center"><?php echo get_phrase('options');?></th>
			</tr>
			</thead>
			<tbody>
			 <?php
    			$counter = 1;
    			$this->db->order_by('homework_id', 'desc');
    			$homeworks = $this->db->get('homework')->result_array();
    			foreach ($homeworks as $row):
        	?>
    			<?php  if ($this->session->userdata('login_user_id') == $row['uploader_id']) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td>
					<td class="text-right"><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></a></td>
					<td class="text-right"><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo $this->crud_model->get_type_name_by_id('section',$row['section_id']);?></a></td>
					<td class="text-center"><?php echo $this->crud_model->get_type_name_by_id('subject',$row['subject_id']);?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $row['date_end'];?></a></td>
					<td class="row-actions">
						<a href="<?php echo base_url();?>teacher/homeworkroom/<?php echo $row['homework_code'];?>"><i class="picons-thin-icon-thin-0043_eye_visibility_show_visible"></i></a>
						<a class="danger" href="<?php echo base_url(); ?>teacher/homework/delete/<?php echo $row['homework_code']; ?>" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">
             <?php echo get_phrase('add_homework');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url() . 'admin/homework/create/', array('enctype' => 'multipart/form-data')); ?>
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
							<?php foreach ($class_info as $row) { ?>
                               <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
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
				  <select class="form-control" id="section_selector_holder" required="" name="section_id">
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
				  <select class="form-control" id="subject_selector_holder" required="" name="subject_id">
					<option value=""><?php echo get_phrase('select');?></option>
				  </select>
				  </div>
			  </div>
				</div></div>
<br>
        <center><div class="form-group">
        <label class="col-form-label"> <?php echo get_phrase('homework_type');?></label>
          <div class="form-check">
          <label class="form-check-label"><input class="form-check-input" name="type" type="radio" value="1"><?php echo get_phrase('online_text');?></label>
          <label class="form-check-label"><input class="form-check-input" name="type" type="radio" value="2" style="margin-left:5px;"><?php echo get_phrase('files');?></label>
          </div>
        </div></center>

			  <div class="form-group">
				<label for=""> <?php echo get_phrase('title');?></label><input class="form-control" placeholder="<?php echo get_phrase('title');?>" name="title" required="" type="text">
			  </div>
			  <div class="form-group">
				  <label> <?php echo get_phrase('description');?></label><textarea cols="80" id="ckeditor1" name="description" required="" rows="2"></textarea>
				</div>
				<div class="form-group">
				  <label for=""> <?php echo get_phrase('delivery_date');?></label><input class="single-daterange form-control" required="" type="text" name="date_end" value="">
				</div>
				 <div class="form-group">
				<label for=""> <?php echo get_phrase('limit_hour');?></label>
				<div class="input-group clockpicker" data-align="top" data-autoclose="true">
					<input type="text" required="" name="time_end" class="form-control" value="09:30">
					<span class="input-group-addon">
						<span class="picons-thin-icon-thin-0029_time_watch_clock_wall"></span>
					</span>
				</div></div>
				<div class="form-group">
				<label class="col-form-label" for=""> <?php echo get_phrase('upload_file');?></label>
				  <div class="input-group form-control">
				  <input type="file" name="file_name" id="file-3" class="inputfile inputfile-3" style="display:none"/>
					<label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('upload_file');?>...</span></label>
				  </div></div>
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