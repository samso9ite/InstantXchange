<?php 
if(!empty($trade)) {
	extract($trade);
}
?>
<style type="text/css">
	div.main_hold {
		position: fixed;
		left:0px;
		bottom: 0px;
		width: 100%;
		z-index: 999;
	}
	a.complete {
		position: relative;
		display: inline-block;
		width: 50%;
		color: #fff;
		padding: 20px 0px;
		text-align: center;
		text-transform: uppercase;
		font-weight: bolder;
		background: green;
	}

	a.cancel {
		position: relative;
		display: inline-block;
		width: 50%;
		color: #fff;
		padding: 20px 0px;
		text-align: center;
		text-transform: uppercase;
		font-weight: bolder;
		background: red;
	}

	.label {
		padding: 5px 7px;
		border-radius: 2px;
	}

	.label-warning {
		background: orange;
		color: white;
	}

	.label-danger {
		background: red;
		color: white;
	}

	.label-success {
		background: green;
		color: white;
	}
</style>
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
				<?php if($this->session->userdata('admin') != ""): ?>
					<div style="margin-bottom: 15px; text-align: right;">
						<a href="#proof" data-toggle="modal" class="btn btn-primary proof"><i class="fa fa-plus"></i> Upload Payment Proof</a>
					</div>
				<?php endif; ?>
				</div>
			<?php if(!$trade): ?>
				<div class="col-sm-12">
					<div class="alert alert-danger">
						Trade does not exist
					</div>
				</div>
				<?php else: ?>
					<div class="col-sm-12" style="padding: 15px;margin-bottom: 30px; border: 1px solid #e1e1e1; font-size:17px !important; color:black">
					<div class="col-sm-6">
						<!-- <div class="col-lg-12"> -->
						<br>
							Trade Type: Bitcoin Trading 
						</div>
						
						<div class="col-sm-6">
						<br>
							Transaction ID: <?=$trade->transaction_id?>
						</div>
						<?php if($trade->bank): ?>
						<div class="col-sm-6">
						<br>
							Bank: <?=$trade->bank?>
						</div>
						<div class="col-sm-6">
						<br>
							Account Number: <?=$trade->account_number?>
						</div>
						<div class="col-sm-6">
						<br>
							Account Name: <?=$trade->account_name?>
						</div>
						<?php else: ?>
							<div class="col-sm-6">
							<br>
								Account:<b> <?=$trade->bank_default?></b>
							</div>
						<?php endif; ?>
						<div class="col-sm-6">
						<br>
							Date initiated: <?=$trade->initiated_on?>
						</div>
						<div class="col-sm-6">
						<br>
							<h6>Status: 
								<?php if($trade->status == "PENDING"): ?>
									<label class="label label-warning">Pending</label>
									<?php elseif($trade->status == "Cancelled"): ?>
										<label class="label label-danger">Cancelled</label>
										<?php else: ?>
											<label class="label label-success">Completed</label>
										<?php endif; ?>
									</h6>
								</div>
								<div class="col-sm-12">
									<?php if($trade->status == "Cancelled"): ?>
										<h4><b>Reason why trade is cancelled:</b><?= $trade->comment ?> </h4>
									<?php endif; ?>
								</div>
					</div>
					
							<?php if($images): ?>
								<div class="col-sm-12" style="border-bottom: 0px solid #e1e1e1;">
									<h4>Transaction Proof</h4>
								</div>
								<div class="row" style="margin-bottom: 30px;">
									<?php foreach($images as $img): ?>
										<div class="" style="margin-bottom: 10px;">
											<a class="img" href="<?=base_url('uploads/'.$img->imagename)?>">
												<img src="<?=base_url('uploads/'.$img->imagename)?>" >
											</a>
										</div>
									<?php endforeach; ?>
								</div>
								
								<?php endif; ?>
							</div>


							<?php if($this->session->userdata('admin') == ""): ?>
								<div class="col-sm-12" style="border-bottom: 0px solid #e1e1e1;">
									<h4>Proof of Payment</h4>
								</div>
								<div class="row">
									<?php if(!empty($proof)): ?>
										<?php foreach($proof as $img): ?>
												<a class="img" href="<?=base_url('uploads/'.$img->image)?>">
													<img src="<?=base_url('uploads/'.$img->image)?>" class="img-fluid">
												</a>
											<!-- </div> -->
										<?php endforeach; ?>
										<?php else: ?>
											<div class="alert alert-danger col-sm-12">
												No Payment proof has been uploaded yet
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
							
								<div class="col-sm-12" style="border-bottom: 0px solid #e1e1e1;">
									<h4>Proof of Payment</h4>
								</div>
								<div class="row">
									<?php if(!empty($proof)): ?>
										<?php foreach($proof as $img): ?>
											<div class="col-sm-3">
												<a class="img" href="<?=base_url('uploads/'.$img->image)?>">
													<img src="<?=base_url('uploads/'.$img->image)?>" class="img-fluid">
												</a>
											</div>
										<?php endforeach; ?>
										<?php else: ?>
											<div class="alert alert-danger col-sm-12">
												No Payment proof has been uploaded yet
											</div>
										<?php endif; ?>
									</div>
							</div>
						</div>
						<!-- /row -->
						<?php if($this->session->userdata('admin') == "" && $trade !== false): ?>
							<div class="main_hold">
								<?php if($trade->status == "PENDING"): ?>
									<span style="display:block;width: 100%;padding: 20px 0;color: white;background: orange;font-weight: bold;text-align: center;">TRADE IS PENDING</span>
								<?php elseif($trade->status == "Cancelled"): ?>
									<span style="display:block;width: 100%;padding: 20px 0;color: white;background: red;font-weight: bold;text-align: center;">TRADE IS CANCELLED</span>
								<?php else: ?>
									<span style="display:block;width: 100%;padding: 20px 0;color: white;background: green;font-weight: bold;text-align: center;">TRADE IS COMPLETED</span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if($this->session->userdata('admin') != "" && $trade->status == "PENDING"): ?>
							<div class="main_hold">
								<a href="<?=site_url('admin/close/'.$trade->ref_code)?>" class="complete" 
									onclick="return confirm('Are you sure you want to complete this trade?')"><i class="fa fa-check"></i>Complete Trade</a><a href="#comment" data-toggle="modal" class="cancel">
										<i class="fa fa-remove"></i> Cancel Trade</a>
									</div>
								<?php endif; ?>
								<div class="modal fade" id="proof">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Upload Proof of Payment</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">

												<div class="uploader"></div>

											</div>

											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>

										</div>
									</div>
								</div>

								<div class="modal fade" id="comment">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h3 class="modal-title">Input your comment for this trade</h3>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">

											<form method="post" action="<?=site_url('admin/cancel')?>" enctype="multipart/form-data" >
												<div class="row">
													<div class="col-lg-12">
													<input type="hidden" name="ref" value="<?=$trade->ref_code?>">
														<div class="form-group">
															<textarea  name="comment" class="form-control" style="border-color:#15549a" > </textarea>
														</div>
													</div>
												</div>
												</div>

												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="submit" class="btn btn-danger" >Cancel Trade</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--/container-->
							<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
							<script type="text/javascript">
								$("a.img").fancybox({
									arrows:true
								})

								$(document).on("click", "a.proof", function () {
									setTimeout(function () {
										$(document).find(".modal-backdrop").fadeOut();
									},500)
								})

								$(".uploader").uploadFile({
									url:"<?=site_url('admin/upload-payimage?ref='.$trade->ref_code)?>",
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
							});



							</script>
