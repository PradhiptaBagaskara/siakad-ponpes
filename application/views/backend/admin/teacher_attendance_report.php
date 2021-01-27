<?php $running_year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;?>
<div class="content-w">
  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/attendance/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/teacher_attendance/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>admin/teacher_attendance_report/"><i class="os-icon picons-thin-icon-thin-0386_graph_line_chart_statistics"></i><span><?php echo get_phrase('teacher_attendance_report');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
  <div class="content-i">
    <div class="content-box">
	   <div class="element-wrapper">
        <?php echo form_open(base_url() . 'admin/teacher_report_selector/', array('class' => 'form m-b')); ?>
            <form action="" class="form m-b">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('month');?>:</label> 
                      <select name="month" class="form-control" id="month" onchange="show_year()">
            <?php
                for ($i = 1; $i <= 12; $i++):
                if ($i == 1) $m = get_phrase('january');
                else if ($i == 2) $m = get_phrase('february');
                else if ($i == 3) $m = get_phrase('march');
                else if ($i == 4) $m = get_phrase('april');
                else if ($i == 5) $m = get_phrase('may');
                else if ($i == 6) $m = get_phrase('june');
                else if ($i == 7) $m = get_phrase('july');
                else if ($i == 8) $m = get_phrase('august');
                else if ($i == 9) $m = get_phrase('september');
                else if ($i == 10) $m = get_phrase('october');
                else if ($i == 11) $m = get_phrase('november');
                else if ($i == 12) $m = get_phrase('december');
            ?>
                <option value="<?php echo $i; ?>"<?php if($month == $i) echo 'selected'; ?>  ><?php echo ucwords($m); ?></option>
                <?php endfor; ?>
            </select>
                  </div>
                </div>
                <input type="hidden" name="operation" value="selection">
                 <div class="col-md-2">
        <div class="form-group">
            <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('year'); ?></label>
            <select class="form-control " name="year">
                <?php
                    $year_options = explode('-', $running_year); ?>
                    <option value="<?php echo $year_options[0]; ?>" <?php if($year == $year_options[0]) echo 'selected'; ?>>
                      <?php echo $year_options[0]; ?></option>
                    <option value="<?php echo $year_options[1]; ?>" <?php if($year == $year_options[1]) echo 'selected'; ?>>
                    <?php echo $year_options[1]; ?></option>
            </select>
        </div>
    </div>
                <div class="col-sm-2">
                  <div class="form-group"> <button class="btn btn-rounded btn-primary btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('generate');?></span></button></div>
                </div>
              </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>