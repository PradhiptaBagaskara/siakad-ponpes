<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
  <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/class_routine_view/"><i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i><span><?php echo get_phrase('class_routine');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/teacher_routine/"><i class="os-icon picons-thin-icon-thin-0011_reading_glasses"></i><span><?php echo get_phrase('teacher_routine');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/looking_routine/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('exam_routine');?></span></a>
            </li>
          </ul>		  
        </div>
      </div>
  <div class="content-i">  
    <div class="content-box"><div class="element-wrapper">
		  <?php echo form_open(base_url() . 'admin/class_routine_view/', array('class' => 'form m-b'));?>
		  <div class="row">
			<div class="col-sm-9">
			  <div class="form-group">
				<label class="gi" for=""><?php echo get_phrase('class');?>:</label>
				<select class="form-control" name="class_id" required="" onchange="submit();">
					<option value=""><?php echo get_phrase('select');?></option>
					<?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                  	?>
                     <option value="<?php echo $row['class_id'];?>" <?php if($id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
                  <?php endforeach;?>
					</select>
			  </div></div>
			  <div class="col-sm-3">
			  <div class="text-right"><button class="btn btn-primary btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button">+ <?php echo get_phrase('add');?></button></div>
			</div>
		  </div><?php echo form_close();?>
		
		<div class="os-tabs-w">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<?php $query = $this->db->get_where('section' , array('class_id' => $id)); 
               if ($query->num_rows() > 0):
               $sections = $query->result_array();
               foreach ($sections as $rows):?>
			<li class="nav-item">
			  <a class="nav-link <?php if($rows['name'] == 'A') echo 'active';?>" data-toggle="tab" href="#<?php echo $rows['name'];?>"><?php echo get_phrase('section');?> <?php echo $rows['name'];?></a>
			</li>
			<?php endforeach;?>
			<?php endif;?>
		  </ul>
			</div>
	  	  </div>
	  	  <div class="tab-content">
           <?php $query = $this->db->get_where('section' , array('class_id' => $id));
           if ($query->num_rows() > 0):
           $sections = $query->result_array();
        foreach ($sections as $row): ?>

          <div class="tab-pane <?php if($row['name'] == 'A') echo 'active';?>" id="<?php echo $row['name'];?>">
          <div class="element-wrapper">
            <div class="element-box table-responsive lined-primary shadow">
			<div class="row m-b">
				<div style="display:inline-block">
				<img style="max-height:80px;margin:0px 10px 20px 20px" src="<?php echo base_url();?>uploads/logo.png" alt=""/>		
				</div>
				<div style="padding-left:20px;display:inline-block;">
				<h5><?php echo get_phrase('class_routine');?></h5>
				<p><?php echo $this->db->get_where('class', array('class_id' => $id))->row()->name;?><br><?php echo get_phrase('section');?> <?php echo $this->db->get_where('section', array('section_id' => $row['section_id']))->row()->name;?></p>
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
					<td width="120" height="100" style="text-align: center;"><strong><?php echo ucwords($day);?></strong></td>
					<?php
                        $this->db->order_by("time_start", "asc");
                        $this->db->where('day' , $day);
                        $this->db->where('class_id' , $id);
                        $this->db->where('section_id' , $row['section_id']);
                        $this->db->where('year' , $running_year);
                        $rout  =   $this->db->get('class_routine');
                        $routines = $rout->result_array();
                        foreach($routines as $row2):
                        $teacher_id = $this->db->get_where('subject', array('subject_id' => $row2['subject_id']))->row()->teacher_id;
                	?>
					<td style="text-align:center">
					<div class="pi-controls" style="text-align:right;">
						<div class="pi-settings os-dropdown-trigger">
						  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
						  <div class="os-dropdown">
							<div class="icon-w">
							  <i class="os-icon picons-thin-icon-thin-0069a_menu_hambuger"></i>
							</div>
							<ul>
							  <li>
								<a onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_routine/<?php echo $row2['class_routine_id'];?>');" href="#!"><i class="os-icon  picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('edit');?></span></a> 
							  </li>
							  <li>
								<a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/class_routine/delete/<?php echo $row2['class_routine_id'];?>"><i class="os-icon picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i><span><?php echo get_phrase('delete');?></span></a>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
					<?php
                        if ($row2['time_start_min'] == 0 && $row2['time_end_min'] == 0) 
                        echo $row2['time_start']."0" . '-' . $row2['time_end'];
                        if ($row2['time_start_min'] != 0 || $row2['time_end_min'] != 0)
                        echo $row2['time_start'].':'.$row2['time_start_min'].'-'.$row2['time_end'].':'.$row2['time_end_min'];
                    ?>
 <br><b><?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?></b><br><small><?php echo $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row()->name;?></small><br> <br> 
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
        <?php endif;?>
          </div>  
		  
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              <?php echo get_phrase('add_class_routine');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url() . 'admin/class_routine/create');?>
              <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('class');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
					<select class="form-control" name="class_id" required="" onchange="get_class_sections(this.value); get_class_subject(this.value);">
						<option value=""><?php echo get_phrase('select');?></option>
						<?php $cl = $this->db->get('class')->result_array();
                     		foreach($cl as $row):
                  		?>
	                     	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                  		<?php endforeach;?>
					</select>
				  </div>
				</div>
			  </div>
			   <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('section');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
					<select class="form-control" name="section_id" required="" id="section_selector_holder">
						<option value=""><?php echo get_phrase('select');?></option>
					</select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('subject');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
					<select class="form-control" name="subject_id" required="" id="subject_selector_holder">
						<option value=""><?php echo get_phrase('select');?></option>
					</select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('day');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i>
					</div>
				 	<select name="day" class="form-control" required="">
				 		<option value=""><?php echo get_phrase('select');?></option>
				 		<?php
				 		$days = $this->db->get_where('academic_settings', array('type' => 'routine'))->row()->description; 
				 		 if($days == 1):?>
                        	<option value="Sunday"><?php echo get_phrase('sunday');?></option>
                    	<?php endif;?>
                        <option value="Monday"><?php echo get_phrase('monday');?></option>
                        <option value="Tuesday"><?php echo get_phrase('tuesday');?></option>
                        <option value="Wednesday"><?php echo get_phrase('wednesday');?></option>
                        <option value="Thursday"><?php echo get_phrase('thursday');?></option>
                        <option value="Friday"><?php echo get_phrase('friday');?></option>
                        <?php if($days == 1):?>
	                        <option value="Saturday"><?php echo get_phrase('saturday');?></option>
                    	<?php endif;?>
                    </select>
				  </div>
				</div>
			  </div>
              <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('time_start');?></label>
				<div class="col-sm-4">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0029_time_watch_clock_wall"></i>
					</div>
					<select name="time_start" class="form-control" required>
                        <option value=""><?php echo get_phrase('hour');?></option>
                        <?php for($i = 0; $i <= 12 ; $i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php endfor;?>
                    </select>
				  </div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
				  	<select name="time_start_min" class="form-control" required>
                      <option value=""><?php echo get_phrase('minutes');?></option>
                        <?php for($i = 0; $i <= 11 ; $i++):?>
                          <option value="<?php $n = $i * 5; if($n < 10) echo '0'.$n; else echo $n;?>"><?php $n = $i * 5; if($n < 10) echo '0'.$n; else echo $n;?></option>
                        <?php endfor;?>
                    </select>
				  </div>
				</div>
				<div class="col-sm-2">
					<div class="input-group">
				  <select class="form-control" name="starting_ampm" required>
					<option value="1">AM</option>
					<option value="2">PM</option>
				  </select>
				  </div>
				</div>
			  </div>
			    <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('time_end');?></label>
				<div class="col-sm-4">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0029_time_watch_clock_wall"></i>
					</div>
					<select name="time_end" class="form-control" required>
                        <option value=""><?php echo get_phrase('hour');?></option>
                        <?php for($i = 0; $i <= 12 ; $i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php endfor;?>
                    </select>
				  </div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
				  	<select name="time_end_min" class="form-control" required>
                      <option value=""><?php echo get_phrase('minutes');?></option>
                        <?php for($i = 0; $i <= 11 ; $i++):?>
                          <option value="<?php $n = $i * 5; if($n < 10) echo '0'.$n; else echo $n;?>"><?php $n = $i * 5; if($n < 10) echo '0'.$n; else echo $n;?></option>
                        <?php endfor;?>
                    </select>
				  </div>
				</div>
				<div class="col-sm-2">
					<div class="input-group">
				  <select class="form-control" required="" name="ending_ampm"> 
					<option value="1">AM</option>
					<option value="2">PM</option>
				  </select>
				  </div>
				</div>
			  </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('save');?></button>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
	
        </div>
      </div></div>
    </div>




    <script type="text/javascript">
    function get_class_sections(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_class_subject(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_subject/' + class_id,
            success: function (response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });
    }
</script>