<?php 
	$edit_data = $this->db->get_where('calendar_event' , array('calendar_event_id' => $param2))->result_array();
?>
	<?php foreach ($edit_data as $row):?>
<div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('title');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="title" value="<?php echo $row['title'];?>" readonly required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('description');?></label>
              <div class="col-sm-8">
                <div class="input-group">
                  <textarea class="form-control" readonly="" rows="10" name="description"><?php echo $row['description'];?></textarea>
                </div>
              </div>
            </div>
	<?php endforeach;?>