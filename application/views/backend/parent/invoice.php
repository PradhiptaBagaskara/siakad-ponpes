<?php $running_year = $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;?>
<div class="content-w">
	<div class="content-i">
	 <div class="content-box">
	<div class="os-tabs-w">
			<div class="os-tabs-controls">
			  <ul class="nav nav-tabs upper">
			  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                   foreach ($children_of_parent as $row):
                    ?>
                    <li class="nav-item">
                    	<?php $active = $n++;?>
				  		<a class="nav-link <?php if($active == 1) echo 'active';?>" data-toggle="tab" href="#<?php echo $row['username'];?>"><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']);?>" width="25px" style="border-radius: 25px;margin-right:5px;"> <?php echo $row['name'];?></a>
					</li>
                <?php endforeach; ?>
			  </ul>
			</div>
		  </div>
      	  <div class="tab-content">
      	  	<?php 
			  	$n = 1;
			  	$children_of_parent = $this->db->get_where('student' , array('parent_id' => $this->session->userdata('parent_id')))->result_array();
                foreach ($children_of_parent as $row3):
                $class_id = $this->db->get_where('enroll' , array('student_id' => $row3['student_id'] , 'year' => $running_year))->row()->class_id;
	    		$section_id = $this->db->get_where('enroll' , array('student_id' => $row3['student_id'] , 'year' => $running_year))->row()->section_id;
            ?>
        	<?php $active = $n++;?>
	 		<div class="tab-pane <?php if($active == 1) echo 'active';?>" id="<?php echo $row3['username'];?>">
			          <div class="element-wrapper">
					  <div class="element-box lined-primary shadow">
			            <div class="table-responsive">
			<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
			<thead>
			<tr>
				<th><?php echo get_phrase('student');?></th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('amount');?></th>
				<th class="text-center"><?php echo get_phrase('status');?></th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('invoice');?></th>
				<th><?php echo get_phrase('upload_receipt');?></th>
			</tr>
			</thead>
			<tbody>
			<?php 
                $invoices = $this->db->get_where('invoice' , array('student_id' => $row3['student_id']))->result_array();
               	foreach($invoices as $row2):
            ?>
				<tr>
					<td><img alt="" src="<?php echo $this->crud_model->get_image_url('student', $row2['student_id']);?>" width="25px" style="border-radius: 10px;margin-right:5px;"> <?php echo $this->crud_model->get_type_name_by_id('student',$row2['student_id']);?></td>
					<td><?php echo $row2['title'];?></td>
					<td><strong><?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?><?php echo $row2['amount'];?></strong></td>
					<td class="text-center"><?php if($row2['status'] == 'completed'):?>
						<div class="status-pill green" data-title="Pagado" data-toggle="tooltip"></div> Dikonfirmasi
					<?php endif;?>
					<?php if($row2['status'] == 'pending'):?>
						<div class="status-pill red" data-title="Pagado" data-toggle="tooltip"></div> Menunggu
					<?php endif;?></td>
					<td><a class="btn nc btn-rounded btn-sm btn-secondary" style="color:white"><?php echo date('d M,Y', $row2['creation_timestamp']);?></a></td>
					<td><a class="btn btn-rounded btn-primary" style="color:white" href="<?php echo base_url();?>parents/view_invoice/<?php echo $row2['invoice_id'];?>"><i class="picons-thin-icon-thin-0406_money_dollar_euro_currency_exchange_cash"></i> <?php echo get_phrase('invoice');?></a></td>
					<td>
					<!-- <?php echo form_open(base_url() . 'parents/invoice/' . $row2['student_id'] . '/make_payment', array('enctype' => 'multipart/form-data'));?>					
                                    <input type="hidden" name="invoice_id" value="<?php echo $row2['invoice_id'];?>" />
                                        <button type="submit" class="btn btn-rounded btn-success" <?php if($row2['status'] == 'completed'):?> disabled="disabled"<?php endif;?>>
                                            <i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i> <?php echo get_phrase('upload_receipt');?>
                                        </button>
					<?php echo form_close();?> -->
					<a href="<?=base_url() . 'parents/upload_receipt/'.$row2['invoice_id']?>" class="btn btn-rounded btn-success <?=$row2['status'] == 'completed' ? 'disabled' : '' ?>">
							<i class="picons-thin-icon-thin-0424_money_payment_dollar_cash"></i> <?php echo get_phrase('upload_receipt');?>
					</a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			</table>
		  </div></div>
			          </div>
				</div>  
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>