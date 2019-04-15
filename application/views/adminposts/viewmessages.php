<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/11/2018
 * Time: 9:50 AM
 */
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Messages</h4>
                            <p class="card-category">Messages from the website</p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th></th>
                                </thead>
                                <tbody>
                                <?php foreach ($messages as $message):?>
                                    <tr>
                                        <td><?php echo $message['created']; ?></td>
                                        <td><?php echo $message['name']; ?></td>
                                        <td><?php echo $message['email']; ?></td>
                                        <td><?php echo $message['message']; ?></td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Archive"
                                                    class="btn btn-danger btn-link btn-sm"
                                            onclick="window.location='<?php echo site_url().'messages/delete_message/'.$message['autoid'];?>'">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
