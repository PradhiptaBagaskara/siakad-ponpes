<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
 <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>parents/class_routine/"><i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i><span><?php echo get_phrase('class_routine');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>parents/exam_routine/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('exam_routine');?></span></a>
            </li>
          </ul>
        </div>
      </div>
	<div class="content-i">
	 <div class="content-box">
	<div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
			  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                   foreach ($children_of_parent as $row):
                    ?>
                    <li class="nav-item">
                    	<?php $active = $n++;?>
				  		<a class="nav-link <?php if($active == 1) echo 'active';?>" data-toggle="tab" href="#<?php echo $row['username'];?>"><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 25px;margin-right:5px;"> <?php echo $row['name'];?></a>
					</li>
                <?php endforeach; ?>
			  </ul>
			</div>
		  </div>
      	  <div class="tab-content">
      	  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                foreach ($children_of_parent as $row2):
                $class_id = $this->db->get_where('enroll' , array('student_id' => $row2['student_id'] , 'year' => $running_year))->row()->class_id;
	    		$section_id = $this->db->get_where('enroll' , array('student_id' => $row2['student_id'] , 'year' => $running_year))->row()->section_id;
            ?>
        	<?php $active = $n++;?>
	 		<div class="tab-pane <?php if($active == 1) echo 'active';?>" id="<?php echo $row2['username'];?>">
			          <div class="element-wrapper">
			            <div class="element-box table-responsive lined-primary shadow">
						<div class="row m-b">
							<div style="display:inline-block">
							<img style="max-height:80px;margin:0px 10px 20px 20px" src="<?php echo base_url();?>uploads/logo.png" alt=""/>		
							</div>
							<div style="padding-left:20px;display:inline-block;">
							<h5><?php echo $this->db->get_where('student' , array('student_id' => $row2['student_id']))->row()->name;?></h5>
							<p><?php echo get_phrase('exam_routine');?></p>
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
			                        $this->db->where('class_id' , $class_id);
			                        $this->db->where('section_id' , $section_id);
			                        $this->db->where('year' , $running_year);
			                        $routines   =   $this->db->get('horarios_examenes')->result_array();
			                        foreach($routines as $row3):
			                    ?>
								<td style="text-align:center">
								<strong><?php echo $row3['fecha'];?></strong><br>
								<?php
			                        if ($row3['time_start_min'] == 0 && $row3['time_end_min'] == 0) 
			                        echo '('.$row3['time_start'].'-'.$row3['time_end'].')';
			                        if ($row3['time_start_min'] != 0 || $row3['time_end_min'] != 0)
			                        echo '('.$row3['time_start'].':'.$row3['time_start_min'].' - '.$row3['time_end'].':'.$row3['time_end_min'].')';
			                    ?>
			                    <br><b><?php echo $this->crud_model->get_subject_name_by_id($row3['subject_id']);?></b><br><small><?php echo $this->db->get_where('teacher', array('teacher_id' => $row3['teacher_id']))->row()->name;?></small>
			                    </td>
			                    <?php endforeach;?>
							</table>
							</tr>
							<?php endfor;?>  
							</table>
			            </div>
			          </div>
				</div>  
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>