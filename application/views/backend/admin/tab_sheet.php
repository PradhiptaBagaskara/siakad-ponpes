<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/upload_marks/"><i class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></i><span><?php echo get_phrase('upload_marks');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/tab_sheet/"><i class="os-icon picons-thin-icon-thin-0197_layout_grid_view"></i><span><?php echo get_phrase('tabulation_sheet');?></span></a>
            </li>
          </ul>
        </div>
      </div>
  <div class="content-i">
	<div class="content-box">
	<div class="element-wrapper">
      <?php echo form_open(base_url() . 'admin/tab_sheet', array('class' => 'form m-b'));?>
	         <div class="row">
	           <div class="col-sm-3">
	               <div class="form-group">
	                 <label class="gi" for=""><?php echo get_phrase('class');?>:</label>
                    <select name="class_id" class="form-control" onchange="get_class_sections(this.value);">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php 
                          $classes = $this->db->get('class')->result_array();
                          foreach($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>"
                              <?php if ($class_id == $row['class_id']) echo 'selected';?>>
                                <?php echo $row['name'];?>
                            </option>
                        <?php endforeach; ?>
                    </select>
	               </div>
              </div>
              <?php if($section_id == ""):?>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="gi" for=""><?php echo get_phrase('section');?>:</label>
                          <select class="form-control" required="" id="section_selector_holder" name="section_id">
                            <option value=""><?php echo get_phrase('select');?></option>
                          </select>
                      </div>
                    </div>
                  <?php else:?>
                  <div class="col-sm-3">
                     <div class="form-group">
                       <label class="gi" for=""><?php echo get_phrase('section');?>:</label>
                        <select class="form-control" required="" name="section_id">
                          <option value=""><?php echo get_phrase('select');?></option>
                          <?php 
                            $sections = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
                            foreach($sections as $r):
                          ?>
                            <option value="<?php echo $r['section_id'];?>" <?php if($r['section_id'] == $section_id) echo "selected";?>><?php echo $r['name'];?></option>
                          <?php endforeach;?>
                        </select>
                     </div>
                  </div>
                <?php endif;?>
	             <div class="col-sm-3">
	               <div class="form-group">
	                   <label class="gi" for=""><?php echo get_phrase('semester');?>:</label>
	                       <select name="exam_id" class="form-control">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php 
                          $exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
                          foreach($exams as $row):
                        ?>
                            <option value="<?php echo $row['exam_id'];?>"
                              <?php if ($exam_id == $row['exam_id']) echo 'selected';?>>
                                <?php echo $row['name'];?>
                            </option>
                        <?php endforeach; ?>
                        </select>
	                 </div>
                </div>
                <input type="hidden" name="operation" value="selection">
	             <div class="col-sm-2">
	                 <div class="form-group">
	                   <button class="btn btn-primary btn-rounded btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('generate');?></span></button>
                    </div>
               </div>
	         </div>
	       <?php echo form_close();?>
	       <?php if ($class_id != '' && $exam_id != '' && $section_id != ''):?>
         <div class="element-box lined-primary shadow">
            <h5 class="form-header"><?php echo get_phrase('tabulation_sheet');?></h5>
              <div class="table-responsive">
                  <table class="table table-lightborder">
                      <thead>
                          <tr>
                              <th><?php echo get_phrase('student');?></th>
                              <?php 
                                $subjects = $this->db->get_where('subject' , array('class_id' => $class_id , 'year' => $running_year))->result_array();
                                foreach($subjects as $row):
                              ?>
                                <td><?php echo $row['name'];?></td>
                              <?php endforeach;?>
                              <th class="prom"><?php echo get_phrase('average');?></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                          $students = $this->db->get_where('enroll' , array('class_id' => $class_id, 'section_id' => $section_id , 'year' => $running_year))->result_array();
                          foreach($students as $row):
                        ?>
                        <tr>
                            <td nowrap><img alt="" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?></td>
                            <?php
                                    $total_marks = 0;  foreach($subjects as $row2): ?>
                                    <td style="text-align: center;">
                                    <?php $marks =  $this->db->get_where('mark' , array('class_id' => $class_id ,'exam_id' => $exam_id , 
                                      'subject_id' => $row2['subject_id'] , 'section_id' => $section_id,'student_id' => $row['student_id'],'year' => $running_year));
                                      if($marks->num_rows() > 0) 
                                      {
                                        $obtained_marks = $marks->row()->labtotal;
                                        echo $obtained_marks;
                                        $total_marks += $obtained_marks;
                                      }
                                    ?>
                                </td>
                            <?php endforeach;?>
                            <td class="average"><?php 
                                $this->db->where('class_id' , $class_id);
                                $this->db->where('year' , $running_year);
                                $this->db->from('subject');
                                $total_subjects = $this->db->count_all_results();
                                echo number_format(($total_marks / $total_subjects)); echo "%";
                              ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                  </table>
                  <div class="form-buttons-w text-center">
                      <a href="<?php echo base_url();?>admin/tab_sheet_print/<?php echo $class_id;?>/<?php echo $exam_id;?>/<?php echo $section_id;?>"><button class="btn btn-success btn-rounded" type="submit"><i class="picons-thin-icon-thin-0333_printer"></i>  <?php echo get_phrase('print');?></button></a>
                  </div>
              </div>
        </div>
    <?php endif;?>
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