<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/6/2018
 * Time: 11:37 AM
 */
?>
<body class="single-portfolio">

<!-- Preloader Gif -->
<table class="doc-loader">
    <tr>
        <td>
            <img src="<?php echo base_url("assets/portfiles/images/ajax-document-loader.gif")?>" alt="Loading..." />
        </td>
    </tr>
</table>


<article id="portfolio-1" class="section portfolio">
    <div class="center-relative content-1170">
        <div class="entry-content">
            <div class="content-wrap relative">
                <a class="absolute x-close" href="<?php echo site_url().'portfolio/view/'.$post['category']?>">
                    <img src="<?php echo base_url("assets/portfiles/images/icon_x.svg")?>" alt="Close">
                </a>

                <div class="one margin-0">
                    <?php if (empty($post['video_url'])){ ?>
                    <!--<img src="<?php //echo base_url('uploads/').$post['file_name']?>" alt="">-->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo base_url('uploads/').$post['file_name']?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Main Image</h5>
                                    <p>...</p>
                                </div>
                            </div>
                            <?php foreach ($pics as $pic):?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo base_url('uploads/').$pic['File_name']?>" alt="" >
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $pic['title'] ?></h5>
                                    <p><?php echo $pic['short_desc'] ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <?php }else { ?>

                        <iframe width="560" height="340"
                                src="<?php echo $post['video_url'] ?>">
                        </iframe>

                    <?php } ?>
                </div>
                <div class="clear"></div>
                <br>
                <br>
                <br>

                <div class="one_half text-right">
                    <p>
                        <span style="color: #adadad;">Project Title:</span> <?php echo $post['title'] ?><br>
                        <span style="color: #adadad;">Created:</span> <?php echo date('Y', strtotime($post['date_input']));?>
                    </p>
                    <br>
                    <br>
                    <!--<div class="text-right">
                        <a href="#" target="_self" class="button ">Download</a>
                    </div>-->
                </div>
                <div class="one_half last ">
                    <h1><?php echo $post['title'] ?></h1>
                    <p><?php echo $post['details'] ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>