
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-breadcrumb">
					<ol class="breadcrumb">
						<li><a href="<?=site_url('home')?>">Home</a></li>
						<li class="active">Choose Giftcard</li>
					</ol>
				</div>
			</div>
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
			<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
				<div class="card">
					<div class="card-header" role="tab">
						<h5 class="mb-0">
							<a data-toggle="" href="javascript:;" aria-expanded="true">Choose Giftcard Type</a>
						</h5>
					</div>
					<style type="text/css">
						table th {
							outline: 1px solid #e1e1e1 !important;
							vertical-align: middle;
							color: #fff;
						}
						table {
							width: 100%;
						}

						table td {
							outline: 1px solid #e1e1e1 !important;
							vertical-align: middle;
						}

						table td h6 {
							padding: 4px;
							margin-bottom: 0px;
						}
					</style>
					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
							<div class="row">
								<?php foreach($cards as $item): ?>
													<?php $cardname = strtolower($item->cardname); ?>
													<?php if(count($$cardname) < 1) continue; ?>
									<div class="col-sm-6" style="margin-bottom: 30px;">
										<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;background: #fff;">
											<a href="<?=empty($$cardname) ? "#":site_url('trade/'.$cardname)?>">
												<img src="<?=base_url('asset/images/'.$item->img)?>" class="img-fluid mx-auto d-block">
											</a>
										</div>
										<div class="rates" style="background: #fff;">
											<table>
												<thead style="background: #333 !important;">
													<tr align="center">
														<th style="padding: 4px !important;">Dollar Value</th>
														<th style="padding: 4px !important;">Rate</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($$cardname as $row): ?>
														<tr>
															<td><h6><?=$row->usd?> Dollars</h6></td>
															<td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								<?php endforeach; ?>
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
