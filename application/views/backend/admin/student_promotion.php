<?php 
    $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;
    $running_year_array             = explode ( "-" , $running_year ); 
    $next_year_first_index          = $running_year_array[1];
    $next_year_second_index         = $running_year_array[1]+1;
    $next_year                      = $next_year_first_index. "-" .$next_year_second_index;
?>
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
			  <a class="nav-link" href="<?php echo base_url();?>admin/semesters/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('semesters');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/student_promotion/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('student_promotion');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
<div class="content-i">
    <div class="content-box">
          <div class="element-wrapper">
          <?php echo form_open(base_url() . 'admin/student_promotion/promote', array('class' => 'form m-b'));?>
            <form action="" class="">
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('runnig_year');?>:</label>
                      <select name="running_year" class="form-control">
                        <option value="<?php echo $running_year;?>"><?php echo $running_year;?></option>
                      </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('year_to_promote');?>:</label>
                      <select name="promotion_year" class="form-control" id="promotion_year">
                        <option value="<?php echo $next_year;?>"><?php echo $next_year;?></option>
                      </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('class');?>:</label>
                      <select name="promotion_from_class_id" id="from_class_id" class="form-control">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php
                          $classes = $this->db->get('class')->result_array();
                          foreach($classes as $row):
                        ?>
                          <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                      </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('section');?>:</label>
                      <select name="promotion_to_class_id" id="to_class_id" class="form-control">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php foreach($classes as $row):?>
                          <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                      </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <button class="btn btn-rounded btn-success btn-upper" type="button" style="margin-top:20px" onclick="get_students_to_promote('<?php echo $running_year;?>')"><span><?php echo get_phrase('promote');?></span></button>
                  </div>
                </div>
              </div>
            <div id="students_for_promotion_holder"></div>
            <?php echo form_close();?>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function get_students_to_promote(running_year)
    {
        from_class_id   = $("#from_class_id").val();
        to_class_id     = $("#to_class_id").val();
        promotion_year  = $("#promotion_year").val();
        if (from_class_id == "" || to_class_id == "") {
            toastr.error("Seleccionar grado")
            return false;
        }
        $.ajax({
            url: '<?php echo base_url();?>admin/get_students_to_promote/' + from_class_id + '/' + to_class_id + '/' + running_year + '/' + promotion_year,
            success: function(response)
            {
                jQuery('#students_for_promotion_holder').html(response);
            }
        });
        return false;
    }
</script>