<div class="content-w">
<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active"><i class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span><?php echo get_phrase('my_subjects');?></span></a>
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
			<h5 class="form-header"><?php echo get_phrase('my_subjects');?></h5>
		  </div>
		  <div class="table-responsive">
			<table width="100%" class="table table-lightborder table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('subject');?></th>
				<th class="text-center"><?php echo get_phrase('class');?></th>
				<th class="text-center"><?php echo get_phrase('students');?></th>
			</tr>
			</thead>
			<tbody>
			<?php $subjects = $this->db->get_where('subject', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
			foreach($subjects as $row):
			?>
				<tr>
					<?php 
						$data = $row['subject_id'] . "-" . $row['class_id'];
						$encode_data =  base64_encode($data);
					?>
					<td><?php echo $row['name'];?></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name;?></a></td>
					<td class="text-center"><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php $this->db->where('class_id', $row['class_id']); echo $this->db->count_all_results('enroll'); ?></a></td>
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

