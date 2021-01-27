<?php  $edit_data = $this->db->get_where('class' , array('class_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'admin/manage_classes/update/'.$row['class_id'], array('enctype' => 'multipart/form-data')); ?>
          <br>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('name');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="name" value="<?php echo $row['name'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('teacher');?></label>
            <div class="col-sm-8">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                </div>
              <select class="form-control" name="teacher_id">
                <option value=""><?php echo get_phrase('select');?></option>
                <?php $teachers = $this->db->get('teacher')->result_array(); 
                foreach($teachers as $teacher):
                ?>
                <option value="<?php echo $teacher['teacher_id'];?>" <?php if($row['teacher_id'] == $teacher['teacher_id']) echo 'selected';?>><?php echo $teacher['name'];?></option>
            <?php endforeach;?>
              </select>
              </div>
            </div>
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>