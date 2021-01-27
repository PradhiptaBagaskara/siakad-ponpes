<?php $details = $this->db->get_where('exams', array('exam_code' => $code))->result_array();
	foreach($details as $row):
?>
<div class="content-w">
  <div class="content-i">
    <div class="content-box">
		<div class="element-box lined-primary shadow"  style="text-align:center">
			<div class="col-sm-8" style="margin: 0 auto;"><h5 class="form-header"><?php echo get_phrase('description');?></h5><br>
				<p><?php echo $row['description'];?></p><br>
			</div>
			<div class="table-responsive col-sm-8" style="margin: 0 auto; text-align:left">
			<table class="table table-lightbor table-lightfont">
			  <tr>
				<th><i class="picons-thin-icon-thin-0014_notebook_paper_todo" style="font-size:30px"></i></th>
				<td>
				 <strong> <?php echo get_phrase('total_questions');?>:</strong> <?php echo $row['questions'];?>.
				</td>
			  </tr>
			  <tr>
				<th><i class="picons-thin-icon-thin-0027_stopwatch_timer_running_time" style="font-size:30px"></i></th>
				<td>
				<strong> <?php echo get_phrase('duration');?>:</strong> <?php echo $row['duration'];?> <?php echo get_phrase('minutes');?>.
				</td>
			  </tr>
			  <tr>
				<th><i class="picons-thin-icon-thin-0007_book_reading_read_bookmark" style="font-size:30px"></i></th>
				<td>
				 <strong> <?php echo get_phrase('average_required');?>:</strong> <a class="btn btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row['pass'];?>%</a>
				</td>
			  </tr>
			  <tr>
				<th><i class="picons-thin-icon-thin-0207_list_checkbox_todo_done" style="font-size:30px"></i></th>
				<td><?php echo get_phrase('answer_all_questions');?>.</td>
			  </tr>
			  <tr>
				<th><i class="picons-thin-icon-thin-0376_screen_analytics_line_graph_growth" style="font-size:30px"></i></th>
				<td>
				  <?php echo get_phrase('finish_message');?>
				</td>
			  </tr>
			  <tr>
				<th><i class="picons-thin-icon-thin-0061_error_warning_alert_attention" style="font-size:30px"></i></th>
				<td style="color:red">
				  <strong><?php echo get_phrase('important');?>!</strong> <?php echo get_phrase('important_message');?>.
				</td>
			  </tr>
		  </table>
		</div>		
		<a class="btn btn-rounded btn-lg btn-success" href="<?php echo base_url();?>student/exam/<?php echo $row['exam_code'];?>"><?php echo get_phrase('start_exam');?></a>
		</div>
</div>
</div>
</div>
<?php endforeach;?>