
<div id="form_container">
	<div class="wrapper">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="intro_title_header">
						<h3>Trade with us today @ <?=APPNAME?></h3>
						<p>Trade with Confidence and Ease!</p>
						<ul>
							<li>We pride ourselve in <strong>excellence</strong> in giftcard trading</li>
							<li><strong>Reliability</strong> is our watchword</li>
							<li>Fast <strong>Payments</strong> </li>
						</ul>
					</div>
				</div>
				<div class="col-lg-5">
					<div id="form_contact">
						<div id="ribbon"><strong>100%</strong> Safe</div>
						<h3>Quick Sign up</h3>
						<p>&nbsp;</p>
						<div id="message-home"></div>
						<form method="post" action="<?=site_url('ajax-register')?>" id="contact_home" autocomplete="off">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" name="phone" placeholder="Your Phone Number" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" class="form-control" name="email" placeholder="Your email" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="password" class="form-control" name="password" placeholder="Password" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Sign Up" class="btn_1 full-width" id="submit-contact-home">
									</div>

								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label style="display:block;text-align: center;"> - OR - </label>
										<a href="<?=site_url('login')?>" class="btn_1 full-width" style="background: green;">Login</a>
									</div>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- End row -->
		</div><!-- End container -->
	</div>
</div><!-- End form container -->

<div class="features clearfix">
	<div class="container">
		<ul>
			<li><i class="pe-7s-wallet"></i>
				<h4>Reliable Payments</h4><span>We do not disappoint on our payments</span>
			</li>
			<li><i class="pe-7s-credit"></i>
				<h4>Fast Payments</h4><span>We pay very fast</span>
			</li>
			<li><i class="pe-7s-graph3"></i>
				<h4>100% Availability</h4><span>We are always online</span>
			</li>
		</ul>
	</div>
</div>
<!-- /features -->
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
<div class="bg_color_1" id="rates">
	<div class="container margin_default">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>Why choose Instant Exchange</h2>
			<p>Our rates are very competitive</p>
		</div>

		<div class="row">
			<div class="col-sm-6" style="margin-bottom: 30px;">
				<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;">
					<a href="<?=site_url('trade/itunes')?>">
						<img src="<?=base_url('asset/img/itunes.png')?>" class="img-fluid mx-auto d-block">
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
							<?php foreach($itunes as $row): ?>
								<tr>
									<td><h6><?=$row->usd?> Dollars</h6></td>
									<td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-6" style="margin-bottom: 30px;">
				<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;">
					<a href="<?=site_url('trade/amazon')?>"><img src="<?=base_url('asset/img/amazon.png')?>"  class="img-fluid mx-auto d-block"></a>
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
							<?php foreach($amazon as $row): ?>
								<tr>
									<td><h6><?=$row->usd?> Dollars</h6></td>
									<td><h6>&#8358;<?=@number_format($row->naira)?></h6></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-6" style="margin-bottom: 30px;">
				<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;">
					<a href="<?=site_url('trade/google')?>"><img src="<?=base_url('asset/img/google.png')?>"  class="img-fluid mx-auto d-block"></a>
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
							<?php foreach($google as $row): ?>
								<tr>
									<td><h6><?=$row->usd?> Dollars</h6></td>
									<td><h6>&#8358;<?=@number_format($row->naira)?></h6></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-6" style="margin-bottom: 30px;">
				<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;">
					<a href="<?=site_url('trade/steam')?>"><img src="<?=base_url('asset/img/steam.png')?>"  class="img-fluid mx-auto d-block"></a>
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
							<?php foreach($steam as $row): ?>
								<tr>
									<td><h6><?=$row->usd?> Dollars</h6></td>
									<td><h6>&#8358;<?=@number_format($row->naira)?></h6></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<div class="container margin_default">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>How it works</h2>
		<p>Sell Giftcards in 3 easy steps.</p>
	</div>
	<div class="row how_home">
		<div class="col-lg-4">
			<figure>
				<img src="<?=base_url('asset/')?>img/mobile.png" alt="" class="img-fluid">
			</figure>
		</div>
		<div class="col-lg-8">
			<ul>
				<li><strong>1</strong><h4>Sign up or Login</h4><p>Sign up for an account</p></li>
				<li><strong>2</strong><h4>Upload Giftcard</h4><p>Upload your giftcard with your account details.</p></li>
				<li><strong>3</strong><h4>Get Payment</h4><p>Wait for your payment</p></li>
			</ul>
			<p><a href="<?=site_url('register')?>" class="btn_1 rounded">Sign up Now</a><br></p>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<div class="container margin_default">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Testimonials</h2>
		<p>What people are saying about Instant Exchange</p>
	</div>
	<div class="row">
		<?php $c = 1; ?>
		<?php foreach($testimony as $row): ?>
			<div class="testimony-owl">
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="#0">
						<i class="pe-7s-user"></i>
						<h3><?=$row->name?></h3>
						<p>
							<?=$row->testimony?>
						</p>
						<small style="color: #d1d1d1;"><?=date('d F, Y',strtotime($row->timeposted))?></small>
					</a>
				</div>
			</div>
			<?php if($c % 3 == 0): ?>
			</div>
			<div class="row">
			<?php endif; ?>
			<?php $c++ ?>
		<?php endforeach; ?>
		<div class="col-sm-12 text-center">
			<a href="<?=site_url('testimony')?>" class="btn_1 rounded">More Testimonies</a><br>
		</div>
	</div>
	<!--/row-->
</div>
</div>

<!-- /container -->
