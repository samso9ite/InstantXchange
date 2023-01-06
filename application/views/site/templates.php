<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Buy Itunes, Amazon, Ebay and Google giftcards on Exchange Now.">
    <link rel="manifest" href="<?=site_url('manifest.json')?>">

    <title><?=$title?></title>
    <!-- Bootstrap -->
    <link href="<?=base_url('asset/')?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('asset/')?>/css/style.css" rel="stylesheet">
    <link href="<?=base_url('asset/')?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url('asset/')?>/css/fontello.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" /> 
    <link href="https://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
    <!-- owl Carousel Css -->
    <link href="<?=base_url('asset/')?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url('asset/')?>/css/owl.theme.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?=base_url('asset')?>/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="<?=base_url('asset')?>/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?=base_url('asset')?>/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="<?=base_url('asset')?>/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=base_url('asset')?>/js/menumaker.js"></script>

  <!-- sticky header -->
  <script type="text/javascript" src="<?=base_url('asset')?>/js/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?=base_url('asset')?>/js/sticky-header.js"></script>
  <!-- slider script -->
  <script type="text/javascript" src="<?=base_url('asset')?>/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?=base_url('asset')?>/js/slider-carousel.js"></script>
  <script type="text/javascript" src="<?=base_url('asset')?>/js/service-carousel.js"></script>
</head>

<body>
    <div id="whole-page">
        <div class="top-bar">
            <!-- top-bar -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6 col-6 d-none d-xl-block d-lg-block">
                        <p class="mail-text">Welcome to <?=APPNAME?></p>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12 text-right">
                        <div class="top-nav">  <span class="top-text"><a href="#"><?=PHONE?></a></span> <span class="top-text"><a href="mailto:<?=EMAIL?>"><?=EMAIL?></a></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.top-bar -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-6 col-6">
                        <!-- logo -->
                        <div class="logo" style="margin-top:15px !important">
                            <a href="<?=site_url()?>"><img class="d-block w-100" width="80%" src="<?=base_url('asset')?>/./images/logo1.png" alt="" ></a>
                        </div>
                    </div>
                    <!-- logo -->
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                      <div id="navigation">
                        <!-- navigation start-->
                        <ul>
                            <?php if($this->session->userdata('admin') == ""): ?>
                                <li><a href="<?=site_url()?>">Home</a></li>
                                <li><a href="#0">Trade Now</a>
                                <?php if($this->session->userdata('updated') == 0): ?>
                                    <ul> 
                                        <li><a href="<?=site_url('trade/google')?>">Trade Google Cards</a></li>
                                        <li><a href="<?=site_url('trade/itunes')?>">Trade iTunes</a></li>
                                        <li><a href="<?=site_url('trade/steam')?>">Trade Steam</a></li>
                                        <li><a href="<?=site_url('trade/amazon')?>">Trade Amazon</a></li>
                                        <li><a href="<?=site_url('trade/sephora')?>">Trade Sephora</a></li>
                                        <li><a href="<?=site_url('trade/nike')?>">Trade Nike</a></li>
                                        <li><a href="<?=site_url('trade/ebay')?>">Trade Ebay</a></li>
                                        <li><a href="<?=site_url('trade/apple')?>">Trade Apple</a></li>
                                        <li><a href="<?=site_url('new-trade-bitcoin')?>">Trade Bitcoin</a></li>
                                    </ul>
                                    <?php else: ?>
                                        <ul> 
                                            
                                        <li><a href="home/welcome">Trade Google Cards</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade iTunes</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Steam</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Amazon</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Sephora</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Nike</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Ebay</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Apple</a></li>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Bitcoin</a></li>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <li>
                                <?php if($this->session->userdata('updated') == 0): ?>
                                    <a href="<?=site_url('new-trade-bitcoin')?>">Trade Bitcoin</a></li>
                                    <?php else: ?>
                                        <li><a href="<?=site_url('home/welcome')?>">Trade Bitcoin</a></li>
                                    
                                <?php endif; ?>
                                <li><a href="<?=site_url('testimony')?>">Testimony</a></li>
                                <li><a href="<?=site_url('')?>#rates">Our Rates</a></li>
                            <?php endif; ?>
                            <?php if($this->session->userdata('loggedin') === true || $this->session->userdata('admin') != ""): ?>
                                <li><a href="<?=site_url('/home/profile')?>">Profile</a></li>
                                <li><a href="<?=site_url('logout')?>">Logout</a></li>  
                            <?php else: ?>
                                <li><a href="<?=site_url('login')?>">Login</a></li>
                                <li><a href="<?=site_url('register')?>">Sign up</a></li>
                            <?php endif; ?>
                            <li><a href="https://api.whatsapp.com/send?phone=234<?=WHATSAPP?>&text=I%20want%20to%20trade" target="_blank"><i class="fa fa-whatsapp"></i> <?=WHATSAPP?></a></li>
                        </ul>
                    </div>
                    <!-- /.navigation start-->
                </div>
                <!-- /.search start-->
            </div>
        </div>
    </div>
    
    <?php $this->load->view($page) ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!--Start Sticky Icon--> 
<!-- <div class="sticky-icon">
   <a href="tel:234-706-3642-909" class="Youtube"><i class="fa fa-phone"></i> Call us </a>
   <a href="https://api.whatsapp.com/send?phone=234<?=WHATSAPP?>&text=I%20want%20to%20trade" target="_blank" class="Twitter"><i class="fab fa-whatsapp"> </i> Chat us </a> 
   <a href="<?=site_url('home/contact')?>" class="Youtube"><i class="fa fa-map"></i> Office </a>  
</div> -->
<div style="position: fixed; bottom:10px; left:20px; z-index: 99"> 
    <a href="tel:2347063642909" class="btn btn-primary" title="Call Us Now">Call Us <i class="fa fa-phone"></i></a>
    <a href="https://api.whatsapp.com/send?phone=234<?=WHATSAPP?>&text=I%20want%20to%20trade" target="_blank" target="_blank" class="btn btn-success" title="Chat Us On WhatsApp">
      <marquee behavior="alternate" style="width: 120px" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">WhatsApp <i class="fa fa-whatsapp"></i></marquee>
    </a>
</div>
<!--End Sticky Icon-->
    <!-- /.footer -->
    <div class="footer section-space100">
        <!-- footer -->
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <h3 class="newsletter-title">About <?=APPNAME?></h3>
                    <div class="widget-text">
                        <p>We trade all kinds of Giftcards for United States, Uk, Australia and Canada. We are commited to providing you swift payments. Our services are reliable and we are trustworthy.</p>
                    </div>
                    <!-- /.widget text -->
                </div>
                <div class="col-xs-3 col-lg-3 col-md-6 col-sm-12">
                    <h3 class="newsletter-title">&nbsp;</h3>
                    <ul>
                        <li><a href="<?=site_url('privacy-policy')?>">Privacy Policy</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=234<?=WHATSAPP?>&text=I%20want%20to%20trade" target="_blank">Contact Us</a></li>
                        <li><a href="<?=site_url('blog')?>">Blog</a></li>
                        <li><a href="#">Coin</a></li>
                        <li><a href="https://www.instagram.com/trading4uservice/" target="_blank">Payment Proofs</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <h3 class="newsletter-title">&nbsp;</h3>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="address-text"><span><i class="fa fa-map-marker fa-1x"></i> </span> <?=ADDRESS?></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="address-text"><span><i class="fa fa-envelope fa-1x"></i> </span> <?=EMAIL?></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="address-text"><span><i class="fa fa-mobile fa-1x"></i> </span> <?=PHONE?></p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="address-text"><span><i class="fa fa-whatsapp fa-1x"></i> </span> <?=WHATSAPP?></p>
                    </div>
                </div>
                <div class="col-xs-2 col-lg-2 col-md-6 col-sm-12">
                    <h3 class="newsletter-title">Coming Soon</h3>
                    <a href="" target="_BLANK" rel="noopener"><img src="https://farmcityltd.com/wp-content/uploads/2021/03/app_store_button.png" width="60%"></a><br><br>
                    <a href="https://play.google.com/store/apps/details?id=com.instantexchange.ng"><img src="https://farmcityltd.com/wp-content/uploads/2021/03/Googleplay_button.png" width="50%"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr class="dark-line">
                </div>
            </div>
        </div>
    </div>
    <div class="tiny-footer">
        <!-- tiny footer -->
        <div class="container">
            <div class="row text-center ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <p>© Copyright <?=date('Y')?> | <?=APPNAME?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- back to top icon -->
    <a href="#0" class="cd-top" title="Go to top">Top</a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</div>
<!-- Back to top script -->
<!--Start of Tawk.to Script-->
<style>
    .social {
  border-radius: 3px;
  box-shadow: 0 1px 0 #e9e9e9 inset;
  background: #f3f3f3;
  border-color: #d1d1d1 #e7e7e7 #e4e4e4;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-shadow: 0 1px 0 #e9e9e9 inset;
  /* float: left; */
  list-style: none;
  padding: 15px 10px;
  /* position: relative; */
  text-align: center;
  margin: 20px;
}

.social li:first-child {
  margin-top: 0
}

.social li {
  margin-top: 10px
}

.social li a {
  display: block;
  background: #999999;
  color: #efefef;
  border-radius: 15px;
  text-decoration: none;
  line-height: 30px;
  width: 30px;
  font-size: 18px;
}

.social a.tw:hover {
  background: #155499
}

.social a.fb:hover {
  background: #3b5998
}

.social a.gp:hover {
  background: #dd4b39
}

.sticky-icon  {
	z-index:1;
	position:fixed;
	top:15%;
	right:0%;
	width:220px;
	display:flex;
	flex-direction:column;}  
.sticky-icon a  {
	transform:translate(160px,0px);
	border-radius:50px 0px 0px 50px;
	text-align:left;
	margin:2px;
	text-decoration:none;
	text-transform:uppercase;
	padding:10px;
	font-size:22px;
	font-family:'Oswald', sans-serif;
	transition:all 0.8s;}
.sticky-icon a:hover  {
	color:#FFF;
	transform:translate(0px,0px);}	
.sticky-icon a:hover i  {
	transform:rotate(360deg);}

.Youtube  {
	background-color:#155499;
	color:#FFF;}
	
.Twitter  {
	background-color:green;
	color:#FFF;}
.sticky-icon a i {
	background-color:#FFF;
	height:40px;
	width:40px;
	color:#000;
	text-align:center;
	line-height:40px;
	border-radius:50%;
	margin-right:20px;
	transition:all 0.5s;}

.sticky-icon a i.fa-youtube  {
	background-color:#FFF;
	color:#fa0910;}
	
.sticky-icon a i.fa-twitter  {
	background-color:#FFF;
	color:#53c5ff;}
#myBtn {
	/* height:50px;
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  text-align:center;
  padding:10px;
  text-align:center;
	line-height:40px;
  border: none; */
  /* outline: none;
  background-color: #1e88e5;
  color: white;
  cursor: pointer;
  border-radius: 50%; */
}
.fa-arrow-circle-up  {
	font-size:30px;}

#myBtn:hover {
  background-color: #555;
}			
</style>
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e1b93ac7e39ea1242a44385/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script src="<?=base_url('asset')?>/js/back-to-top.js" type="text/javascript"></script>
<script type="text/javascript">
    if ('serviceWorker' in navigator) { 
        navigator.serviceWorker.register('sw.js')
      .then(reg => {
        console.log('Registration succeeded. Scope is ' + reg.scope);
    })
      .catch(registrationError => {
        console.log('SW registration failed: ', registrationError);
    });
  }

  $(document).on("click",".reg_btn", function () {
    $(".regForm").submit();
    return false;
})

  $(".testimony-owl").owlCarousel({
    items: 3,
    margin: 5,
    autoplay: true,
    autoplayTimeout: 5000
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
