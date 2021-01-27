<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" data-toggle="tab" href="#classroom"><i class="os-icon picons-thin-icon-thin-0047_home_flat"></i><span><?php echo get_phrase('classrooms');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#new"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('add_class_room');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
	
		<div class="tab-pane active" id="classroom">
		<div class="col-lg-12">
		<div class="element-wrapper">
			<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('classrooms');?></h5><br>
			<div class="table-responsive">
			  <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
				<thead>
				  <tr>
					<th><?php echo get_phrase('name');?></th>
					<th><?php echo get_phrase('number');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				  </tr>
				</thead>
				<tbody>
				<?php $rooms = $this->db->get('dormitory')->result_array();
					foreach($rooms as $room):
				?>
				  <tr>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $room['number'];?></a></td>
					<td><?php echo $room['name'];?></td>
					<td class="row-actions">
						<a class="success" href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_classrooms/<?php echo $room['dormitory_id'];?>');"><i class="picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i></a>
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_classroom/<?php echo $room['dormitory_id'];?>');"><i class="picons-thin-icon-thin-0002_write_pencil_new_edit"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/classrooms/delete/<?php echo $room['dormitory_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/classrooms/create/' , array('enctype' => 'multipart/form-data'));?>
		  <h5 class="form-header"><?php echo get_phrase('new');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="os-icon picons-thin-icon-thin-0002_write_pencil_new_edit"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('name');?>" name="number" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('number');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="os-icon picons-thin-icon-thin-0047_home_flat"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('number');?>" required="" name="name" type="text">
				</div>
			  </div>
			</div>			
		  <div class="form-buttons-w">
			<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('save');?></button>
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