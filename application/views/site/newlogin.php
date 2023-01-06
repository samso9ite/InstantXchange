<div class="page-header">
    <div class="container">
        <div class="row">
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?=site_url('')?>">Home</a></li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bg-white pinside30">
                <div class="row">
                 <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                    <h1 class="page-title">Login</h1>
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
        <div class="row" >
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class=" text-center">
                        
                            <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="mb60  section-title">
                                    <div class="row"></div>
                                <a href="<?=site_url()?>" style=""><img class=" text-center" width="50%" src="<?=base_url('asset')?>/./images/logo1.png" alt="" ></a>
                                    <!-- section title start-->
                                    <h1>Login</h1>
                                    <p>Login to your account</p>
                                </div>
                            </div>

                            <form class="contact-us" method="post" action="<?=site_url('login')?>">
                                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <!-- Text input-->
                                    <?=$this->session->flashdata('message')?>
                                    <div class="row text-center" style="text-align: center !important;">
                                        <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                        <label for="">&nbsp;</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                        <label for="">&nbsp;</label>
                                        <button class="btn btn-default btn-block" type="submit">Login</button>
                                        
                                        <h5 style="margin-top: 13px;">New to <?=APPNAME?>? <a href="<?=site_url('register')?>">Sign up</a></h5>
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

    <style>
        }

.d-block {
    display: inherit !important;
}
</style>