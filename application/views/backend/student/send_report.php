<div class="content-w">
  <div class="os-tabs-w menu-shad">
	<div class="os-tabs-controls">
	  <ul class="nav nav-tabs upper">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="tab" href="#reports"><i class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></i><span><?php echo get_phrase('teacher_report');?></span></a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#create"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i><span><?php echo get_phrase('create');?></span></a>
		</li>
	</div>
  </div>
  <div class="content-i">
    <div class="content-box">
	<div class="element-wrapper">
	<div class="tab-content">
		<div class="tab-pane active" id="reports">
          <div class="element-box lined-primary shadow">
		  <div class="form-header">
			<h6><?php echo get_phrase('teacher_report');?></h6>
		  </div>	  
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('teacher');?></th>
					<th><?php echo get_phrase('reason');?></th>
					<th><?php echo get_phrase('code');?></th>
					<th><?php echo get_phrase('date');?></th>
					<th><?php echo get_phrase('priority');?></th>
					<th><?php echo get_phrase('status');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
			<?php $reports = $this->db->get_where('reporte_alumnos', array('student_id' => $this->session->userdata('login_user_id')))->result_array();
			foreach($reports as $row):
			?>
				<tr>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name;?></td>
					<td><a href="<?php echo base_url();?>student/view_report/<?php echo $row['report_code'];?>"><?php echo $row['title'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row['report_code'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $row['timestamp'];?></a></td>
					<td>
					<?php if($row['priority'] == 'alta'):?>
						<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo get_phrase('high');?></a>
					<?php endif;?>
					<?php if($row['priority'] == 'media'):?>
						<a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('middle');?></a>
					<?php endif;?>
					<?php if($row['priority'] == 'baja'):?>
						<a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo get_phrase('low');?></a>
						<?php endif;?>
					</td>
					<td>
					<?php if($row['status'] == 0):?>
						<a class="btn nc btn-rounded btn-sm btn-danger" style="color:white" href="#"><?php echo get_phrase('pending');?></a>
					<?php endif;?>
					<?php if($row['status'] == 1):?>
						<a class="btn nc btn-rounded btn-sm btn-success" style="color:white" href="#"><?php echo get_phrase('solved');?></a>
					<?php endif;?>
					</td>
					<td class="row-actions">
						<a class="btn btn-rounded btn-sm btn-primary" style="color:white" href="<?php echo base_url();?>student/view_report/<?php echo $row['report_code'];?>"><i class="picons-thin-icon-thin-0043_eye_visibility_show_visible"></i> <?php echo get_phrase('view');?></</a>
					</td>	
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div>
		</div>
		</div>
		
		<div class="tab-pane" id="create">
          <div class="element-wrapper">
            <div class="element-box lined-primary shadow">
			<div class="form-header">
			<h5><?php echo get_phrase('create_teacher_report');?></h5><br>
			</div>

            <?php echo form_open(base_url() . 'student/listado_de_reportes/create/', array('enctype' => 'multipart/form-data')); ?>
              <div class="form-group row">
			  <label class="col-sm-2 col-form-label" for=""> <?php echo get_phrase('reason');?></label>
			  <div class="col-sm-10">
			  <div class="input-group">
			  <div class="input-group-addon">
				<i class="picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></i>
				</div>
			  <input class="form-control" required="" name="title" type="text">
			  </div>
			  </div>
			</div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('teacher');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
					</div>
				  <select class="form-control" name="teacher_id" required="">
					<option value=""><?php echo get_phrase('select');?></option>
					  <?php 
                        $teachers = $this->db->get('teacher')->result_array();
                        foreach($teachers as $row): ?>
                        <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                     <?php endforeach; ?>
				  </select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('report');?></label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="4" required="" name="description"></textarea>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('priority');?></label>
				<div class="col-sm-10">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0061_error_warning_alert_attention"></i>
					</div>
				  <select class="form-control" required="" name="priority">
					<option value=""><?php echo get_phrase('select');?></option>
					<option value="baja"><?php echo get_phrase('low');?></option>
					<option value="media"><?php echo get_phrase('middle');?></option>
					<option value="alta"><?php echo get_phrase('high');?></option>
				  </select>
				  </div>
				</div>
			  </div>			  
              <div class="form-group row">
				<label class="col-form-label col-sm-2" for=""> <?php echo get_phrase('files');?></label>
				<div class="col-sm-10">
				  <div class="input-group form-control">
				  <input type="file" name="file" id="file-3" class="inputfile inputfile-3" style="display:none"/>
					<label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('send_file');?>...</span></label>
					</div></div>
				</div>
				<div class="form-buttons-w text-right">
					<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('send');?></button>
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
	 </div>