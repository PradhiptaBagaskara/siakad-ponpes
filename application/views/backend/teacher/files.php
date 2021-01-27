<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0119_folder_open_full_documents"></i><span><?php echo get_phrase('teacher_files');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<div class="col-lg-12">
	<div class="element-wrapper">
		<div class="element-box lined-primary shadow">
			<h5 class="form-header"><?php echo get_phrase('teacher_files');?></h5>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('type');?></th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th><?php echo get_phrase('download');?></th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$teacher_files = $this->db->get('teacher_files')->result_array();
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
					<?php endif;?></td>
					<td><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['date'];?></a></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['description']?></td>
					<td><a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>teacher/files/download/<?php echo $row['file_code'];?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div>
		</div>
	  </div>
	</div>
	
  </div>
</div>
</div>