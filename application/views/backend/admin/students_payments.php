<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<div class="content-w">
		  <div class="os-tabs-w menu-shad">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/payments/"><i class="os-icon picons-thin-icon-thin-0409_wallet_credit_card_money_payment"></i><span><?php echo get_phrase('new_payment');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="<?php echo base_url();?>admin/students_payments/"><i class="os-icon picons-thin-icon-thin-0426_money_payment_dollars_coins_cash"></i><span><?php echo get_phrase('payments');?></span></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?php echo base_url();?>admin/expense/"><i class="os-icon picons-thin-icon-thin-0420_money_cash_coins_payment_dollars"></i><span><?php echo get_phrase('expenses');?></span></a>
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
				  <a class="nav-link active" data-toggle="tab" href="#invoices"><?php echo get_phrase('invoices');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" data-toggle="tab" href="#historial"><?php echo get_phrase('history');?></a>
				</li>
			  </ul>
			</div>
		  </div>
		 <div class="tab-content">
		<div class="tab-pane active" id="invoices">
          <div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
				<tr>
					<th><?php echo get_phrase('student');?></th>
					<th><?php echo get_phrase('class');?></th>
					<th><?php echo get_phrase('title');?></th>
					<th><?php echo get_phrase('amount');?></th>
					<th><?php echo get_phrase('total');?></th>
					<th class="text-center"><?php echo get_phrase('status');?></th>
					<th class="text-center"><?php echo get_phrase('bukti_pembayaran');?></th>
					<th><?php echo get_phrase('date');?></th>
					<th class="text-center"><?php echo get_phrase('options');?></th>
				</tr>
			</thead>
			<tbody>
			<?php
                $count = 1;
                $this->db->where('year' , $running_year);
                $this->db->order_by('creation_timestamp' , 'desc');
                $invoices = $this->db->get('invoice')->result_array();
                foreach($invoices as $row): ?>
				<tr>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></a></td>
					<td><?php echo $row['title'];?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white"><?php echo $this->db->get_where('settings' , array('type'=>'currency'))->row()->description; ?><?php echo $row['amount_paid'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $this->db->get_where('settings' , array('type'=>'currency'))->row()->description; ?><?php echo $row['amount'];?></a></td>
					<td class="text-center">
					<?php if($row['status'] == 'completed'):?>
						<div class="status-pill green" data-title="Pagado" data-toggle="tooltip"></div> Dibayar
					<?php endif;?>
					<?php if($row['status'] == 'pending'):?>
						<div class="status-pill red" data-title="Pagado" data-toggle="tooltip"></div> Menunggu
					<?php endif;?>
					</td>
					<td class="text-center">
					<?php if($row['payment_receipt']):?>
						<div class="status-pill green" data-title="Pagado" data-toggle="tooltip"></div> Diupload
					<?php endif;?>
					<?php if(!$row['payment_receipt']):?>
						<div class="status-pill red" data-title="Pagado" data-toggle="tooltip"></div> Menunggu
					<?php endif;?>
					</td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo date('d M,Y', $row['creation_timestamp']);?></a></td>
					<td class="row-actions" nowrap>
						<a href="<?php echo base_url();?>admin/invoice_details/<?php echo $row['invoice_id'];?>"><i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i></a> <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_invoice/<?php echo $row['invoice_id'];?>');"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i></a>
						<a class="danger" href="<?php echo base_url();?>admin/invoice/delete/<?php echo $row['invoice_id'];?>" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div>
		</div>
          </div>
		  <div class="tab-pane" id="historial">
          <div class="element-box lined-primary shadow">
		  <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('description');?></th>
				<th><?php echo get_phrase('method');?></th>
				<th><?php echo get_phrase('amount');?></th>
				<th><?php echo get_phrase('date');?></th>
			</tr>
			</thead>
			<tbody>
			 <?php 
				$this->db->where('payment_type' , 'income');
				$this->db->order_by('timestamp' , 'desc');
				$payments = $this->db->get('payment')->result_array();
				foreach ($payments as $row):
			?>
				<tr>
					<td><?php echo $row['title'];?></td>
					<td><?php echo $row['description'];?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-primary" style="color:white">
					<?php 
	            		if ($row['method'] == 1) {echo get_phrase('cash');}
					    if ($row['method'] == 2) {echo get_phrase('check');}
						if ($row['method'] == 3) {echo get_phrase('card');}
					    if ($row['method'] == 'paypal') {echo 'PayPal';}
					?></a>
					</td>
					<td><a class="btn nc btn-rounded btn-sm btn-success" style="color:white"><?php echo $this->db->get_where('settings' , array('type'=>'currency'))->row()->description; ?><?php echo $row['amount'];?></a></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo date('d M,Y', $row['timestamp']);?></a></td>
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