<?php $user = $this->session->userdata('login_type')."-".$this->session->userdata('login_user_id');?>
<div class="content-w">
  <div class="os-tabs-w menu-shad">
    <div class="os-tabs-controls">
      <ul class="nav nav-tabs upper">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url();?>teacher/student_report/"><i class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></i><span><?php echo get_phrase('reports');?></span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="content-i">
    <div class="content-box">
    <div class="element-wrapper">
         <div class="tab-content">
        <div class="tab-pane active" id="students">
          <div class="element-box lined-primary shadow">
          <div class="form-header">
            <h5><?php echo get_phrase('student_reports');?></h5>
            <div style="margin: auto 0;text-align:right;"><button class="btn btn-primary btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button"><?php echo get_phrase('create_report');?></button></div>
          </div>
          <div class="table-responsive">
            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
            <thead>
                <tr>
                    <th><?php echo get_phrase('student');?></th>
                    <th><?php echo get_phrase('created_by');?></th>
                    <th><?php echo get_phrase('class');?></th>
                    <th><?php echo get_phrase('section');?></th>
                    <th><?php echo get_phrase('reason');?></th>
                    <th><?php echo get_phrase('date');?></th>
                    <th><?php echo get_phrase('priority');?></th>
                    <th class="text-center"><?php echo get_phrase('options');?></th>
                </tr>
            </thead>
            <tbody>
                <?php $reports = $this->db->get_where('reports', array('user_id' => $user))->result_array();
                    foreach($reports as $row):
                ?>
                <tr>
                    <?php $user = $row['user_id'];
                        $re = explode('-', $user);
                    ?>
                    <td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name;?></td>
                    <td><img alt="" src="<?php echo $this->crud_model->get_image_url($re[0], $re[1]);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where($re[0], array($re[0]."_id" => $re[1]))->row()->name;?></td>
                    <td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name;?></a></td>
                    <td><a class="btn nc btn-rounded btn-sm btn-purple" style="color:white"><?php echo $this->db->get_where('section', array('section_id' => $row['section_id']))->row()->name;?></a></td>
                    <td><a href="<?php echo base_url();?>teacher/view_report/<?php echo $row['code'];?>"><?php echo $row['title'];?></a></td>
                    <td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date'];?></a></td>
                    <td><?php if($row['priority'] == 'alta'):?>
                        <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('high');?></a>
                    <?php endif;?>
                    <?php if($row['priority'] == 'media'):?>
                        <a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('medium');?></a>
                    <?php endif;?>
                    <?php if($row['priority'] == 'baja'):?>
                        <a class="btn nc btn-rounded btn-sm btn-info" style="color:white"><?php echo get_phrase('low');?></a>
                        <?php endif;?></td>
                    <td class="row-actions">
                        <a href="<?php echo base_url();?>teacher/view_report/<?php echo $row['code'];?>/" class="btn btn-rounded btn-sm btn-primary" style="color:white"><i class="picons-thin-icon-thin-0043_eye_visibility_show_visible"></i> View</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            </table>
          </div>
        </div>
          </div>

         <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              <?php echo get_phrase('create_report');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <div class="modal-body">
            <?php echo form_open(base_url() . 'teacher/student_report/send/', array('enctype' => 'multipart/form-data')); ?>
              <div class="form-group row">
              <label class="col-sm-2 col-form-label" for=""> <?php echo get_phrase('reason');?></label>
              <div class="col-sm-10">
              <div class="input-group">
              <div class="input-group-addon">
                <i class="picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></i>
                </div>
              <input class="form-control" placeholder="<?php echo get_phrase('title');?>" required="" name="title" type="text">
              </div>
              </div>
            </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('class');?></label>
                <div class="col-sm-10">
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                    </div>
                    <select class="form-control" required="" name="class_id" onchange="get_class_sections(this.value);">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php $class_info = $this->db->get('class')->result_array(); 
                            foreach ($class_info as $row): ?>
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
                        <i class="picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
                    </div>
                    <select class="form-control" id="section_selector_holder" required="" name="section_id" onchange="get_class_students(this.value);">
                        <option value=""><?php echo get_phrase('select');?></option>
                  </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('student');?></label>
                <div class="col-sm-10">
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
                    </div>
                    <select class="form-control" id="students_holder" required="" name="student_id">
                        <option value=""><?php echo get_phrase('select');?></option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('report');?></label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="4" name="description" required=""></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('priority');?></label>
                <div class="col-sm-10">
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="picons-thin-icon-thin-0061_error_warning_alert_attention"></i>
                    </div>
                    <select class="form-control" required="" name="priority">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <option value="baja"><?php echo get_phrase('low');?></option>
                        <option value="media"><?php echo get_phrase('medium');?></option>
                        <option value="alta"><?php echo get_phrase('high');?></option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('file');?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0042_attachment"></i>
                  </div>
                  <input class="form-control" placeholder="<?php echo get_phrase('upload_file');?>" name="file_name" type="file">
                  </div></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-rounded" type="submit"> <?php echo get_phrase('create');?></button>
                </div>
                <?php echo form_close();?>
            </div>
            </div>
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
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_class_students(class_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_stundets/' + class_id,
            success: function (response)
            {
                jQuery('#students_holder').html(response);
            }
        });
    }
</script>