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
<div class="slider" id="slider">
    <!-- slider -->

    <div class="slider-img"><img src="<?=base_url('asset')?>/./images/slider-1.jpg" alt="Borrow - Loan Company Website Template" class="">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="slider-captions">
                        <!-- slider-captions -->
                        <h1 class="slider-title">Convert Gift Cards to Cash Fast</h1>
                        <p class="slider-text d-none d-xl-block d-lg-block d-sm-block">Competitive Rates, Swift payment, Reliable Services.<br /></p> 
                        <a href="<?=site_url('login')?>" class="btn btn-default">Signup</a>
                    </div>
                    <!-- /.slider-captions -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rate-table" style="margin-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-6">
                <div class="rate-counter-block">
                    <div class="rate-box">
                        <h1 class="loan-rate">SWIFT</h1>
                        <small class="rate-title">Payments</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-6">
                <div class="rate-counter-block">
                    <div class="rate-box">
                        <h1 class="loan-rate">AVAILABLE</h1>
                        <small class="rate-title">24/7</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-6">
                <div class="rate-counter-block">
                    <div class="rate-box">
                        <h1 class="loan-rate">RELIABLE</h1>
                        <small class="rate-title">Service</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="rate-counter-block">
                    <div class="rate-box">
                        <h1 class="loan-rate">COMPETTIVE</h1>
                        <small class="rate-title">rates</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-white section-space80">
    <div class="container">
        <div class="row">
           <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
            <div class="mb100 text-center section-title">
                <!-- section title start-->
                <h1>Fast &amp; Easy Trading Process.</h1>
                <p>Our process is fast and simple. Intuitive User Interface offering great user experience</p>
            </div>
            <!-- /.section title start-->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                <div class="circle"><span class="number">1</span></div>
                <h3 class="number-title">Sign/Login</h3>
                <p>Create an account or login to your existing account to get started with <?=APPNAME?></p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                <div class="circle"><span class="number">2</span></div>
                <h3 class="number-title">Choose Card Type</h3>
                <p>You just select a card type to trade and denominations. Supply your bank Details</p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="bg-white pinside40 number-block outline mb60 bg-boxshadow">
                <div class="circle"><span class="number">3</span></div>
                <h3 class="number-title">Get Your Cash</h3>
                <p>Relax and wait for your payment to drop in the bank account you provided. </p>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12 text-center"> <a href="<?=site_url('register')?>" class="btn btn-default">Get Started</a> </div>
   </div>
</div>
</div>
<div class="section-space80">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
                <div class="mb60 text-center section-title">
                    <!-- section title start-->
                    <h1>Our Competitive Rates</h1>
                    <p>We offer one of the best rates in the trading market. You can check them out</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row" id="rates">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="bg-white bg-boxshadow">
                    <div class="row">
                        <?php foreach($cards as $item): ?>
                            <?php $cardname = strtolower($item->cardname); ?>
                            <?php if(count($$cardname) < 1) continue; ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 nopadding">
                                <div class="bg-white pinside60 number-block outline">
                                    <div class="mb20"><img src="<?=base_url('asset/images/'.$item->img)?>" alt=""></div>
                                    <h3><?=$item->cardname?></h3>
                                    <div class="rates" style="background: #fff;">
                                        <table>
                                            <thead style="background: #333 !important;">
                                                <tr align="center">
                                                    <th style="padding: 4px !important;">Dollar Value</th>
                                                    <th style="padding: 4px !important;">Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cardname = strtolower($item->cardname) ?>
                                                <?php foreach($$cardname as $row): ?>
                                                    <tr>
                                                        <td><h6><?=$row->usd?> Dollars</h6></td>
                                                        <td><h6>&#8358;<?=number_format($row->naira)?></h6></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div>&nbsp;</div>
                                        <a href="<?=site_url('trade/'.$cardname)?>" class="btn btn-default btn-sm">Trade <?=$item->cardname?></a> 
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-default section-space80">
    <div class="container">
        <div class="row">
           <div class="offset-xl-2 col-xl-8 offset-md-2 col-md-8 offset-md-2 col-md-8 col-sm-12 col-12">
            <div class="mb60 text-center section-title">
                <!-- section title start-->
                <h1 class="title-white">Testimonials</h1>
                <p>We have been given a chance to prove ourselves to the following customers, this is what they have to say</p>
            </div>
            <!-- /.section title start-->
        </div>
    </div>
    <div class="row">
        <div class="testimony-owl">
            <?php foreach($testimony as $item): ?>
                <div style="margin-bottom: 20px;">
                    <div class="testimonial-block mb30" style="margin: 10px;">
                        <div class="bg-white pinside30 mb20">
                            <p class="testimonial-text"><?=$item->testimony?></p>
                        </div>
                        <div class="testimonial-autor-box" style="display: flex; align-items: center;">
                            <div class="testimonial-img pull-left"> <img src="<?=base_url('asset')?>/images/icon.png" style="width: 50px;border-radius: 100%;"> </div>
                            <div class="testimonial-autor pull-left">
                                <h4 class="testimonial-name"><?=$item->name?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
