<div class="content-w">
	<?php if($this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->acc == 1):?>
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/payments/"><i class="os-icon picons-thin-icon-thin-0409_wallet_credit_card_money_payment"></i><span><?php echo get_phrase('new_payment');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/students_payments/"><i class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></i><span><?php echo get_phrase('payments');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/expense/"><i class="os-icon picons-thin-icon-thin-0420_money_cash_coins_payment_dollars"></i><span><?php echo get_phrase('expenses');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
    <div class="content-box">
	<div class="row">
		<div class="col-sm-6">
		<?php echo form_open(base_url() . 'admin/invoice/create');?>
      <div class="element-box lined-primary shadow">
		  <h5 class="form-header"><?php echo get_phrase('invoice_details');?></h5><br>
		  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('class');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0003_write_pencil_new_edit"></i>
					</div>
					<select name="class_id" class="form-control" onchange="return get_class_students(this.value)">
                        <option value=""><?php echo get_phrase('select');?></option>
                        <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                        <?php endforeach;?>
                    </select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('student');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i>
					</div>
				  <select class="form-control" id="student_selection_holder" name="student_id">
					<option value=""><?php echo get_phrase('select');?></option>
				  </select>
				  </div>
				</div>
			  </div>
		  <div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('title');?></label>
			  <div class="col-sm-9">
			  <input class="form-control" required="" type="text" name="title">
			</div></div>
			<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('description');?> </label>
			  <div class="col-sm-9">
			  <textarea class="form-control" required="" rows="5" name="description"></textarea>
			</div></div>
			<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('date');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0021_calendar_month_day_planner"></i>
				</div>
			  <input class="single-daterange form-control" required="" type="text" name="date" value="">
			  </div>
			</div></div>
		</div>
		</div>
		<div class="col-sm-6">
      <div class="element-box lined-success shadow">
		  <h5 class="form-header">
			<?php echo get_phrase('payment_details');?>
		  </h5><br>
			<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('total');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0425_money_payment_dollar_cash"></i>
				</div>
			  <input class="form-control" required="" name="amount" type="text">
			  </div>
			</div></div>
			<div class="form-group row">
			<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('amount');?></label>
			  <div class="col-sm-9">
			  <div class="input-group">
				<div class="input-group-addon">
					<i class="picons-thin-icon-thin-0420_money_cash_coins_payment_dollars"></i>
				</div>
			  <input class="form-control" type="text" name="amount_paid">
			  </div>
			</div></div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('status');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0414_money_cash_coins_payment"></i>
					</div>
				  <select class="form-control" required="" name="status">
					<option value=""><?php echo get_phrase('select');?></option>
					<option value="completed"><?php echo get_phrase('completed');?></option>
					<option value="pending"><?php echo get_phrase('pending');?></option>
				  </select>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-form-label col-sm-3" for=""> <?php echo get_phrase('method');?></label>
				<div class="col-sm-9">
					<div class="input-group">
					<div class="input-group-addon">
						<i class="picons-thin-icon-thin-0421_money_credit_card_coins_payment"></i>
					</div>
				  <select class="form-control" name="method">
					<option value=""><?php echo get_phrase('select');?></option>
					<option value="3"><?php echo get_phrase('card');?></option>
					<option value="1"><?php echo get_phrase('cash');?></option>
					<option value="2"><?php echo get_phrase('check');?></option>
				  </select>
				  </div>
				</div>
			  </div>
		   <div class="form-buttons-w">
            <button class="btn btn-success btn-rounded" type="submit"> <?php echo get_phrase('create_invoice');?></button>
          </div>
		</div>
		<?php echo form_close();?>
		</div>
	</div>	
	</div>
</div>
<?php endif;?>
</div>

<script type="text/javascript">
    function get_class_students(class_id) {
        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_students/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });
    }
</script>
