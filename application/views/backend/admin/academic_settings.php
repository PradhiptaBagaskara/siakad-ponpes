<div class="content-w">
	<?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->academic_se == 1):?>
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/academic_settings/"><i class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></i><span><?php echo get_phrase('academic_settings'); ?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/manage_classes/"><i class="os-icon picons-thin-icon-thin-0003_write_pencil_new_edit"></i><span><?php echo get_phrase('manage_class');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/section/"><i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i><span><?php echo get_phrase('sections'); ?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/grade/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('grades'); ?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/courses/"><i class="picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span><?php echo get_phrase('subjects'); ?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/semesters/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('semesters'); ?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/student_promotion/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('student_promotion'); ?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
    <div class="content-box">
		<div class="col-sm-12">
      <div class="element-box lined-primary shadow">
		  <h5 class="form-header"><?php echo get_phrase('academic_settings');?></h5><br>
		  <?php echo form_open(base_url() . 'admin/academic_settings/do_update' , array('target'=>'_top'));?>
		  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('minimum_mark');?></label>
			  <div class="col-sm-4">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0656_medal_award_rating_prize_achievement"></i>
				</div>
			  <input class="form-control" placeholder="61" required="" name="minium_mark" value="<?php echo $this->db->get_where('academic_settings' , array('type' =>'minium_mark'))->row()->description;?>" type="text">
			  </div>
			</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"> <?php echo get_phrase('use_saturday');?></label>
				<div class="col-sm-8">
				  <div class="form-check">
					<label class="form-check-label"><input class="form-check-input" name="routine" type="radio" value="1" <?php if($this->db->get_where('academic_settings' , array('type' =>'routine'))->row()->description == 1) echo 'checked';?>><?php echo get_phrase('yes');?></label>
					<label class="form-check-label"><input class="form-check-input" name="routine" type="radio" value="2" <?php if($this->db->get_where('academic_settings' , array('type' =>'routine'))->row()->description == 2) echo 'checked';?> style="margin-left:5px;"><?php echo get_phrase('no');?></label>
				  </div>
				</div>
			  </div>
		   <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('save');?></button>
          </div>
          <?php echo form_close();?>
		</div>
		</div>
	</div>
</div>
<?php endif;?>
</div>