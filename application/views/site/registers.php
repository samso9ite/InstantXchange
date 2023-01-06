<div class="page-header">
    <div class="container">
        <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bg-white pinside30">
                <div class="row">
                   <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                    <h1 class="page-title">Register</h1>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class=" ">
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title text-center  ">
                                <a href="<?=site_url()?>" style=""><img class=" text-center" width="50%" src="<?=base_url('asset')?>/./images/logo1.png" alt="" ></a>
                                    <!-- section title start-->
                                    <h1>Register</h1>
                                    <p>Open an Account with <?=APPNAME?></p>
                                </div>
                            </div>

                            <form class="regForm" method="post" action="<?=site_url('ajax-register')?>">
                                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <!-- Text input-->
                                    <div class="resp"></div>
                                    <div class="row text-center" style="text-align: center !important;">
                                        <input type="text" class="form-control" placeholder="Full Name" name="full_name" required>
                                        <label for="">&nbsp;</label>
                                        <input type="number" type="phone" class="form-control" placeholder="Phone Number" name="phone">
                                        <label for="">&nbsp;</label>
                                        <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                        <label for="">&nbsp;</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                        <label for="">&nbsp;</label>
                                        <button class="btn btn-default btn-block" type="submit">Register</button>
                                        
                                        <h5 style="margin-top: 13px;">Already have a <?=APPNAME?> account? <a href="<?=site_url('login')?>">Login</a></h5>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.section title start-->
                    </div>
                </div>
            </div>
        </div>
    </div>