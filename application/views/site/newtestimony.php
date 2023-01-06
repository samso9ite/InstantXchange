<div class="page-header">
    <div class="container">
        <div class="row">
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li class="active">Testimonial</li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="bg-white pinside30">
                <div class="row">
                 <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 col-12">
                    <h1 class="page-title">Testimonial</h1>
                </div>
            </div>
        </div>
        <div class="sub-nav" id="sub-nav">
          <ul class="nav nav-justified">
            <li class="nav-item">
                <a href="<?=site_url('new-trade')?>" class="nav-link">Trade Now</a>
            </li>
            <li class="nav-item">
                <a href="<?=site_url()?>#rates" class="nav-link">Our Rates</a>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<div class=" ">
    <!-- content start -->
    <div class="container">
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="wrapper-content bg-white pinside60">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Post a Testimony</h4>
                            <p>What do you think of Instant Exchange</p>
                            <div id="message-contact"></div>
                            <form method="post" action="" autocomplete="off">
                                <?=$this->session->flashdata('testimony')?>
                                
                                <div class="form-group">
                                    <label class="sr-only control-label" for="name">Your Name<span class=" "> </span></label>
                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control input-sm" required>
                                </div>

                                <!-- /row -->
                                <div class="form-group">
                                    <label class="sr-only control-label" for="name">Your Testimony<span class=" "> </span></label>
                                    <textarea name="message_contact" class="form-control" placeholder="Your Testimony" rows="10"></textarea>
                                </div>

                                
                                <div class="form-group">
                                    <label class="input_label">
                                        <?php 
                                        $f = rand(0,9);
                                        $l = rand(0,9);
                                        ?>
                                        <input type="hidden" name="first" value="<?=$f?>">
                                        <input type="hidden" name="last" value="<?=$l?>">
                                        <span class="input__label-content">Are you human? <?=$f?> + <?=$l?> = </span>
                                    </label>
                                       <input class="form-control" type="text" id="verify_contact" name="verify_contact">
                                </div>
                                <p class="add_top_30"><button type="submit" class="btn btn-default">Submit</button></p>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                            <h2 class="text-center">Testimonies</h2>
                        </div>
                        <?php $counter = 1; ?>
                        <?php foreach($testimony as $item): ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="testimonial-block mb30">
                                <div class="bg-white outline pinside30 mb20">
                                    <p class="testimonial-text">“<?=$item->testimony?>”</p>
                                </div>
                                <div class="testimonial-autor-box mb30">
                                    <div class="testimonial-img"> <img src="<?=base_url('asset/images/icon.png')?>" style="width:50px;"> </div>
                                    <div class="testimonial-autor">
                                        <h4 class="testimonial-title"><?=$item->name?></h4>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($counter % 2 == 0): ?>
                </div>
                <div class="row" style="margin-top: 20px;">
                            <?php endif; ?>
                            <?php $counter++ ?>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>