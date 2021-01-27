<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#teachfiles"><i class="os-icon picons-thin-icon-thin-0119_folder_open_full_documents"></i><span> <?php echo get_phrase('teacher_files');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#new"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i><span><?php echo get_phrase('upload_file');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<div class="tab-content">
	<div class="tab-pane active" id="teachfiles">
	<div class="col-lg-12">
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h6 class="form-header"><?php echo get_phrase('teacher_files');?></h6>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th style="text-align: center;"><?php echo get_phrase('type');?></th>
				<th style="text-align: center;"><?php echo get_phrase('date');?></th>
				<th style="text-align: center;"><?php echo get_phrase('username');?></th>
				<th style="text-align: center;"><?php echo get_phrase('name');?></th>
				<th style="text-align: center;"><?php echo get_phrase('description');?></th>
				<th style="text-align: center;"><?php echo get_phrase('download');?></th>
				<th class="text-center"><?php echo get_phrase('options');?></th>
			</tr>
			</thead>
			<tbody>
			<?php $teacher_files = $this->db->get('teacher_files')->result_array();
			foreach($teacher_files as $row):
			?>
			<tr>
				<td>
				<?php if($row['file_type'] == 'PDF'):?>
					<i class="picons-thin-icon-thin-0077_document_file_pdf_adobe_acrobat" style="font-size:25px"></i>
				<?php endif;?>
				<?php if($row['file_type'] == 'Zip'):?>
					<i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:25px"></i>
				<?php endif;?>
				<?php if($row['file_type'] == 'RAR'):?>
					<i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:25px"></i>
				<?php endif;?>
				<?php if($row['file_type'] == 'Doc'):?>
					<i class="picons-thin-icon-thin-0078_document_file_word_office_doc_text" style="font-size:25px"></i>
				<?php endif;?>
				<?php if($row['file_type'] == 'Image'):?>
					<i class="picons-thin-icon-thin-0082_image_photo_file" style="font-size:25px"></i>
				<?php endif;?>
				<?php if($row['file_type'] == 'Other'):?>
					<i class="picons-thin-icon-thin-0111_folder_files_documents" style="font-size:25px"></i>
				<?php endif;?>
				</td>
				<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date'];?></a></td>
				<td width="20%"><img alt="" src="<?php echo $this->crud_model->get_image_url('admin', $row['user']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('admin', array('admin_id' => $row['user']))->row()->name;?></td>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>admin/files/download/<?php echo $row['file_code'];?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a></td>
				<td class="row-actions">
					<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/files/delete/<?php echo $row['file_code'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
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
		<?php echo form_open(base_url() . 'admin/files/create', array('enctype' => 'multipart/form-data')); ?>
		  <h5 class="form-header"><?php echo get_phrase('upload_file');?></h5><br>
		  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('title');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0111_folder_files_documents"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('title');?>" type="text" name="title" required="">
				</div>
			  </div>
			</div>
			<div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""><?php echo get_phrase('description');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0063_text_line_view"></i>
				  </div>
				<input class="form-control" placeholder="<?php echo get_phrase('description');?>" name="description" type="text">
				</div>
			  </div>
			</div>			
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('file');?></label>
				<div class="col-sm-9">
				  <div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0042_attachment"></i>
					</div>
				  <input class="form-control" placeholder="<?php echo get_phrase('file');?>" type="file" name="file_name" required="">
				  </div></div>
				</div>
				<div class="form-group row">
				<label class="col-form-label col-sm-3" for=""><?php echo get_phrase('type');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0073_documents_files_paper_text_archive_copy"></i>
					</div>
				  <select class="form-control" name="file_type" required="">
					<option value="PDF">PDF</option>
					<option value="Doc">Doc</option>
					<option value="Zip">Zip</option>
					<option value="RAR">RAR</option>
					<option value="Image"><?php echo get_phrase('image');?></option>
					<option value="Other"><?php echo get_phrase('other');?></option>
				  </select>
				  </div>
				</div>
			  </div>
		  <div class="form-buttons-w">
			<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('upload');?></button>
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