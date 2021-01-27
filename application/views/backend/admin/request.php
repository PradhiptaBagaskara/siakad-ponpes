<div class="content-w">
  <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>admin/request_student/"><i class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></i><span><?php echo get_phrase('reports');?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>admin/request/"><i class="os-icon picons-thin-icon-thin-0015_fountain_pen"></i><span><?php echo get_phrase('permissions');?></span></a>
            </li>
          </ul>
        </div>
      </div>
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
		<div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" data-toggle="tab" href="#students"><?php echo get_phrase('students');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#teachers"><?php echo get_phrase('teachers');?></a>
				</li>
			  </ul>
			</div>
		  </div>
		 <div class="tab-content">
		<div class="tab-pane active" id="students">
            <div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('reason');?></th>
					<th><?php echo get_phrase('description');?></th>
					<th><?php echo get_phrase('user');?></th>
					<th><?php echo get_phrase('from');?></th>
					<th><?php echo get_phrase('until');?></th>
					<th><?php echo get_phrase('status');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
					<th class="text-center"><?php echo get_phrase('delete');?></th>
				</tr>
			</thead>
			<tbody>
			<?php
        		$count = 1;
        		$this->db->order_by('request_id', 'desc');
        		$requests = $this->db->get('students_request')->result_array();
        		foreach ($requests as $row) { 
        	?>   
				<tr>
					<td><a class="btn btn-rounded btn-sm btn-purple" style="color:white"><?php echo $row['title']; ?></a></td>
					<td><?php echo $row['description']; ?></td>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row['start_date']; ?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo $row['end_date']; ?></a></td>
					<td>
					<?php if($row['status'] == 0): ?>
						<a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('pending');?></a>
					<?php endif;?>
					<?php if($row['status'] == 1): ?>
						<a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo get_phrase('approved');?></a>
					<?php endif;?>
					<?php if($row['status'] == 2): ?>
						<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('rejected');?></a>
					<?php endif;?>
					</td>
					<td class="row-actions">
					<?php if($row['status'] == 0) { ?>
						<a class="success" onClick="return confirm('<?php echo get_phrase('confirm_approval');?>')" href="<?php echo base_url();?>admin/request_student/accept/<?php echo $row['request_id'];?>"><i class="picons-thin-icon-thin-0154_ok_successful_check"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_reject');?>')" href="<?php echo base_url();?>admin/request_student/reject/<?php echo $row['request_id'];?>"><i class="picons-thin-icon-thin-0153_delete_exit_remove_close"></i></a>
						<?php } else echo get_phrase('no_options'); ?>
					</td>
					<td><a  onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/request_student/delete/<?php echo $row['code'];?>"><button class="btn btn-danger btn-rounded btn-sm"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a></td>
				</tr>
				<?php } ?>
			</tbody>
			</table>
		  </div>
		</div>
        </div>
		<div class="tab-pane" id="teachers">
          <div class="element-wrapper">
            <div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('reason');?></th>
					<th><?php echo get_phrase('description');?></th>
					<th><?php echo get_phrase('user');?></th>
					<th><?php echo get_phrase('from');?></th>
					<th><?php echo get_phrase('until');?></th>
					<th><?php echo get_phrase('status');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
					<th class="text-center"><?php echo get_phrase('delete');?></th>
				</tr>
			</thead>
			<tbody>
			<?php
            	$count = 1;
            	$this->db->order_by('request_id', 'desc');
            	$requests = $this->db->get('request')->result_array();
	            foreach ($requests as $row) {
        	?>   
				<tr>
					<td><a class="btn btn-rounded btn-sm btn-purple" style="color:white"><?php echo $row['title']; ?></a></td>
					<td><?php echo $row['description']; ?></td>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name; ?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row['start_date']; ?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo $row['end_date']; ?></a></td>
					<td><?php if($row['status'] == 0): ?>
						<a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('pending');?></a>
					<?php endif;?>
					<?php if($row['status'] == 1): ?>
						<a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo get_phrase('approved');?></a>
					<?php endif;?>
					<?php if($row['status'] == 2): ?>
						<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('rejected');?></a>
					<?php endif;?></td>
					<td class="row-actions">
						<?php if($row['status'] == 0) { ?>
						<a class="success" onClick="return confirm('<?php echo get_phrase('confirm_approval');?>')" href="<?php echo base_url();?>admin/request/accept/<?php echo $row['request_id'];?>"><i class="picons-thin-icon-thin-0154_ok_successful_check"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_reject');?>')" href="<?php echo base_url();?>admin/request/reject/<?php echo $row['request_id'];?>"><i class="picons-thin-icon-thin-0153_delete_exit_remove_close"></i></a>
						<?php } else echo get_phrase('no_options'); ?>
					</td>
					<td><a  onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/request_student/delete/<?php echo $row['code'];?>"><button class="btn btn-danger btn-rounded btn-sm"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> <?php echo get_phrase('delete');?></button></a></td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
			</div>
			</div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>