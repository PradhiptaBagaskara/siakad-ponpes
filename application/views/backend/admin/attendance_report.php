<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
  <div class="os-tabs-w menu-shad">
    <div class="os-tabs-controls">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/general_reports/"><img alt="" src="<?php echo base_url();?>uploads/icon1.svg" width="25px" style="margin-right:5px;"><br> <?php echo get_phrase('classes');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/students_report/"><img alt="" src="<?php echo base_url();?>uploads/icon2.svg" width="25px" style="margin-right:5px;"><br> <?php echo get_phrase('students');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($page_name == 'attendance_report') echo "active";?>" href="<?php echo base_url();?>admin/attendance_report/"><img alt="" src="<?php echo base_url();?>uploads/icon5.svg" width="25px" style="margin-right:5px;"><br>  <?php echo get_phrase('attendance');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/marks_report/"><img alt="" src="<?php echo base_url();?>uploads/icon7.svg" width="25px" style="margin-right:5px;"><br>  <?php echo get_phrase('final_marks');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/tabulation_report/"><img alt="" src="<?php echo base_url();?>uploads/icon6.svg" width="25px" style="margin-right:5px;"><br>  <?php echo get_phrase('tabulation_sheet');?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/accounting_report/"><img alt="" src="<?php echo base_url();?>uploads/icon8.svg" width="25px" style="margin-right:5px;"><br>  <?php echo get_phrase('accounting');?></a>
        </li>
       </ul>
    </div>
  </div>
    <div class="content-i">
      <div class="content-box">
            <h5 class="form-header"><?php echo get_phrase('attendance_report');?></h5>
            <div class="row">
            <div class="content-i">
              <div class="content-box">
                <?php echo form_open(base_url() . 'admin/attendance_report/check', array('class' => 'form m-b')); ?>
                    <div class="row" style="margin-top: -30px; border-radius: 5px;">
                     <div class="col-sm-3">
                  <div class="form-group"> 
                  <label class="gi" for="" ><?php echo get_phrase('class');?>:</label> 
                    <select class="form-control" onchange="get_sections(this.value)" required="" name="class_id">
                      <option value=""><?php echo get_phrase('select');?></option>  
                      <?php 
                      $class = $this->db->get('class')->result_array();
                      foreach ($class as $row): ?>
                        <option value="<?php echo $row['class_id']; ?>" <?php if($class_id == $row['class_id']) echo "selected";?>><?php echo $row['name']; ?></option>
                      <?php endforeach; ?>
                    </select> 
                  </div>
                </div>
                     <div class="col-sm-3">
                  <div class="form-group"> 
                    <label class="gi" for=""><?php echo get_phrase('section');?>:</label> 
                    <?php if($section_id == ""):?>
                        <select class="form-control" name="section_id" required="" id="section_holder"> 
                          <option value=""><?php echo get_phrase('select');?></option>  
                        </select> 
                      <?php else:?>
                        <select class="form-control" name="section_id" required="" id="section_holder"> 
                          <option value=""><?php echo get_phrase('select');?></option>  
                          <?php 
                            $section = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
                            foreach ($section as $row): ?>
                            <option value="<?php echo $row['section_id']; ?>" <?php if($section_id == $row['section_id']) echo "selected";?>><?php echo $row['name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      <?php endif?>
                  </div>
                </div>
                 <div class="col-sm-2">
                  <div class="form-group"> <label class="gi" for=""><?php echo get_phrase('month');?>:</label> 
                    <select name="month" class="form-control" id="month" onchange="show_year()">
            <?php
            for ($i = 1; $i <= 12; $i++):
                if ($i == 1)
                    $m = get_phrase('january');
                else if ($i == 2)
                    $m = get_phrase('february');
                else if ($i == 3)
                    $m = get_phrase('march');
                else if ($i == 4)
                    $m = get_phrase('april');
                else if ($i == 5)
                    $m = get_phrase('may');
                else if ($i == 6)
                    $m = get_phrase('june');
                else if ($i == 7)
                    $m = get_phrase('july');
                else if ($i == 8)
                    $m = get_phrase('august');
                else if ($i == 9)
                    $m = get_phrase('september');
                else if ($i == 10)
                    $m = get_phrase('october');
                else if ($i == 11)
                    $m = get_phrase('november');
                else if ($i == 12)
                    $m = get_phrase('december');
                ?>
                <option value="<?php echo $i; ?>"<?php if($month == $i) echo 'selected'; ?>><?php echo $m; ?></option>
                <?php
            endfor;
            ?>
        </select>
                  </div>
                </div>
                <div class="col-md-2">
              <div class="form-group">
                <label class="gi" style="margin-bottom: 5px;"><?php echo get_phrase('year');?></label>
                  <select class="form-control" name="year">
                     <?php
                    $year_options = explode('-', $running_year); ?>
                    <option value="<?php echo $year_options[0]; ?>" <?php if($year == $year_options[0]) echo 'selected';?>><?php echo $year_options[0]; ?></option>
                    <option value="<?php echo $year_options[1]; ?>" <?php if($year == $year_options[1]) echo 'selected';?>><?php echo $year_options[1]; ?></option>
                    </select>
                </div>
              </div>
                    <div class="col-sm-2">
                        <div class="form-group"> 
                          <button class="btn btn-success btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('get_report');?></span></button>
                        </div>
                    </div>
                    </div>
                <?php echo form_close();?>
                <?php if ($class_id != '' && $section_id != '' && $month != '' && $year != ''): ?>
              <div class="row">
              <div class="text-center col-sm-12"><br>
                      <h4><?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?> - <?php echo get_phrase('section');?> : <?php echo $this->db->get_where('section', array('section_id' => $section_id))->row()->name;?></h4>
                      <p><b><?php echo get_phrase('year');?>:</b> <?php echo $year;?></p>
                    </div>
                    <hr>
                <div class="col-7 text-left">
                  <h5 class="form-header"><?php 
                     if ($month == 1)  {$mo = get_phrase('january');}
                else if ($month == 2)  {$mo = get_phrase('february');}
                else if ($month == 3)  {$mo = get_phrase('march');}
                else if ($month == 4)  {$mo = get_phrase('april');}
                else if ($month == 5)  {$mo = get_phrase('may');}
                else if ($month == 6)  {$mo = get_phrase('june');}
                else if ($month == 7)  {$mo = get_phrase('july');}
                else if ($month == 8)  {$mo = get_phrase('august');}
                else if ($month == 9)  {$mo = get_phrase('september');}
                else if ($month == 10) {$mo = get_phrase('october');}
                else if ($month == 11) {$mo = get_phrase('november');}
                else if ($month == 12) {$mo = get_phrase('december');} echo $mo;?></h5></div>
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-lightborder table-bordered">
                  <thead>
                    <tr class="text-center" height="30px">
                      <td style="background-color: #a01a7a; color: #fff; font-weight: 700; text-align: center;"><?php echo get_phrase('student');?> </td>
                      <?php
                            $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                            for ($i = 1; $i <= $days; $i++) 
                        {
                        ?>
                            <td style="background-color: #a01a7a; color: #fff; font-weight: 700; text-align: center;"><?php echo $i; ?></td>
                        <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $data = array();
                            $students = $this->db->get_where('enroll', array('class_id' => $class_id, 'year' => $running_year, 'section_id' => $section_id))->result_array();
                            foreach ($students as $row): ?>
                    <tr>
                      <td nowrap> <img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" width="20px" style="border-radius:20px;margin-right:5px;"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?> </td>
                        <?php
                                $status = 0;
                                for ($i = 1; $i <= $days; $i++) 
                                {
                                    $timestamps = strtotime($i . '-' . $month . '-' . $year);
                                    $this->db->group_by('timestamp');
                                    $attendance = $this->db->get_where('attendance', array('section_id' => $section_id, 'class_id' => $class_id, 'year' => $running_year, 'timestamp' => $timestamps, 'student_id' => $row['student_id']))->result_array();
                                    foreach ($attendance as $row1):
                                    $month_dummy = date('d', $row1['timestamp']);
                                    if ($i == $month_dummy)
                                    $status = $row1['status']; 
                                    endforeach;?>
                           <td class="text-center">
                            <?php if ($status == 1) { ?>
                                <div class="status-pilli green" data-title="Present" data-toggle="tooltip"></div>
                            <?php  } if($status == 2)  { ?>
                                        <div class="status-pilli red" data-title="Absent" data-toggle="tooltip"></div>
                            <?php  } if($status == 3)  { ?>
                                        <div class="status-pilli yellow" data-title="Late" data-toggle="tooltip"></div>
                             <?php  } if($status != 1 && $status != 2 && $status != 3)  { ?>
                                    <b>-</b>
                            <?php  } $status =0;?>
                      </td>
                      <?php } ?>
                    <?php endforeach; ?>
                    </tr>                 
                  </tbody>
                </table>
              </div>
            <?php endif;?>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>

    <script type="text/javascript">
       function get_sections(class_id) 
   {
      $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_holder').html(response);
            }
        });
   }
    </script>