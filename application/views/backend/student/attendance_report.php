<?php 
	$running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; 
	$class_id = $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id') , 'year' => $running_year))->row()->class_id;
	$section_id = $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id') , 'year' => $running_year))->row()->section_id; 
?>
<div class="content-w">  
	<div class="os-tabs-w menu-shad">		
		<div class="os-tabs-controls">		  
			<ul class="nav nav-tabs upper">			
				<li class="nav-item">			  
					<a class="nav-link active" href="<?php echo base_url();?>student/attendance_report/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
					<span><?php echo get_phrase('attendance_report');?></span></a>
				</li>
			</ul>		
		</div>
	</div>  
	<div class="content-i">   
		<div class="content-box">	   
			<div class="element-wrapper">         
			<?php echo form_open(base_url() . 'student/attendance_report_selector/', array('class' => 'form m-b')); ?>   
					<div class="row">                
							<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
    						<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
    						<input type="hidden" name="operation" value="selection">
						<div class="col-sm-4">                  
							<div class="form-group"> 
								<label class="gi" for=""><?php echo get_phrase('month');?>:</label> 
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
                					<option value="<?php echo $i; ?>"<?php if($month == $i) echo 'selected'; ?>  ><?php echo $m; ?></option>
                				<?php endfor;?>
        					</select>
							</div>                
						</div>       
						 <div class="col-md-2">
              <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('year'); ?></label>
                  <select class="form-control" name="year">
                    <?php
                      $year_options = explode('-', $running_year); ?>
                      <option value="<?php echo $year_options[1]; ?>"><?php echo $year_options[1]; ?></option>
                      <option value="<?php echo $year_options[0]; ?>"><?php echo $year_options[0]; ?></option>
                    </select>
                </div>
              </div>         
						<div class="col-sm-2">                 
							<div class="form-group"> 
								<button class="btn btn-rounded btn-success btn-upper" style="margin-top:20px"><span><?php echo get_phrase('generate');?></span></button>
							</div>                
						</div>             
					</div>            
				<?php echo form_close();?>       
		    </div>        
		</div>      
    </div>    
</div>