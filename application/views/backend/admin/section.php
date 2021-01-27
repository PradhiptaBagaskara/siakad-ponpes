<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/academic_settings/"><i class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></i><span><?php echo get_phrase('academic_settings');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/manage_classes/"><i class="os-icon picons-thin-icon-thin-0003_write_pencil_new_edit"></i><span><?php echo get_phrase('manage_class');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/section/"><i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i><span><?php echo get_phrase('sections');?></span></a>
			</li>
			<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/grade/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('grades'); ?></span></a>
				</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/courses/"><i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span><?php echo get_phrase('subjects');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/semesters/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('semesters');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/student_promotion/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('student_promotion');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
  <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
		  <div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" data-toggle="tab" href="#section"><?php echo get_phrase('sections');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('new');?></a>
				</li>
			  </ul>
			</div>
		  </div>
		<div class="tab-pane active" id="section">
		<div class="col-lg-12">
		 <?php echo form_open(base_url() . 'admin/section/', array('class' => 'form m-b'));?>
			  <div class="row">
				<div class="col-sm-4">
				  <div class="form-group">
					<label class="gi" for=""><?php echo get_phrase('class');?>:</label>
					<select class="form-control" onchange="submit();" name="class_id">
					<option value=""><?php echo get_phrase('select');?></option>
					<?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                  	?>
                     <option value="<?php echo $row['class_id'];?>" <?php if($class_id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
                  <?php endforeach;?>
					</select>
				  </div>
				</div>
			  </div>
			<?php echo form_close();?>
		<div class="element-wrapper">
			<div class="element-box lined-primary shadow">
			<h6 class="form-header">
			  <?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?>
			</h6>
			<div class="table-responsive">
			  <table class="table table-lightborder">
				<thead>
				  <tr>
					<th><?php echo get_phrase('section');?></th>
					<th><?php echo get_phrase('teacher');?></th>
					<th class="text-center"><?php echo get_phrase('students');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				  </tr>
				</thead>
				<tbody>
				<?php
					$sections = $this->db->get_where('section' , array('class_id' => $class_id))->result_array();
					foreach ($sections as $row):
				?>
				  <tr>
					<td><?php echo $row['name'];?></td>
					<td>
					<?php if($row['teacher_id'] != ""):?>
					<img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name;?>
					<?php endif;?>
					</td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php $this->db->where('section_id', $row['section_id']); echo $this->db->count_all_results('enroll');?></a></td>
					<td class="row-actions">
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_section/<?php echo $row['section_id'];?>');"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/sections/delete/<?php echo $row['section_id'];?>"><i class="os-icon picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/sections/create');?>
		  <h5 class="form-header"><?php echo get_phrase('new');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('section');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('section');?>" required="" name="name" type="text">
				</div>
			  </div>
			</div>
		<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
			<div class="col-sm-9">
				<div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
				</div>
			  <select class="form-control" required="" name="class_id">
				<option value=""><?php echo get_phrase('select');?></option>
				<?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                ?>
                    <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
			  </select>
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('teacher');?></label>
			<div class="col-sm-9">
				<div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
				</div>
			  <select class="form-control" name="teacher_id">
				<option value=""><?php echo get_phrase('select');?></option>
				<?php $teachers = $this->db->get('teacher')->result_array();
                     foreach($teachers as $row2):
                ?>
                    <option value="<?php echo $row2['teacher_id'];?>"><?php echo $row2['name'];?></option>
                <?php endforeach;?>
			  </select>
			  </div>
			</div>
		  </div>
		  <div class="form-buttons-w text-right">
			<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('save');?></button>
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