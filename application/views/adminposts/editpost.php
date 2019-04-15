<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/2/2018
 * Time: 8:26 AM
 */
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Post</h4>
                            <p class="card-category">kindly fill details for your new post</p>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('adminview/edit_post'); ?>
                            <?php
                            if (isset($message)){
                                echo "
                           <div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <i class='material-icons'>close</i>
                                </button>
                                <span>
                                     $message
                                </span>
                            </div>
                           ";
                            }?>
                            <?php echo validation_errors(); ?>
                            <?php if (isset($error)){echo $error;}?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $post['title'] ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $post['id'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                            <option >Category</option>
                                            <option value="paintings">paintings</option>
                                            <option value="jewelry">jewelry</option>
                                            <option value="Interiors">Interiors & DIY</option>
                                            <option value="DIY">DIY Videos</option>
                                            <option value="other">other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url('uploads/').$post['file_name']?>" alt="" width="320">
                                </div>
                                <div class="col-md-8">
                                    <label class="bmd-label-floating">Photo</label>
                                    <input type="file" accept="image/*" name="image" onchange="preview_image(event)">
                                    <img id="output_image"/>
                                </div>
                            </div>
                            <?php foreach ($pics as $pic):?>
                            <div class="row" style="padding-top: 2em;padding-bottom: 1em;">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url('uploads/').$pic['File_name']?>" alt="" width="320">
                                </div>
                                <div class="col-md-5">
                                    <h1><?php echo $pic['title'] ?></h1>
                                    <p><?php echo $pic['short_desc'] ?></p>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link " href='<?php echo site_url().'adminview/delete_pic/'.$pic['autoid'];?>' >
                                        <i class="material-icons">delete</i> Delete
                                        <div class="ripple-container"></div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php if (empty($post['video_url'])){ ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#morepics">
                                        Add alternative photos
                                    </button>
                                </div>
                            </div>
                            <?php }else { ?>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-6" style="padding-top: 2em">
                                        <iframe width="560" height="340"
                                                src="<?php echo $post['video_url'] ?>">
                                        </iframe>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Video Link</label>
                                            <input type="text" name="youtube" class="form-control" value="<?php echo $post['video_url'] ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short story behind this craft</label>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="10" name="desc" id="summernote">
                                                <?php echo $post['details'] ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Post</button>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <?php
   $attributes = array(
        'id' => 'morepics',
        'tabindex' => '-1',
        'role' =>'dialog',
        'aria-labelledby' => 'Photos',
        'aria-hidden' => 'true',
        'class' => 'modal fade'
    );
    echo form_open_multipart('adminview/add_photo', $attributes);
    ?>
    <!--<form class="modal fade" id="morepics" tabindex="-1" role="dialog" action="adminview/add_photo" aria-labelledby="Photos" aria-hidden="true">-->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLongTitle">Add Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Photo</label>
                            <input type="file" accept="image/*" name="ad_image" onchange="preview_image2(event)">
                            <img id="output_image2" width="320"/>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 1em; padding-bottom: 1em;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input type="text" name="ad_title" class="form-control" required>
                                <input type="hidden" name="add_id" class="form-control" value="<?php echo $post['id'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short description (200 words)</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="add_desc" id="summernote2">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>

    <!-- Initialize summernote editor -->
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 200
        });
    </script>
    <script>
        $('#summernote2').summernote({
            placeholder: 'short desc',
            tabsize: 2,
            height: 200
        });
    </script>
    <script type='text/javascript'>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        function preview_image2(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
