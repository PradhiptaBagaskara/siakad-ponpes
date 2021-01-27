<div class="content-w">
	<?php if ($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->settings == 1) : ?>
		<div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
				<ul class="nav nav-tabs upper">
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo base_url(); ?>admin/system_settings/"><i class="os-icon picons-thin-icon-thin-0050_settings_panel_equalizer_preferences"></i><span><?php echo get_phrase('system_settings'); ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin/sms/"><i class="os-icon picons-thin-icon-thin-0287_mobile_message_sms"></i><span><?php echo get_phrase('sms'); ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin/email/"><i class="os-icon picons-thin-icon-thin-0315_email_mail_post_send"></i><span><?php echo get_phrase('email_settings'); ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin/translate/"><i class="os-icon picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i><span><?php echo get_phrase('translate'); ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>admin/database/"><i class="picons-thin-icon-thin-0356_database"></i><span><?php echo get_phrase('database'); ?></span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-i">
			<div class="content-box">
				<?php echo form_open(base_url() . 'admin/system_settings/do_update'); ?>
				<div class="row">
					<div class="col-sm-6">
						<div class="element-box lined-primary shadow">
							<h5 class="form-header"><?php echo get_phrase('system_settings'); ?></h5><br>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('system_title'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?>" required name="system_title" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('system_name'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0047_home_flat"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>" type="text" name="system_name">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""><?php echo get_phrase('running_year'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0023_calendar_month_day_planner_events"></i>
										</div>
										<select class="form-control" name="running_year" required="">
											<?php $running_year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description; ?>
											<option value=""><?php echo get_phrase('select'); ?></option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="<?php echo (2016 + $i); ?>-<?php echo (2016 + $i + 1); ?>" <?php if ($running_year == (2016 + $i) . '-' . (2016 + $i + 1)) echo 'selected'; ?>>
													<?php echo (2016 + $i); ?>-<?php echo (2016 + $i + 1); ?>
												</option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('address'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0536_navigation_location_drop_pin_map"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>" name="address" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('phone'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0296_phone_call_contact"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>" name="phone" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('email'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0319_email_mail_post_card"></i>
										</div>
										<input class="form-control" name="system_email" value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>" type="email">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"><?= get_phrase('registration_allowed') ?></label>
								<div class="col-sm-8">
									<div class="form-check">
										<label class="form-check-label"><input <?php if ($this->db->get_where('settings', array('type' => 'register'))->row()->description == 1) echo "checked"; ?> class="form-check-input" name="register" type="radio" value="1"><?php echo get_phrase('yes'); ?></label>
									</div>
									<div class="form-check">
										<label class="form-check-label"><input <?php if ($this->db->get_where('settings', array('type' => 'register'))->row()->description == 0) echo "checked"; ?> class="form-check-input" name="register" type="radio" value="0"><?php echo get_phrase('no'); ?></label>
									</div>
								</div>
							</div>
							<div class="form-buttons-w text-right">
								<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('update'); ?></button>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="element-box lined-success shadow">
							<h5 class="form-header"><?php echo get_phrase('system_settings'); ?></h5><br>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('language'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0307_chat_discussion_yes_no_pro_contra_conversation"></i>
										</div>
										<select class="form-control" name="language">
											<option value=""><?php echo get_phrase('select'); ?></option>
											<?php $fields = $this->db->list_fields('language');
											foreach ($fields as $field) {
												if ($field == 'phrase_id' || $field == 'phrase') continue;
												$current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description; ?>
												<option value="<?php echo $field; ?>" <?php if ($current_default_language == $field) echo 'selected'; ?>> <?php echo $field; ?> </option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('currency'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i>
										</div>
										<input class="form-control" name="currency" placeholder="$" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('paypal_email'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="icon-paypal"></i>
										</div>
										<input class="form-control" name="paypal_email" placeholder="PayPal Email" value="<?php echo $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description; ?>" type="email">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('bank_number'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="icon-paypal"></i>
										</div>
										<input class="form-control" name="bank_number" placeholder="<?= get_phrase('bank_number') ?>" value="<?php echo $this->db->get_where('settings', array('type' => 'bank_number'))->row()->description; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('bank_name'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="icon-paypal"></i>
										</div>
										<input class="form-control" name="bank_name" placeholder="<?= get_phrase('bank_name') ?>" value="<?php echo $this->db->get_where('settings', array('type' => 'bank_name'))->row()->description; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('bank_code'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="icon-paypal"></i>
										</div>
										<input class="form-control" name="bank_code" placeholder="<?= get_phrase('bank_code') ?>" value="<?php echo $this->db->get_where('settings', array('type' => 'bank_code'))->row()->description; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('bank_holder_name'); ?></label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="icon-paypal"></i>
										</div>
										<input class="form-control" name="bank_holder_name" placeholder="<?= get_phrase('bank_holder_name') ?>" value="<?php echo $this->db->get_where('settings', array('type' => 'bank_holder_name'))->row()->description; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="form-buttons-w text-right">
								<button class="btn btn-success btn-rounded" type="submit"> <?php echo get_phrase('update'); ?></button>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>


					<div class="col-sm-12">
						<?php echo form_open(base_url() . 'admin/system_settings/social'); ?>
						<div class="element-box lined-success shadow">
							<h5 class="form-header"><?php echo get_phrase('social'); ?></h5><br>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Facebook</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-facebook"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'facebook'))->row()->description; ?>" type="url" name="facebook">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Twitter</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-twitter"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'twitter'))->row()->description; ?>" name="twitter" type="url">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Instagram</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-instagram"></i>
										</div>
										<input class="form-control" value="<?php echo $this->db->get_where('settings', array('type' => 'instagram'))->row()->description; ?>" name="instagram" type="url">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> YouTube</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-youtube"></i>
										</div>
										<input class="form-control" name="youtube" value="<?php echo $this->db->get_where('settings', array('type' => 'youtube'))->row()->description; ?>" type="url">
									</div>
								</div>
							</div>

							<div class="form-buttons-w text-right">
								<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('update'); ?></button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>



					<div class="col-sm-12">
						<?php echo form_open(base_url() . 'admin/social/login'); ?>
						<div class="element-box lined-danger shadow">
							<h5 class="form-header"><?php echo get_phrase('social_login'); ?></h5><br>

							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Enable Social Login?</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0381_line_structure_relations_hierarchy"></i>
										</div>
										<select class="form-control" name="social_login" required="">
											<option value=""><?php echo get_phrase('select'); ?></option>
											<option value="1" <?php if ($this->db->get_where('settings', array('type' => 'social_login'))->row()->description == 1) echo "selected"; ?>><?php echo get_phrase('yes'); ?></option>
											<option value="0" <?php if ($this->db->get_where('settings', array('type' => 'social_login'))->row()->description == 0) echo "selected"; ?>><?php echo get_phrase('no'); ?></option>
										</select>
									</div>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Google Client ID</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0381_line_structure_relations_hierarchy"></i>
										</div>
										<input type="text" class="form-control" name="google_sync" value="<?php echo $this->db->get_where('settings', array('type' => 'google_sync'))->row()->description; ?>">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Google Secret</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-thin-icon-thin-0381_line_structure_relations_hierarchy"></i>
										</div>
										<input type="text" class="form-control" name="google_login" value="<?php echo $this->db->get_where('settings', array('type' => 'google_login'))->row()->description; ?>">
									</div>
								</div>
							</div>


							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Facebook Sync URL</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-facebook"></i>
										</div>
										<input class="form-control" value="<?php echo base_url(); ?>auth/facebook/" type="text" readonly>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Facebook Login URL</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-facebook"></i>
										</div>
										<input class="form-control" value="<?php echo base_url(); ?>auth/loginfacebook/" readonly type="text">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Google Sync URL</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-google"></i>
										</div>
										<input class="form-control" value="<?php echo base_url(); ?>auth/sync/" type="text" readonly>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-sm-3" for=""> Google Login URL</label>
								<div class="col-sm-9">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="picons-social-icon-google"></i>
										</div>
										<input class="form-control" value="<?php echo base_url(); ?>auth/login/" readonly type="text">
									</div>
								</div>
							</div>

							<div class="form-buttons-w text-right">
								<button class="btn btn-primary btn-rounded" type="submit"> <?php echo get_phrase('update'); ?></button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>


					<div class="col-sm-12">
						<div class="element-box lined-purple shadow">
							<h5 class="form-header"><i class="os-icon picons-thin-icon-thin-0688_paint_bucket_color"></i> <?php echo get_phrase('personalization'); ?></h5><br>
							<?php echo form_open(base_url() . 'admin/system_settings/skin', array('enctype' => 'multipart/form-data')); ?>
							<legend><span>Logo, Icon, Favicon & Avatar</span></legend>
							<div class="row padded-v">
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for="">School Logo</label>
										<div class="newsfe centry">
											<button type="button" class="change-cover">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="logoprev" type="file" / name="userfile">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="logo" src="<?php echo base_url(); ?>uploads/logo.png"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="col-form-label" for="">System Logo Color</label>
										<div class="newsfe centry">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="logocolorprev" type="file" / name="logocolor">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="logocolor" src="<?php echo base_url(); ?>uploads/logo-color.png"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label class="col-form-label" for="">System Logo White</label>
										<div class="newsfe centry" style="background-color:#001b3d;">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="logowprev" type="file" / name="logow">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="logow" src="<?php echo base_url(); ?>uploads/logo-white.png"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for="">Avatar</label>
										<div class="newsfe centry">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="avatarprev" type="file" / name="avatar">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="avatar" src="<?php echo base_url(); ?>uploads/user.jpg"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-1">
									<div class="form-group">
										<label class="col-form-label" for="">Icon W</label>
										<div class="newsfe centry" style="background-color:#001b3d;">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="iconwprev" type="file" / name="icon_white">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="iconw" src="<?php echo base_url(); ?>uploads/logo-icon.png"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-1">
									<div class="form-group">
										<label class="col-form-label" for="">Favicon</label>
										<div class="newsfe centry">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0104_load_upload_clipboard_box"></i>
												<input accept="image/x-png,image/gif,image/jpeg" id="faviconprev" type="file" / name="favicon">
											</button>
											<div class="margin:0 auto"><img width="100%" height="100%" id="favicon" src="<?php echo base_url(); ?>uploads/favicon.png"></div>
										</div>
									</div>
								</div>
							</div>
							<legend><span>Themes</span></legend>
							<?php $skin           =	$this->db->get_where('settings', array('type' => 'skin'))->row()->description; ?>
							<div class="row padded-v">
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 1</label>
										<div class="themsy">
											<input name="skin" type="radio" <?php if ($skin == 'main') echo 'checked'; ?> value="main" class="checky">
											<img width="100%" src="<?php echo base_url(); ?>uploads/theme1.jpg">
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 2</label>
									<div class="themsy">
										<input name="skin" type="radio" <?php if ($skin == 'green') echo 'checked'; ?> value="green" class="checky">
										<img width="100%" src="<?php echo base_url(); ?>uploads/theme2.jpg">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 3</label>
										<div class="themsy">
											<input name="skin" type="radio" <?php if ($skin == 'yellow') echo 'checked'; ?> value="yellow" class="checky">
											<img width="100%" height="100%" src="<?php echo base_url(); ?>uploads/theme3.jpg">
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 4</label>
										<div class="themsy">
											<input name="skin" type="radio" value="blue" <?php if ($skin == 'blue') echo 'checked'; ?> class="checky">
											<img width="100%" height="100%" src="<?php echo base_url(); ?>uploads/theme4.jpg">
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 5</label>
										<div class="themsy">
											<input name="skin" type="radio" value="red" <?php if ($skin == 'red') echo 'checked'; ?> class="checky">
											<img width="100%" height="100%" src="<?php echo base_url(); ?>uploads/theme5.jpg">
										</div>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-form-label" for=""><?php echo get_phrase('theme'); ?> 6</label>
										<div class="themsy">
											<input name="skin" type="radio" value="success" <?php if ($skin == 'success') echo 'checked'; ?> class="checky">
											<img width="100%" height="100%" src="<?php echo base_url(); ?>uploads/theme6.jpg">
										</div>
									</div>
								</div>
							</div>
							<legend><span>Slides (1920px-570px)</span></legend>
							<div class="row padded-v">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label" for="">Slider 1</label>
										<div class="newsfe">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>Upload Slide
												<input accept="image/x-png,image/gif,image/jpeg" id="slider1prev" type="file" / name="slide1">
											</button>
											<img width="100%" height="100%" id="slider1" src="<?php echo base_url(); ?>uploads/slider/slider1.png">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label" for="">Slider 2</label>
										<div class="newsfe">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>Upload Slide
												<input accept="image/x-png,image/gif,image/jpeg" id="slider2prev" type="file" / name="slide2">
											</button>
											<img width="100%" height="100%" id="slider2" src="<?php echo base_url(); ?>uploads/slider/slider2.png">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label" for="">Slider 3</label>
										<div class="newsfe">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>Upload slide
												<input accept="image/x-png,image/gif,image/jpeg" id="slider3prev" type="file" / name="slide3">
											</button>
											<img width="100%" height="100%" id="slider3" src="<?php echo base_url(); ?>uploads/slider/slider3.png">
										</div>
									</div>
								</div>
							</div>
							<legend><span>Login Background</span></legend>
							<div class="row padded-v">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label" for="">Background Image</label>
										<div class="newsfe">
											<button type="button" class="change-cover perso">
												<i class="font-icon picons-thin-icon-thin-0617_picture_image_photo"></i>Upload Background
												<input accept="image/x-png,image/gif,image/jpeg" id="bgloginprev" type="file" / name="bglogin">
											</button>
											<img width="100%" height="100%" id="bglogin" src="<?php echo base_url(); ?>uploads/bglogin.jpg">
										</div>
									</div>
								</div>
								<div class="col-sm-6"></div>
							</div>
							<div class="form-buttons-w text-right">
								<button class="btn btn-purple btn-rounded" type="submit"> <?php echo get_phrase('update'); ?></button>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>