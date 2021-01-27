<?php 
    $status = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->owner_status;
    $messages = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->messages;
    $notify = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->notify;
    $information = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->information;
    $marks = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->marks;
    $academic = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->academic;
    $attendance = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->attendance;
    $schedules = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->schedules;
    $news = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->news;
    $library = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->library;
    $be = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->be;
    $acc = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->acc;
    $class = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->class;
    $school = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->school;
    $polls = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->polls;
    $settings = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->settings;
    $academic_se = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->academic_se;
    $files = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->files;
    $users = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->users;
    $reports = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->reports;
  ?>
<style type="text/css">
              input[type=search] 
              {
                  border: 2px solid #3E4B5B;
                  border-radius: 4px;
              }
            </style>
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <div class="mm-buttons">
              <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
              </div>
            </div>
            <a class="mm-logo" href="<?php echo base_url();?>admin/panel/"><img class="hidden-sm-down" src="<?php echo base_url();?>uploads/logo-icon.png" style="width:60px"><span><img src="<?php echo base_url();?>uploads/logo-white.png"></span></a>
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
                          <?php echo get_phrase('admin');?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i>
                    </div>
                    <ul>
                        <li>
                          <a href="<?php echo base_url();?>admin/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
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
                          <?php echo get_phrase('admin');?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i>
                    </div>
                    <ul>
                        <li>
                          <a href="<?php echo base_url();?>admin/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
                        </li>
                        <li>
                          <a href="<?php echo base_url();?>login/logout"><i class="os-icon picons-thin-icon-thin-0040_exit_logout_door_emergency_outside"></i><span><?php echo get_phrase('logout');?></span></a>
                        </li>
                  </ul>
                  </div>
                </div>
              </div>
            <ul class="main-menu">
              <li class="main-menu <?php if($page_name == 'panel') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/panel/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <?php if($messages == 1):?>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/message/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
              <?php endif;?>
              <?php if($users == 1):?>
              <li class="main-menu <?php if($page_name == 'admins' || $page_name == 'teachers' || $page_name == 'add_student' || $page_name == 'parents' || $page_name == 'admissions' || $page_name == 'admin_profile' || $page_name == 'teacher_profile' || $page_name == 'parent_profile') echo 'active';?>">
                  <?php if($status == 1):?>
                    <a href="<?php echo base_url();?>admin/admins/">
                  <?php endif;?>
                  <?php if($status == 2):?>
                    <a href="<?php echo base_url();?>admin/teachers/">
                  <?php endif;?>
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></div>
                  </div>
                  <span><?php echo get_phrase('users');?></span></a>
              </li>
            <?php endif;?>
            <?php if($notify == 1):?>
              <li class="main-menu <?php if($page_name == 'notify') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/notify/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0019_mobile_iphone"></div>
                  </div>
                  <span><?php echo get_phrase('notifications');?></span></a>
              </li>
              <?php endif;?>
              <?php if($information == 1):?>
              <li class="main-menu <?php if($page_name == 'students_area' || $page_name == 'student_portal' || $page_name == 'marks') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/students_area/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('information');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'students') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/students/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0721_identity_card_photo_tag_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('students');?></span></a>
              </li>
              <?php endif;?>  
              <?php if($marks == 1):?>
              <li class="main-menu <?php if($page_name == 'upload_marks' || $page_name == 'tab_sheet' || $page_name == 'print_marks' || $page_name == 'view_marks' || $page_name == 'subject_marks' || $page_name == 'marks_upload') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/upload_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
              <?php endif;?>
              <?php if($academic == 1):?>
              <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'exam_room' || $page_name == 'exam_questions' || $page_name == 'exam_results' || $page_name == 'exam_edit' ||$page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'unit_content' || $page_name == 'edit_forum' || $page_name == 'forum_room' || $page_name == 'homework_details' || $page_name == 'homework_edit' || $page_name == 'homework_room') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
              <?php endif;?>
              <?php if($attendance == 1):?>
              <li class="main-menu <?php if($page_name == 'attendance' || $page_name == 'manage_attendance' || $page_name == 'teacher_attendance' || $page_name == 'report_attendance_view' || $page_name == 'teacher_attendance_report' || $page_name == 'teacher_report_view') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/attendance/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
              <?php endif;?>
              <?php if($schedules == 1):?>
              <li class="main-menu <?php if($page_name == 'class_routine_view' || $page_name == 'teacher_routine' || $page_name == 'looking_routine') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/class_routine_view/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('schedules');?></span></a>
              </li>
              <?php endif;?>
              <?php if($news == 1):?>
               <li class="main-menu <?php if($page_name == 'news' || $page_name == 'send_news' || $page_name == 'calendar' || $page_name == 'read' || $page_name == 'update_news') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/news/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
              <?php endif;?>
              <?php if($library == 1):?>
              <li class="main-menu <?php if($page_name == 'library' || $page_name == 'update_book') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>  
              <?php endif;?>
              <?php if($be == 1):?>         
              <li class="main-menu <?php if($page_name == 'request_student' || $page_name == 'request' || $page_name == 'looking_report') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/request_student/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('behavior');?></span></a>
              </li>
            <?php endif;?>
            <?php if($acc == 1):?>
               <li class="main-menu <?php if($page_name == 'payments' || $page_name == 'students_payments' || $page_name == 'expense') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/payments/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></div>
                  </div>
                  <span><?php echo get_phrase('accounting');?></span></a>
              </li>
            <?php endif;?>
            <?php if($files == 1):?>
              <li class="main-menu <?php if($page_name == 'files') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/files/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0111_folder_files_documents"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_files');?></span></a>
              </li>
              <?php endif;?>
              <?php if($class == 1):?>
              <li class="main-menu <?php if($page_name == 'classroom') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/classrooms/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0047_home_flat"></div>
                  </div>
                  <span><?php echo get_phrase('classrooms');?></span></a>
              </li>
            <?php endif;?>
            <?php if($school == 1):?>
               <li class="main-menu <?php if($page_name == 'school_bus') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/school_bus/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0470_bus_transport"></div>
                  </div>
                  <span><?php echo get_phrase('school_bus');?></span></a>
              </li>
              <?php endif;?>
              <?php if($polls == 1):?>
              <li class="main-menu <?php if($page_name == 'polls' || $page_name == 'view_poll') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/polls/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0385_graph_pie_chart_statistics"></div>
                  </div>
                  <span><?php echo get_phrase('polls');?></span></a>
              </li>
              <?php endif;?>
              <?php if($reports == 1):?>
              <li class="main-menu <?php if($page_name == 'general_reports' || $page_name == 'students_report' || $page_name == 'marks_report' || $page_name == 'attendance_report' || $page_name == 'tabulation_report' || $page_name == 'accounting_report') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/general_reports/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0187_window_graph_analytics"></div>
                  </div>
                  <span><?php echo get_phrase('general_reports');?></span></a>
              </li>
              <?php endif;?>
              <?php if($academic_se == 1):?>
              <li class="main-menu <?php if($page_name == 'academic_settings' || $page_name == 'manage_class' || $page_name == 'section' || $page_name == 'coursess' || $page_name == 'semester' || $page_name == 'student_promotion' || $page_name == 'grade' || $page_name == 'grade') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/academic_settings/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic_settings');?></span></a>
              </li>
            <?php endif;?>
              <?php if($settings == 1):?>
              <li class="main-menu <?php if($page_name == 'system_settings' || $page_name == 'sms' || $page_name == 'email' || $page_name == 'translate' || $page_name == 'database') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/system_settings/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0050_settings_panel_equalizer_preferences"></div>
                  </div>
                  <span><?php echo get_phrase('system_settings');?></span></a>
              </li>
              <?php endif;?>
            </ul>
          </div>
        </div>


        <div class="desktop-menu menu-side-w menu-activated-on-click color-scheme-dark">
          <div class="logo-w">
            <a class="logo" href="<?php echo base_url();?>admin/panel/"><img src="<?php echo base_url();?>uploads/logo-white.png"></a>          
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
                    <?php echo get_phrase('admin');?>
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
                        <?php echo get_phrase('admin');?>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon">
                    <i class="os-icon picons-thin-icon-thin-0710_business_tie_user_profile_avatar_man_male"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="<?php echo base_url();?>admin/my_account/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url();?>login/logout"><i class="os-icon picons-thin-icon-thin-0040_exit_logout_door_emergency_outside"></i><span><?php echo get_phrase('logout');?></span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <input type="search" class="form-control" placeholder="Search students" id="queryhome">
            <div  class="mostly-customized-scrollbars col-sm-12" style="background-color:; margin-bottom: 0px !important;"><div id="resultado"></div></div>

            <ul class="main-menu">
              <li class="main-menu <?php if($page_name == 'panel') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/panel/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <?php if($messages == 1):?>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/message/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
            <?php endif;?>
            <?php if($users == 1):?>
              <li class="main-menu <?php if($page_name == 'admins' || $page_name == 'teachers' || $page_name == 'add_student' || $page_name == 'parents' || $page_name == 'admissions' || $page_name == 'admin_profile' || $page_name == 'teacher_profile' || $page_name == 'parent_profile') echo 'active';?>">
                <?php if($status == 1):?>
                  <a href="<?php echo base_url();?>admin/admins/">
                <?php endif;?>
                <?php if($status == 2):?>
                  <a href="<?php echo base_url();?>admin/teachers/">
                <?php endif;?>
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></div>
                  </div>
                  <span><?php echo get_phrase('users');?></span></a>
              </li>
            <?php endif;?>
            <?php if($notify == 1):?>
              <li class="main-menu <?php if($page_name == 'notify') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/notify/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0019_mobile_iphone"></div>
                  </div>
                  <span><?php echo get_phrase('notifications');?></span></a>
              </li>
            <?php endif;?>
            <?php if($information == 1):?>
               <li class="main-menu <?php if($page_name == 'students_area' || $page_name == 'student_portal' || $page_name == 'marks') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/students_area/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0714_identity_card_photo_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('information');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'students') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/students/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0721_identity_card_photo_tag_user_profile"></div>
                  </div>
                  <span><?php echo get_phrase('students');?></span></a>
              </li>
            <?php endif;?>
            <?php if($marks == 1):?>
              <li class="main-menu <?php if($page_name == 'upload_marks' || $page_name == 'tab_sheet' || $page_name == 'print_marks' || $page_name == 'view_marks' || $page_name == 'subject_marks' || $page_name == 'marks_upload') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/upload_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
            <?php endif;?>
            <?php if($academic == 1):?>
              <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'exam_room' || $page_name == 'exam_questions' || $page_name == 'exam_results' || $page_name == 'exam_edit' ||$page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'unit_content' || $page_name == 'edit_forum' || $page_name == 'forum_room' || $page_name == 'homework_details' || $page_name == 'homework_edit' || $page_name == 'homework_room') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
            <?php endif;?>
            <?php if($attendance == 1):?>
              <li class="main-menu <?php if($page_name == 'attendance' || $page_name == 'manage_attendance' || $page_name == 'teacher_attendance' || $page_name == 'report_attendance_view' || $page_name == 'teacher_attendance_report' || $page_name == 'teacher_report_view') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/attendance/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
            <?php endif;?>
            <?php if($schedules == 1):?>
              <li class="main-menu <?php if($page_name == 'class_routine_view' || $page_name == 'teacher_routine' || $page_name == 'looking_routine') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/class_routine_view/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('schedules');?></span></a>
              </li>
            <?php endif;?>
            <?php if($news == 1):?>
               <li class="main-menu <?php if($page_name == 'news' || $page_name == 'send_news' || $page_name == 'calendar' || $page_name == 'read' || $page_name == 'update_news') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/news/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
            <?php endif;?>
            <?php if($library == 1):?>
              <li class="main-menu <?php if($page_name == 'library' || $page_name == 'update_book') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>
              <?php endif;?>
              <?php if($be == 1):?>
              <li class="main-menu <?php if($page_name == 'request_student' || $page_name == 'request' || $page_name == 'looking_report') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/request_student/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('behavior');?></span></a>
              </li>
            <?php endif;?>
            <?php if($acc == 1):?>
               <li class="main-menu <?php if($page_name == 'payments' || $page_name == 'students_payments' || $page_name == 'expense') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/payments/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></div>
                  </div>
                  <span><?php echo get_phrase('accounting');?></span></a>
              </li>
            <?php endif;?>
            <?php if($files == 1):?>
              <li class="main-menu <?php if($page_name == 'files') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/files/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0111_folder_files_documents"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_files');?></span></a>
              </li>
            <?php endif;?>
            <?php if($class == 1):?>
              <li class="main-menu <?php if($page_name == 'classroom') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/classrooms/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0047_home_flat"></div>
                  </div>
                  <span><?php echo get_phrase('classrooms');?></span></a>
              </li>
            <?php endif;?>
            <?php if($school == 1):?>
               <li class="main-menu <?php if($page_name == 'school_bus') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/school_bus/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0470_bus_transport"></div>
                  </div>
                  <span><?php echo get_phrase('school_bus');?></span></a>
              </li>
            <?php endif;?>
            <?php if($polls == 1):?>
              <li class="main-menu <?php if($page_name == 'polls' || $page_name == 'view_poll') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/polls/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0385_graph_pie_chart_statistics"></div>
                  </div>
                  <span><?php echo get_phrase('polls');?></span></a>
              </li>
            <?php endif;?>
            <?php if($reports == 1):?>
              <li class="main-menu <?php if($page_name == 'general_reports' || $page_name == 'students_report' || $page_name == 'marks_report' || $page_name == 'attendance_report' || $page_name == 'tabulation_report' || $page_name == 'accounting_report') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/general_reports/">
                  <div class="icon-w">
                    <div class="picons-thin-icon-thin-0187_window_graph_analytics"></div>
                  </div>
                  <span><?php echo get_phrase('general_reports');?></span></a>
              </li>
              <?php endif;?>
            <?php if($academic_se == 1):?>
              <li class="main-menu <?php if($page_name == 'academic_settings' || $page_name == 'manage_class' || $page_name == 'section' || $page_name == 'coursess' || $page_name == 'semester' || $page_name == 'student_promotion' || $page_name == 'grade' || $page_name == 'grade') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/academic_settings/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic_settings');?></span></a>
              </li>
            <?php endif;?>
            <?php if($settings == 1):?>
              <li class="main-menu <?php if($page_name == 'system_settings' || $page_name == 'sms' || $page_name == 'email' || $page_name == 'translate' || $page_name == 'database') echo 'active';?>">
                <a href="<?php echo base_url();?>admin/system_settings/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0050_settings_panel_equalizer_preferences"></div>
                  </div>
                  <span><?php echo get_phrase('system_settings');?></span></a>
              </li>
            <?php endif;?>
            </ul>
          </div>
</div>




<script type="text/javascript">
$(document).ready(function(){         
      var consulta;          
      $("#queryhome").keyup(function(e){
             consulta = $("#queryhome").val();
             $("#resultado").queue(function(n) {                     
                  $("#resultado").html('<img src="<?php echo base_url();?>assets/images/loader-2.gif" />');            
                        $.ajax({
                              type: "POST",
                              url: '<?php echo base_url();?>admin/query',
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("Error");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });                           
             });                       
      });                       
});
</script>