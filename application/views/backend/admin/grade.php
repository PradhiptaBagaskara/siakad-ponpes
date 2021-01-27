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
          <a class="nav-link active" href="<?php echo base_url();?>admin/grade/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('grades'); ?></span></a>
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
        <a class="nav-link active" data-toggle="tab" href="#subjects"><?php echo get_phrase('grades');?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#new"><?php echo get_phrase('new');?></a>
      </li>
      </ul>
    </div>
    </div>
  <div class="tab-pane active" id="subjects">
  <div class="col-lg-12">
  <div class="element-wrapper">
    <div class="element-box lined-primary shadow">
      <h6 class="form-header"><?php echo get_phrase('grades'); ?></h6>
      <div class="table-responsive">
      <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
      <thead>
        <tr>
          <th><?php echo get_phrase('name');?></th>
          <th><?php echo get_phrase('point');?></th>
          <th><?php echo get_phrase('mark_from');?></th>
          <th><?php echo get_phrase('mark_to');?></th>
          <th class="text-center"><?php echo get_phrase('options');?></th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $grades = $this->db->get('grade')->result_array();
      foreach($grades as $row):
      ?>
        <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['grade_point'];?></td>
          <td><?php echo $row['mark_from'];?></td>
          <td><?php echo $row['mark_upto'];?></td>
          <td class="row-actions">
            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_grade/<?php echo $row['grade_id'];?>');"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
            <a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/grade/delete/<?php echo $row['grade_id'];?>"><i class="os-icon picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
    <?php echo form_open(base_url() . 'admin/grade/create/');?>
      <h5 class="form-header"><?php echo get_phrase('add');?></h5><br>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
        <div class="col-sm-9">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('name');?>" required name="name" type="text">
        </div>
        </div>
      </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('point');?></label>
        <div class="col-sm-9">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('point');?>" required name="point" type="text">
        </div>
        </div>
      </div>
     <div class="form-group row">
        <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('mark_from');?></label>
        <div class="col-sm-9">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('mark_from');?>" required name="from" type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('mark_to');?></label>
        <div class="col-sm-9">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('mark_to');?>" required name="to" type="text">
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