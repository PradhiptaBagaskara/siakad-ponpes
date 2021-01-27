<?php  $edit_data = $this->db->get_where('dormitory' , array('dormitory_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'admin/classrooms/update/'.$row['dormitory_id'], array('enctype' => 'multipart/form-data')); ?>
          <br>
          <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('number');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0470_bus_transport"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('number');?> de salon" name="number" value="<?php echo $row['name'];?>" type="text">
        </div>
        </div>
      </div>
        <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('name');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0545_map_travel_distance_directions"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('name');?>" required="" value="<?php echo $row['number'];?>" name="name" type="text">
        </div>
        </div>
      </div>  
          <div class="form-buttons-w">
            <button class="btn btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>