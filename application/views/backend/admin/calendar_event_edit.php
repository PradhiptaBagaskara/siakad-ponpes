<?php 
	$edit_data = $this->db->get_where('calendar_event' , array('calendar_event_id' => $param2))->result_array();
?>
	<?php
		foreach ($edit_data as $row):
	?>
<?php echo form_open(base_url() . 'admin/calendar/edit/'.$param2, array('id' => 'formValidate', 'enctype' => 'multipart/form-data'));?>
<div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('title');?></label>
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
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('colour');?></label>
              <div class="col-sm-8">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                  <select name="colour" class="form-control">
	                  <option value=""><?php echo get_phrase('select_colour');?></option>
                    <option style="color:#E93339;" value="#E93339" <?php if ($row['colour'] == '#E93339') echo 'selected';?>>&#9724; <?php echo get_phrase('red');?></option>
                    <option style="color:#FDA330;" value="#FDA330" <?php if ($row['colour'] == '#FDA330') echo 'selected';?>>&#9724; <?php echo get_phrase('orange');?></option>
                    <option style="color:#252A32;" value="#252A32" <?php if ($row['colour'] == '#252A32') echo 'selected';?>>&#9724; <?php echo get_phrase('black');?></option>
                    <option style="color:#279ACB;" value="#279ACB" <?php if ($row['colour'] == '#279ACB') echo 'selected';?>>&#9724; <?php echo get_phrase('blue');?></option>
                    <option style="color:#128C48;" value="#128C48" <?php if ($row['colour'] == '#128C48') echo 'selected';?>>&#9724; <?php echo get_phrase('green');?></option>
                    <option style="color:#4B088A;" value="#4B088A" <?php if ($row['colour'] == '#4B088A') echo 'selected';?>>&#9724; <?php echo get_phrase('purple');?></option>
	                </select>
                </div>
              </div>
            </div>	         
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('description');?></label>
              <div class="col-sm-8">
                <div class="input-group">
                  <textarea class="form-control" rows="10" name="description"><?php echo $row['description'];?></textarea>
                </div>
              </div>
            </div>
           <div class="modal-footer">
             <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('update');?></button>
          </div>
	       <?php echo form_close(); ?>
        <div class="modal-footer">
	       <a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/calendar/delete/<?php echo $param2;?>" class="btn btn-rounded btn btn-danger text-white" id="undo"><?php echo get_phrase('delete');?></a>
          </div>
	<?php endforeach;?>