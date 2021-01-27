        <div class="content-w">
        	<?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->notify == 1):?>
          <div class="content-i">
            <div class="content-box">
              <div class="section-heading centered">
                <h1>
                 <?php echo get_phrase('notification_center');?>
                </h1>
                <p>
                  <?php echo get_phrase('welcome_notifications');?>. <?php echo get_phrase('what_send');?>
                </p>
              </div>
              <div class="pricing-plans row no-gutters">
              <div class="pricing-plan col-sm-4 with-hover-effect">
                  <div class="plan-head">
                    <div class="plan-name">
                     <?php echo get_phrase('teachers');?>
                    </div>
                  </div>
                  <div class="plan-body">
                    <div class="plan-btn-w"><br>
                      <a class="btn btn-primary btn-rounded" href="#" data-target="#users_sms" data-toggle="modal"><?php echo get_phrase('start');?></a>
                    </div>
                  </div>
                </div>
                <div class="pricing-plan col-sm-4 with-hover-effect">
                  <div class="plan-head">
                    <div class="plan-name"><?php echo get_phrase('marks');?> (<?php echo get_phrase('sms');?>)</div>
                  </div>
                  <div class="plan-body">
                    <div class="plan-btn-w"><br>
                      <a class="btn btn-primary btn-rounded" href="#" data-target="#modalmarkssms" data-toggle="modal"><?php echo get_phrase('start');?></a>
                    </div>
                  </div>
                </div>
                <div class="pricing-plan col-sm-4 with-hover-effect">
                  <div class="plan-head">
                    <div class="plan-name">
                     <?php echo get_phrase('bulk_email');?>
                    </div>
                  </div>
                  <div class="plan-body">
                    <div class="plan-btn-w"><br>
                      <a class="btn btn-primary btn-rounded" href="#" data-target="#bulk_email" data-toggle="modal"><?php echo get_phrase('start');?></a>
                    </div>
                  </div>
                </div>
              </div>

			  <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modalmarkssms" role="dialog" tabindex="-1">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
						 <?php echo get_phrase('send_marks_sms');?>
						</h5>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
					  </div>
					  <div class="modal-body">
                        <?php echo form_open(base_url() . 'admin/notify/markssms');?>
                            <div class="form-group row">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('class');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
						  <select class="form-control" required name="class_id">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php $classes = $this->db->get('class')->result_array();
						             foreach($classes as $row): ?>
                            		                  <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                                                      <?php endforeach; ?>
						  </select>
						  </div></div></div>

                                                <div class="form-group row">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('receiver');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
						  <select class="form-control" required name="receiver">
							<option value=""><?php echo get_phrase('select');?></option>
							<option value="student"><?php echo get_phrase('students');?></option>
							<option value="parent"><?php echo get_phrase('parents');?></option>
						  </select>
						  </div></div></div>

						  <div class="form-group row">
						  <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('notification');?></label>
						  <div class="col-sm-8">
						  <div class="input-group">
							<textarea class="form-control" name="message" cols="100" required rows="4"></textarea>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="modal-footer">
						<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('send_sms');?></button>
					  </div>
                                            <?php echo form_close();?>
					</div>
				  </div>
				</div>



				<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="users_sms" role="dialog" tabindex="-1">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
						 <?php echo get_phrase('teachers_sms');?>
						</h5>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
					  </div>
					  <div class="modal-body">
                                              <?php echo form_open(base_url() . 'admin/notify/teachers');?>

                                                  <div class="form-group row">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('select');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
						  <select class="form-control" required name="user_type" onchange="usert(this.value);">
							<option value=""><?php echo get_phrase('select');?></option>
                           	<option value="1"><?php echo get_phrase('all_teachers');?></option>
                           	<option value="2"><?php echo get_phrase('single_teacher');?></option>
						  </select>
						  </div></div></div>

                                                <div class="form-group row" style="display: none;" id="type">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('receiver');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
						  <select class="form-control" name="teacher_phone">
							<option value=""><?php echo get_phrase('select');?></option>
							<?php $teachers = $this->db->get('teacher')->result_array();
								foreach($teachers as $row):
							?>
								<option value="<?php echo $row['phone'];?>"><?php echo $row['name'];?></option>
							<?php endforeach;?>
						  </select>
						  </div></div></div>

						  <div class="form-group row">
						  <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('notification');?></label>
						  <div class="col-sm-8">
						  <div class="input-group">
							<textarea class="form-control" name="message" cols="100" required rows="4"></textarea>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="modal-footer">
						<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('send_sms');?></button>
					  </div>
                                            <?php echo form_close();?>
					</div>
				  </div>
				</div>

				
				<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="bulk_email" role="dialog" tabindex="-1">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
						 <?php echo get_phrase('send_bulk_emails');?>
						</h5>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
					  </div>
					  <div class="modal-body">
                                              <?php echo form_open(base_url() . 'admin/notify/bulkemail');?>

                                                  <div class="form-group row">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('receiver');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
						  <select class="form-control" required name="type">
							<option value=""><?php echo get_phrase('select');?></option>
                            		                  <option value="admin">Admins</option>
                            		                  <option value="teacher">Teachers</option>
                            		                  <option value="student">Students</option>
                            		                  <option value="parent">Parents</option>
						  </select>
						  </div></div></div>

                                                <div class="form-group row">
						<label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('email_subject');?></label>
						<div class="col-sm-8">
							<div class="input-group">
							<div class="input-group-addon">
								<i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
							</div>
  						      <input type="text" class="form-control" required name="subject">
						    </div></div></div>

						  <div class="form-group row">
						  <div class="col-sm-12">
						  <div class="input-group">
							<textarea class="form-control" name="message" id="ckeditor1" cols="100" required rows="4"></textarea>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="modal-footer">
						<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('send_email');?></button>
					  </div>
                                            <?php echo form_close();?>
					</div>
				  </div>
				</div>
				
            </div>
          </div>
      <?php endif;?>
        </div>


<script>
	function usert(type){
		if(type == 1){
			$( "#type").hide(500);
		}else if(type == 2){
			$( "#type").show(500);
		}
	}
</script>