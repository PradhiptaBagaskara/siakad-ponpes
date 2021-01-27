<?php  $current_news = $this->db->get_where('news' , array('news_code' => $code))->result_array();
    foreach ($current_news as $row):
?>
<?php $file = base_url('uploads/news_images/'.$code.'.jpg');?>
<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
	<div class="back hidden-sm-down">		
	<a href="<?php echo base_url();?>parents/noticeboard/"><i class="os-icon os-icon-common-07"></i></a>	
</div></ul>
  <div class="content-i">
    <div class="content-box">
		<div class="pipeline white lined-<?php if($row['type'] == 'event') echo 'primary'; else echo 'success';?>">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo $row['title'];?></h5>
			<div class="pipeline-header-numbers">
			  <div class="pipeline-count">
				<i class="os-icon picons-thin-icon-thin-0024_calendar_month_day_planner_events"></i> <?php echo $row['date'];?>
			  </div>
			  <div class="col-3 text-right">
					<?php if($row['type'] == "news"):?>
                        <a class="btn btn-round btn-sm btn-success text-left" style="text-transform:uppercase;color:white;"><?php echo get_phrase('news');?></a>
                    <?php endif;?>
                    <?php if($row['type'] == "event"):?>
	                    <a class="btn btn-round btn-sm btn-primary text-left" style="text-transform:uppercase;color:white;"><?php echo get_phrase('events');?></a>
                    <?php endif;?>
			  </div>
			</div>
		  </div>
			<div class="row">
			  <div class="col-md-<?php if (@getimagesize($file)) echo '6'; else echo '12';?> col-xl-<?php if (@getimagesize($file)) echo '6'; else echo '12';?>">
				<h6><?php echo $row['title'];?></h6>
				<p><?php echo $row['description'];?></p>
			  </div>
			  <?php if (@getimagesize($file)):?>
			  <div class="col-md-6 col-xl-6" style="margin-top:0.75rem;">
				<img alt="" src="<?php echo base_url();?>uploads/news_images/<?php echo $code;?>.jpg" width="100%">
			  </div>
			<?php endif;?>
			</div>
			</div>
		<div class="element-box shadow lined-success">
		  <div class="row" style="margin:2px;margin-bottom:15px">
			<input type="hidden" id="news_code" name="news_code" value="<?php echo $code;?>">
			<div class="input-group">                    
				<input class="form-control" placeholder="<?php echo get_phrase('write_message');?>" id="message" name="message" required=""></input>
				<div class="input-group-addon byx" id="add">
				 <i class="picons-thin-icon-thin-0317_send_post_paper_plane"></i>
				</div>
			  </div>
			</div>
		  <div id="panel">
        <?php
            $this->db->order_by('news_message_id' , 'desc'); 
            $news_messages = $this->db->get_where('mensaje_reporte' , array('news_id' => $row['news_id']))->result_array();
            foreach ($news_messages as $row2):
        ?>
		<div class="element-box-w b-t">
            <div class="row m-t m-b">
			  <div class="col-sm-10">
				  <img alt="" src="<?php echo $this->crud_model->get_image_url($row2['user_type'], $row2['user_id']); ?>" width="30px" style="border-radius:20px;margin-right:5px;"> <span class="infogi"><strong><?php echo $this->db->get_where($row2['user_type'] , array($row2['user_type'] . '_id' => $row2['user_id']))->row()->name;?></strong></span>
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
</div>
</div>
<?php endforeach;?>

<script>
	var post_message		=	'<?php echo get_phrase('comment_success');?>';
	$(document).ready(function()
	{
	  $("#add").click(function()
	  {
	  	news_code= $("#news_code").val();
	  	message= $("#message").val();
	  	if(news_code!="" && message!="")
	  	{
		  	$.ajax({url:"<?php echo base_url();?>parents/news_message/add/",type:'POST',data:{message:message,news_code:news_code},success:function(result)
		  	{
        		 $('#panel').load(document.URL + ' #panel');
        		 $("#message").val('');
        		 toastr.success(post_message, "Success");
		    }});
	  	}
	  });
	});
</script>