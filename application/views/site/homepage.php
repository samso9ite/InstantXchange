<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="bg-white pinside30">
						<div class="row">
							
							<div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
								<h1 class="page-title"><?=$page_title?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/hero_in-->

	<div class="container margin_default">
		<div class="row">

			<div class="col-lg-12" id="faq">
				<div class="row">
					<div class="col-lg-6">
						<div style="margin: 15px 0 15px 0;" >
							<?php if(($updated != 0)): ?>
								<a href="<?=site_url('home/new_bitcoin_trade')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Trade Bitcoin </a>
							<?php else: ?>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus"></i> Trade Bitcoin
										</button>

										<!-- The Modal -->
										<div class="modal" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title" style="color:#15549a"><b>Hey Chief! Set a default bank account before trading</b></h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
											<form method="post" action="" enctype="multipart/form-data" class="uploadForm" >
												<div class="form-group">
													<label>Bank Name</label>
													<select name="bankname" class="form-control"  style="border-color:#15549a" >
														<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
														<option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option><option value="Diamond Bank Plc">Diamond Bank Plc</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Enterprise Bank Plc">Enterprise Bank Plc</option><option value="Fidelity Bank Plc">Fidelity Bank Plc</option><option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option><option value="Keystone Bank Ltd">Keystone Bank Ltd</option><option value="Mainstreet Bank Plc">Mainstreet Bank Plc</option><option value="Skye Bank Plc">Skye Bank Plc</option><option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option><option value="Sterling Bank Plc">Sterling Bank Plc</option><option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option><option value="United Bank for Africa Plc">United Bank for Africa Plc</option><option value="Unity Bank Plc">Unity Bank Plc</option><option value="WEMA Bank Plc">WEMA Bank Plc</option><option value="Zenith Bank International">Zenith Bank International</option><option value="Heritage Bank">Heritage Bank</option><option value="Jaiz Bank">Jaiz Bank</option>
													</select>
												</div>
												<div class="form-group">
													<label>Account Number</label>
													<input type="number" value="" name="account_number" class="form-control" placeholder="Account Number" style="border-color:#15549a" >
												</div>
												<div class="form-group">
													<label>Account Name</label>
													<input type="text" value="" name="account_name"class="form-control" placeholder="Account Name" style="border-color:#15549a"  >
												</div>	
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Submit</button>
											</div>
											</form>
											</div>
										</div>
										</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div style="margin: 15px 0 15px 0;text-align: right;">
						<?php if(($updated != 0)): ?>
							<a href="<?=site_url('new-trade')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Trade Card</a>
							<?php else: ?>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">	<i class="fa fa-plus"></i> Trade Card </button>
										<!-- The Modal -->
										<div class="modal" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title" style="color:#15549a"><b>Hey Chief! Set a default bank account before trading</b></h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
											<form method="post" action="" enctype="multipart/form-data" class="uploadForm" >
												<div class="form-group">
													<label>Bank Name</label>
													<select name="bankname" class="form-control"  style="border-color:#15549a" >
														<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
														<option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option><option value="Diamond Bank Plc">Diamond Bank Plc</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Enterprise Bank Plc">Enterprise Bank Plc</option><option value="Fidelity Bank Plc">Fidelity Bank Plc</option><option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option><option value="Keystone Bank Ltd">Keystone Bank Ltd</option><option value="Mainstreet Bank Plc">Mainstreet Bank Plc</option><option value="Skye Bank Plc">Skye Bank Plc</option><option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option><option value="Sterling Bank Plc">Sterling Bank Plc</option><option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option><option value="United Bank for Africa Plc">United Bank for Africa Plc</option><option value="Unity Bank Plc">Unity Bank Plc</option><option value="WEMA Bank Plc">WEMA Bank Plc</option><option value="Zenith Bank International">Zenith Bank International</option><option value="Heritage Bank">Heritage Bank</option><option value="Jaiz Bank">Jaiz Bank</option>
													</select>
												</div>
												<div class="form-group">
													<label>Account Number</label>
													<input type="number" value="" name="account_number" class="form-control" placeholder="Account Number" style="border-color:#15549a" >
												</div>
												<div class="form-group">
													<label>Account Name</label>
													<input type="text" value="" name="account_name"class="form-control" placeholder="Account Name" style="border-color:#15549a"  >
												</div>	
											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Submit</button>
											</div>
											</form>
											</div>
										</div>
										</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
					<div class="card">
						<div class="card-header" role="tab">
							<h5 class="mb-0">
								<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>Pending Trades</a>

							</h5>
						</div>

						<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
							<div class="card-body">
								<?php if(!empty($trade) || !empty($tradeBitcoin)): ?>
									
									<table class="table table-bordered table-responsive">
										<tbody style="width: 100% !important;">
											<tr>
												<td>Reference</td>
												<td>Date Initiated</td>
												<td>Status</td>
												<td>Trading Type</td>
												<td>&nbsp;</td>
											</tr>
											<?php foreach($trade as $trade): ?>
												<tr>
													<td><?=$trade->ref_code?></td>
													<td><?=date('d M, h:i a',strtotime($trade->initiated_on))?></td>
													<td><?=$trade->status?></td>
													<td> Gift Card Trading </td>
													<td>
														<a href="<?=site_url('trade-details/'.$trade->ref_code)?>">Details</a>
													</td>
												</tr>
											<?php endforeach; ?>
											<?php foreach($tradeBitcoin as $bitcoin_trade): ?>
												<tr>
													<td><?=$bitcoin_trade->ref_code?></td>
													<td><?=date('d M, h:i a',strtotime($bitcoin_trade->initiated_on))?></td>
													<td><?=$bitcoin_trade->status?></td>
													<td>Bitcoin Trading</td>
													<td>
														<a href="<?=site_url('trade-bitcoin-details/'.$bitcoin_trade->ref_code)?>">Details</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									</div>

									<?php else: ?>
										<div class="alert alert-danger">
											No Pending Trades!
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
										<i class="indicator ti-plus"></i>Trade History
									</a>
								</h5>
							</div>
							<div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<div class="card-body">
										<?php if(!empty($history) || !empty($bitcoin_history)): ?>
											<table class="table table-bordered table-responsive">
												<thead>
													<tr>
														<td>Reference</td>
														<td>Date Initiated</td>
														<td>Status</td>
														<td>Trading Type </td>
														<td>&nbsp;</td>
													</tr>
													<?php foreach($history as $row): ?>
														<tr>
															<td><?=$row->ref_code?></td>
															<td><?=date('d M, h:i a',strtotime($row->initiated_on))?></td>
															<td><?=$row->status?></td>
															<td> Gift Card Trading </td>
															<td>
																<a href="<?=site_url('trade-details/'.$row->ref_code)?>">Details</a>
															</td>
														</tr>
													<?php endforeach; ?>
													<?php foreach($bitcoin_history as $row): ?>
														<tr>
															<td><?=$row->ref_code?></td>
															<td><?=date('d M, h:i a',strtotime($row->initiated_on))?></td>
															<td><?=$row->status?></td>
															<td> Bitcoin Trading </td>
															<td>
																<a href="<?=site_url('trade-details/'.$row->ref_code)?>">Details</a>
															</td>
														</tr>
													<?php endforeach; ?>
												</thead>
											</table>
											</div>

											<table class="table table-bordered table-responsive">
												<thead>
													<tr>
														<td>Reference</td>
														<td>Date Initiated</td>
														<td>Status</td>
														<td>&nbsp;</td>
													</tr>
													<?php foreach($bitcoin_history as $row): ?>
														<tr>
															<td><?=$row->ref_code?></td>
															<td><?=date('d M, h:i a',strtotime($row->initiated_on))?></td>
															<td><?=$row->status?></td>
															<td>
																<a href="<?=site_url('trade-details/'.$row->ref_code)?>">Details</a>
															</td>
														</tr>
													<?php endforeach; ?>
												</thead>
											</table>
											<?php else: ?>
												<div class="alert alert-danger">
													No Previous Trades!
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!--/container-->
			<script type="text/javascript">

	
	$(document).on("submit",".uploadForm",function() {
		$el = $(this);
		data = $(this).serializeArray()
		$.ajax({
			type: 'POST',
			data: data,
			url: '<?=site_url('home/update_account')?>',
			beforeSend: function () {
				$el.find("input,button").attr("disabled",true);
			},
			success: function (r) {
				if(r == 1) {
					$('#myModal').modal('hide')
					toastr.success("Bank account created");
					setTimeout(function(){
						window.location = '<?=site_url('home/new_bitcoin_trade')?>'
					},2000)
				} else {
					toastr.error(r);
				}

				$el.find("input,button").attr("disabled",false);
			},
			error: function (r) {
				$el.find("input,button").attr("disabled",false);
				toastr.error("Error: "+r);
			}
		})
		return false
	})



</script>
