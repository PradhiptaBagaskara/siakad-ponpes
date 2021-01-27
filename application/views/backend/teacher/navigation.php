<div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <div class="mm-buttons">
              <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
              </div>
            </div>
            <a class="mm-logo" href="<?php echo base_url();?>teacher/teacher_dashboard/"><img class="hidden-sm-down" src="<?php echo base_url();?>uploads/logo-icon.png" style="width:60px"><span><img src="<?php echo base_url();?>uploads/logo-white.png"></span></a>
            <div class="logy-user">
                <div class="logged-user-i">
                  <div class="avatar-w">
                    <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                  </div>
                  <div class="logged-user-menu">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name">
                          <?php echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' => $this->session->userdata('login_user_id')))->row()->name;?>
                        </div>
                        <div class="logged-user-role">
                          <?php echo get_phrase('teacher');?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                    </div>
                    <ul>
                        <li>
                          <a href="<?php echo base_url();?>teacher/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url();?>login/logout"><i class="os-icon picons-thin-icon-thin-0040_exit_logout_door_emergency_outside"></i><span><?php echo get_phrase('logout');?></span></a>
                        </li>
                  </ul>
                  </div>
                </div>
              </div>
          </div>
          <div class="menu-and-user">
            <div class="logy-user-m hidden-sm-down">
                <div class="logged-user-i">
                  <div class="avatar-w">
                    <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                  </div>
                  <div class="logged-user-menu">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name">
                          <?php echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' => $this->session->userdata('login_user_id')))->row()->name;?>
                        </div>
                        <div class="logged-user-role">
                          <?php echo get_phrase('teacher');?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                    </div>
                    <ul>
                        <li>
                          <a href="<?php echo base_url();?>teacher/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url();?>login/logout"><i class="os-icon picons-thin-icon-thin-0040_exit_logout_door_emergency_outside"></i><span><?php echo get_phrase('logout');?></span></a>
                        </li>
                  </ul>
                  </div>
                </div>
              </div>
            <ul class="main-menu">
              <li class="main-menu <?php if($page_name == 'teacher_dashboard') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/teacher_dashboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/message/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'notify') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/notify/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0019_mobile_iphone"></div>
                  </div>
                  <span><?php echo get_phrase('notifications');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'teachers') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/teacher_list/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></div>
                  </div>
                  <span><?php echo get_phrase('teachers');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'students_area' || $page_name == 'view_marks' || $page_name == 'subject_marks') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/students_area/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('information');?></span></a>
              </li>
			       <li class="main-menu <?php if($page_name == 'coursess') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/courses/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></div>
                  </div>
                  <span><?php echo get_phrase('my_subjects');?></span></a>
              </li>			  
              <li class="main-menu <?php if($page_name == 'my_routine' || $page_name == 'viendo_horarios') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/my_routine/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('my_routine');?></span></a>
              </li>
			         <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'exam_room' || $page_name == 'exam_questions' || $page_name == 'exam_results' || $page_name == 'exam_edit' ||$page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'unit_content' || $page_name == 'edit_forum' || $page_name == 'forum_room' || $page_name == 'homework_details' || $page_name == 'homework_edit' || $page_name == 'homework_room') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'view_report' || $page_name == 'student_report') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/student_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('behavior');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'upload_marks' || $page_name == 'marks_upload' || $page_name == 'tab_sheet') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/upload_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'manage_attendance' || $page_name == 'manage_attendance_view') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/manage_attendance/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'circulares' || $page_name == 'read' || $page_name == 'calendar') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/noticeboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'library') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'request') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/request/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0015_fountain_pen"></div>
                  </div>
                  <span><?php echo get_phrase('premissions');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'files') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/files/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0111_folder_files_documents"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_files');?></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="desktop-menu menu-side-w menu-activated-on-click color-scheme-dark">
          <div class="logo-w">
            <a class="logo" href="<?php echo base_url();?>teacher/teacher_dashboard/"><img src="<?php echo base_url();?>uploads/logo-white.png"></a>
          </div>
          <div class="menu-and-user">
            <div class="logged-user-w">
              <div class="logged-user-i">
                <div class="avatar-w">
                  <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                </div>
                <div class="logged-user-info-w">
                  <div class="logged-user-name">
                    <?php echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' => $this->session->userdata('login_user_id')))->row()->name;?>
                  </div>
                  <div class="logged-user-role">
                    <?php echo get_phrase('teacher');?>
                  </div>
                </div>
                <div class="logged-user-menu">
                  <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                      <img alt="" src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>">
                    </div>
                    <div class="logged-user-info-w">
                      <div class="logged-user-name">
                        <?php echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' => $this->session->userdata('login_user_id')))->row()->name;?>
                      </div>
                      <div class="logged-user-role">
                        <?php echo get_phrase('teacher');?>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon">
                    <i class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="<?php echo base_url();?>teacher/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url();?>login/logout"><i class="os-icon picons-thin-icon-thin-0040_exit_logout_door_emergency_outside"></i><span><?php echo get_phrase('logout');?></span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <ul class="main-menu">
              <li class="main-menu <?php if($page_name == 'teacher_dashboard') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/teacher_dashboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/message/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
                <li class="main-menu <?php if($page_name == 'notify') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/notify/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0019_mobile_iphone"></div>
                  </div>
                  <span><?php echo get_phrase('notifications');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'teachers') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/teacher_list/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></div>
                  </div>
                  <span><?php echo get_phrase('teachers');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'students_area' || $page_name == 'view_marks' || $page_name == 'subject_marks') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/students_area/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('information');?></span></a>
              </li>
			       <li class="main-menu <?php if($page_name == 'coursess') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/courses/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></div>
                  </div>
                  <span><?php echo get_phrase('my_subjects');?></span></a>
              </li>			  
              <li class="main-menu <?php if($page_name == 'my_routine' || $page_name == 'viendo_horarios') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/my_routine/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('my_routine');?></span></a>
              </li>
			         <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'exam_room' || $page_name == 'exam_questions' || $page_name == 'exam_results' || $page_name == 'exam_edit' ||$page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'unit_content' || $page_name == 'edit_forum' || $page_name == 'forum_room' || $page_name == 'homework_details' || $page_name == 'homework_edit' || $page_name == 'homework_room') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'view_report' || $page_name == 'student_report') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/student_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('behavior');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'upload_marks' || $page_name == 'marks_upload' || $page_name == 'tab_sheet') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/upload_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'manage_attendance' || $page_name == 'manage_attendance_view') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/manage_attendance/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'circulares' || $page_name == 'read' || $page_name == 'calendar') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/noticeboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'library') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'request') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/request/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0015_fountain_pen"></div>
                  </div>
                  <span><?php echo get_phrase('premissions');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'files') echo 'active';?>">
                <a href="<?php echo base_url();?>teacher/files/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0111_folder_files_documents"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_files');?></span></a>
              </li>
            </ul>
          </div>
</div>