 <?php $details = $this->db->get_where('forum', array('post_code' => $code))->result_array();
 foreach($details as $row2):
 ?>
 <div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/homework/"><i class="os-icon picons-thin-icon-thin-0014_notebook_paper_todo"></i><span><?php echo get_phrase('homework');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/forum/"><i class="os-icon picons-thin-icon-thin-0281_chat_message_discussion_bubble_reply_conversation"></i><span><?php echo get_phrase('forum');?></span></a>
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
	<div class="back hidden-sm-down" style="margin-top:-20px;margin-bottom:10px">		
	<a href="<?php echo base_url();?>admin/forum/"><i class="os-icon os-icon-common-07"></i></a>	
	</div>	
	<div class="element-wrapper">	
		<div class="element-box lined-primary shadow">
          	<div class="modal-header">
	            <h5 class="modal-title"><?php echo get_phrase('update_forum');?></h5>
          	</div>
            <?php echo form_open(base_url() . 'admin/forum/update/'.$code, array('enctype' => 'multipart/form-data')); ?>
				<div class="row">
				<div class="col-sm-4">
				<div class="form-group">
				<label class="col-form-label" for=""><?php echo get_phrase('class');?></label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
				  	<select name="class_id" class="form-control" id="class_id" onchange="get_class_subject(this.value); get_class_sections(this.value);">
                            <option value=""><?php echo get_phrase('select');?></option>
                            <?php 
                            $class_info = $this->db->get('class')->result_array();
                            foreach ($class_info as $row) { ?>
                                <option value="<?php echo $row['class_id']; ?>" <?php if($row['class_id'] == $row2['class_id']) echo 'selected';?>><?php echo $row['name']; ?></option>
                            <?php } ?>
                    </select>
				  </div>
				</div></div>
				<div class="col-sm-4">
			  <div class="form-group">
				<label class="col-form-label" for=""><?php echo get_phrase('section');?></label>
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
					</div>
				  		<select class="form-control" required="" name="section_id">
						<option value=""><?php echo get_phrase('select');?></option>
						 <?php 
                            $section_info = $this->db->get_where('section', array('class_id' => $row2['class_id']))->result_array();
                            foreach ($section_info as $row) { ?>
                                <option value="<?php echo $row['section_id']; ?>" <?php if($row['section_id'] == $row2['section_id']) echo 'selected';?>><?php echo $row['name']; ?></option>
                            <?php } ?>
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
				  <select class="form-control" required="" name="subject_id">
					<option value=""><?php echo get_phrase('select');?></option>
					 <?php 
                            $subject_info = $this->db->get_where('subject', array('class_id' => $row2['class_id']))->result_array();
                            foreach ($subject_info as $row) { ?>
                                <option value="<?php echo $row['subject_id']; ?>" <?php if($row['subject_id'] == $row2['subject_id']) echo 'selected';?>><?php echo $row['name']; ?></option>
                            <?php } ?>
				  </select>
				  </div>
			  </div>
				</div></div>
			  <div class="form-group">
				<label for=""> <?php echo get_phrase('title');?></label><input class="form-control" name="title" required="" value="<?php echo $row2['title'];?>" type="text">
			  </div>
			  <div class="form-group">
				  <label> <?php echo get_phrase('description');?></label><textarea cols="80" id="ckeditor1" name="description" required="" rows="2"><?php echo $row2['description'];?></textarea>
				</div>          
          		<div class="modal-footer">
	            	<button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('update');?></button>
          		</div>
          	<?php echo form_close();?>
		</div>
	  </div>
	</div>
   </div>  
 </div>
</div>
<?php endforeach;?>