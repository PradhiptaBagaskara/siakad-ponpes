<?php $running_year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;?>
<div class="content-w">
      <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/attendance/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/teacher_attendance/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/attendance_report/"><i class="os-icon picons-thin-icon-thin-0386_graph_line_chart_statistics"></i><span><?php echo get_phrase('student_attendance_report');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/teacher_attendance_report/"><i class="os-icon picons-thin-icon-thin-0386_graph_line_chart_statistics"></i><span><?php echo get_phrase('teacher_attendance_report');?></span></a>
            </li>
          </ul>
        </div>
      </div>
 <div class="content-i">
    <div class="content-box">
    <?php echo form_open(base_url() . 'admin/attendance_teacher/', array('class' => 'form m-b'));?>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('date');?>:</label> <input class="single-daterange form-control" placeholder="Date" name="timestamp" type="text" required value="<?php echo date("m/d/Y", $timestamp);?>"> </div>
        </div>
        <input type="hidden" name="year" value="<?php echo $running_year;?>">
        <div class="col-sm-2">
          <div class="form-group"> <button class="btn btn-rounded btn-primary btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('view');?></span></button></div>
        </div>
      </div>
    <?php echo form_close();?>
    <div class="element-box lined-primary shadow">
      <h5 class="form-header"><?php echo get_phrase('teacher_attendance');?></h5><br>
      <div class="table-responsive">
      <?php echo form_open(base_url() . 'admin/attendance_update2/' . $timestamp); ?>
        <table class="table table-lightborder">
          <thead>
            <tr>
              <th><?php echo get_phrase('teacher');?></th>
              <th style="text-align: center;"><?php echo get_phrase('status');?></th>
            </tr>
          </thead>
          <tbody>
           <?php
                $count = 1;
                $select_id = 0;
                $attendance = $this->db->get_where('teacher_attendance', array('year' => $running_year, 'timestamp' => $timestamp))->result_array();
                foreach ($attendance as $row):
            ?>
            <tr>
              <td style="min-width:170px">
                <img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name; ?>
              </td>
              <td style="text-align: center;" nowrap>
              <div class="form-check">
               <label class="form-check-label"><input checked class="form-check-input" name="status_<?php echo $row['attendance_id']; ?>" type="radio" <?php if ($row['status'] == 1) echo 'checked'; ?> value="1"  style="margin-left:5px"><?php echo get_phrase('present');?></label>
               <label class="form-check-label"><input class="form-check-input" name="status_<?php echo $row['attendance_id']; ?>" type="radio" <?php if ($row['status'] == 3) echo 'checked'; ?> value="3" style="margin-left:5px"><?php echo get_phrase('late');?></label>
               <label class="form-check-label"><input class="form-check-input" name="status_<?php echo $row['attendance_id']; ?>" type="radio" <?php if ($row['status'] == 2) echo 'checked'; ?> value="2" style="margin-left:5px"><?php echo get_phrase('absent');?></label>
              </div>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <div class="form-buttons-w">
          <button class="btn btn-success btn-rounded" type="submit"> <?php echo get_phrase('update');?></button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
</div>