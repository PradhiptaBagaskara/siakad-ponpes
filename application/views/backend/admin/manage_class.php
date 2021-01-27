<div class="content-w">
<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/academic_settings/"><i class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></i><span><?php echo get_phrase('academic_settings');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/manage_classes/"><i class="os-icon picons-thin-icon-thin-0003_write_pencil_new_edit"></i><span><?php echo get_phrase('manage_class');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/section/"><i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i><span><?php echo get_phrase('sections');?></span></a>
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
			  <a class="nav-link active" data-toggle="tab" href="#class"><?php echo get_phrase('classes');?></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('new');?></a>
			</li>
		  </ul>
		</div>
	  </div>
	<div class="tab-pane active" id="class">
	<div class="col-lg-12">
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
				<thead>
					<tr>
						<th><?php echo get_phrase('class');?></th>
						<th><?php echo get_phrase('teacher');?></th>
						<th class="text-center"><?php echo get_phrase('options');?></th>
					</tr>
				</thead>
				<tbody>
				<?php $classes = $this->db->get('class')->result_array();
				foreach($classes as $class):
				?>
				<tr>
					<td><?php echo $class['name'];?></td>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $class['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $class['teacher_id']))->row()->name;?></td>
					<td class="row-actions">
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_class/<?php echo $class['class_id'];?>');"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/manage_classes/delete/<?php echo $class['class_id'];?>"><i class="os-icon picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/manage_classes/create/', array('enctype' => 'multipart/form-data')); ?>
		  <h5 class="form-header"><?php echo get_phrase('add');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('name');?>" name="name" required="" type="text">
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
				foreach($teachers as $teacher):
				?>
				<option value="<?php echo $teacher['teacher_id'];?>"><?php echo $teacher['name'];?></option>
			<?php endforeach;?>
			  </select>
			  </div>
			</div>
		  </div>
		  <div class="form-buttons-w text-right">
			<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('add');?></button>
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