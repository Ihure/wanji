<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 1:06 PM
 */
?>

<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">
           Krafted By Wanji
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo site_url(). 'createpost';?>">
                    <i class="material-icons">dashboard</i>
                    <p>Create Post</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo site_url(). 'adminview';?>">
                    <i class="material-icons">library_books</i>
                    <p>Posts</p>
                </a>
                <a class="nav-link" href="<?php echo site_url(). 'messages';?>">
                    <i class="material-icons">inbox</i>
                    <p>Messages</p>
                </a>
                <a class="nav-link" href="<?php echo site_url(). 'visitors';?>">
                    <i class="material-icons">Visitors</i>
                    <p>Visitors</p>
                </a>
            </li>
        </ul>
    </div>
</div>