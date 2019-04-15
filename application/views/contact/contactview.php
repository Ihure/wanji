<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/9/2018
 * Time: 10:08 AM
 */
?>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section start -->
<header class="header-area">
    <a href="<?php echo site_url().'welcome';?>" class="logo-area">
        <img src="<?php echo base_url('assets/img/logo3.jpg')?>" alt="">
    </a>
    <div class="nav-switch">
        <i class="fa fa-bars"></i>
    </div>
</header>
<!-- Header section end -->

<section class="page-header-section set-bg" >
    <div class="container section-title pt-2">
        <h1 class="">Get in touch<span>.</span></h1>
    </div>
</section>
<section class="hero-section">
    <div class="left-bar">
        <div class="left-bar-content">
            <div class="social-links">
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <section class="page-section pt100">
        <div class="container pb100">
            <!--<div class="section-title pt-5">
                <h1>Get in touch</h1>
            </div>-->
            <div class="row">
                <div class="col-lg-3 contact-info mb-5 mb-lg-0">
                    <p>Phone: +254 786 332 619</p>
                    <p>Email: info@wanjiru-kwena.com</p>
                    <div class="cf-social">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!--<form class="contact-form">-->
                    <?php //echo validation_errors(); ?>
                        <?php $attributes = array('class' => 'contact-form');
                        echo form_open('contact/sendmessage', $attributes); ?>
                        <input type="text" placeholder="Enter your name" name="name">
                        <input type="text" placeholder="Enter your email address" name="email">
                        <textarea placeholder="Message ..." name="message"></textarea>
                        <button type="submit" class="site-btn sb-dark">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</section>