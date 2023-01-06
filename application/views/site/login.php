
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

    <!-- BASE CSS -->
    <link href="<?=base_url('asset/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('asset/')?>css/style.css" rel="stylesheet">
	<link href="<?=base_url('asset/')?>css/vendors.css" rel="stylesheet">
	<link href="<?=base_url('asset/')?>css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?=base_url('asset/')?>css/custom.css" rel="stylesheet">

</head>

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="<?=site_url()?>"><h4 style="color: white;"><?=APPNAME?></h4></a>
			</figure>
			<a href="<?=site_url()?>"><img class="d-block w-100" width="80%" src="<?=base_url('asset')?>/./images/logo1.png" alt="" ></a>
			  <form class="loginForm" method="post" action="<?=site_url('login')?>">
				<div class="access_social">Login</div>
				<div class="form-group">
					<?=$this->session->flashdata('message')?>
					<span class="input">
					<input class="input_field" type="email" name="email" required>
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" autocomplete="new-password" name="password" required>
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
				</div>
				<button type="submit" class="btn_1 rounded full-width login_btn">Login</button>
				<div class="text-center add_top_10">New to <?=APPNAME?>? <strong><a href="<?=site_url('register')?>">Sign up!</a></strong></div>
			</form>
			<div class="copy">© <?=date('Y')?> <?=APPNAME?></div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="<?=base_url('asset/')?>js/jquery-2.2.4.min.js"></script>
    <script src="<?=base_url('asset/')?>js/common_scripts.js"></script>
    <script src="<?=base_url('asset/')?>js/main.js"></script>
	<script src="<?=base_url('asset/')?>assets/validate.js"></script>
</body>
</html>