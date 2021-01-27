<?php $details = $book = $this->db->get_where('book', array('book_id' => $book_id))->result_array();
		foreach($details as $row):
 ?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>admin/library/"><i class="os-icon picons-thin-icon-thin-0017_office_archive"></i><span><?php echo get_phrase('library');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="" href="#"><i class="os-icon picons-thin-icon-thin-0009_book_reading_read_manual"></i><span><?php echo get_phrase('update_book');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
	<div class="col-lg-12">
	<div class="element-wrapper">
	  <div class="element-box lined-primary shadow">
		<?php echo form_open(base_url() . 'admin/library/update/'.$row['book_id'] , array('enctype' => 'multipart/form-data'));?>
		  <h5 class="form-header"><?php echo get_phrase('update_book');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0009_book_reading_read_manual"></i>
				  </div>
				<input class="form-control" value="<?php echo $row['name'];?>" required="" name="name" type="text">
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
				<input class="form-control" required="" value="<?php echo $row['author'];?>" name="author" type="text">
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
				<input class="form-control" name="description" type="text" value="<?php echo $row['description'];?>">
				</div>
			  </div>
			</div>
			<div class="form-group row">
            <label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
            <div class="col-sm-9">				<div class="input-group">				<div class="input-group-addon">					<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>				  </div>
              <select class="form-control" name="class_id">
                <option value=""><?php echo get_phrase('select');?></option>
                <?php $cl = $this->db->get('class')->result_array();
                     foreach($cl as $row2):
                  	?>
                     <option value="<?php echo $row2['class_id'];?>" <?php if($row2['class_id'] == $row['class_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
                  <?php endforeach;?>
              </select>
            </div>			</div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('price');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
				  </div>
				<input class="form-control" placeholder="99" name="price" type="text" value="<?php echo $row['price'];?>">
				</div>
			  </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"> <?php echo get_phrase('status');?></label>
				<div class="col-sm-9">
				  <div class="form-check">
					<label class="form-check-label"><input class="form-check-input" name="status" type="radio" value="1" <?php if($row['status'] == 1) echo 'checked';?>><?php echo get_phrase('available');?></label>
					<label class="form-check-label"><input class="form-check-input" name="status" type="radio" value="2" <?php if($row['status'] == 2) echo 'checked';?> style="margin-left:5px;"><?php echo get_phrase('unavailable');?></label>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-3 col-form-label"> <?php echo get_phrase('type');?></label>
				<div class="col-sm-9">
				  <div class="form-check">
					<label class="form-check-label"><input class="form-check-input" name="type" type="radio" value="virtual" <?php if($row['type'] == 'virtual') echo 'checked';?>><?php echo get_phrase('virtual');?></label>
					<label class="form-check-label"><input class="form-check-input" name="type" type="radio" value="normal" <?php if($row['type'] == 'normal') echo 'checked';?> style="margin-left:5px;"><?php echo get_phrase('normal');?></label>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('book');?></label>
				<div class="col-sm-9">
				  <div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0042_attachment"></i>
					</div>
				  <input class="form-control" placeholder="Upload Book" name="file_name" type="file">
				  </div></div>
				</div>
		  		<div class="form-buttons-w">
					<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('update');?></button>
		  		</div>	
		<?php echo form_close();?>
	  </div>
	</div>
	</div>
	</div>
  </div>
</div>
</div>
<?php endforeach;?>