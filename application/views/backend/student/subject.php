<?php
	$class = $this->db->get_where('enroll', array('student_id' => $this->session->userdata('login_user_id')))->row()->class_id;
	$year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
 ?>
<div class="content-w">
<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span> <?php echo get_phrase('subjects');?></span></a>
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
		  <div class="form-header">
			<h5 class="form-header"><?php echo get_phrase('subjects');?></h5>
		  </div>
		  <div class="table-responsive">
			<table width="100%" class="table table-lightborder table-lightfont">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo get_phrase('subject');?></th>
					<th><?php echo get_phrase('teacher');?></th>
					<th><?php echo get_phrase('send_message');?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$n = 1;
			$subjects = $this->db->get_where('subject', array('class_id' => $class, 'year' => $year))->result_array();
				foreach($subjects as $row):
			?>

				<?php $data = "teacher"."-".$row['teacher_id'];
						$send_data = base64_encode($data);
				?>
				<tr>
					<td><?php echo $n++;?></td>
					<td><?php echo $row['name'];?></td>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name;?></td>
					<td><a class="btn btn-rounded btn-sm btn-success" style="color:white" href="<?php echo base_url();?>student/message/message_new/<?php echo $send_data;?>"><i class="picons-thin-icon-thin-0317_send_post_paper_plane"></i> <?php echo get_phrase('send_message');?></a></td>
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
</div>