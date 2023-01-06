
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Instant Exchange, Gift Card Trading Site. Buy and Sell your Giftcard in minutes">
	<meta name="author" content="Ansonika">
	<title><?=$title?></title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?=base_url('asset/')?>img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?=base_url('asset/')?>img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?=base_url('asset/')?>img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?=base_url('asset/')?>img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?=base_url('asset/')?>img/apple-touch-icon-144x144-precomposed.png">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- BASE CSS -->
	<link href="<?=base_url('asset/')?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url('asset/')?>css/style.css" rel="stylesheet">
	<link href="<?=base_url('asset/')?>css/vendors.css" rel="stylesheet">
	<link href="<?=base_url('asset/')?>css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
	<link href="https://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="<?=base_url('asset/')?>css/custom.css" rel="stylesheet">

	<script src="<?=base_url('asset/')?>js/jquery-2.2.4.min.js"></script>
	<script src="https://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<style type="text/css">
	.top {
		position: absolute;
		padding: 10px 50px;
		top: 0px;
		left: 0px;
		width: 100%;
		color: #fff;
		text-align: right;
		font-size: 16px;
		background: #222945;
	}

	@media (max-width:991px) {
		#logo h3{
			display: none;
		}
		.top .item {
			display: block;
		}
		.top {
			text-align: center !important;
			padding: 10px 28px;
		}
	}

	.top .item {
		margin: 0 10px;
	}
</style>
<body>
	
	<div id="page">
		<header class="header menu_2" style="padding-top: 50px;">
			<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
			<div class="top">
				<span class="item">
					<i class="pe-7s-phone"></i> <?=PHONE?>
				</span>
				<span class="item">
					<i class="fa fa-whatsapp"></i> <?=WHATSAPP?>
				</span>
				<span class="item">
					<i class="fa fa-map-marker"></i> <?=ADDRESS?>
				</span>
			</div>
			<div id="logo">
				<a href="<?=site_url()?>"><h3 style="color: white;font-weight: bolder;"><?=APPNAME?></h3></a>
			</div>
			<?php if($this->session->userdata('admin') == ""): ?>
				<ul id="top_menu">
					<?php if($this->session->userdata('loggedin') == ""): ?>
						<li class="hidden_tablet"><a href="<?=site_url('login')?>" class="btn_1 rounded">Start trading</a></li>
						<?php else: ?>
							<li class="hidden_tablet"><a href="<?=site_url('new-trade')?>" class="btn_1 rounded">New Trade</a></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
				<a href="#menu" class="btn_mobile">
					<div class="hamburger hamburger--spin" id="hamburger">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</a>
				<nav id="menu" class="main-menu">
					<ul>
						<?php if($this->session->userdata('admin') == ""): ?>
							<li><span><a href="<?=site_url()?>">Home</a></span></li>
							<li><span><a href="#0">Trade Now</a></span>
								<ul>
									<li><a href="<?=site_url('trade/google')?>">Trade Google Cards</a></li>
									<li><a href="<?=site_url('trade/itunes')?>">Trade iTunes</a></li>
									<li><a href="<?=site_url('trade/steam')?>">Trade Steam</a></li>
									<li><a href="<?=site_url('trade/amazon')?>">Trade Amazon</a></li>
								</ul>
							</li>
							<li><span><a href="<?=site_url('testimony')?>">Testimony</a></span></li>
							<li><span><a href="<?=site_url('')?>#rates">Our Rates</a></span></li>
						<?php endif; ?>
						<?php if($this->session->userdata('loggedin') === true || $this->session->userdata('admin') != ""): ?>
						<li><span><a href="<?=site_url('logout')?>">Logout</a></span></li>	
						<?php else: ?>
							<li><span><a href="<?=site_url('login')?>">Login</a></span></li>
							<li><span><a href="<?=site_url('register')?>">Sign up</a></span></li>
						<?php endif; ?>
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
		<!-- COMMON SCRIPTS -->
		<script src="<?=base_url('asset/')?>js/common_scripts.js"></script>
		<script src="<?=base_url('asset/')?>js/main.js"></script>
		<script src="<?=base_url('asset/')?>assets/validate.js"></script>
		<script type="text/javascript">
			(function(w,d){
				w.HelpCrunch=function(){w.HelpCrunch.q.push(arguments)};w.HelpCrunch.q=[];
				function r(){var s=document.createElement('script');s.async=1;s.type='text/javascript';s.src='https://widget.helpcrunch.com/';(d.body||d.head).appendChild(s);}
				if(w.attachEvent){w.attachEvent('onload',r)}else{w.addEventListener('load',r,false)}
			})(window, document)
	</script>

	<script type="text/javascript">
		HelpCrunch('init', 'instantexchange', {
			applicationId: 1,
			applicationSecret: 'gjIb6qXHmDr3Ph/UiwEUacOJidjL29Q8w6HfV9s14roOC1crfxT0O7j/5i5n7G5cnIhXb3qAsH3kXL+K/JTkeA=='
		});

		HelpCrunch('showChatWidget');
	</script>
	</body>
	</html>