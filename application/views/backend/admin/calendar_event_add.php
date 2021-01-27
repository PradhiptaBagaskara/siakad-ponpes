<?php 
    $originalDate = $param2;
    $newDate = explode("-", $originalDate);
    
    $Date = $newDate[0];
    $new = date("d", strtotime($Date));
?>
    <div class="row">
        <div class="col-md-12">
          <div class="modal-body">
            <?php echo form_open(base_url() . 'admin/calendar/create_event/' , array(
                'class' => 'form-horizontal form-groups-bordered validate calendar-event-add', 'enctype' => 'multipart/form-data')); ?>
                <div class="row">
            <br>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for=""> <?php echo get_phrase('title');?></label><input class="form-control" placeholder="<?php echo get_phrase('title');?>" name="title" required="" type="text">
                    </div>
                </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for=""> <?php echo get_phrase('colour');?></label>
                        <select name="colour" class="form-control">
                            <option value=""><?php echo get_phrase('colour');?></option>
                            <option style="color:#E93339;" value="#E93339">&#9724; <?php echo get_phrase('red');?></option>
                            <option style="color:#FDA330;" value="#FDA330">&#9724; <?php echo get_phrase('orange');?></option>
                            <option style="color:#252A32;" value="#252A32">&#9724; <?php echo get_phrase('black');?></option>
                            <option style="color:#279ACB;" value="#279ACB">&#9724; <?php echo get_phrase('blue');?></option>
                            <option style="color:#128C48;" value="#128C48">&#9724; <?php echo get_phrase('green');?></option>
                            <option style="color:#4B088A;" value="#4B088A">&#9724; <?php echo get_phrase('purple');?></option>
                        </select>
                    </div>
                </div>         
                <div class="col-sm-12">
                    <div class="form-group">
                    <label> <?php echo get_phrase('description');?></label><textarea cols="80" class="form-control" rows="5" name="description" required="" rows="2"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> <?php echo get_phrase('start');?></label><input type="date" name="start_timestamp" class="form-control" value="<?php echo $newDate[2];?>-<?php echo $newDate[1];?>-<?php echo $newDate[0];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                  <label for=""> <?php echo get_phrase('end');?></label><input type="date" name="end_timestamp" class="form-control" value="<?php echo $newDate[2];?>-<?php echo $newDate[1];?>-<?php echo $newDate[0];?>">
                    </div>
                </div>
            </div>     

      <input type="hidden" name="year" value="<?php echo $newDate[2];?>">
      <input type="hidden" name="month" value="<?php echo $newDate[1];?>">
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('save');?></button>
          </div>
          <?php echo form_close();?>
        </div>
    </div>