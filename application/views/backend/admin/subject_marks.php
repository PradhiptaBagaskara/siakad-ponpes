<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php $min = $this->db->get_where('academic_settings' , array('type' =>'minium_mark'))->row()->description;?>
<?php 
	$encode_data = $data;
	$decode_data = base64_decode($encode_data);
	$explode_data = explode("-", $decode_data);
?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="breadcrumb hidden-xs-down hidden-sm-down">
           	<div class="logoutleft">
              	<a href="<?php echo base_url();?>admin/view_marks/<?php echo $explode_data[1];?>"><i class="os-icon picons-thin-icon-thin-0131_arrow_back_undo"></i></a>
            </div>
        </ul>
        </div>
      </div>
	 
	 <div class="content-i">
    <div class="content-box">
	<div class="row">
	<div class="col-sm-8">
		<div class="element-box lined-primary">
    <h5 class="form-header">
     <?php echo get_phrase('subject_marks');?><br>
	  <small><?php echo $this->db->get_where('subject', array('subject_id' => $explode_data[2]))->row()->name;?></small>
    </h5>
    <div class="table-responsive">
                <table class="table table-lightborder">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('activity');?></th>
                      <th><?php echo get_phrase('mark');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la1;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->mark_obtained == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->mark_obtained; ?></a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la2;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labuno == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labuno; ?></a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la3;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labdos == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labdos; ?></a></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la4;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labtres == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labtres; ?></a></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la5;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labcuatro == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labcuatro; ?></a></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la6;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labcinco == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labcinco; ?></a></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la7;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labseis == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labseis; ?></a></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la8;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labsiete == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labsiete; ?></a></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la9;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labocho == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labocho; ?></a></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td><?php echo $this->db->get_where('subject' , array('subject_id' => $explode_data[2]))->row()->la10;?></td>
					  <td><a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php  if($this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labnueve == "") echo '0'; else echo $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labnueve;?></a></td>
                    </tr>
                    <tr style="border-top: solid #a5a5a5;">
                      <td>
                        -
                      </td>
                      <td>
                        Total
                      </td>
					  <td>
					  <?php $mark = $this->db->get_where('mark' , array('subject_id' => $explode_data[2], 'exam_id' => $explode_data[0], 'student_id' => $explode_data[1], 'year' => $running_year))->row()->labtotal;?>
					  <?php if($mark < $min || $mark == ""):?>
					  	<a class="btn btn-rounded btn-sm btn-danger" style="color:white"><?php if($mark == "") echo '0'; else echo $mark;?></a>
					  <?php endif;?>
					  <?php if($mark >= $min):?>
					  	<a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $mark;?></a>
					  <?php endif;?>
					  </td>
                    </tr>	
                  </tbody>
                </table>
              </div>
  </div>
		</div>
	
	<div class="col-sm-4">
	<div class="pipeline white lined-secondary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo get_phrase('student');?>
			</h5>
		  </div>
		 <div class="pipeline-item">
		  <div class="pi-foot">
			<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>uploads/logo.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;?></span></a>
		  </div>
		  <div class="pi-body bglogo">
			<div class="avatar">
			  <img alt="" src="<?php echo $this->crud_model->get_image_url('student',$explode_data[1]);?>">
			</div>
			<div class="pi-info">
			  <div class="h6 pi-name">
				 <?php echo $this->db->get_where('student' , array('student_id' => $explode_data[1]))->row()->name;?><br>
				<small><?php echo get_phrase('roll');?>: 2017-2587</small>
			  </div>
			  <?php $class_id = $this->db->get_where('subject', array('subject_id' => $explode_data[2]))->row()->class_id;?>
			  <?php $section_id = $this->db->get_where('section', array('class_id' => $class_id))->row()->section_id;?>
			  <div class="pi-sub">
				<?php echo get_phrase('class');?>: <?php echo $this->crud_model->get_class_name($class_id); ?><br>
        		<?php echo get_phrase('section');?>: <?php echo $this->db->get_where('section' , array('section_id' => $section_id))->row()->name; ?>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	</div>
</div>
</div></div>
	</div>