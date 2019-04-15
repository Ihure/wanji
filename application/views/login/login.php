<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 11:55 AM
 */
?>
<div class="main-panel">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">
                        <?php //echo validation_errors(); ?>
                        <?php echo form_open('login/login'); ?>
                        <?php
                        if (isset($message)){
                            echo "
                           <div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <i class='material-icons'>close</i>
                                </button>
                                <span>
                                     $message
                                </span>
                            </div>
                           ";
                        }?>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
