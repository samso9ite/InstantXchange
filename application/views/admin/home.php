
<section id="hero_in" class="general" style="height: 150px;">
	<div class="wrapper">
		<div class="container">
			<h5 class="fadeInUp" style="color: white;padding-top: 40px;">Welcome </h5>
			<button type="submit" class="btn_1 rounded "><a href="<?=site_url('admin/bitcoin_rate/')?>"><span style="color:white">Bitcoin Rate</span></a> </button> <button type="submit" class="btn_1 rounded "><a href="<?=site_url('admin/bitcoin_trades/')?>"><span style="color:white">Bitcoin Trades</span></a> </button>
		</div>
	</div>
</section>
<!--/hero_in-->

<div class="container margin_default">
	<div class="row">
	
		<div class="col-lg-12" id="faq">
			<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
				<div class="card">
					<div class="card-header" role="tab">
						<h5 class="mb-0">
							<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i> Trades</a>
						</h5>
					</div>

					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
							<?php if(!empty($trade)): ?>
								<table class="table table-bordered table-responsive">
									<thead>
										<tr>
											<td>Date Initiated</td>
											<td>Phone</td>
											<td>&nbsp;</td>
										</tr>
										<?php foreach($trade as $row): ?>
											<tr>
												<td><?=date('d M, h:i a',strtotime($row->initiated_on))?></td>
												<td><?=$row->phone?></td>
												<td>
													<a href="<?=site_url('trade-details/'.$row->ref_code)?>">Details</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</thead>
								</table>
								<?php else: ?>
									<div class="alert alert-danger">
										No Pending Trades!
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab">
							<h5 class="mb-0">
								<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>All Trades</a>
							</h5>
						</div>

						<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
							<div class="card-body">
								<?php if(!empty($trades)): ?>
									<table class="table " id="all">
										<thead>
											<tr>
												<td>Date Initiated</td>
												<td>Phone</td>
												<td>&nbsp;</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach($trades as $row): ?>
												<tr>
													<td><?=date('d M, h:i a',strtotime($row->initiated_on))?></td>
													<td><?=$row->phone?></td>
													<td>
														<a href="<?=site_url('trade-details/'.$row->ref_code)?>">Details</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<?php else: ?>
										<div class="alert alert-danger">
											No Trades!
										</div>
									<?php endif; ?>
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
		