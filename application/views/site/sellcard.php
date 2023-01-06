<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-breadcrumb">
					<ol class="breadcrumb">
						<li><a href="<?=site_url('home')?>">Home</a></li>
						<li><a href="<?=site_url('new-trade')?>">Choose Card</a></li>
						<li class="active">Initiate Trade</li>
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
<style type="text/css">
	.rates table th {
		outline: 1px solid #e1e1e1 !important;
		vertical-align: middle;
		color: #fff;
	}
	.rates table {
		width: 100%;
	}

	.rates table td {
		outline: 1px solid #e1e1e1 !important;
		vertical-align: middle;
	}

	table td h6 {
		padding: 4px;
		margin-bottom: 0px;
	}
</style>
<div class="container margin_default">
	<div class="row">

		<div class="col-lg-12" id="faq">
			<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
				<div class="card">
					<div class="card-header" role="tab">
						<h5 class="mb-0">
							<a data-toggle="" href="javascript:;" aria-expanded="true">
								Sell <?=ucfirst($type)?> Giftcard
								<img src="<?=base_url('asset/images/'.$card->img)?>" class="float-right" style="width: 40px;" >
							</a>
						</h5>
					</div>
					<?php 
					$cardd = $this->trade->getRates($type);
					$ref = $this->trade->getRef();
					$reference = $this->trade->getLastTrade($ref);
					$banks = $this->trade->getBanks($user);
					?>
					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-1">&nbsp;</div>
								<div class="col-md-8 col-sm-12">
									<form method="post" action="<?=site_url('sell-giftcard')?>" enctype="multipart/form-data" class='uploadForm'>
										<div class="form-group">
											<input type="hidden" name="ref" value="<?=$ref?>">
											<h5>Gift Card Details</h5>
											<table style="width: 100%;" cellpadding="10">
												<input type="hidden" name="cardtype" value="<?=$type?>">
												<?php foreach($cardd as $row): ?>
													<?php if($row->naira == 0) continue; ?>
													<tr>
														<td colspan="2" class="row" style="border-bottom: 1px solid #e1e1e1;">
															<div class="col-sm-2">
																<div style="position: relative;">
																	<img src="<?=base_url('asset/images/'.$card->img)?>" alt="">
																	<div style="text-align:center;font-weight:bold;color:#fff;position: absolute;background: rgba(0,0,0,0.4);left: 0;top: 0;height: 100%;width: 100%;">
																		<span style="position: relative;top: 15px;">$<?=$row->usd?></span>
																	</div>
																</div>
															</div>
															<div class="col-sm-2">
																<input type="radio" class="range" data-naira="<?=$row->naira?>" name="qty[<?=$row->usd?>]" value="1"> $<?=$row->usd?> x 1
															</div>
															<div class="col-sm-2">
																<input type="radio" class="range" data-naira="<?=$row->naira?>" name="qty[<?=$row->usd?>]" value="2"> $<?=$row->usd?> x 2
															</div>
															<div class="col-sm-3">
																<input type="radio" class="range" data-naira="<?=$row->naira?>" name="qty[<?=$row->usd?>]" value="3"> $<?=$row->usd?> x 3
															</div>
															<div class="col-sm-3">
																<input type="radio" class="range" data-naira="<?=$row->naira?>" name="qty[<?=$row->usd?>]" value="4"> $<?=$row->usd?> x 4
															</div>
															<div style="text-align: center;padding: 15px;">
																<span class="rangeval" style="color: red;font-weight: ">0 </span>= &#8358;<span class="naira">0</span>
															</div>
														</td>
													</tr>
												<?php endforeach; ?>
												<tfoot style="background: #eee;">
													<tr>
														<th><h4>Total</h4></th>
														<th style="text-align: right;"><h4>&#8358;<span class="total">0</span></h4></th>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="form-group">
											<h5>Contact and Images</h5>
										</div>
										<div class="form-group">
											<label>Contact Phone</label>
											<input type="text" name="phone" placeholder="Phone Number" class="form-control" required>
										</div>
										<div class="form-group">
											<h5>Giftcard Images</h5>
											<div class="upload">Click to Upload</div>
										</div>
										<?php if($type == "amazon"): ?>
											<div class="alert alert-info">
												Please ensure to upload your gift card and Cash Receipt
											</div>
										<?php endif; ?>

										<div class="form-group">
											<h5>Bank Details</h5>
										</div>

										<div class="form-group">
										<label>Select bank account to receive your payment</label>
											<select name="bank_default" class="form-control">
												<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
												<option value="<?=$banks->accountnumber?> <?=$banks->account_name?> <?=$banks->bankname?> "> <?=$banks->account_name?> (<?=$banks->accountnumber?>)</option>
												<option value="<?=$banks->s_accountnumber?> <?=$banks->s_account_name?> <?=$banks->s_bankname?>"><?=$banks->s_account_name?> (<?=$banks->s_accountnumber?>)</option>
											</select>
										</div>
										<div role="tablist" class="add_bottom_45 accordion_2" id="bank_data">
											<div class="card">
												<div class="card-header" role="tab">
													<h5 class="mb-0">
														<a data-toggle="collapse" href="#bank" aria-expanded="true"><i class="indicator ti-minus"></i>Use New Account</a>
													</h5>
												</div>

												<div id="bank" class="collapse" role="tabpanel" data-parent="bank_data">
													<div class="card-body">
														<div class="form-group">
															<h5>Input details</h5>
														</div>
														<div class="form-group">
															<label>Bank Name</label>
															<select name="bankname" class="form-control">
																<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
																<option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option><option value="Diamond Bank Plc">Diamond Bank Plc</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Enterprise Bank Plc">Enterprise Bank Plc</option><option value="Fidelity Bank Plc">Fidelity Bank Plc</option><option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option><option value="Keystone Bank Ltd">Keystone Bank Ltd</option><option value="Mainstreet Bank Plc">Mainstreet Bank Plc</option><option value="Skye Bank Plc">Skye Bank Plc</option><option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option><option value="Sterling Bank Plc">Sterling Bank Plc</option><option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option><option value="United Bank for Africa Plc">United Bank for Africa Plc</option><option value="Unity Bank Plc">Unity Bank Plc</option><option value="WEMA Bank Plc">WEMA Bank Plc</option><option value="Zenith Bank International">Zenith Bank International</option><option value="Heritage Bank">Heritage Bank</option><option value="Jaiz Bank">Jaiz Bank</option><option value="Kuda Bank">Kuda Bank</option><option value="Vfd Bank">Vfd Bank</option>
															</select>
														</div>
														<div class="form-group">
															<label>Account Number</label>
															<input type="number" value="" name="account_number" class="form-control" placeholder="Account Number" >
														</div>
														<div class="form-group">
															<label>Account Name</label>
															<input type="text" value="" name="account_name"class="form-control" placeholder="Account Name" >
														</div>	
													</div>
												</div>
											</div>
										</div>

										
										<p>&nbsp;</p>
										<input type="hidden" class="uploaded" name="uploaded" value="">
										<button type="submit" class="btn btn-primary">Initiate Trade</button>
									</form>
									<p>&nbsp;</p>
								</div>
								<div class="col-sm-3">
									<div class="rates" style="background: #fff;">
										<table>
											<thead style="background: #333 !important;">
												<tr align="center">
													<th style="padding: 4px !important;">Dollar Value</th>
													<th style="padding: 4px !important;">Rate</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($rate as $row): ?>
													<tr>
														<td><h6><?=$row->usd?> Dollars</h6></td>
														<td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
													</tr>
												<?php endforeach; ?>
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
		<!-- /col -->
	</div>
	<!-- /row -->
</div>

<!--/container-->
<script type="text/javascript">

	$(".upload").uploadFile({
		url:"<?=site_url('upload-image?ref='.$ref)?>",
		fileName:"myfile",
		sequential:true,
		sequentialCount:1,
		acceptFiles:"image/*",
		showPreview:true,
		previewHeight: "200px",
		previewWidth: "auto",
		dragdropWidth: "100%",
		statusBarWidth:"100%",
		onSuccess:function(files,data,xhr,pd) {
			$(".uploaded").val("true")
			toastr.success("File Uploaded Successfully")
		},
		onError: function(files,status,errMsg,pd) {
			toastr.error("errMsg")
		}
	});

	$(document).on("submit",".uploadForm",function() {
		$el = $(this);
		data = $(this).serializeArray()
		$.ajax({
			type: 'POST',
			data: data,
			url: '<?=site_url('initiate-trade')?>',
			beforeSend: function () {
				$el.find("input,button").attr("disabled",true);
			},
			success: function (r) {
				if(r == 1) {
					toastr.success("Trade Initiated Successfully");
					setTimeout(function(){
						window.location = '<?=site_url('home/trade_details/'.$ref)?>'
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
	$(document).on("change", "input.range", function () {
		v = $(this).val();
		naira = $(this).data("naira");
		$(this).parents("td").find(".rangeval").html(v);
		new_naira = v * naira;
		$(this).parents("td").find(".rangeval").next().html(new_naira);

		getTotal()
	})


	function getTotal()
	{
		sum = 0;

		count = $(".naira").size()
		for(a = 0; a < count; a++) {
			v = $(".naira:eq("+a+")").text();
			sum += parseInt(v);
		}

		$(".total").html(sum.toLocaleString('en'));
	}
</script>