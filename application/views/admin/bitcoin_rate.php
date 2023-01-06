
<section id="hero_in" class="general" style="height: 150px;">
	<div class="wrapper">
		<div class="container">
			<h5 class="fadeInUp" style="color: white;padding-top: 40px;">Welcome </h5>
			<button type="submit" class="btn_1 rounded "><a href="<?=site_url('admin/')?>"><span style="color:white">Back To Home</span></a> </button>
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
							<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i> Add Bitcoin Rate</a>
						</h5>
					</div>

					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
						<form method="post" action="set_bitcoin_rate" enctype="multipart/form-data" class='uploadForm'>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Input Amount</label>
										<input type="text" value="" name="amount" class="form-control" placeholder="Set Bitcoin Amount" required> 
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label>Input Bitcoin Rate</label>
										<input type="text" value="" name="rate" class="form-control" placeholder="Set Bitcoin Rate" required>
									</div>
							</div>
							<div class="col-lg-12" style="text-align:center; margin-bottom:20px">
								<button type="submit" class="btn_1 rounded  login_btn">Set Bitcoin Rate</a> </button>
							</div>
							<br><br>
						</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /col -->
			</div>
			<table class="table table-bordered table-responsive" style="background-color:white">
			<h5 class="text-center" style="text-align:center">All Bitcoin  Rate</h5>
				<thead>
					<tr>
						<td> Amount</td>
						<td>Rate</td>
						<td>Delete</td>
					</tr>
				</thead>
				<tbody>
				<?php foreach($btc_rate as $row): ?>
					<tr>
						<td><?=$row->amount?></td>
						<td><?=$row->rate?></td>
						<td ><a style="color:red" href="<?=site_url('admin/deleteBitcoinRates/'.$row->id)?>"> Delete Rate </a> 
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<!-- /row -->
		</div>
		<!--/container-->
	