<?php $details = $this->db->get_where('reports', array('code' => $code))->result_array();
	foreach($details as $row):
?>
<div class="content-w">
	<ul class="breadcrumb hidden-xs-down hidden-sm-down">
	<div class="back">
		<a href="<?php echo base_url();?>teacher/student_report/"><i class="os-icon os-icon-common-07"></i></a>
	</div>
	</ul>
  <div class="content-i">
    <div class="content-box">
	<div class="row">
	
	<div class="col-sm-8">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo $row['title'];?></h5>
			<div class="pipeline-header-numbers">
			  <div class="pipeline-count">
				<i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i> <?php echo $row['date'];?> <br>
			  </div>
			  <div class="col-3 text-right">
			  	<?php if($row['priority'] == 'alta'):?>
					<a class="btn nc btn-rounded btn-sm btn-danger text-left" style="color:white"><?php echo get_phrase('high');?></a></td>
				<?php endif;?>
				<?php if($row['priority'] == 'media'):?>
					<a class="btn nc btn-rounded btn-sm btn-warning text-left" style="color:white"><?php echo get_phrase('medium');?></a></td>
				<?php endif;?>
				<?php if($row['priority'] == 'baja'):?>
					<a class="btn nc btn-rounded btn-sm btn-info text-left" style="color:white"><?php echo get_phrase('low');?></a></td>
				<?php endif;?>
			  </div>
			</div>
		  </div>
			<p><?php echo $row['description'];?></p>
                          <?php if( $row['file'] != ""):?>
			<div class="b-t padded-v-big">
				<?php echo get_phrase('file');?>: <a class="btn btn-rounded btn-sm btn-primary" href="<?php echo base_url();?>uploads/report_files/<?php echo $row['file'];?>" style="color:white"><i class="os-icon picons-thin-icon-thin-0042_attachment"></i> <?php echo get_phrase('download');?></a>
			</div>
                         <?php endif;?>
		</div>
		<div class="element-box shadow lined-success">
          <?php if($row['status'] == 0): ?>
		  		<div class="row" style="margin:2px;margin-bottom:15px">
				<input type="hidden" name="report_code" id="report_code" value="<?php echo $row['code'];?>">
				<div class="input-group">                    
                    <input class="form-control" placeholder="<?php echo get_phrase('write_message');?>" id="message" name="message" required="" rows="1"></input>
					<div class="input-group-addon byx" id="add">
                     <i class="picons-thin-icon-thin-0317_send_post_paper_plane"></i>
                    </div>
                  </div>
				</div>
    	<?php endif;?>
    	<?php if($row['status'] == 1):?>
	    	<center><div class="alert alert-success" role="alert"><strong><?php echo get_phrase('success');?>!</strong> <?php echo get_phrase('solved');?></div></center>
    	<?php endif;?>
    	<div id="panel">
		<?php
            $this->db->order_by('message_id' , 'desc'); 
            $news_messages = $this->db->get_where('report_response' , array('report_code' => $row['code']))->result_array();
            foreach ($news_messages as $row2):
        ?>
		<div class="element-box-w b-t">
            <div class="row m-t m-b">
			  <div class="col-sm-10">
				  <a href="#"><img alt="" src="<?php echo $this->crud_model->get_image_url($row2['sender_type'], $row2['sender_id']);?>" width="30px" style="border-radius:20px;margin-right:5px;"> <span class="infogi"><?php echo $this->db->get_where($row2['sender_type'], array($row2['sender_type'] . "_id" => $row2['sender_id']))->row()->name;?></span></a>
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
		<div class="pipeline white lined-danger">
		  	<div class="pipeline-header">
				<h5 class="pipeline-name"><?php echo get_phrase('student');?></h5>
		  	</div>
			<div class="pipeline-item">
		  		<div class="pi-foot">
					<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>uploads/logo.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></span></a>
		  		</div>
		  		<div class="pi-body bglogo">
					<div class="avatar">
				  		<img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>">
					</div>
					<div class="pi-info">
			  			<div class="h6 pi-name">
							<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name;?><br>
			  			</div>
			  			<div class="pi-sub">
							<?php echo get_phrase('phone');?>: <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->phone;?><br>
			  			</div>
					</div>
		  		</div>
			</div>
		</div>
		<div class="pipeline white lined-warning">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo get_phrase('user_report');?></h5>
		  </div>
		  	<?php $user1 = $row['user_id']; $user = explode("-", $user1);?>
		  	<div class="pipeline-item">
		  		<div class="pi-foot">
					<a class="extra-info" href="#"><img alt="" src="<?php echo base_url();?>uploads/logo.png" width="10%" style="margin-right:5px"><span><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></span></a>
		  		</div>	
		  		<div class="pi-body bglogo">
					<div class="avatar">
			  			<img alt="" src="<?php echo $this->crud_model->get_image_url($user[0], $user[1]);?>">
					</div>
					<div class="pi-info">
					  	<div class="h6 pi-name">
							<?php echo $this->db->get_where($user[0], array($user[0].'_id' => $user[1]))->row()->name;?><br>
							<small><?php echo get_phrase('phone');?>: <?php echo $this->db->get_where($user[0], array($user[0].'_id' => $user[1]))->row()->phone;?><br></small>
			  			</div>
					</div>
		  		</div>
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
	  	report_code=$("#report_code").val();
	  	if(message!="" && report_code!="")
	  	{
		  	$.ajax({url:"<?php echo base_url();?>teacher/student_report/response/",type:'POST',data:{message:message,report_code:report_code},success:function(result)
		  	{
        		 $('#panel').load(document.URL + ' #panel');
        		 $("#message").val('');
        		 toastr.success(post_message, "Success");
		    }});
	  	}
	  });
	});
</script>