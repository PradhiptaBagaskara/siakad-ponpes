<div class="content-w">
    <?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->messages == 1):?>
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
                        <i class="os-icon picons-thin-icon-thin-0322_mail_post_box"></i><span> <?php echo get_phrase('private_messages');?></span>
                      </div>
                      <div class="userty">
                        <a href="<?php echo base_url();?>admin/message/message_new"><i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
                      </div>
                    </div>
                    
                      <div class="col-sm-12"><br>
                        <a href="<?php echo base_url();?>admin/group/" class="btn btn-info btn-block"><?php echo get_phrase('message_group');?></a>
                      </div>

                    <div class="user-list active"><hr>
                     <?php 
                     $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
                          $this->db->where('sender', $current_user);
                          $this->db->or_where('reciever', $current_user);
                          $message_threads = $this->db->get('message_thread')->result_array();
                          foreach ($message_threads as $row):
                            if ($row['sender'] == $current_user)
                            {
                              $user_to_show = explode('-', $row['reciever']);
                            }
                            if ($row['reciever'] == $current_user)
                            {
                              $user_to_show = explode('-', $row['sender']);
                            }
                            $user_to_show_type = $user_to_show[0];
                            $user_to_show_id = $user_to_show[1];
                            $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                    ?>
                      <a href="<?php echo base_url(); ?>admin/message/message_read/<?php echo $row['message_thread_code']; ?>"><div class="user-w <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'active'; ?>">
                        <div class="avatar with-status status-green">
                            <img alt="" src="<?php echo $this->crud_model->get_image_url($user_to_show_type, $user_to_show_id);?>">
                        </div>
                        <div class="user-info">
                         <?php if ($unread_message_number > 0): ?>
                          <div class="user-date"><?php echo $unread_message_number; ?></div>                                
                          <?php endif;?>
                          <div class="user-name"><?php echo $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?></div>
                          <div class="last-message">
                          <?php if($user_to_show_type =='admin') : ?>
                             <a class="btn btn-sm btn-rounded btn-success" href="<?php echo base_url(); ?>admin/message/message_read/<?php echo $row['message_thread_code']; ?>" style="color:white"><?php echo get_phrase('admin');?></a>
                           <?php endif;?>
                           <?php if($user_to_show_type =='student') : ?>
                             <a class="btn btn-sm btn-rounded btn-secondary" href="<?php echo base_url(); ?>admin/message/message_read/<?php echo $row['message_thread_code']; ?>" style="color:white"><?php echo get_phrase('student');?></a>
                           <?php endif;?>
                           <?php if($user_to_show_type =='teacher') : ?>
                             <a class="btn btn-sm btn-rounded btn-warning" href="<?php echo base_url(); ?>admin/message/message_read/<?php echo $row['message_thread_code']; ?>" style="color:white"><?php echo get_phrase('teacher');?></a>
                           <?php endif;?>
                           <?php if($user_to_show_type =='parent') : ?>
                             <a class="btn btn-sm btn-rounded btn-purple" href="<?php echo base_url(); ?>admin/message/message_read/<?php echo $row['message_thread_code']; ?>" style="color:white"><?php echo get_phrase('parent');?></a>
                           <?php endif;?>
                          </div>
                        </div>
                      </div></a>
                    <?php endforeach;?>
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
  <?php endif;?>
	</div>