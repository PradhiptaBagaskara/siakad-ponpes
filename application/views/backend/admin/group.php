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
                        <a href="<?php echo base_url();?>admin/message/message_new">
                          <i class="os-icon picons-thin-icon-thin-0001_compose_write_pencil_new"></i>
                        </a>
                      </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/create_group/');" class="btn btn-success btn-block">
                      <?php echo get_phrase('create_group');?></a>
                    </div>
                    <hr>
                    <div class="user-list active">
                    <?php
                      $group_messages = $this->db->get('group_message_thread')->result_array();
                      if (sizeof($group_messages) > 0):
                      foreach ($group_messages as $row):
                    ?>
                      <a href="<?php echo base_url('admin/group/group_message_read/'.$row['group_message_thread_code']); ?>"><div class="user-w <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['group_message_thread_code']) echo 'active'; ?>">
                        <div class="user-info">
                          <div class="user-name"><?php echo $row['group_name'] ?></div>
                          <div class="last-message">
                             <a class="btn btn-sm btn-rounded btn-success" 
        onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_group/<?php echo $row['group_message_thread_code'];?>');" href="#" style="color:white"><?php echo get_phrase('edit');?></a>

                             <a class="btn btn-sm btn-rounded btn-danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"
        href="<?php echo base_url();?>admin/group/delete_group/<?php echo $row['group_message_thread_code'];?>" style="color:white"><?php echo get_phrase('delete');?></a>
                          </div>
                        </div>
                      </div></a>
                     <?php endforeach; ?>
                      <?php endif ?>
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