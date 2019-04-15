<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 1:06 PM
 */
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Post</h4>
                            <p class="card-category">kindly fill details for your new post</p>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('createpost/upload'); ?>
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
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="category" onchange="java_script_:show(this.options[this.selectedIndex].value)">>
                                            <option >Category</option>
                                            <option value="Paintings">Paintings</option>
                                            <option value="Jewelry">Jewelry</option>
                                            <option value="Interiors">Interiors & DIY</option>
                                            <option value="DIY">DIY Videos</option>
                                            <option value="Other">other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="hiddenDiv" style="display:none">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Video Link</label>
                                        <input type="text" name="youtube" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Photo</label>
                                    <input type="file" accept="image/*" name="image" onchange="preview_image(event)">
                                    <img id="output_image"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short story behind this craft</label>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="10" name="desc" id="editor"></textarea>
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

<!-- Include the summernote library -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>

<!-- Initialize Quill editor -->
<script>
    $('#editor').summernote({
        placeholder: 'short desc',
        tabsize: 2,
        height: 200
    });
</script>
<script>
    function show(aval) {
        if (aval == "DIY") {
            hiddenDiv.style.display='flex';
            Form.fileURL.focus();
        }
        else{
            hiddenDiv.style.display='none';
        }
    }
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
</script>