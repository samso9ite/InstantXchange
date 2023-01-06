<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-breadcrumb">
					<ol class="breadcrumb">
						<li><a href="<?=site_url('home')?>">Home</a></li>
						<li class="active">Profile</li>
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
								Profile
							</a>
						</h5>
					</div>
					<?php 
					$ref = $this->trade->getRef();
					$details = $this->trade->getProfile($user)
					?>
					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-1">&nbsp;</div>
								<div class="col-md-8 col-sm-12">
									<h3> Please fill in the necessary details</span></h3>
									<form method="post" action="" enctype="multipart/form-data" class='uploadForm'>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" value="<?=$details->full_name?>" name="full_name" class="form-control" placeholder="Full Name" disabled>
												</div>
											</div>
											
										</div>
										<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Phone</label>
												<input type="number" value="<?=$details->phone?>" name="phone" class="form-control" placeholder="Phone Number" disabled >
											</div>
										</div>
										<div class="col-lg-6">
												<div class="form-group">
													<label>Email</label>
													<input type="text" value="<?=$details->email?>" name="email" class="form-control" placeholder="Email" disabled>
												</div>
											</div>
										</div>
										<h3> All Bank Details </h3>
										<h4> <?= $details->bankname ?>  <?= $details->accountnumber ?> <?= $details->account_name ?> </h4>
										<h4> <?= $details->s_bankname ?>  <?= $details->s_accountnumber ?> <?= $details->s_account_name ?></h4>
										<table>
											<thead>
												<tr>
													<td>Bank Name </td>
													<td>Account Name</td>
													<td>Account Number</td>	
												</tr>
											</thead>
										</table>	
									
										<table>
											<thead style="background: #333 !important;">
												<tr align="center">
													<th style="padding: 4px !important;">Bank Name</th>
													<th style="padding: 4px !important;">Account Name</th>
													<th style="padding: 4px !important;">Account Number</th>
												</tr>
											</thead>
											<tbody>
													<tr>
														<td><h6>Dollars</h6></td>
														<td><h6></h6></td>
													</tr>
											</tbody>
										</table>

										<?php if(!$details->accountnumber): ?>
											<h4 style="color:red"> Note: You have to set default bank details before any transaction</h3>
										<?php endif ?>
										<div role="tablist" class="add_bottom_45 accordion_2" id="bank_data">
											<div class="card">
												<div class="card-header" role="tab">
													<h5 class="mb-0">
														<a data-toggle="collapse" href="#bank" aria-expanded="true"><i class="indicator ti-minus"></i>Click toSet Bank Details</a>
													</h5>
												</div>

												<div id="bank" class="collapse" role="tabpanel" data-parent="bank_data">
													<div class="card-body">
														<div class="form-group">
															<h5>Bank Details</h5>
														</div>
														<div class="form-group">
															<label>Bank Name</label>
															<select name="bankname" class="form-control" required>
																<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
																<option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option><option value="Diamond Bank Plc">Diamond Bank Plc</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Enterprise Bank Plc">Enterprise Bank Plc</option><option value="Fidelity Bank Plc">Fidelity Bank Plc</option><option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option><option value="Keystone Bank Ltd">Keystone Bank Ltd</option><option value="Mainstreet Bank Plc">Mainstreet Bank Plc</option><option value="Skye Bank Plc">Skye Bank Plc</option><option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option><option value="Sterling Bank Plc">Sterling Bank Plc</option><option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option><option value="United Bank for Africa Plc">United Bank for Africa Plc</option><option value="Unity Bank Plc">Unity Bank Plc</option><option value="WEMA Bank Plc">WEMA Bank Plc</option><option value="Zenith Bank International">Zenith Bank International</option><option value="Heritage Bank">Heritage Bank</option><option value="Jaiz Bank">Jaiz Bank</option>
															</select>
														</div>
														<div class="form-group">
															<label>Account Number</label>
															<input type="number" value="<?=$details->accountnumber?>" name="accountnumber" class="form-control" placeholder="Account Number" required>
														</div>
														<div class="form-group">
															<label>Account Name</label>
															<input type="text" value="<?=$details->account_name?>" name="account_name"class="form-control" placeholder="Account Name" required>
														</div>

														<div class="form-group">
															<h5>Bank Details</h5>
														</div>
														<div class="form-group">
															<label>Bank Name</label>
															<select name="s_bankname" class="form-control" required>
																<option value="" selected="selected" disabled="">-- Choose your Bank --</option>
																<option value="Access Bank Nigeria Plc">Access Bank Nigeria Plc</option><option value="Diamond Bank Plc">Diamond Bank Plc</option><option value="Ecobank Nigeria">Ecobank Nigeria</option><option value="Enterprise Bank Plc">Enterprise Bank Plc</option><option value="Fidelity Bank Plc">Fidelity Bank Plc</option><option value="First Bank of Nigeria Plc">First Bank of Nigeria Plc</option><option value="First City Monument Bank">First City Monument Bank</option><option value="Guaranty Trust Bank Plc">Guaranty Trust Bank Plc</option><option value="Keystone Bank Ltd">Keystone Bank Ltd</option><option value="Mainstreet Bank Plc">Mainstreet Bank Plc</option><option value="Skye Bank Plc">Skye Bank Plc</option><option value="Stanbic IBTC Plc">Stanbic IBTC Plc</option><option value="Sterling Bank Plc">Sterling Bank Plc</option><option value="Union Bank Nigeria Plc">Union Bank Nigeria Plc</option><option value="United Bank for Africa Plc">United Bank for Africa Plc</option><option value="Unity Bank Plc">Unity Bank Plc</option><option value="WEMA Bank Plc">WEMA Bank Plc</option><option value="Zenith Bank International">Zenith Bank International</option><option value="Heritage Bank">Heritage Bank</option><option value="Jaiz Bank">Jaiz Bank</option><option value="Kuda Bank">Kuda Bank</option><option value="Vfd Bank">Vfd Bank</option>
															
															</select>
														</div>
														<div class="form-group">
															<label>Account Number</label>
															<input type="number" value="<?=$details->s_accountnumber?>" name="s_accountnumber" class="form-control" placeholder="Account Number" required>
														</div>
														<div class="form-group">
															<label>Account Name</label>
															<input type="text" value="<?=$details->s_account_name?>" name="s_account_name"class="form-control" placeholder="Account Name" required>
														</div>
													</div>
												</div>
</div>
</div>
										<p>&nbsp;</p>
										<input type="hidden" class="uploaded" name="uploaded" value="">
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
									<p>&nbsp;</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).on("submit",".uploadForm",function() {
		$el = $(this);
		data = $(this).serializeArray()
		$.ajax({
			type: 'POST',
			data: data,
			url: '<?=site_url('home/profile_update')?>',
			beforeSend: function () {
				$el.find("input,button").attr("disabled",true);
			},
			success: function (r) {
				if(r == 1) {
					toastr.success("Profile Updated Successfully");
					setTimeout(function(){
						window.location = '<?=site_url('')?>'
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