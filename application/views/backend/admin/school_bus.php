<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" data-toggle="tab" href="#bus"><i class="os-icon picons-thin-icon-thin-0470_bus_transport"></i><span><?php echo get_phrase('school_bus');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#new"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('new');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
	
		<div class="tab-pane active" id="bus">
		<div class="col-lg-12">
		<div class="element-wrapper">
			<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('school_bus');?></h5><br>
			<div class="table-responsive">
			  <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
				<thead>
				  <tr>
					<th><?php echo get_phrase('name');?></th>
					<th><?php echo get_phrase('route');?></th>
					<th><?php echo get_phrase('bus_id');?></th>
					<th><?php echo get_phrase('driver');?></th>
					<th><?php echo get_phrase('driver_phone');?></th>
					<th><?php echo get_phrase('price');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				  </tr>
				</thead>
				<tbody>
				<?php $bus = $this->db->get('transport')->result_array();
				foreach($bus as $buss):
				?>
				  <tr>
					<td><?php echo $buss['route_name'];?></td>
					<td><?php echo $buss['route'];?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $buss['number_of_vehicle'];?></a></td>
					<td><?php echo $buss['driver_name'];?></td>
					<td><?php echo $buss['driver_phone'];?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><span>$</span><?php echo $buss['route_fare'];?></a></td>
					<td class="row-actions" class="text-center" nowrap>
						<a class="success" href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_bus/<?php echo $buss['transport_id'];?>');"><i class="picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i></a>
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_transport/<?php echo $buss['transport_id'];?>');"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" class="danger" href="<?php echo base_url();?>admin/school_bus/delete/<?php echo $buss['transport_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
					</td>
				 </tr>
				<?php endforeach;?>
				</tbody>
			  </table>
			</div>
			</div>
			</div>
		  </div>
		</div>
		
		<div class="tab-pane" id="new">
		<div class="col-lg-12">
		<div class="element-wrapper">
		  <div class="element-box lined-primary shadow">
		<?php echo form_open(base_url() . 'admin/school_bus/create/' , array('enctype' => 'multipart/form-data'));?>
		  <h5 class="form-header"><?php echo get_phrase('new');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0470_bus_transport"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('name');?>" name="route_name" required type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('route');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0545_map_travel_distance_directions"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('route');?>" name="route" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('bus_id');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0487_van_truck_transport_vehicle"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('bus_id');?>" name="number_of_vehicle" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('driver');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('driver');?>" name="driver_name" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('driver_phone');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0289_mobile_phone_call_ringing_nfc"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('driver_phone');?>" name="driver_phone" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('price');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
				  </div>
				<input class="form-control" placeholder="$200" type="text" name="route_fare">
				</div>
			  </div>
			</div>
		  <div class="form-buttons-w">
			<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('save');?></button>
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