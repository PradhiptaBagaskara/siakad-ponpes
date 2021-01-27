<div class="content-w">
<div class="all-wrapper menu-side no-padding-content">
      <div class="layout-w">
<div class="content-w">
          <div class="content-i">
            <div class="content-box">
              <div class="full-chat-w">
                <div class="full-chat-i">
                  <div class="full-chat-left">  
                     <div class="chat-heady">
                      <div class="usery">
                        <i class="os-icon picons-thin-icon-thin-0322_mail_post_box"></i><span> <?php echo get_phrase('message_group');?></span>
                      </div>
                      <div class="userty">
                        <a href="<?php echo base_url();?>parents/message/message_new">
                          <i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i>
                        </a>
                      </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <a href="#" class="btn btn-success btn-block"><?php echo get_phrase('groups');?></a>
                    </div>
                    <hr>
                    <div class="user-list active">
                    <?php
                      $flag = 0;
                      $group_messages = $this->db->get('group_message_thread')->result_array();
                      foreach ($group_messages as $row):
                      $members = json_decode($row['members']);
                      if (in_array($this->session->userdata('login_type').'_'.$this->session->userdata('login_user_id'), $members)):
                      $flag++;
                    ?>
                      <a href="<?php echo base_url('parents/group/group_message_read/'.$row['group_message_thread_code']); ?>"><div class="user-w  <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['group_message_thread_code']) echo 'active'; ?>">
                        <div class="user-info">
                          <div class="user-name"><?php echo $row['group_name'] ?></div>
                        </div>
                      </div></a>
                      <?php endif; ?>
                     <?php endforeach; ?>
                    </div>
                  </div>
                  <?php include $message_inner_page_name . '.php'; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>