<?php
$invoice_info = $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->result_array();
// var_dump($invoice_info);
foreach ($invoice_info as $row) :
?>
	<div class="content-w">
		<ul class="breadcrumb hidden-xs-down hidden-sm-down">
			<div class="back">
				<a href="<?php echo base_url(); ?>admin/students_payments/"><i class="os-icon os-icon-common-07"></i></a>
			</div>
		</ul>
		<div class="content-i">
			<div class="content-box">
				<div class="element-wrapper">
					<div class="invoice-w">
						<div class="infos">
							<div class="info-1">
								<div class="invoice-logo-w">
									<img alt="" src="<?php echo base_url(); ?>uploads/logo.png" height="50%">
								</div>
								<div class="company-name">
									<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>
								</div>
								<div class="company-address">
									<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>
								</div>
								<div class="company-extra">
									<?php echo get_phrase('phone'); ?>: <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>
								</div>
							</div>
							<div class="info-2"><br><br>
								<div class="company-name">
									<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?>
								</div>
								<div class="company-address">
									<?php echo get_phrase('roll'); ?>: <strong><?php echo $this->db->get_where('enroll', array('student_id' => $row['student_id']))->row()->roll; ?></strong><br />
									<?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?><br />
								</div>
							</div>
						</div>
						<div class="invoice-heading">
							<h3><?php echo get_phrase('invoice'); ?></h3>
							<div class="invoice-date">
								<?php echo date('d M,Y', $row['creation_timestamp']); ?>
							</div>
						</div>
						<div class="invoice-body">
							<div class="invoice-table">
								<table class="table">
									<thead>
										<tr>
											<th><?php echo get_phrase('title'); ?></th>
											<th><?php echo get_phrase('description'); ?></th>
											<th class="text-right"><?php echo get_phrase('amount'); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $row['title']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td class="text-right"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo $row['amount']; ?></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td><?php echo get_phrase('total'); ?></td>
											<td class="text-right" colspan="2"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo $row['amount']; ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="invoice-footer">
							<div class="invoice-logo">
								<img alt="" src="<?php echo base_url(); ?>uploads/logo.png"><span><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?></span>
							</div>
							<div class="invoice-info">
								<span><?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?></span><span><?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-i">
			<div class="content-box">
				<div class="element-wrapper">
					<div class="element-box lined-primary shadow">
						<h5 class="form-header"><?php echo get_phrase('bukti_pembayaran'); ?></h5><br>
						<?php if ($invoice_info[0]['payment_receipt']) : ?>
						<a target="_blank" class="btn btn-primary btn-rounded btn-upper" href="<?=base_url($invoice_info[0]['payment_receipt'])?>">Lihat Bukti Pembayaran</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>