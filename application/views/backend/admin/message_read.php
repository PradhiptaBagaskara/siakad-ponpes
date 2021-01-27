                    <style type="text/css">.metadata .tick {
  display: inline-block;
  margin-left: 2px;
  position: relative;
  top: 4px;
  height: 16px;

  width: 16px;
}

.metadata .tick svg {
  position: absolute;
  transition: .5s ease-in-out;
}

.metadata .tick svg:first-child {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: perspective(800px) rotateY(180deg);
          transform: perspective(800px) rotateY(180deg);
}

.metadata .tick svg:last-child {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: perspective(800px) rotateY(0deg);
          transform: perspective(800px) rotateY(0deg);
}

.metadata .tick-animation svg:first-child {
  -webkit-transform: perspective(800px) rotateY(0);
          transform: perspective(800px) rotateY(0);
}

.metadata .tick-animation svg:last-child {
  -webkit-transform: perspective(800px) rotateY(-179.9deg);
          transform: perspective(800px) rotateY(-179.9deg);
}
</style>
                    <div class="full-chat-middle">
                    <div class="chat-head">
                      <div class="user-info">
                     <?php $rece = $this->db->get_where('message_thread', array('message_thread_code' => $current_message_thread_code))->row()->reciever;
                            $re = explode('-', $rece);
                      ?>
                        <img alt="" src="<?php echo $this->crud_model->get_image_url($re[0], $re[1]); ?>" style="border-radius:25px;height:25px;"><span style="color:gray;font-size:16px;margin-left:10px;"> <?php echo $this->db->get_where($re[0], array($re[0] . '_id' => $re[1]))->row()->name; ?></span>
                      </div>
                      <div class="user-actions">
                            <?php if($re['0'] == 'student'):?>
                              <a href="<?php echo base_url();?>admin/student_portal/<?php echo $re[1];?>"><i class="os-icon picons-thin-icon-thin-0699_user_profile_avatar_man_male"></i></a>
                            <?php endif;?>
                            <?php if($re['0'] != 'student'):?>
                              <a href="<?php echo base_url();?>admin/<?php echo $re['0'];?>_profile/<?php echo $re[1];?>"><i class="os-icon picons-thin-icon-thin-0699_user_profile_avatar_man_male"></i></a>
                            <?php endif;?>
                            <a href="tel:<?php echo $this->db->get_where($re[0], array($re[0].'_id' => $re[1]))->row()->phone;?>"><i class="os-icon picons-thin-icon-thin-0294_phone_call_ringing"></i></a>
                      </div>
                    </div>
                    <div class="chat-content-w">
                      <div class="chat-content">
                      <?php
                      $recievers = "";
                        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
                        $this->db->order_by('message_id');
                        $messages = $this->db->get_where('message', array('message_thread_code' => $current_message_thread_code))->result_array();
                        foreach ($messages as $row):
                        $sender = explode('-', $row['sender']);
                        $sender_account_type = $sender[0];
                        $sender_id = $sender[1];
                        $recievers = $row['reciever'];

                    ?>

                      <?php if($row['sender'] != $current_user):?>
                        <?php $recievers = $row['sender'];?>
                        <div class="chat-message">
                          <div class="chat-message-content-w">
                            <div class="chat-message-content">
                              <?php echo $row['message']; ?>
                              <?php if($row['file_name'] != ""):?>
                                 <a class="btn btn-sm btn-rounded btn-success" href="<?php echo base_url();?>uploads/messages/<?php echo $row['file_name']; ?>" style="color:white"><i class="picons-thin-icon-thin-0105_download_clipboard_box"></i>&nbsp;&nbsp;<?php echo get_phrase('download');?></a>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="chat-message-avatar">
                            <img alt="" src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>">
                          </div>
                        </div>
                        <?php endif;?>
                        <?php if($row['sender'] == $current_user):?>
                        <div class="chat-message self">
                          <div class="chat-message-content-w">
                            <div class="chat-message-content">
                              <?php echo $row['message']; ?> <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="2063" y="2076"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" <?php if($row['read_status'] == 1):?> fill="#4fc3f7" <?php else:?> fill="#eee" <?php endif;?>/></svg></span>
                              <?php if($row['file_name'] != ""):?>
                                 <a class="btn btn-sm btn-rounded btn-success" href="<?php echo base_url();?>uploads/messages/<?php echo $row['file_name']; ?>" style="color:white"><i class="picons-thin-icon-thin-0121_download_file"></i>&nbsp;&nbsp;<?php echo get_phrase('download');?></a>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="chat-message-avatar">
                            <img alt="" src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>">
                          </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                      </div>
                    </div>

                    <div class="chat-controls b-b">
                    <?php echo form_open(base_url() . 'admin/message/send_reply/' . $current_message_thread_code, array('enctype' => 'multipart/form-data')); ?>
                      <input type="hidden" name="reciever" value="<?php echo $recievers;?>">
					  <div class="chat-input">
                        <input placeholder="<?php echo get_phrase('write_message');?>..." required type="text" name="message">
                      </div>
					
                      <div class="chat-input-extra">
                       <div class="chat-extra-actions">
                           <input type="file" name="file_name" id="file-3" class="inputfile inputfile-3" style="display:none"/>
						<label for="file-3"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <span><?php echo get_phrase('send_file');?>...</span></label>
                        </div>
                        <div class="chat-btn">
                          <button class="btn btn-rounded btn-primary" type="submit"><?php echo get_phrase('send');?></button>
                        </div>
                      </div>
                      <?php echo form_close();?>
                    </div>
                  </div>
            