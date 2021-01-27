<?php  $edit_data = $this->db->get_where('exam' , array('exam_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'admin/semesters/update/'.$row['exam_id'], array('enctype' => 'multipart/form-data')); ?>
          <br>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('name');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0007_book_reading_read_bookmark"></i>
                  </div>
                <input class="form-control" name="name" value="<?php echo $row['name'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-group row">
          <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('start');?></label>
          <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0022_calendar_month_day_planner"></i>
        </div>
        <select class="form-control" name="start">
        <option value="1" <?php if($row['start'] == 1) echo 'selected';?>><?php echo get_phrase('january');?></option>
        <option value="2" <?php if($row['start'] == 2) echo 'selected';?>><?php echo get_phrase('february');?></option>
        <option value="3" <?php if($row['start'] == 3) echo 'selected';?>><?php echo get_phrase('march');?></option>
        <option value="4" <?php if($row['start'] == 4) echo 'selected';?>><?php echo get_phrase('april');?></option>
        <option value="5" <?php if($row['start'] == 5) echo 'selected';?>><?php echo get_phrase('may');?></option>
        <option value="6" <?php if($row['start'] == 6) echo 'selected';?>><?php echo get_phrase('june');?></option>
        <option value="7" <?php if($row['start'] == 7) echo 'selected';?>><?php echo get_phrase('july');?></option>
        <option value="8" <?php if($row['start'] == 8) echo 'selected';?>><?php echo get_phrase('august');?></option>
        <option value="9" <?php if($row['start'] == 9) echo 'selected';?>><?php echo get_phrase('september');?></option>
        <option value="10" <?php if($row['start'] == 10) echo 'selected';?>><?php echo get_phrase('october');?></option>
        <option value="11" <?php if($row['start'] == 11) echo 'selected';?>><?php echo get_phrase('november');?></option>
        <option value="12" <?php if($row['start'] == 12) echo 'selected';?>><?php echo get_phrase('december');?></option>
        </select>
        </div>
      </div>
      </div>
       <div class="form-group row">
      <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('end');?></label>
      <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0022_calendar_month_day_planner"></i>
        </div>
        <select class="form-control" name="end">
        <option value="1" <?php if($row['end']  == 1) echo 'selected';?>><?php echo get_phrase('january');?></option>
        <option value="2" <?php if($row['end']  == 2) echo 'selected';?>><?php echo get_phrase('february');?></option>
        <option value="3" <?php if($row['end']  == 3) echo 'selected';?>><?php echo get_phrase('march');?></option>
        <option value="4" <?php if($row['end']  == 4) echo 'selected';?>><?php echo get_phrase('april');?></option>
        <option value="5" <?php if($row['end']  == 5) echo 'selected';?>><?php echo get_phrase('may');?></option>
        <option value="6" <?php if($row['end']  == 6) echo 'selected';?>><?php echo get_phrase('june');?></option>
        <option value="7" <?php if($row['end']  == 7) echo 'selected';?>><?php echo get_phrase('july');?></option>
        <option value="8" <?php if($row['end']  == 8) echo 'selected';?>><?php echo get_phrase('august');?></option>
        <option value="9" <?php if($row['end']  == 9) echo 'selected';?>><?php echo get_phrase('september');?></option>
        <option value="10" <?php if($row['end'] == 10) echo 'selected';?>><?php echo get_phrase('october');?></option>
        <option value="11" <?php if($row['end'] == 11) echo 'selected';?>><?php echo get_phrase('november');?></option>
        <option value="12" <?php if($row['end'] == 12) echo 'selected';?>><?php echo get_phrase('december');?></option>
        </select>
        </div>
      </div>
      </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary btn-rounded" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>