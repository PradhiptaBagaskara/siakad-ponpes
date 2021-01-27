<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/payments/"><i class="os-icon picons-thin-icon-thin-0409_wallet_credit_card_money_payment"></i><span><?php echo get_phrase('new_payment');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/students_payments/"><i class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></i><span><?php echo get_phrase('payments');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/expense/"><i class="os-icon picons-thin-icon-thin-0420_money_cash_coins_payment_dollars"></i><span><?php echo get_phrase('expenses');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
   <div class="content-box">
	<div class="element-wrapper">
		<div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" data-toggle="tab" href="#expenses"><?php echo get_phrase('expenses');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#categories"><?php echo get_phrase('categories');?></a>
				</li>
			  </ul>
			</div>
		  </div>
		 <div class="tab-content">
		<div class="tab-pane active" id="expenses">
          <div class="element-box lined-primary shadow">
		  <div class="form-header">
			<h6><?php echo get_phrase('expenses');?></h6>
			<div style="margin: auto 0;text-align:right;"><button class="btn btn-success btn-rounded btn-upper" data-target="#exampleModal1" data-toggle="modal" type="button">+ <?php echo get_phrase('new_expense');?></button></div>
		  </div>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th>#</th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('category');?></th>
				<th><?php echo get_phrase('amount');?></th>
				<th><?php echo get_phrase('method');?></th>
				<th><?php echo get_phrase('date');?></th>
				<th class="text-center"><?php echo get_phrase('options');?></th>
			</tr>
			</thead>
			<tbody>
			<?php 
            	$count = 1;
            	$this->db->where('payment_type' , 'expense');
            	$this->db->where('year' , $running_year);
            	$this->db->order_by('timestamp' , 'desc');
            	$expenses = $this->db->get('payment')->result_array();
            	foreach ($expenses as $row):
        	?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['title'];?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-purple" style="color:white"><?php 
            if ($row['expense_category_id'] != 0 || $row['expense_category_id'] != '')
            echo $this->db->get_where('expense_category' , array('expense_category_id' => $row['expense_category_id']))->row()->name;
                ?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?><?php echo $row['amount'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php 
                    if ($row['method'] == 1) echo get_phrase('cash');
                    if ($row['method'] == 2) echo get_phrase('check');
                    if ($row['method'] == 3) echo get_phrase('card');
                ?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo date('d M,Y', $row['timestamp']);?></a></td>
					<td class="row-actions">
                                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_expense/<?php echo $row['payment_id'];?>');"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/expense/delete/<?php echo $row['payment_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div>
		</div>
          </div>
		  <div class="tab-pane" id="categories">
          <div class="element-box lined-primary shadow">
		  <div class="form-header">
			<h6>Categorias</h6>
			<div style="margin: auto 0;text-align:right;"><button class="btn btn-success btn-rounded btn-upper" data-target="#exampleModal2" data-toggle="modal" type="button">+ <?php echo get_phrase('new_category');?></button></div>
		  </div>
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo get_phrase('category');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
             	$count = 1;
	            $expenses = $this->db->get('expense_category')->result_array();
            	foreach ($expenses as $row):
        	?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo $row['name'];?></td>
					<td class="row-actions">
						<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_expense_category/<?php echo $row['expense_category_id'];?>');"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/expense_category/delete/<?php echo $row['expense_category_id'];?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div>
		</div>
          </div>
          </div>

 <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal1" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
             <?php echo get_phrase('new_expense');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <?php echo form_open(base_url() . 'admin/expense/create/');?>
          <div class="modal-body">
              <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('title');?></label>
			  <div class="col-sm-9">
			  <input class="form-control" placeholder="<?php echo get_phrase('title');?>" required="" name="title" type="text">
			  </div>
			</div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('category');?></label>
				<div class="col-sm-9">
				 <select name="expense_category_id" class="form-control" required>
                    <option value=""><?php echo get_phrase('select');?></option>
                    <?php 
						$categories = $this->db->get('expense_category')->result_array();
                        foreach ($categories as $row):
                    ?>
                    	<option value="<?php echo $row['expense_category_id'];?>"><?php echo $row['name'];?></option>
                    <?php endforeach;?>
                  </select>
				  </div>
			  </div>
			  <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('description');?></label>
			  <div class="col-sm-9">
			  <input class="form-control" required="" name="description" type="text">
			  </div>
			  </div>
			  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('amount');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0420_money_cash_coins_payment_dollars"></i>
				</div>
			  <input class="form-control" placeholder="<?php echo get_phrase('amount');?>" name="amount" required="" type="text">
			  </div>
			</div></div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('method');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0421_money_credit_card_coins_payment"></i>
					</div>
				  	<select name="method" class="form-control" required="">
                        <option value="1"><?php echo get_phrase('cash');?></option>
                        <option value="2"><?php echo get_phrase('check');?></option>
                        <option value="3"><?php echo get_phrase('card');?></option>
                    </select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('date');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0021_calendar_month_day_planner"></i>
				</div>
			  <input class="single-daterange form-control" required type="text" value="" name="timestamp">
			  </div>
			</div></div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('create');?></button>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
	
	<div aria-hidden="true" aria-labelledby="exampleModalLabe2" class="modal fade" id="exampleModal2" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            <?php echo get_phrase('new_category');?>
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <?php echo form_open(base_url() . 'admin/expense_category/create/');?>
          <div class="modal-body">
              <div class="form-group row">
			  <label class="col-sm-3 col-form-label" for=""> <?php echo get_phrase('name');?></label>
			  <div class="col-sm-9">
			  <input class="form-control" placeholder="<?php echo get_phrase('name');?>" required="" name="name" type="text">
			  </div>
			</div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-rounded btn-success" type="submit"> <?php echo get_phrase('create');?></button>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
        </div>
      </div>
</div></div>