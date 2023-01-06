<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-breadcrumb">
					<ol class="breadcrumb">
						<li><a href="<?=site_url('home')?>">Home</a></li>
						<li class="active"></li>
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

		<div class="col-lg-12" id="faq"><br>
			<div class="row" style="background-color:#fafafa">
				<marquee>
				<?php foreach($bitcoin_rate as $row): ?>
				<button class="buttonPill" style="margin-right:4em; background-color:#15549a; color:white">$(<?=$row->rate?>) => <?= $row->amount?>/$</button>
				<?php endforeach; ?>
			</marquee>
			</div><br><br>
			<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
				<div class="card">
					<div class="card-header" role="tab">
						<h5 class="mb-0">
							<a data-toggle="" href="javascript:;" aria-expanded="true">
								Trade Bitcoin
							</a>
						</h5>
					</div>
					<?php 
					$ref = $this->trade->getRef();
					$banks = $this->trade->getBanks($user);
					$reference = $this->trade->getLastBitcoinTrade()
					?>
					<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-1">&nbsp;</div>
								<div class="col-md-12 col-sm-12">
									<h3> Send your bitcoin to this address </h3>
									<div class="row">
										<h3 style="margin-left:18px; color:red"> bc1qnf0hmxfvpldeaesdr9gmd6tjz7wg4n9awzjelx</span> <button onclick="myFunction()"  class="btn btn-primary">Copy Bitcoin Address</button></h3> 
									</div>
									
									<form method="post" action="" enctype="multipart/form-data" class='uploadForm'>
										<input type="hidden" name="ref" value="<?=$ref?>">
										<div class="form-group">
											<h5>Upload screenshot of the bitcoin sent</h5>
											<div class="upload">Click to Upload</div>
										</div>
										<input type="hidden" class="uploaded" name="uploaded" value="">
										<div class="form-group">
											<label>Input Transaction ID</label>
											<input type="number" value="" name="transaction_id" class="form-control" placeholder="Transaction ID" required>
										</div>
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
											<h4 style="color:red">Note: your payment will be sent after confirmation of your Bitcoin.</h3>
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
		<!-- /col -->
	</div>
	<!-- /row -->
</div>
<style>
	.buttonPill {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
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
			url: '<?=site_url('trade-bitcoin')?>',
			beforeSend: function () {
				$el.find("input,button").attr("disabled",true);
			},
			success: function (r) {
				if(r == 1) {
					toastr.success("Trade Initiated Successfully");
					setTimeout(function(){
						window.location = '<?=site_url('home/trade_bitcoin_details/'.$reference->ref_code)?>'
					},2000)
				} else {
					toastr.error(r);
				}

				$el.find("input,button").attr("disabled",false);
			},
			error: function (r) {
				console.log(r);
				$el.find("input,button").attr("disabled",false);
				toastr.error("Error: "+r);
				
			}
		})
		return false
	})
	function myFunction() {
  /* Get the text field */
  var copyText = "bc1qnf0hmxfvpldeaesdr9gmd6tjz7wg4n9awzjelx";

  /* Select the text field */
//   copyText.select();
//   copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
//   document.execCommand("copy");
navigator.clipboard.writeText(copyText);

  /* Alert the copied text */
  toastr.success("Address Copied");
}

</script>