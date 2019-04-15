<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/1/2018
 * Time: 8:27 AM
 */
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($posts as $post):?>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-tabs card-header-primary">
                                <h4 class="card-title"><?php echo $post['title']; ?></h4>
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link " href='<?php echo site_url().'adminview/delete_post/'.$post['id'];?>' >
                                                        <i class="material-icons">delete</i> Delete
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href='<?php echo site_url().'adminview/get_post/'.$post['id'];?>' >
                                                        <i class="material-icons">create</i> Edit
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <img src="<?php echo base_url('uploads/').$post['file_name']?>" alt="" width="220">
                                </div>
                                <div class="card-category">
                                    <?php echo $post['details']; ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> <?php echo $post['date_input']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>