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
                   <select name="exam_id" class="form-control">
                   <option value=""><?php echo get_phrase('select');?></option>
                    <?php $exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
                      foreach($exams as $row):
                    ?>
                      <option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('class');?>:</label>
                    <select name="class_id" class="form-control" onchange="get_class_sections(this.value); get_class_subject(this.value);">
                      <option value=""><?php echo get_phrase('select');?></option>
                      <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach($classes as $row):
                      ?>
                      <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('section');?>:</label>
                     <select class="form-control" id="section_selector_holder" required="" name="section_id">
	                     <option value=""><?php echo get_phrase('select');?></option>
	                   </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="gi" for=""><?php echo get_phrase('subject');?>:</label>
                      <select class="form-control" id="subject_selector_holder" required="" name="subject_id">
	                       <option value=""><?php echo get_phrase('select');?></option>
	                     </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <button class="btn btn-primary btn-rounded btn-upper" style="margin-top:20px" type="submit"><span><?php echo get_phrase('view');?></span></button></div>
                </div>
              </div>
            <?php echo form_close();?>
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