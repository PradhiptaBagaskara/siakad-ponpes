<?php  $edit_data = $this->db->get_where('subject' , array('subject_id' => $param2) )->result_array();
        foreach($edit_data as $row):
?>    
        <?php echo form_open(base_url() . 'teacher/courses/update_labs/'.$param2, array('enctype' => 'multipart/form-data')); ?>
          <div class="form-group row">
              <input type="hidden" name="section_id" value="<?php echo $param4;?>">
              <input type="hidden" name="exam_id" value="<?php echo $param3;?>">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 1</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la1" value="<?php echo $row['la1'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 2</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la2" value="<?php echo $row['la2'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 3</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la3" value="<?php echo $row['la3'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 4</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la4" value="<?php echo $row['la4'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 5</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la5" value="<?php echo $row['la5'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 6</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la6" value="<?php echo $row['la6'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 7</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la7" value="<?php echo $row['la7'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 8</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la8" value="<?php echo $row['la8'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 9</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la9" value="<?php echo $row['la9'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('activity');?> 10</label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0014_notebook_paper_todo"></i>
                  </div>
                <input class="form-control" name="la10" value="<?php echo $row['la10'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-buttons-w text-right">
            <button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>