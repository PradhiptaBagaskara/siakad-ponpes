<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
 <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/class_routine_view/"><i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i><span><?php echo get_phrase('class_routine');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/teacher_routine/"><i class="os-icon picons-thin-icon-thin-0011_reading_glasses"></i><span><?php echo get_phrase('teacher_routine');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/looking_routine/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('exam_routine');?></span></a>
            </li>
          </ul>
        </div>
      </div>
  <div class="content-i">
    <div class="content-box"><div class="element-wrapper">
		<?php echo form_open(base_url() . 'admin/teacher_routine/', array('class' => 'form m-b'));?>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('teacher');?>:</label>
                    <select class="form-control" onchange="submit();" name="teacher_id">
						<option value=""><?php echo get_phrase('select');?></option>
						<?php $teachers = $this->db->get('teacher')->result_array();
							foreach($teachers as $row):
						?>
							<option  value="<?php echo $row['teacher_id'];?>" <?php if($teacher_id == $row['teacher_id']) echo 'selected';?>><?php echo $row['name'];?></option>
						<?php endforeach;?>
					</select>
                  </div>
                </div>
              </div>
            <?php echo form_close();?>
            <?php if($teacher_id > 0):?>
          <div class="element-wrapper">
            <div class="element-box table-responsive lined-primary shadow">
			<div class="row m-b">
				<div style="display:inline-block">
				<img style="max-height:60px;margin:0px 10px 20px 20px" src="<?php echo $this->crud_model->get_image_url('teacher', $teacher_id);?>" alt=""/>		
				</div>
				<div style="padding-left:20px;display:inline-block;">
				<h5><?php echo get_phrase('teacher_routine');?></h5>
				<p><?php echo $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row()->name;?></p>
				</div>
			</div>
			<table class="table table-bordered table-schedule table-hover" cellpadding="0" cellspacing="0" width="100%">
			<?php 
        $days = $this->db->get_where('academic_settings', array('type' => 'routine'))->row()->description; 
        if($days == 2) { $nday = 6;}else{$nday = 7;}
        for($d=$days; $d <= $nday; $d++):
        if($d==1)$day = 'Sunday';
				else if($d==2) $day ='Monday';
				else if($d==3) $day = 'Tuesday';
				else if($d==4) $day ='Wednesday';
				else if($d==5) $day ='Thursday';
				else if($d==6) $day ='Friday';
				else if($d==7) $day ='Saturday';
			?>
				<tr>
				<table class="table table-schedule table-hover" cellpadding="0" cellspacing="0">
					<td width="120" height="90" style="text-align: center;"><strong><?php echo ucwords($day);?></strong></td>
					<?php
                        $this->db->order_by("time_start", "asc");
                        $this->db->where('day' , $day);
                        $this->db->where('year' , $running_year);
                        $this->db->where('teacher_id' , $teacher_id);
                        $routines   =   $this->db->get('class_routine')->result_array();
                        	foreach($routines as $row2):
                	?>
						<td style="text-align:center"><?php
                        if ($row2['time_start_min'] == 0 && $row2['time_end_min'] == 0) 
                        echo $row2['time_start'].'-'.$row2['time_end'];
                        if ($row2['time_start_min'] != 0 || $row2['time_end_min'] != 0)
                        echo $row2['time_start'].':'.$row2['time_start_min'].'-'.$row2['time_end'].':'.$row2['time_end_min'];
                    ?><br><b><?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?></b><br><small><?php echo $this->db->get_where('class', array('class_id' => $row2['class_id']))->row()->name;?> - <strong><?php echo $this->db->get_where('section', array('section_id' => $row2['section_id']))->row()->name;?></strong></small></td>
					<?php endforeach;?>
				</table>
				</tr>
				<?php endfor;?>				
				</table>
            </div>
          </div>
      	<?php endif;?>
        </div>
      </div>
    </div>
  </div>