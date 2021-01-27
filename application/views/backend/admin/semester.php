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
			  <a class="nav-link" href="<?php echo base_url();?>admin/section/"><i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i><span><?php echo get_phrase('sections');?></span></a>
			</li>
			<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/grade/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('grades'); ?></span></a>
				</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/courses/"><i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span><?php echo get_phrase('subjects');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/semesters/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('semesters');?></span></a>
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
				  <a class="nav-link active" data-toggle="tab" href="#semesters"><?php echo get_phrase('semesters');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('add');?></a>
				</li>
			  </ul>
			</div>
		  </div>
		<div class="tab-pane active" id="semesters">
		<div class="col-lg-12">
		<div class="element-wrapper">
			<div class="element-box lined-primary shadow">
			<h6 class="form-header"><?php echo get_phrase('semesters');?></h6><br>
			<div class="table-responsive">
			  <table class="table table-lightborder">
				<thead>
				  <tr>
					<th><?php echo get_phrase('semester');?></th>
					<th class="text-center"><?php echo get_phrase('start');?></th>
					<th class="text-center"><?php echo get_phrase('end');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach($exams as $row):?>
					<?php 
						$start = ""; 
						if($row['start'] == 1) $start = get_phrase('january');
						else if($row['start'] == 2) $start = get_phrase('february');
						else if($row['start'] == 3) $start = get_phrase('march');
						else if($row['start'] == 4) $start = get_phrase('april');
						else if($row['start'] == 5) $start = get_phrase('may');
						else if($row['start'] == 6) $start = get_phrase('june');
						else if($row['start'] == 7) $start = get_phrase('july');
						else if($row['start'] == 8) $start = get_phrase('august');
						else if($row['start'] == 9) $start = get_phrase('september');
						else if($row['start'] == 10) $start = get_phrase('october');
						else if($row['start'] == 11) $start = get_phrase('november');
						else if($row['start'] == 12) $start = get_phrase('december');
					?>
					<?php 
						$end = ""; 
						if($row['end'] == 1) $end = get_phrase('january');
						else if($row['end'] == 2) $end = get_phrase('february');
						else if($row['end'] == 3) $end = get_phrase('march');
						else if($row['end'] == 4) $end = get_phrase('april');
						else if($row['end'] == 5) $end = get_phrase('may');
						else if($row['end'] == 6) $end = get_phrase('june');
						else if($row['end'] == 7) $end = get_phrase('july');
						else if($row['end'] == 8) $end = get_phrase('august');
						else if($row['end'] == 9) $end = get_phrase('september');
						else if($row['end'] == 10) $end = get_phrase('october');
						else if($row['end'] == 11) $end = get_phrase('november');
						else if($row['end'] == 12) $end = get_phrase('december');
					?>
				  <tr>
					<td><?php echo $row['name'];?></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $start;?></a></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $end;?></a></td>
					<td class="row-actions">
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_semester/<?php echo $row['exam_id'];?>');"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/semesters/delete/<?php echo $row['exam_id'];?>"><i class="os-icon picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/semesters/create/');?>
		  <h5 class="form-header"><?php echo get_phrase('new');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('semester');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0007_book_reading_read_bookmark"></i>
				  </div>
					<input class="form-control" placeholder="<?php echo get_phrase('name');?>" required="" name="name" type="text">
				</div>
			  </div>
			</div>
		<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('start');?></label>
			<div class="col-sm-9">
				<div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0022_calendar_month_day_planner"></i>
				</div>
			  <select class="form-control" name="start">
				<option value="1"><?php echo get_phrase('january');?></option>
				<option value="2"><?php echo get_phrase('february');?></option>
				<option value="3"><?php echo get_phrase('march');?></option>
				<option value="4"><?php echo get_phrase('april');?></option>
				<option value="5"><?php echo get_phrase('may');?></option>
				<option value="6"><?php echo get_phrase('june');?></option>
				<option value="7"><?php echo get_phrase('july');?></option>
				<option value="8"><?php echo get_phrase('august');?></option>
				<option value="9"><?php echo get_phrase('september');?></option>
				<option value="10"><?php echo get_phrase('october');?></option>
				<option value="11"><?php echo get_phrase('november');?></option>
				<option value="12"><?php echo get_phrase('december');?></option>
			  </select>
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('end');?></label>
			<div class="col-sm-9">
				<div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0022_calendar_month_day_planner"></i>
				</div>
			  <select class="form-control" name="end">
				<option value="1"><?php echo get_phrase('january');?></option>
				<option value="2"><?php echo get_phrase('february');?></option>
				<option value="3"><?php echo get_phrase('march');?></option>
				<option value="4"><?php echo get_phrase('april');?></option>
				<option value="5"><?php echo get_phrase('may');?></option>
				<option value="6"><?php echo get_phrase('june');?></option>
				<option value="7"><?php echo get_phrase('july');?></option>
				<option value="8"><?php echo get_phrase('august');?></option>
				<option value="9"><?php echo get_phrase('september');?></option>
				<option value="10"><?php echo get_phrase('october');?></option>
				<option value="11"><?php echo get_phrase('november');?></option>
				<option value="12"><?php echo get_phrase('december');?></option>
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