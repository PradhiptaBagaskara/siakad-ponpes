<?php $edit_data = $this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'admin/invoice/do_update/'.$row['invoice_id']);?>
                 
           <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('student');?></label>
            <div class="col-sm-8">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                </div>
              <select class="form-control" name="student_id">
                <option value=""><?php echo get_phrase('select');?></option>
                <?php 
                   $students = $this->db->get('student')->result_array();
                   foreach($students as $row2):
                ?>
                <option value="<?php echo $row2['student_id'];?>" <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                  <?php echo $this->crud_model->get_type_name_by_id('student' , $row2['student_id']);
                       $class_id = $this->db->get_where('enroll' , array('student_id' => $row2['student_id'],'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description))->row()->class_id; ?> - 
                     <?php echo $this->crud_model->get_class_name($class_id);?>
                </option>
            <?php endforeach;?>
              </select>
              </div>
            </div>
          </div>


                <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('title');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="title" value="<?php echo $row['title'];?>" required="" type="text">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('description');?></label>
              <div class="col-sm-8">
                <textarea class="form-control" id="ckeditor1" name="description" required=""><?php echo $row['title'];?></textarea>
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('total');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="amount" value="<?php echo $row['amount'];?>" required="" type="text">
                </div>
              </div>
            </div>

              <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('status');?></label>
            <div class="col-sm-8">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                </div>
              <select class="form-control" name="status">
                <option value="completed" <?php if($row['status']=='completed') echo 'selected';?>><?php echo get_phrase('paid');?></option>
                <option value="pending" <?php if($row['status']=='pending') echo 'selected';?>><?php echo get_phrase('unpaid');?></option>
              </select>
              </div>
            </div>
          </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo get_phrase('update');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
</div>