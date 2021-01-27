<?php $poll_info = $this->db->get_where('polls', array('poll_code' => $code))->result_array();
  foreach($poll_info as $row):
?>
<div class="content-w">
<ul class="breadcrumb hidden-xs-down hidden-sm-down">
		<div class="back">
			<a href="<?php echo base_url();?>admin/polls/"><i class="os-icon os-icon-common-07"></i></a>
		</div>
</ul>
  <div class="content-i">
	  <div class="content-box">
		  <div class="pipeline white lined-success">
		    <div class="pipeline-header">
			    <h5 class="pipeline-name"><?php echo $row['question'];?></h5>
			      <div class="pipeline-header-numbers">
			        <div class="pipeline-count"><?php echo $row['date'];?></div>
			       </div>
		    </div>
			  <div class="element-box">
				  <div class="row">
  				  <div class="col-sm-8">
            <?php 
                  $this->db->where('poll_code', $row['poll_code']);
                  $polls = $this->db->count_all_results('poll_response');
                  $array = ( explode(',' , $row['options']));
                  $questions = count($array)-1;
                  $op = 0;
                  for($i = 0 ; $i<count($array)-1; $i++):
                ?>
              <div class="col-sm-12">
                <div class="os-progress-bar">
                  <div class="bar-labels">
                    <div class="bar-label-left">
                    <?php 
                        $this->db->where('answer', $array[$i]);
                        $res = $this->db->count_all_results('poll_response');
                    ?>
                      <span><?php echo $array[$i];?></span>
                    </div>
                    <?php 
                      $response = $res/$polls;
                      $response2 = $response*100;
                    ?>
                    <div class="bar-label-right">
                      <span class="color-primary"><?php echo round($response2);?>/100%</span>
                    </div>
                  </div>         
                  <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $response2;?>%"></div>
                  </div>
                  </div>
                </div>
                <?php endfor;?>
            </div>
				    <div class="col-sm-4">
                <div class="el-legend">
                   <?php 
                      $this->db->where('poll_code', $row['poll_code']);
                      $polls = $this->db->count_all_results('poll_response');
                      $array = ( explode(',' , $row['options']));
                      $questions = count($array)-1;
                      $op = 0;
                      for($i = 0 ; $i<count($array)-1; $i++):
                  ?>
                  <?php 
                        $this->db->where('answer', $array[$i]);
                        $res = $this->db->count_all_results('poll_response');
                  ?>
                  <div class="legend-value-w">
                    <div class="legend-pin" style="background-color: #9ac02d;"></div>
                    <div class="legend-value"><?php echo $array[$i];?> 
					            <span class="gi">- <?php echo $res;?> <?php echo get_phrase('users');?>.</span>
                    </div>
                  </div>
                <?php endfor;?>
                </div>
              </div>
            </div>
          </div>


          <div class="element-box">
          <div class="row">
            <div class="col-sm-12">
              <h4><?php echo get_phrase('participants');?></h4>
              <div class="col-sm-12">
                <table class="table table-lightborder">
                    <thead>
                        <tr>
                          <th class="text-center"><?php echo get_phrase('user');?></th>
                          <th class="text-center"><?php echo get_phrase('name');?></th>
                          <th class="text-center"><?php echo get_phrase('date');?></th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                        $this->db->where('poll_code', $row['poll_code']);
                        $pollss = $this->db->get('poll_response')->result_array();
                        foreach($pollss as $ro):
                        $arrays = ( explode('-' , $ro['user'])); ?>
                      <tr>
                        <td class="text-center">
                          <?php if($arrays[0] == "student"):?>
                            <a class="btn nc btn-sm btn-rounded btn-secondary" href="#"><?php echo get_phrase('student');?></a>
                          <?php endif;?>
                          <?php if($arrays[0] == "teacher"):?>
                            <a class="btn nc btn-sm btn-rounded btn-success" href="#"><?php echo get_phrase('teacher');?></a>
                          <?php endif;?>
                        <?php if($arrays[0] == "parent"):?>
                            <a class="btn nc btn-sm btn-rounded btn-purple" href="#"><?php echo get_phrase('parent');?></a>
                          <?php endif;?>
                        <?php if($arrays[0] == "admin"):?>
                            <a class="btn nc btn-sm btn-rounded btn-primary" href="#"><?php echo get_phrase('admin');?></a>
                          <?php endif;?>
                        </td>
                        <td class="text-center"><?php echo $this->db->get_where($arrays[0], array($arrays[0]."_id" => $arrays[1]))->row()->name;?></td>
                        <td  class="text-center"><?php echo $ro['date'];?></td>
                      </tr>
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
		  </div>
    </div>
<?php endforeach;?>