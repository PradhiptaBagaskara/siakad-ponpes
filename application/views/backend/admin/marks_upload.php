<?php //$allowed = $this->db->get_where('academic_settings' , array('type' =>'allowed_marks'))->row()->description; ?>
<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
  <div class="content-i">
    <div class="content-box">
          <div class="element-wrapper">
          <?php echo form_open(base_url() . 'admin/marks_selector', array('class' => 'form m-b'));?>
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('semester');?>:</label>
                    	<select name="exam_id" class="form-control" required="">
                    		<option value=""><?php echo get_phrase('select');?></option>
							<?php $exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
							foreach($exams as $row):
							?>		
								<option value="<?php echo $row['exam_id'];?>" <?php if($exam_id == $row['exam_id']) echo 'selected';?>><?php echo $row['name'];?></option>
							<?php endforeach;?>
						</select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('class');?>:</label>
                    <select name="class_id" class="form-control" onchange="get_class_sections(this.value); get_class_subject(this.value);" required="">
						<option value=""><?php echo get_phrase('select');?></option>
						<?php
							$classes = $this->db->get('class')->result_array();
							foreach($classes as $row):
						?>
							<option value="<?php echo $row['class_id'];?>" <?php if($class_id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
						<?php endforeach;?>
					</select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('section');?>:</label>
                    	<select name="section_id" class="form-control" id="section_selector_holder">
					<?php  $sections = $this->db->get_where('section' , array('class_id' => $class_id ))->result_array();
						foreach($sections as $row):
					?>
					<option value="<?php echo $row['section_id'];?>" 
						<?php if($section_id == $row['section_id']) echo 'selected';?>>
							<?php echo $row['name'];?>
					</option>
					<?php endforeach;?>
				</select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('subject');?>:</label>
                    	<select name="subject_id" id="subject_selector_holder" class="form-control">
					<?php 
						$subjects = $this->db->get_where('subject' , array('class_id' => $class_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
						))->result_array();
						foreach($subjects as $row):
					?>
					<option value="<?php echo $row['subject_id'];?>"
						<?php if($subject_id == $row['subject_id']) echo 'selected';?>>
							<?php echo $row['name'];?>
					</option>
					<?php endforeach;?>
				</select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <button class="btn btn-primary btn-rounded btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('view');?></span></button></div>
                </div>
              </div>
            <?php echo form_close();?>
            <div class="element-box lined-primary shadow">
              <center><h5 class="form-header"><?php echo get_phrase('marks');?> <strong><?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?></strong></h5></center>
              <center><button class="btn btn-secondary btn-rounded pull-right" style="margin-bottom:15px;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_mark/<?php echo $subject_id;?>/<?php echo $exam_id;?>/<?php echo $section_id;?>');" type="button"><i class="picons-thin-icon-thin-0102_notebook_to_do_bullets_list"></i>  <?php echo get_phrase('update_activities');?></button></center>
              <br>
              <?php echo form_open(base_url() . 'admin/marks_update/'.$exam_id.'/'.$class_id.'/'.$section_id.'/'.$subject_id);?>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;"><?php echo get_phrase('student');?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la1;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la2;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la3;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la4;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la5;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la6;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la7;?></th>
                          <th><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la8;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la9;?></th>
                          <th style="text-align: center;"><?php echo $this->db->get_where('subject' , array('subject_id' => $subject_id))->row()->la10;?></th>
                          <th style="text-align: center;"><?php echo get_phrase('comment');?></th>
                      </tr>
                  </thead>
                  <tbody>
                 <?php
                    $count = 1;
                  $marks_of_students = $this->db->get_where('mark' , array('class_id' => $class_id, 'section_id' => $section_id ,'year' => $running_year,'subject_id' => $subject_id,'exam_id' => $exam_id))->result_array();
                      foreach($marks_of_students as $row):
                    ?>
                    <tr>                    
                      <td style="min-width:190px">
                        <img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
                      </td>
                      <td>
                          <input type="text" name="marks_obtained_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['mark_obtained'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_uno_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labuno'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_dos_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labdos'];?>">  
                      </td>
                      <td>  
                        <input type="text" name="lab_tres_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labtres'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_cuatro_<?php echo $row['mark_id'];?>" placeholder="0" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labcuatro'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_cinco_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labcinco'];?>"> 
                      </td>
                      <td>
                        <input type="text" name="lab_seis_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labseis'];?>" >  
                      </td>
                      <td>
                        <input type="text" name="lab_siete_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labsiete'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_ocho_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px;  border: 0; text-align: center;" value="<?php echo $row['labocho'];?>">  
                      </td>
                      <td>
                        <input type="text" name="lab_nueve_<?php echo $row['mark_id'];?>" placeholder="0" style="width:45px; border: 0; text-align: center;" value="<?php echo $row['labnueve'];?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="comment_<?php echo $row['mark_id'];?>" value="<?php echo $row['comment'];?>">
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
                <div class="form-buttons-w text-center">
                  <button class="btn btn-success btn-rounded" type="submit"><?php echo get_phrase('update');?></button>
                </div>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script type="text/javascript">
    function get_class_sections(class_id) 
    {
        $.ajax({
            url: '<?php echo base_url();?>teacher/get_class_section/' + class_id ,
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