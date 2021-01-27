<div class="full-chat-middle b-b">
    <div class="chat-content-w">
        <div class="chat-content text-center" style="margin-top:20%">
          <i clasS="os-icon picons-thin-icon-thin-0315_email_mail_post_send color-primary" style="font-size:65px"></i>
          <h5><?php echo get_phrase('hi');?> <?php echo $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->name;?>,</h5>
          <p><?php echo get_phrase('message_group');?></p>
        </div>
    </div>
    <br><br><br><br><br><br>
    <br>
</div>                