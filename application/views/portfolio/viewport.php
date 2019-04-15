<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2018
 * Time: 9:24 AM
 */
$count = 1;
$start =1;
?>
<body>
<!-- Preloader Gif -->
<table class="doc-loader">
    <tr>
        <td>
            <img src="<?php echo base_url("assets/portfiles/images/ajax-document-loader.gif")?>" alt="Loading..." />
        </td>
    </tr>
</table>

<!-- Menu -->
<div class="menu-wrapper center-relative">
    <nav id="header-main-menu">
        <div class="mob-menu">MENU</div>
        <ul class="main-menu sm sm-clean">
            <li><a href="<?php echo site_url(). 'welcome';?>">Home</a></li>
            <?php foreach ($headers as $header):?>
                <li><a href="<?php echo site_url().'portfolio/view/'.$header['category'];?>"><?php echo $header['category']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>

<!-- Portfolio -->
<div id="portfolio" class="section">
    <div class="block content-1170 center-relative">
        <div class="section-title-holder right">
            <h2 class="entry-title"><?php echo $category ?></h2>
        </div>
        <div class="section-content-holder portfolio-holder left">
            <div class="grid" id="portfolio-grid">
                <div class="grid-sizer"></div>
                <?php foreach ($posts as $post) {
                    if ($count == 1 || ($count - $start) % 3 == 0) {?>
                        <div class='grid-item element-item p_one'>
                            <a href='<?php echo site_url().'portfolio/view_item/'.$post['id'];?>'>
                                <img src='<?php echo base_url('uploads/').$post['file_name']?>' alt=''>
                                <div class='portfolio-text-holder'>
                                    <div class='portfolio-text-wrapper'>
                                        <p class='portfolio-type'>
                                            <img src='<?php echo base_url("assets/portfiles/images/icon_post.svg")?>' alt=''>
                                        </p>
                                        <p class='portfolio-text'><?php echo $post['title'] ?></p>
                                        <p class='portfolio-sec-text'><?php echo $post['details'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class='grid-item element-item p_one_half'>
                            <a href='<?php echo site_url().'portfolio/view_item/'.$post['id'];?>'>
                                <img src='<?php echo base_url('uploads/').$post['file_name']?>' alt=''>
                                <div class='portfolio-text-holder'>
                                    <div class='portfolio-text-wrapper'>
                                        <p class='portfolio-type'>
                                            <img src='<?php echo base_url("assets/portfiles/images/icon_post.svg")?>' alt=''>
                                        </p>
                                        <p class='portfolio-text'><?php echo $post['title'] ?></p>
                                        <p class='portfolio-sec-text'><?php echo $post['details'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    $count++;
                } ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
