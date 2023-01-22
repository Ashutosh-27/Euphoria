<style>
    
    div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }

    .camera_input {
        background-color: #ffffff;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 3px solid #f3a0cf;
        position:relative;
        z-index:10;
    }

    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }

    .img_container_review {
        background-color: #ffffff;
        /* Used if the image is unavailable */
        height: 500px;
        /* You must set a specified height */
        background-position: center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        /* Resize the background image to cover the entire container */
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid #f3a0cf;
    }


</style>

<?php
    $admin = $this->session->userdata('admin');   
?>

<div class="head" style="height:120px;padding-top:10px;width:80%;margin:auto">
    <div class="row">
        <div class="col-md-6 col-6">
            <span>
            <a href="<?= base_url()?>"> <img src="<?= base_url('assets/images/rekiki.png') ?>" style="height:100px"></a>
            </span>
        </div>
        <div class="col-md-6 col-6 d-flex justify-content-end align-items-center pe-4">
            <span>
                <a id="logout" class="btn btn-lg p-0 fs-2" href="<?php echo base_url('admin/logout') ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                </a>
            </span>
        </div>
    </div>
</div>


<div class="container">
    <div class="main-content mt-2 pt-5">
        <div class="section1">
            <div class="row">
                <div class="col-12">
                    <h3>Profile Info</h3>

                </div>

                <div class="col-12 p-4">
                    <form method="POST" action="<?php echo base_url('admin/updateadmin')?>" enctype='multipart/form-data'>
                        <div class="row bg-light p-4">
                            <div class="col-md-3 col-12">
                                <div class="img_container_review" id="user_image_preview" style="background-image:url('<?php echo ($admin->admin_pic )?base_url("assets/adminImgs/$admin->admin_pic"):base_url('assets/images/user.png'); ?>');">
                                    <div class="image-upload" style="position: absolute;">
                                        <label class="camera_input d-flex justify-content-center align-items-center" for="file-input">
                                                        <i class="bi bi-camera"></i>
                                        </label>
                                        <input id="file-input" type="file" name="adminimg" value="<?php echo $admin->admin_pic?>" onchange="loadFile(event)"/>
                                    </div>
                                    <img id="output" style="width: 100%;height:100%;border-radius:50%;;position:relative;z-index:9;margin:auto"/>
                                </div>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="row">
                                    <div class="col-md-4 col-12 mt-2">
                                        <input type="hidden" name="adminId" value="<?php echo $admin->admin_id?>">
                                        <div class="form-group">
                                            <label for="adminName">Admin Name</label>
                                            <input type="text" class="form-control" id="adminName" value="<?php echo $admin->admin_name?>" name="adminName" placeholder="Admin Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="form-group">
                                            <label for="adminEmail">Admin Email</label>
                                            <input type="email" class="form-control" id="adminEmail" value="<?php echo $admin->admin_email?>" name="adminEmail" placeholder="Admin Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="form-group">
                                            <label for="adminVar">Admin VarName</label>
                                            <input type="text" class="form-control" id="adminVar" value="<?php echo $admin->admin_var?>" name="adminVar" placeholder="Admin Varname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                <div class="form-group mb-3 d-flex justify-content-end align-items-end" style="width: 100%;">
                                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="section2 mt-5 mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="row">
<div class="col-8">

    <h3>Blogs</h3>
</div>
<div class="col-4">
<div class="col-md-6 col-6 d-flex align-items-center justify-content-end">
                    <button class="btn btn-transparent text-primary" data-bs-toggle="modal" data-bs-target="#addblog">+ Add BLog</button>
                </div>
</div>
                    </div>

                </div>

                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SrNo</th>
                                <th>Blog title</th>
                                <th>Blog Sutitle</th>
                                <th>Created At</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            foreach($blogs as $blog){?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $blog->blog_heading?></td>
                                    <td><?php echo $blog->blog_subheading?></td>
                                    <td><?php echo $blog->created_At?></td>
                                </tr>
                           <?php $i++;}?>
                        <tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="section3 mt-5">
            <div class="row">
                <div class="col-12">
                    <h3>Testimonials</h3>

                </div>

                <div class="col-12">
                <table id="example" class=" table display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>SrNo</th>
                                <th>Testimonial User Name</th>
                                <th>Testimonial User Rating</th>
                                <th>Testimonial User Review</th>
                                <th>Created At</th>
                                
                            </tr>

                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            foreach($testimonials as $testimonial){?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $testimonial->testimonial_user_name?></td>
                                    <td><?php echo $testimonial->testimonial_user_rating?></td>
                                    <td><?php echo $testimonial->testimonial_user_review?></td>
                                    <td><?php echo "@002-100-1" ?></td>
                                </tr>
                           <?php $i++;}?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-hideout">

            <!-- Modal -->
            <div class="modal modal-xl fade" id="addblog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Blog</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <form action="<?= base_url("blog/add_blog") ?>" method="POST" enctype='multipart/form-data'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="blog_title" class="form-label mb-2">Blog title</label>
                                            <input type="text" class="form-control" name="blog_title" id="blog_title" placeholder="Enter BLog title">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="blog_title" class="form-label mb-2">Blog Sub-title</label>
                                            <input type="text" class="form-control" name="bolg_subtitle" id="blog_subtitle" placeholder="Enter BLog Sub title">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label for="blog_title" class="form-label mb-2">Primary Image</label>
                                            <input type="file" class="form-control" name="img_header" id="img_header" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5" id="text_imgs">
                                        <div class="row mt-5">
                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <label for="" class="from-label mb-2">Blog Content</label>
                                                    <textarea class="mytextarea" name="contents[]">

                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="" class="from-label mb-2">Image 1</label>
                                                    <input type="file" class="form-control" name="imgfiles[]">
                                                </div>
                                            </div>
                                        </div>


                                    </div>






                                    <div class="col-md-12 mt-5 d-flex justify-content-end">
                                        <button type="button" class="btn btn-info text-white pull-right" id="add_blog_sec">Add</button>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success pull-right" name="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<script>
    var loadFile =  function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
      $('#user_image_preview').css('background-image', reader.result);
    //   console.log(output.src )
    };
     reader.readAsDataURL(event.target.files[0]);


  };
    $(document).ready(function () {
  $('#example').DataTable();
});
</script>


