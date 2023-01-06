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
<section id="hero_in" class="general">
	<div class="wrapper">
		<div class="container">
			<h1 class="fadeInUp"><span></span>Testimonies</h1>
		</div>
	</div>
</section>
<div class="container margin_default">
	<div class="row">
		<div class="col-lg-4">
			<h4>Post a Testimony</h4>
			<p>What do you think of Instant Exchange</p>
			<div id="message-contact"></div>
			<form method="post" action="" autocomplete="off">
				<?=$this->session->flashdata('testimony')?>
				<div class="row">
					<div class="col-md-12">
						<span class="input">
							<input class="input_field" type="text" id="name" name="name">
							<label class="input_label">
								<span class="input__label-content">Your Name</span>
							</label>
						</span>
					</div>
				</div>
				<!-- /row -->
				<span class="input">
					<textarea class="input_field" id="message_contact" name="message_contact" style="height:80px;"></textarea>
					<label class="input_label">
						<span class="input__label-content">Your Testimony</span>
					</label>
				</span>
				<span class="input">
					<input class="input_field" type="text" id="verify_contact" name="verify_contact">
					<label class="input_label">
						<?php 
						$f = rand(0,9);
						$l = rand(0,9);
						?>
						<input type="hidden" name="first" value="<?=$f?>">
						<input type="hidden" name="last" value="<?=$l?>">
						<span class="input__label-content">Are you human? <?=$f?> + <?=$l?> = </span>
					</label>
				</span>
				<p class="add_top_30"><input type="submit" value="T E S T I F Y" class="btn_1 rounded" id="submit-contact"></p>
			</form>
		</div>
		<div class="col-lg-8 d-none d-sm-block">
			<div class="row">
				<div class="col-sm-12">
					<h5>Our Rates</h5>
				</div>
				<div class="col-sm-6" style="margin-bottom: 30px;">
					<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;background: #fff;">
						<h5 style="text-align: center;padding-top: 5px;">ITunes</h5>
						<a href="<?=site_url('trade/itunes')?>">
							<img src="<?=base_url('asset/img/itunes.png')?>" class="img-fluid mx-auto d-block" style="width: 100px;">
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
					<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;background: #fff;">
						<h5 style="text-align: center;padding-top: 5px;">Amazon</h5>
						<a href="<?=site_url('trade/amazon')?>"><img src="<?=base_url('asset/img/amazon.png')?>"  class="img-fluid mx-auto d-block" style="width: 100px;"></a>
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
										<td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-6" style="margin-bottom: 30px;">
					<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;background: #fff;">
						<h5 style="text-align: center;padding-top: 5px;">Google Play</h5>
						<a href="<?=site_url('trade/google')?>"><img src="<?=base_url('asset/img/google.png')?>"  class="img-fluid mx-auto d-block" style="width: 100px;"></a>
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
										<td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-6" style="margin-bottom: 30px;">
					<div style="border: 1px solid #e1e1e1;box-shadow: 0 0 18px #e1e1e1;background: #fff;">
						<h5 style="text-align: center;padding-top: 5px;">Steam</h5>
						<a href="<?=site_url('trade/steam')?>"><img src="<?=base_url('asset/img/steam.png')?>"  class="img-fluid mx-auto d-block" style="width:100px;"></a>
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
	<div class="row">
		<?php $c = 1; ?>
		<?php foreach($testimony as $row): ?>
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
			<?php if($c % 3 == 0): ?>
			</div>
			<div class="row">
			<?php endif; ?>
			<?php $c++ ?>
		<?php endforeach; ?>
	</div>
</div>