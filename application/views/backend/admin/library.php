<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#library"><i class="os-icon picons-thin-icon-thin-0017_office_archive"></i><span><?php echo get_phrase('library');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#new"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('add_book');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
	<div class="tab-pane active" id="library">
	<div class="col-lg-12">
	 <?php echo form_open(base_url() . 'admin/library/', array('class' => 'form m-b'));?>
		  <div class="row">
			<div class="col-sm-12">
			  <div class="form-group">
				<label class="gi" for=""><?php echo get_phrase('class');?>:</label>
				<select class="form-control" name="class_id" required="" onchange="submit();">
					<option value=""><?php echo get_phrase('select');?></option>
					<?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                  	?>
                     <option value="<?php echo $row['class_id'];?>" <?php if($id == $row['class_id']) echo 'selected';?>><?php echo $row['name'];?></option>
                  <?php endforeach;?>
					</select>
			  </div>
			</div>
		  </div><?php echo form_close();?>
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h6 class="form-header">
			  <?php echo $this->db->get_where('class', array('class_id' => $id))->row()->name;?>
			</h6>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('type');?></th>
				<th><?php echo get_phrase('name');?></th>
				<th><?php echo get_phrase('author');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th><?php echo get_phrase('status');?></th>
				<th><?php echo get_phrase('price');?></th>
				<th><?php echo get_phrase('download');?></th>
				<th class="text-center"><?php echo get_phrase('options');?></th>
			</tr>
			</thead>
			<tbody>
			<?php $count = 1; 
				$book = $this->db->get_where('book', array('class_id' => $id))->result_array();
			foreach($book as $row):?>
			<tr>
				<td>
				<?php if($row['type'] == 'virtual'):?>
					<a class="btn btn-rounded btn-sm btn-purple" style="color:white"><?php echo get_phrase('virtual');?></a>
				<?php endif;?>
				<?php if($row['type'] == 'normal'):?>
					<a class="btn btn-rounded btn-sm btn-info" style="color:white"><?php echo get_phrase('normal');?></a>
				<?php endif;?>
				</td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['author'];?></td>
				<td><?php echo $row['description'];?></td>
				<td>
				<?php if($row['status'] == 2):?>
					<div class="status-pill red" data-title="Unavailable" data-toggle="tooltip"></div>
				<?php endif;?>
				<?php if($row['status'] == 1):?>
					<div class="status-pill green" data-title="Unavailable" data-toggle="tooltip"></div>
				<?php endif;?>
				</td>
				<td><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?> <?php echo $row['price'];?></a></td>
				<td>
				<?php if($row['type'] == 'virtual' && $row['file_name'] != ""):?>
					<a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>uploads/library/<?php echo $row['file_name'];?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a>
				<?php endif;?>
				<?php if($row['type'] == 'normal'):?>
					<?php echo get_phrase('no_downloaded');?>
				<?php endif;?>
				</td>
				<td class="row-actions">
					<a href="<?php echo base_url();?>admin/update_book/<?php echo $row['book_id'];?>"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
					<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/library/delete/<?php echo $row['book_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/library/create' , array('enctype' => 'multipart/form-data'));?>
		  <h5 class="form-header"><?php echo get_phrase('add_book');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0009_book_reading_read_manual"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('name');?>" required="" name="name" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('author');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('author');?>" required="" name="author" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('description');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0008_book_reading_read_manual"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('description');?>" name="description" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
            <div class="col-sm-9">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
				  </div>
              <select class="form-control" name="class_id">
                <option value=""><?php echo get_phrase('select');?></option>
                <?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row):
                  	?>
                     <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                  <?php endforeach;?>
              </select>
            </div></div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('price');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
				  </div>
				<input class="form-control" placeholder="99" name="price" type="text">
				</div>
			  </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"> <?php echo get_phrase('status');?></label>
				<div class="col-sm-9">
				  <div class="form-check">
					<label class="form-check-label"><input class="form-check-input" checked name="status" type="radio" value="1"><?php echo get_phrase('available');?></label>
					<label class="form-check-label"><input class="form-check-input" name="status" type="radio" value="2" style="margin-left:5px;"><?php echo get_phrase('unavailable');?></label>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label"> <?php echo get_phrase('type');?></label>
				<div class="col-sm-9">
				  <div class="form-check">
					<label class="form-check-label"><input class="form-check-input" name="type" type="radio" value="virtual"><?php echo get_phrase('virtual');?></label>
					<label class="form-check-label"><input class="form-check-input" checked="" name="type" type="radio" value="normal" style="margin-left:5px;"><?php echo get_phrase('normal');?></label>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('book');?></label>
				  <div class="col-sm-9">
				  <div class="input-group form-control">
				  <input type="file" name="file_name" id="file-3" class="inputfile inputfile-3" style="display:none"/>
					<label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('send_file');?>...</span></label>
				</div>
				</div>
				</div>
		  		<div class="form-buttons-w text-right">
					<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('upload');?></button>
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