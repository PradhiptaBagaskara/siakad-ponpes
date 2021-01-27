<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description;?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
			<ul class="nav nav-tabs">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/general_reports/"><img alt="" src="<?php echo base_url();?>uploads/icon1.svg" width="25px" style="margin-right:5px;"><br> <?php echo get_phrase('classes');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link <?php if($page_name == 'students_report') echo "active";?>" href="<?php echo base_url();?>admin/students_report/"><img alt="" src="<?php echo base_url();?>uploads/icon2.svg" width="25px" style="margin-right:5px;"><br> <?php echo get_phrase('students');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/attendance_report/"><img alt="" src="<?php echo base_url();?>uploads/icon5.svg" width="25px" style="margin-right:5px;"><br>  <?php echo get_phrase('attendance');?></a>
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
	  				<h5 class="form-header"><?php echo get_phrase('students_reports');?></h5>
	  				<div class="row">
						<div class="content-i">
							<div class="content-box">
								<?php echo form_open(base_url() . 'admin/students_report/', array('class' => 'form m-b'));?>
	  								<div class="row" style="margin-top: -30px; border-radius: 5px;">
							<div class="col-sm-5">
		  						<div class="form-group"> 
		  						<label class="gi" for=""><?php echo get_phrase('class');?>:</label> 
		  							<select name="class_id" class="form-control" required="" onchange="get_class_sections(this.value)">
										<option value=""><?php echo get_phrase('select');?></option>
										<?php
											$classes = $this->db->get('class')->result_array();
											foreach($classes as $row):                        
										?>                
										<option value="<?php echo $row['class_id'];?>" <?php if($class_id == $row['class_id']) echo "selected";?>><?php echo $row['name'];?></option>            
										<?php endforeach;?>
									</select>
		  						</div>
							</div>
							<div class="col-sm-5">
		  						<div class="form-group"> 
		  						<label class="gi" for=""><?php echo get_phrase('section');?>:</label> 
		  							<?php if($section_id == ""):?>
		  								<select class="form-control" name="section_id" required id="section_holder">
            								<option value=""><?php echo get_phrase('select');?></option>
										</select>
									<?php else:?>
										<select class="form-control" name="section_id" required id="section_holder">
	            							<option value=""><?php echo get_phrase('select');?></option>
            								<?php 
            									$sections = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
            									foreach ($sections as $key):
            								?>
	            								<option value="<?php echo $key['section_id'];?>" <?php if($section_id == $key['section_id']) echo "selected";?>><?php echo $key['name'];?></option>
            								<?php endforeach;?>
										</select>
									<?php endif;?>
		  						</div>
							</div>
							<div class="col-sm-2">
		  						<div class="form-group"> 
		  							<button class="btn btn-success btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('get_report');?></span></button>
		  						</div>
							</div>
	  					</div>
								<?php echo form_close();?>
								<?php if($class_id != "" && $section_id != ""):?>
									<div class="row">
										<div class="text-center col-sm-12"><br>
											<h4><?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?> - <?php echo get_phrase('section');?>: <?php echo $this->db->get_where('section', array('section_id' => $section_id))->row()->name;?></h4>
											<p><b>Profesor:</b> <?php echo $this->db->get_where('teacher', array('teacher_id' => $this->db->get_where('class', array('class_id' => $class_id))->row()->teacher_id))->row()->name;?><br><b><?php $this->db->where('year', $running_year); $this->db->where('class_id', $class_id); $this->db->where('section_id', $section_id); echo $this->db->count_all_results('enroll');?></b> <?php echo get_phrase('students');?>  |  <b><?php $this->db->where('class_id', $class_id); echo $this->db->count_all_results('subject');?></b> <?php echo get_phrase('subjects');?>.<br><b><?php echo get_phrase('running_year');?>:</b> <?php echo $running_year;?></p>
									</div>
									<hr>
										<div class="col-sm-3" style="border: 1px solid #eee;">
											<h5 class="form-header"><?php echo get_phrase('gender');?></h5>
												<canvas id="myChart" width="400" height="400"></canvas>
										</div>
										<div class="col-sm-9">
											<div class="element-box">
      											<div class="form-header">
      												<h6><?php echo get_phrase('students');?></h6>
      											</div>
      											<div class="table-responsive">
        											<table width="100%" class="table table-striped table-lightfont">
          												<thead>
            												<tr>
              													<th class="text-center"><?php echo get_phrase('name');?></th>
              													<th class="text-center"><?php echo get_phrase('roll');?></th>
              													<th class="text-center"><?php echo get_phrase('parent');?></th>
              													<th class="text-center"><?php echo get_phrase('status');?></th>
              													<th class="text-center"><?php echo get_phrase('gender');?></th>
            												</tr>
          												</thead>
          											<tbody>
          											<?php $students = $this->db->get_where('enroll',array('class_id' => $class_id, 'section_id' => $section_id))->result_array();
          												foreach($students as $row):
          											?>
            										<tr>
              											<td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></td>
              											<td class="text-center"><?php echo $row['roll']; ?></td>
              											<td class="text-center"><?php echo $this->db->get_where('parent', array('parent_id' => $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->parent_id))->row()->name; ?></td>
              											<td class="text-center">
	              											<?php if($this->db->get_where('student', array('student_id' => $row['student_id']))->row()->student_session == 1):?>
                											<div class="pt-btn">
		                  										<a class="btn nc btn-success btn-sm btn-rounded"><font color="white"><?php echo get_phrase('active');?></font></a>
                											</div>
              												<?php else:?>
	                										<div class="pt-btn">
                  												<a class="btn nc btn-danger btn-sm btn-rounded"><font color="white"><?php echo get_phrase('inactive');?></font></a></div>
                  											<?php endif;?>
                  										</td>
              											<td class="text-center">
              												<?php if($this->db->get_where('student', array('student_id' => $row['student_id']))->row()->sex == 'Female'):?>
              													<span class="btn btn-sm btn-purple"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->sex; ?></span>
              												<?php else:?>
              													<span class="btn btn-sm btn-primary"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->sex; ?></span>
              												<?php endif;?>
              											</td>
            										</tr>
          											<?php endforeach;?>
          											</tbody>
        										</table>
        									</div>
    									</div>
									</div>
								</div>
							<?php endif;?>
  							</div>
						</div>
	      			</div>
    		</div>
   		</div>
  	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script type="text/javascript">
    function get_class_sections(class_id) 
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
<?php
	$male = 0;
	$female = 0;
	$students = $this->db->get_where('enroll', array('class_id' => $class_id, 'section_id' => $section_id, 'year' => $running_year))->result_array();
	foreach($students as $row){
		if($this->db->get_where('student', array('student_id' => $row['student_id']))->row()->sex == "Female")
		{
			$female+= 1;
		}else{
			$male += 1;
		}
	}
?>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["<?php echo get_phrase('female');?>", "<?php echo get_phrase('male');?>"],
        datasets: [{
            label: '#',
            data: [<?php echo $female;?>, <?php echo $male;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 0
        }]
    },
   
});
</script>