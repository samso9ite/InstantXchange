
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
	<link href="css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">
	
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
			<form autocomplete="off" action="<?=site_url('ajax-register')?>" class="regForm">
				<div class="access_social">Register</div>
				<div class="form-group">
					<div class="resp"></div>
					<span class="input">
						<input class="input_field" type="text" name="phone" required>
						<label class="input_label">
							<span class="input__label-content">Your Phone</span>
						</label>
					</span>
					<span class="input">
						<input class="input_field" name="email" type="email" required>
						<label class="input_label">
							<span class="input__label-content">Your Email</span>
						</label>
					</span>

					<span class="input">
						<input class="input_field" type="password" name="password" id="password1" required>
						<label class="input_label">
							<span class="input__label-content">Your password</span>
						</label>
					</span>
					<div id="pass-info" class="clearfix"></div>
				</div>
				<a href="#0" class="btn_1 rounded full-width add_top_30 reg_btn">Register</a>
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="<?=site_url('login')?>">Sign In</a></strong></div>
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
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>
	<script type="text/javascript">
		$(document).on("click",".reg_btn", function () {
			$(".regForm").submit();
			return false;
		})

		$(document).on("submit",".regForm", function () {
			$el = $(this);
			$url = $el.attr("action");
			$data = $el.serializeArray();
			$.ajax({
				type: 'POST',
				url: $url,
				data: $data,
				beforeSend: function () {
					$el.find("input").attr("disabled",true);
				},
				success: function (r) {
					$el.find("input").attr("disabled",false);
					if(r == 1) {
						window.location = "<?=site_url('home')?>"
					}
					else {
						$("div.resp").html("<div class='alert alert-danger'>"+r+"</div>")
					}
				},
				error: function (r) {
					$el.find("input").attr("disabled",false);
					$("div.resp").html("<div class='alert alert-danger'>"+r.statusText+"</div>")
				}
			})

			return false;
		})
		</script>
	</body>
	</html>