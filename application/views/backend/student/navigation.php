<div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <div class="mm-buttons">
              <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
              </div>
            </div>
             <a class="mm-logo" href="<?php echo base_url();?>student/panel/"><img class="hidden-sm-down" src="<?php echo base_url();?>uploads/logo-icon.png" style="width:60px"><span><img src="<?php echo base_url();?>uploads/logo-white.png"></span></a>
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
                        <div class="logged-user-role"><?php echo get_phrase('student');?></div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
                    </div>
                    <ul>
                      <li>
                        <a href="<?php echo base_url();?>student/my_profile/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
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
                          <?php echo get_phrase('student');?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
                    </div>
                    <ul>
                      <li>
                        <a href="<?php echo base_url();?>admin/my_profile"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
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
                <a href="<?php echo base_url();?>student/panel/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>student/message/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'subject') echo 'active';?>">
                <a href="<?php echo base_url();?>student/subject/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></div>
                  </div>
                  <span><?php echo get_phrase('subjects');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'class_routine' || $page_name == 'exam_routine') echo 'active';?>">
                <a href="<?php echo base_url();?>student/class_routine/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('schedules');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'attendance_report' || $page_name == 'report_attendance_view') echo 'active';?>">
                <a href="<?php echo base_url();?>student/attendance_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'library') echo 'active';?>">
                <a href="<?php echo base_url();?>student/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'my_marks' || $page_name == 'subject_marks') echo 'active';?>">
                <a href="<?php echo base_url();?>student/my_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'syllabus' || $page_name == 'homework_room' || $page_name == 'exam_results' || $page_name == 'examroom' || $page_name == 'forum_room') echo 'active';?>">
                <a href="<?php echo base_url();?>student/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'noticeboard' || $page_name == 'read' || $page_name == 'calendar') echo 'active';?>">
                <a href="<?php echo base_url();?>student/noticeboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'send_report' || $page_name == 'view_report') echo 'active';?>">
                <a href="<?php echo base_url();?>student/send_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_report');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'invoice' || $page_name == 'view_invoice') echo 'active';?>">
                <a href="<?php echo base_url();?>student/invoice/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></div>
                  </div>
                  <span><?php echo get_phrase('payments');?></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="desktop-menu menu-side-w menu-activated-on-click color-scheme-dark">
          <div class="logo-w">
            <a class="logo" href="<?php echo base_url();?>student/panel/"><img src="<?php echo base_url();?>uploads/logo-white.png"></a>
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
                  <div class="logged-user-role"><?php echo get_phrase('student');?></div>
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
                        <?php echo get_phrase('student');?>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon">
                    <i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="<?php echo base_url();?>student/my_profile/"><i class="os-icon picons-thin-icon-thin-0701_user_profile_avatar_man_male"></i><span><?php echo get_phrase('profile');?></span></a>
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
                <a href="<?php echo base_url();?>student/panel/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0045_home_house"></div>
                  </div>
                  <span><?php echo get_phrase('dashboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'message' || $page_name == 'group') echo 'active';?>">
                <a href="<?php echo base_url();?>student/message/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0322_mail_post_box"></div>
                  </div>
                  <span><?php echo get_phrase('messages');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'subject') echo 'active';?>">
                <a href="<?php echo base_url();?>student/subject/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></div>
                  </div>
                  <span><?php echo get_phrase('subjects');?></span></a>
              </li>  
              <li class="main-menu <?php if($page_name == 'class_routine' || $page_name == 'exam_routine') echo 'active';?>">
                <a href="<?php echo base_url();?>student/class_routine/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('schedules');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'attendance_report' || $page_name == 'report_attendance_view') echo 'active';?>">
                <a href="<?php echo base_url();?>student/attendance_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0023_calendar_month_day_planner_events"></div>
                  </div>
                  <span><?php echo get_phrase('attendance');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'library') echo 'active';?>">
                <a href="<?php echo base_url();?>student/library/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0017_office_archive"></div>
                  </div>
                  <span><?php echo get_phrase('library');?></span></a>
              </li>       
              <li class="main-menu <?php if($page_name == 'my_marks' || $page_name == 'subject_marks') echo 'active';?>">
                <a href="<?php echo base_url();?>student/my_marks/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0007_book_reading_read_bookmark"></div>
                  </div>
                  <span><?php echo get_phrase('marks');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'online_exams' || $page_name == 'homework' || $page_name == 'forum' || $page_name == 'study_material' || $page_name == 'syllabus' || $page_name == 'homework_room' || $page_name == 'exam_results' || $page_name == 'examroom' || $page_name == 'forum_room') echo 'active';?>">
                <a href="<?php echo base_url();?>student/online_exams/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0006_book_writing_reading_read_manual"></div>
                  </div>
                  <span><?php echo get_phrase('academic');?></span></a>
              </li>
               <li class="main-menu <?php if($page_name == 'noticeboard' || $page_name == 'read' || $page_name == 'calendar') echo 'active';?>">
                <a href="<?php echo base_url();?>student/noticeboard/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></div>
                  </div>
                  <span><?php echo get_phrase('noticeboard');?></span></a>
              </li>
              <li class="main-menu <?php if($page_name == 'send_report' || $page_name == 'view_report') echo 'active';?>">
                <a href="<?php echo base_url();?>student/send_report/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0389_gavel_hammer_law_judge_court"></div>
                  </div>
                  <span><?php echo get_phrase('teacher_report');?></span></a>
              </li>
                <li class="main-menu <?php if($page_name == 'invoice' || $page_name == 'view_invoice') echo 'active';?>">
                <a href="<?php echo base_url();?>student/invoice/">
                  <div class="icon-w">
                    <div class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></div>
                  </div>
                  <span><?php echo get_phrase('payments');?></span></a>
              </li>
            </ul>
          </div>
</div>