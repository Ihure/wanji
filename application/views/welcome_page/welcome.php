<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Header section start -->
<header class="header-area">
    <a href="" class="logo-area">
        <img src="<?php echo base_url('assets/img/logo3.jpg')?>" alt="">
    </a>
    <div class="nav-switch">
        <i class="fa fa-bars"></i>
    </div>
    <!--<div class="phone-number">+254 786 332 619</div>-->
    <nav class="nav-menu">
        <ul>
            <?php foreach ($headers as $header):?>
                <li><a href="<?php echo base_url().'portfolio/view/'.$header['category'];?>"><?php echo $header['category']; ?></a></li>
            <?php endforeach; ?>
            <li><a href="<?php echo base_url().'contact';?>">Contact</a></li>
        </ul>
    </nav>
</header>
<!-- Header section end -->


<!-- Hero section start -->
<section class="hero-section">
    <!-- left social link ber -->
    <div class="left-bar">
        <div class="left-bar-content">
            <div class="social-links">
                <a href="https://instagram.com/krafted_by_wanji?utm_source=ig_profile_share&igshid=asuf3iqqe03j" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.facebook.com/kraftedbywanji" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/Wanji_Kwena?s=08" target="_blank"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <!-- hero slider area -->
    <div class="hero-slider" >
        <?php foreach ($headers as $header):?>
        <div class="hero-slide-item set-bg" data-setbg="<?php //echo base_url('assets/img/music_brocken.jpeg')?>">
            <div class="slide-inner">
                <div class="slide-content" >
                    <h2>Wanjiru Kwena</h2>
                    <a href="<?php echo site_url().'portfolio/view/'.$header['category'];?>" class="site-btn sb-light" style="margin-left: 10em;">View <?php echo $header['category']; ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--<div class="hero-slide-item set-bg" data-setbg="<?php echo base_url('assets/img/bg.jpg')?>">
            <div class="slide-inner">
                <div class="slide-content">
                    <h2>Minimalistic <br>Architecturedede <br> and more</h2>
                    <a href="" class="site-btn sb-light">See Project</a>
                </div>
            </div>
        </div>-->
    </div>
    <!--<div class="slide-num-holder" id="snh-1">
        <!--<span> 10 / </span> 10 --
    </div>-->
    <div class="hero-right-text">Wanji Krafts</div>
</section>
<!-- Hero section end -->