<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; 
	$class_id = $this->db->get_where('enroll', array('student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->row()->class_id;
	$section_id = $this->db->get_where('enroll' , array('student_id' => $this->session->userdata('login_user_id'),'class_id' => $class_id,'year' => $running_year))->row()->section_id;
?>
<div class="content-w">
	<div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0017_office_archive"></i><span><?php echo get_phrase('library');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
 <div class="content-i">
	<div class="content-box">
	<div class="col-lg-12">
	<div class="element-wrapper">
		<div class="element-box lined-primary">
			<h5 class="form-header">
			  <?php echo $this->db->get_where('class', array('class_id' => $class_id))->row()->name;?>
			</h5>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('type');?></th>
				<th><?php echo get_phrase('name');?></th>
				<th><?php echo get_phrase('author');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th class="text-center"><?php echo get_phrase('status');?></th>
				<th><?php echo get_phrase('price');?></th>
				<th><?php echo get_phrase('download');?></th>
			</tr>
			</thead>
			<tbody>
			<?php $count = 1; 
				$book = $this->db->get_where('book', array('class_id' => $class_id))->result_array();
			foreach($book as $row):?>
			<tr>
				<td>
				<?php if($row['type'] == 'virtual'):?>
					<a class="btn nc btn-rounded btn-sm btn-purple" style="color:white"><?php echo get_phrase('virtual');?></a>
				<?php endif;?>
				<?php if($row['type'] == 'normal'):?>
					<a class="btn nc btn-rounded btn-sm btn-info" style="color:white"><?php echo get_phrase('normal');?></a>
				<?php endif;?>
				</td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['author'];?></td>
				<td><?php echo $row['description'];?></td>
				<td class="text-center">
				<?php if($row['status'] == 2):?>
					<div class="status-pill red" data-title="Unavailable" data-toggle="tooltip"></div>
				<?php endif;?>
				<?php if($row['status'] == 1):?>
					<div class="status-pill green" data-title="Unavailable" data-toggle="tooltip"></div>
				<?php endif;?>
				</td>
				<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?> <?php echo $row['price'];?></a></td>
				<td>
				<?php if($row['type'] == 'virtual' && $row['file_name'] != ""):?>
					<a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>uploads/library/<?php echo $row['file_name'];?>"><i class="picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a>
				<?php endif;?>
				<?php if($row['type'] == 'normal'):?>
					<?php echo get_phrase('no_downloaded');?>
				<?php endif;?>
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
	</div>
  </div>