<?php $pages = $this->db->get_where('exams' , array('exam_code' => $exam_code))->result_array();
    foreach ($pages as $row):?>

<div class="content-w">
	  <div class="os-tabs-w menu-shad">
		<div class="os-tabs-controls">
		  <ul class="nav nav-tabs upper">
			<li class="nav-item">
			  <a class="nav-link" href="<?php echo base_url();?>student/online_exams/"><i class="os-icon picons-thin-icon-thin-0016_bookmarks_reading_book"></i><span><?php echo get_phrase('online_exams');?></span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="<?php echo base_url();?>student/exam_results/<?php echo $exam_code;?>"><i class="os-icon picons-thin-icon-thin-0100_to_do_list_reminder_done"></i><span><?php echo get_phrase('results');?></span></a>
			</li>
		  </ul>
		</div>
	  </div>
  <div class="content-i">
    <div class="content-box">
	<div class="row">
	
	<div class="col-sm-12">
		<div class="pipeline white lined-primary">
		  <div class="pipeline-header">
			<h5 class="pipeline-name"><?php echo get_phrase('exam_results');?></h5>
		  </div>
			<div class="table-responsive">
                <table class="table table-lightborder">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo get_phrase('question');?></th>
					            <th><?php echo get_phrase('correct_answer');?></th>
					            <th><?php echo get_phrase('answer');?></th>
                      <th><?php echo get_phrase('mark');?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                      $mark = 0;
                      $cor = 0;
                      $count = 1;
                      $this->db->where('exam_code', $exam_code);
                      $this->db->where('student_id', $this->session->userdata('login_user_id'));
                      $questions = $this->db->get('student_question')->result_array();
                      foreach($questions as $row2): ?>
                  <?php 
                      $ids =(explode(',', $row2['question_id']));
                      $ans =(explode(',', $row2['student_answer']));
                      $number = count($ids) - 1;
                  ?>
                  <?php if ($number > 0):
                    for ($i = 0; $i <= $number; $i++):
                    $data = $this->db->get_where('questions', array('question_id' => $ids[$i]))->result_array();
                    foreach ($data as $row3):
                  ?>                    
                    <tr>
                      <td><?php echo $count++;?></td>
                      <td><?php echo $row3['question'];?></td>
					            <td><a class="btn btn-rounded btn-sm btn-success" style="color:white"><?php echo $row3['correctanswer'];?></a></td>
					            <td>
                      <?php if($row3['correctanswer'] == $ans[$i]):?>
                        <?php $cor++; $mark+=$row3['marks'];?>
                        <a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $ans[$i];?></a>
                      <?php endif;?>
                      <?php if($ans[$i] == ''):?>
                        <a class="btn nc btn-rounded btn-sm btn-warning" style="color:white"><?php echo get_phrase('no_response');?></a>
                      <?php endif;?>
                      <?php if($row3['correctanswer'] != $ans[$i] && $ans[$i] != ''):?>
                        <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white"><?php echo $ans[$i];?></a>
                      <?php endif;?>
                      </td>
                      <td>
                        <?php if($row3['correctanswer'] == $ans[$i]):?>
                          <a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $row3['marks'];?></a>
                        <?php endif;?>
                        <?php if($row3['correctanswer'] != $ans[$i] || $ans[$i] == ''):?>
                            <a class="btn nc btn-rounded btn-sm btn-danger" style="color:white">0</a>
                          <?php endif;?>
                      </td>
                    </tr>
                    <?php endforeach; endfor;  endif;  ?>
                    <?php $dif = date("H:i:s", strtotime("00:00:00") + strtotime($row2['total_time']) - strtotime($row2['time'])); ?>
                     <div class="alert alert-info text-center"><h6><?php echo get_phrase('solved_in');?>: <strong><?php echo $dif;?>.</strong> <br><?php echo get_phrase('correct_answers');?>: <strong><?php echo $cor;?> <?php echo get_phrase('of');?> </strong> <strong><?php echo $row['questions'];?></strong>.<br> <?php echo get_phrase('average');?>: <strong><?php echo round((($cor/$row['questions']) * 100));?>%</strong></h6>
                     </div>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
		</div>
		</div>
</div>

</div>
</div>
</div>

<?php endforeach;?>