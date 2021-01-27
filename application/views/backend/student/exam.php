<script src="<?php echo base_url();?>jquery-simple-pagination-plugin.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css.css" media="screen" />
<script src="<?php echo base_url();?>assets/js/validations.js"></script>

<?php $pages = $this->db->get_where('exams' , array('exam_code' => $exam_code))->result_array();
    foreach ($pages as $row):?>

 <script type="text/javascript">
        var EXAM_TIME_LEFT = '<?php echo $row['duration'];?>' * 60;
        var EXAM_REQUEST_ID = '<?php echo $row['exam_code'];?>';
</script>
<?php  
    $hours = floor($row['duration'] / 60);
    $minutes = floor(($row['duration']) % 60);
  	$seconds =  "00";
  	if ($hours < 10)   { $hours = "0".$hours; }
  	if ($minutes < 10) { $minutes = "0".$minutes; }
 ?>


<div class="content-w">
  <div class="content-i">
    <div class="content-box">
    <?php echo form_open(base_url() . 'student/entrys/' , array('enctype' => 'multipart/form-data'));?>
	<div class="m-b b-b" >
	<div class="row col-sm-12" style="padding-bottom:10px">
	<div class="col-sm-7" style="font-size:25px"><h5><?php echo $row['title'];?></h5></div>
	<div class="col-sm-5">
		<div id="exam-timer" style="font-size:22px;float:right">
			<strong><?php echo get_phrase('time_left');?>:</strong>  <input value="" name="time_left" id="exam-time-left" readonly style="border: none;" />
                <input type="hidden" name="time" value="<?php echo $hours.':'.$minutes.':'.$seconds;?>">
            </div>
        </div>
	</div>
	</div>
	<center><div class="row">
	<div style="margin:0 auto" id="second-container">
            <table class="">
             		<tbody>
                    <?php foreach($questions as $row2) { ?>
                    <tr>
                        <td style="width: 500px;">
							<div class="pipeline white lined-primary">
							<div class="pipeline-header"><h5><?php echo $row2['question']?></h5>
		 					</div>
							<div class="form-check">
								<label class="form-check-label"> <input type="radio" name="answer[<?php  echo $row2['question_id'];?>]" id="<?php  echo $row2['question_id'];?>" value="<?php echo $row2['optiona'];?>" class="form-check-input"><?php echo $row2['optiona'];?></label>
								<input type="hidden" name="ques_id[<?php echo $row2['question_id'];?>]" value="<?php echo $row2['question_id'];?>">
		  					</div>
		  					<div class="form-check">
								<label class="form-check-label"><input type="radio" class="form-check-input" name="answer[<?php  echo $row2['question_id'];?>]" id="<?php  echo $row2['question_id'];?>" value="<?php echo $row2['optionb'];?>"><?php echo $row2['optionb'];?></label>
								<input type="hidden" name="ques_id[<?php echo $row2['question_id'];?>]" value="<?php echo $row2['question_id'];?>">
		  					</div>
		  					<div class="form-check">
								<label class="form-check-label"><input type="radio" class="form-check-input" name="answer[<?php  echo $row2['question_id'];?>]" id="<?php  echo $row2['question_id'];?>" value="<?php echo $row2['optionc'];?>"><?php echo $row2['optionc'];?></label>
								<input type="hidden" name="ques_id[<?php echo $row2['question_id'];?>]" value="<?php echo $row2['question_id'];?>">
		  					</div>		
		  					<div class="form-check">
								<label class="form-check-label"><input type="radio" class="form-check-input" name="answer[<?php echo $row2['question_id'];?>]" id="<?php  echo $row2['question_id'];?>" value="<?php echo $row2['optiond'];?>"><?php echo $row2['optiond'];?></label>
								<input type="hidden" name="ques_id[<?php echo $row2['question_id'];?>]" value="<?php echo $row2['question_id'];?>">
		  					</div>		
							</div>
                        </td>
                    </tr>
                    </tbody>
                <?php } ?>
                <input type="hidden" name="exam_code" id="exam_code" value="<?php echo $row2['exam_code'];?>">
            </table>
           <div style="margin: 0 auto;">
				<ul class="pagicod">
					<li class="simple-pagination-first"></li>
					<li class="simple-pagination-previous"></li>
					<li class="simple-pagination-page-numbers"></li>
					<li class="simple-pagination-next"></li>
					<li class="simple-pagination-last"></li>
				</ul>
			</div>
        </div>
	<div class="col-sm-12 text-center"><button class="btn btn-rounded btn-lg btn-success text-center" id="subbutton"><?php echo get_phrase('finish_exam');?></button>
        </div></center>
	</div>	
	<?php echo form_close();?>
</div>
</div>
</div>
<?php endforeach;?>

<script>
(function($){
$('#second-container').simplePagination({
    items_per_page: 2,
    number_of_visible_page_numbers: 15
});
})(jQuery);
</script>