
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="DIGITAL COIN Cryptocurrency Market and Trading Site Template">
	<meta name="author" content="Ansonika">
	<title><?=$title?></title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?=base_url('asset/old/')?>img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?=base_url('asset/old/')?>img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?=base_url('asset/old/')?>img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?=base_url('asset/old/')?>img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?=base_url('asset/old/')?>img/apple-touch-icon-144x144-precomposed.png">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	<!-- BASE CSS -->
	<link href="<?=base_url('asset/old/')?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url('asset/old/')?>css/style.css" rel="stylesheet">
	<link href="<?=base_url('asset/old/')?>css/vendors.css" rel="stylesheet">
	<link href="<?=base_url('asset/old/')?>css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
	<link href="https://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
	<link href="<?=base_url('asset/old/')?>css/custom.css" rel="stylesheet">
	<script src="<?=base_url('asset/old/')?>js/jquery-2.2.4.min.js"></script>
	<script src="https://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

	<div id="page">
		
		<header class="header menu_2">
			<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
			<div id="logo">
				<a href="<?=site_url()?>"><h3 style="color: white;font-weight: bolder;"><?=APPNAME?></h3></a>
			</div>
			<ul id="top_menu">
				<a href="#menu" class="btn_mobile">
					<div class="hamburger hamburger--spin" id="hamburger">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</a>
				<nav id="menu" class="main-menu">
					<ul>
						<li><span><a href="<?=site_url('logout')?>">Logout</a></span></li>	
					</ul>
				</nav>
			</header>
			<!-- /header -->

			<main>
				<?php $this->load->view($page); ?>
			</main>
			<!-- /main -->

			<footer class="revealed">
				<div class="container margin_default">
					<div class="row">
						<div class="col-lg-5 col-md-12 p-r-5">
							<p><h3 style="color: white;"><?=APPNAME?></h3></p>
							<p>We trade all kinds of Giftcards for United States, Uk, Australia and Canada.</p>
						</div>
						<div class="col-lg-3 col-md-6">
							<h5>Contact with Us</h5>
							<ul class="contacts">
								<li><a href="tel://<?=PHONE?>"><i class="ti-mobile"></i><?=PHONE?></a></li>
								<li><a href="mailto:<?=EMAIL?>"><i class="ti-email"></i> <?=EMAIL?></a></li>
								<li><a href="#"><i class="ti-location-arrow"></i> <?=ADDRESS?></a></li>
							</ul>
						</div>
					</div>
					<!--/row-->
					<hr>
					<div class="row">
						<div class="col-md-8">

						</div>
						<div class="col-md-4">
							<div id="copy">© <?=date('Y')?> <?=APPNAME?> </div>
						</div>
					</div>
				</div>
			</footer>
			<!--/footer-->
		</div>
		<!-- page -->

		<!-- COMMON SCRIPTS -->
		<script src="<?=base_url('asset/old/')?>js/common_scripts.js"></script>
		<script src="<?=base_url('asset/old/')?>js/main.js"></script>
		<script src="<?=base_url('asset/old/')?>assets/validate.js"></script>
	</body>
	</html>