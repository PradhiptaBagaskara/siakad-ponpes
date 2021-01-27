<?php $edit_data	=	$this->db->get_where('payment' , array('payment_id' => $param2))->result_array();
	foreach ($edit_data as $row):
?>   
        <?php echo form_open(base_url() . 'admin/expense/edit/'.$row['payment_id'] , array('enctype' => 'multipart/form-data'));?>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('title');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="title" value="<?php echo $row['title'];?>" required="" type="text">
                </div>
              </div>
            </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('category');?></label>
            <div class="col-sm-8">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                </div>
              <select class="form-control" name="expense_category_id">
                <option value=""><?php echo get_phrase('select');?></option>
                 <?php 
                     $categories = $this->db->get('expense_category')->result_array();
                     foreach ($categories as $row2):
                ?>
                   <option value="<?php echo $row2['expense_category_id'];?>" <?php if ($row['expense_category_id'] == $row2['expense_category_id']) echo 'selected';?>><?php echo $row2['name'];?></option>
            <?php endforeach;?>
              </select>
              </div>
            </div>
          </div>
          <div class="form-group row">
          <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('description');?></label>
           <div class="col-sm-8">
           <div class="input-group">
           <textarea class="form-control" value="<?php echo $row['description'];?>" name="description" rows="6"><?php echo $row['description'];?></textarea>
          </div>
           </div>
          </div>
           <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> <?php echo get_phrase('amount');?></label>
              <div class="col-sm-8">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
                  </div>
                <input class="form-control" name="amount" value="<?php echo $row['amount'];?>" required="" type="text">
                </div>
              </div>
            </div>
            <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> <?php echo get_phrase('method');?></label>
            <div class="col-sm-8">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="picons-thin-icon-thin-0704_users_profile_group_couple_man_woman"></i>
                </div>
              <select class="form-control" name="method">
                <option value=""><?php echo get_phrase('select');?></option>
                 <option value="1" <?php if ($row['method'] == 1) echo 'selected';?>><?php echo get_phrase('cash');?></option>
                 <option value="2" <?php if ($row['method'] == 2) echo 'selected';?>><?php echo get_phrase('check');?></option>
                 <option value="3" <?php if ($row['method'] == 3) echo 'selected';?>><?php echo get_phrase('card');?></option>
              </select>
              </div>
            </div>
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-rounded btn-primary" style="float: right;" type="submit"> <?php echo get_phrase('update');?></button><br>
          </div>
        <?php echo form_close();?>
<?php endforeach; ?>