<div class="content-w">
	<div class="content-i">
		<div class="content-box">
			<div class="col-lg-12">
				<div class="element-wrapper">
					<div class="element-box lined-primary shadow">
					<?php echo form_open(base_url() . 'parents/upload_receipt/'.$invoice->invoice_id, array('enctype' => 'multipart/form-data')); ?> 
						<h5 class="form-header"><?php echo get_phrase('upload_bukti_pembayaran'); ?></h5><br>
						<h6 class="form-header"><?php echo get_phrase('transfer_ke_rekening'); ?></h6><br>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?=get_phrase('bank_name').' / '.get_phrase('bank_code')?></label>
							<label class="col-sm-6 col-form-label"><?=$bank['name'].' / '.$bank['code']?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?php echo get_phrase('bank_number'); ?></label>
							<label class="col-sm-6 col-form-label"><?=$bank['number']?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?php echo get_phrase('bank_holder_name'); ?></label>
							<label class="col-sm-6 col-form-label"><?=$bank['holder_name']?></label>
						</div>
						<h6 class="form-header"><?php echo get_phrase('rincian_tagihan'); ?></h6><br>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?php echo get_phrase('nama_siswa'); ?></label>
							<label class="col-sm-6 col-form-label"><?=$student->name?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?php echo get_phrase('jumlah_tagihan'); ?></label>
							<label class="col-sm-6 col-form-label"><?=$bank['currency'].''.$invoice->amount?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-6 col-form-label"><?php echo get_phrase('untuk_pembayaran'); ?></label>
							<label class="col-sm-6 col-form-label"><?=$invoice->title?></label>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-6" for=""> <?=get_phrase('bukti_transfer')?><?=$invoice->payment_receipt ? ' (Sudah upload)' : '' ?></label>
							<div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="picons-thin-icon-thin-0042_attachment"></i>
									</div>
									<input class="form-control" placeholder="<?php echo get_phrase('bukti_transfer'); ?>" type="file" name="bukti_transfer">
								</div>
							</div>
						</div>
						<div class="form-buttons-w">
							<button class="btn btn-rounded btn-primary" type="submit"> <?php echo get_phrase('upload'); ?></button>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>