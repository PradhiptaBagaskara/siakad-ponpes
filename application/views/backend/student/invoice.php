<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>student/invoice"><i class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></i><span><?php echo get_phrase('payments');?></span></a>
				</li>
			  </ul>
			</div>
		  </div>
  <div class="content-i">
    <div class="content-box">
	<div class="element-wrapper">
          <div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('student');?></th>
				<th><?php echo get_phrase('title');?></th>
				<th class="text-center"><?php echo get_phrase('amount');?></th>
				<th class="text-center"><?php echo get_phrase('status');?></th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('invoice');?></th>
				<th><?php echo get_phrase('upload_receipt');?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($invoices as $row):?>
				<tr>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $this->session->userdata('login_user_id'));?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name;?></td>
					<td><?php echo $row['title'];?></td>
					<td class="text-center"><strong><?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?><?php echo $row['amount'];?></strong></td>
					<td class="text-center"><?php if($row['status'] == 'completed'):?>
						<div class="status-pill green" data-title="Pagado" data-toggle="tooltip"></div> Dikonfirmasi
					<?php endif;?>
					<?php if($row['status'] == 'pending'):?>
						<div class="status-pill red" data-title="Pagado" data-toggle="tooltip"></div> Menunggu
					<?php endif;?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo date('d M,Y', $row['creation_timestamp']);?></a></td>
					<td><a class="btn btn-rounded btn-primary" style="color:white" href="<?php echo base_url();?>student/view_invoice/<?php echo $row['invoice_id'];?>"><i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i> <?php echo get_phrase('invoice');?></a></td>
					<td>
					<!-- <?php echo form_open(base_url() . 'student/invoice/make_payment', array('enctype' => 'multipart/form-data'));?>					
                                    <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>" />
                                        <button type="submit" class="btn btn-rounded btn-success" <?php if($row['status'] == 'completed'):?> disabled="disabled"<?php endif;?>>
                                            <i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i> <?php echo get_phrase('upload_receipt');?>
                                        </button>
                    <?php echo form_close();?>
                    </td> -->
					<a href="<?=base_url() . 'student/upload_receipt/'.$row['invoice_id']?>" class="btn btn-rounded btn-success <?=$row['status'] == 'completed' ? 'disabled' : '' ?>">
							<i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i> <?php echo get_phrase('upload_receipt');?>
					</a>
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