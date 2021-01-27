<?php 
$edit_data		=	$this->db->get_where('grade' , array('grade_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
        <?php echo form_open(base_url() . 'admin/grade/update/'.$row['grade_id'] , array('enctype' => 'multipart/form-data'));?>
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
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('point');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="point" value="<?php echo $row['grade_point'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('mark_from');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="from" value="<?php echo $row['mark_from'];?>" required="" type="text">
                </div>
              </div>
            </div>
           <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('mark_to');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="to" value="<?php echo $row['mark_upto'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>