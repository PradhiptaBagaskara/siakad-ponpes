<?php  $edit_data = $this->db->get_where('transport' , array('transport_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'admin/school_bus/update/'.$row['transport_id'], array('enctype' => 'multipart/form-data')); ?>
          <br>
          <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('transport_name');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0470_bus_transport"></i>
          </div>
        <input class="form-control" name="route_name" value="<?php echo $row['route_name'];?>" required type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('route');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0545_map_travel_distance_directions"></i>
          </div>
        <input class="form-control" name="route" value="<?php echo $row['route'];?>" type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('bus_id');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0487_van_truck_transport_vehicle"></i>
          </div>
        <input class="form-control" value="<?php echo $row['number_of_vehicle'];?>" name="number_of_vehicle" type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('driver');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0699_user_profile_avatar_man_male"></i>
          </div>
        <input class="form-control" placeholder="<?php echo get_phrase('driver_name');?>" value="<?php echo $row['driver_name'];?>" name="driver_name" type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('driver_phone');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0294_phone_call_ringing"></i>
          </div>
        <input class="form-control" value="<?php echo $row['driver_phone'];?>" name="driver_phone" type="text">
        </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label" for=""><?php echo get_phrase('price');?></label>
        <div class="col-sm-8">
        <div class="input-group">
        <div class="input-group-addon">
          <i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
          </div>
        <input class="form-control" placeholder="$200" value="<?php echo $row['route_fare'];?>" type="text" name="route_fare">
        </div>
        </div>
      </div>

          <div class="form-buttons-w">
            <button class="btn btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>