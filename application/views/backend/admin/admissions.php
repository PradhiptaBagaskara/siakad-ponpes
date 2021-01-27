<?php $status = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;?>
<div class="content-w">
    <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
			<?php if($status == 1):?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/admins/"><i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i><span><?php echo get_phrase('admins');?></span></a>
        </li>
      <?php endif;?>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/teachers/"><i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i><span><?php echo get_phrase('teachers');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/parents/"><i class="os-icon picons-thin-icon-thin-0703_users_profile_group_two"></i><span><?php echo get_phrase('parents');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/add_student/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('students');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/admissions/"><i class="os-icon picons-thin-icon-thin-0706_user_profile_add_new"></i><span><?php echo get_phrase('admissions');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
	<div class="content-i">
    <div class="content-box">
    <div class="col-lg-12">
    <div class="element-wrapper">
      <div class="element-box lined-primary shadow">
        <div class="table-responsive">
        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
          <thead>
            <tr>
              <th><?php echo get_phrase('name');?></th>
              <th><?php echo get_phrase('username');?></th>
              <th><?php echo get_phrase('email');?></th>
              <th><?php echo get_phrase('account_type');?></th>
              <th><?php echo get_phrase('options');?></th>
            </tr>
          </thead>
          <tbody>
          <?php $pending_users = $this->db->get('pending_users')->result_array();
		  	foreach($pending_users as $row):
		  ?>
            <tr>
              <td><?php echo $row['name'];?></td>
              <td>@<?php echo $row['username'];?></td>
              <td><?php echo $row['email'];?></td>
              <td>
                <div class="pt-btn">
                  	<?php if($row['type'] == 'student'):?>
						<a class="btn nc btn-sm btn-rounded btn-secondary" href="#"><?php echo get_phrase('student');?></a>
					<?php endif;?>
					<?php if($row['type'] == 'parent'):?>
						<a class="btn nc btn-sm btn-rounded btn-purple" href="#"><?php echo get_phrase('parent');?></a>
					<?php endif;?>
					<?php if($row['type'] == 'admin'):?>
		  				<a class="btn nc btn-sm btn-rounded btn-primary" href="#"><?php echo get_phrase('admin');?></a>
					<?php endif;?>
					<?php if($row['type'] == 'teacher'):?>
						<a class="btn nc btn-sm btn-rounded btn-success" href="#"><?php echo get_phrase('teacher');?></a>
					<?php endif;?>
                </div>
              </td>
              <td>
              		<?php if($row['type'] == 'student'):?>
						        <a href="<?php echo base_url();?>admin/student/accept/<?php echo $row['user_id'];?>" onClick="return confirm('<?php echo get_phrase('confirm_approval');?>')"><button class="btn btn-primary btn-rounded btn-sm"><?php echo get_phrase('accept');?></button></a>
					        <?php endif;?>
					        <?php if($row['type'] == 'parent'):?>
						        <a href="<?php echo base_url();?>admin/parents/accept/<?php echo $row['user_id'];?>" onClick="return confirm('<?php echo get_phrase('confirm_approval');?>')"><button class="btn btn-primary btn-rounded btn-sm"><?php echo get_phrase('accept');?></button></a>
					        <?php endif;?>
					        <?php if($row['type'] == 'teacher'):?>
						        <a href="<?php echo base_url();?>admin/teachers/accept/<?php echo $row['user_id'];?>" onClick="return confirm('<?php echo get_phrase('confirm_approval');?>')"><button class="btn btn-primary btn-rounded btn-sm"><?php echo get_phrase('accept');?></button></a>
					        <?php endif;?>
                	<a href="<?php echo base_url();?>admin/admissions/reject/<?php echo $row['user_id'];?>" onClick="return confirm('<?php echo get_phrase('confirm_reject');?>')"><button class="btn btn-danger btn-rounded btn-sm"><?php echo get_phrase('reject');?></button></a>
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
    </div>
  </div>
  </div>