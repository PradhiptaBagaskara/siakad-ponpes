<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php 
	$posts = $this->db->get_where('forum' , array('post_code' => $post_code))->result_array();
	foreach ($posts as $row):
?>
<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
	<div class="back">
		<a href="<?php echo base_url();?>admin/forum/"><i class="os-icon os-icon-common-07"></i></a>
	</div>
</ul>
  <div class="content-i">
    <div class="content-box">
	<div class="row">
	
	<div class="col-sm-8">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name">
			  <?php echo $row['title'];?>
			</h5>
			<div class="pipeline-header-numbers">
			  <div class="pipeline-count">
				<i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i> <?php echo date("d M, Y", $row['timestamp']);?> <br>
			  </div>
			</div>
		  </div>
			<p><?php echo $row['description'];?></p>
			<div class="b-t padded-v-big">
			<?php if($row['file_name'] != ""):?>
				Archivo: <a class="btn btn-rounded btn-sm btn-primary" href="<?php echo base_url();?>uploads/forum/<?php echo $row['file_name'];?>" style="color:white"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <?php echo $row['file_name'];?></a></td>
			<?php endif;?>
			</div>
		</div>
		<div class="element-box shadow lined-success">
		  <div class="row" style="margin:2px;margin-bottom:15px">
			<div class="input-group"> 
                                <input type="hidden" value="<?php echo $post_code;?>" id="post_code" name="post_code">                   
				<input class="form-control" placeholder="<?php echo get_phrase('write_message');?>..." id="message" name="message" required=""></input>
				<div class="input-group-addon byx" id="add">
				 <i class="picons-thin-icon-thin-0317_send_post_paper_plane"></i>
				</div>
			  </div>
			</div>
		  <div id="panel">
         <?php
            $this->db->order_by('message_id' , 'desc'); 
            $messages = $this->db->get_where('forum_message' , array('post_id' => $row['post_id']))->result_array();
            foreach ($messages as $row2):
        ?>
		<div class="element-box-w b-t">
            <div class="row m-t m-b">
			  <div class="col-sm-10">
				  <a href="#">
				  <?php  if ($row2['user_type'] == "teacher"): ?>
				  	<img alt="" src="<?php echo $this->crud_model->get_image_url('teacher', $row2['user_id']); ?>" width="30px" style="border-radius:20px;margin-right:5px;"> 
				  <?php endif;?>
				  <?php  if ($row2['user_type'] == "student"): ?>
				  	<img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row2['user_id']); ?>" width="30px" style="border-radius:20px;margin-right:5px;"> 
				  <?php endif;?>
				  <?php  if ($row2['user_type'] == "admin"): ?>
				  	<img alt="" src="<?php echo $this->crud_model->get_image_url('admin', $row2['user_id']); ?>" width="30px" style="border-radius:20px;margin-right:5px;"> 
				  <?php endif;?>

				  	<span class="infogi"><?php echo $this->db->get_where($row2['user_type'] , array($row2['user_type'] . '_id' => $row2['user_id']))->row()->name;?></span></a>
				  <div class="com" style="margin-top:1rem"><?php echo $row2['message'];?></div>
			  </div>
			  <div class="col-sm-2">
				<div class="gi text-right"><?php echo $row2['date'];?></div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		</div>
	   </div>
	</div>
	
	<div class="col-sm-4">
		<div class="pipeline white lined-warning">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo get_phrase('students');?></h5>
		  </div>
		  <div class="users-list-w">
		   <?php $students   =   $this->db->get_where('enroll' , array('class_id' => $row['class_id'], 'section_id' => $row['section_id'] , 'year' => $running_year))->result_array();
                foreach($students as $row2):?>
                    <div class="user-w">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row2['student_id']); ?>">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          <?php echo $this->db->get_where('student' , array('student_id' => $row2['student_id']))->row()->name; ?>
                        </h6>
                        <div class="user-role">
                          Roll ID: <strong><?php echo $this->db->get_where('enroll' , array('student_id' => $row2['student_id']))->row()->roll; ?></strong>
                        </div>
                      </div>
                    </div>
                <?php endforeach;?>
                  </div>
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
<?php endforeach;?>



<script>
	var post_message		=	'<?php echo get_phrase('comment_success');?>';
	$(document).ready(function()
	{
	  $("#add").click(function()
	  {
	  	message=$("#message").val();
	  	post_code=$("#post_code").val();
	  	if(message!="" && post_code!="")
	  	{
		  	$.ajax({url:"<?php echo base_url();?>admin/forum_message/add",type:'POST',data:{message:message,post_code:post_code},success:function(result)
		  	{
        		 $('#panel').load(document.URL + ' #panel');
        		 $("#message").val('');
        		 toastr.success(post_message, "Success");
		    }});
	  	}
	  });
	});
</script>