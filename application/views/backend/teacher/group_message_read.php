                    <div class="full-chat-middle">
                    <div class="chat-head">
                      <div class="user-info">
                        <span><?php echo $this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row()->group_name; ?></span>
                      </div>
                       <a class="btn btn-success btn-sm" href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/group_info/<?php echo $row['group_message_thread_code'];?>');"><?php echo get_phrase('group_members');?></a>
                    </div>
                    <div class="chat-content-w">
                      <div class="chat-content">
                       <?php
                        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
                        $messages = $this->db->get_where('group_message', array('group_message_thread_code' => $current_message_thread_code))->result_array();
                        foreach ($messages as $row):
                        $sender = explode('-', $row['sender']);
                        $sender_account_type = $sender[0];
                        $sender_id = $sender[1];
                      ?>
                      <?php if($row['sender'] != $current_user):?>
                        <div class="chat-message">
                          <div class="chat-message-content-w">
                            <div class="chat-message-content">
                              <?php echo $row['message']; ?>
                              <?php if($row['attached_file_name'] != ""):?>
                                 <a class="btn btn-sm btn-rounded btn-success" href="<?php echo base_url();?>uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" style="color:white"><i class="picons-thin-icon-thin-0105_download_clipboard_box"></i>&nbsp;&nbsp;<?php echo get_phrase('download');?></a>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="chat-message-avatar">
                            <img alt="" src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>">
                          </div>
                          <span class="badge badge-primary"><?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?></span>
                        </div>
                        <?php endif;?>
                        <?php if($row['sender'] == $current_user):?>
                        <div class="chat-message self">
                          <div class="chat-message-content-w">
                            <div class="chat-message-content">
                              <?php echo $row['message']; ?>
                              <?php if($row['attached_file_name'] != ""):?>
                                 <a class="btn btn-sm btn-rounded btn-success" href="<?php echo base_url();?>uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" style="color:white"><i class="picons-thin-icon-thin-0121_download_file"></i>&nbsp;&nbsp;<?php echo get_phrase('download');?></a>
                              <?php endif;?>
                            </div>
                          </div>
                          <span class="badge badge-primary"><?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                          
                          <div class="chat-message-avatar">
                            <img alt="" src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>">
                          </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                      </div>
                    </div>

                    <div class="chat-controls b-b">
                    <?php echo form_open(base_url() . 'teacher/group/send_reply/' . $current_message_thread_code, array('enctype' => 'multipart/form-data')); ?>
                      
            <div class="chat-input">
                        <input placeholder="<?php echo get_phrase('write_message');?>..." required type="text" name="message">
                      </div>
          
                      <div class="chat-input-extra">
                       <div class="chat-extra-actions">
                           <input type="file" name="attached_file_on_messaging" id="file-3" class="inputfile inputfile-3" style="display:none"/>
            <label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('send_file');?>...</span></label>
                        </div>
                        <div class="chat-btn">
                          <button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('send');?></button>
                        </div>
                      </div>
                      <?php echo form_close();?>
                    </div>
                  </div>