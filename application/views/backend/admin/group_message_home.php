<div class="full-chat-middle b-b">
    <div class="chat-content-w">
        <div class="chat-content text-center" style="margin-top:20%">
          <i clasS="os-icon picons-thin-icon-thin-0315_email_mail_post_send color-primary" style="font-size:65px"></i>
          <h5><?php echo get_phrase('hi');?> <?php echo $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->name;?>,</h5>
          <p><?php echo get_phrase('select_group_or');?> <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/create_group');" style="color: #000; font-weight: bold;"><?php echo get_phrase('create_group');?></a></p>
        </div>
    </div>
    <br><br><br><br><br><br>
    <br>
</div>                