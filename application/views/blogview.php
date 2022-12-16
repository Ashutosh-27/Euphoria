<style>
    .hover-content {
        height: 50%;
        overflow-y: hidden;
        margin-top: 30%;
        transition: .3s;
    }

    .blog-card:hover .hover-content {
        margin-top: 0;
        height: 100%;

        transition: .3s;

    }
</style>


<div class="head" style="height:120px;padding-top:10px;width:80%;margin:auto">
    <div class="row">
        <div class="col-md-6">
            <span>
                <a href="<?= base_url() ?>"> <img src="<?= base_url('assets/images/rekiki.png') ?>" style="height:100px"></a>
            </span>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center pe-4">
            <span>
                <a id="show-sidebar" class="btn btn-lg p-0 fs-2" href="#">
                    <i class="bi bi-list"></i>
                </a>
            </span>
        </div>
    </div>
</div>


<div class="container">

    <div class="main-content mt-2 pt-5">

        <div class="blog mb-5">
            <div class="row w-80 m-auto">
                <div class="col-md-6">

                    <h2>BLog</h2>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <button class="btn btn-transparent text-primary" data-bs-toggle="modal" data-bs-target="#addblog">+ Add BLog</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <?php
                foreach ($contents as $r) {
                    $dt = date('d M,Y', strtotime($r->created_At));
                ?>
                    <div class="col-4 mt-4 mb-4">
                        <a class="text-dark" href="<?php echo base_url("blog/view_blog/" . $r->blog_id . "") ?>">
                            <div class="card p-4 blog-card" style="height:100%">

                                <div class="row mb-5">
                                    <h2><?= $r->blog_heading ?></h2>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span><?= $r->blog_subheading ?></span>
                                        <span><?= $dt ?></span>
                                    </div>
                                </div>
                                <div class="hover-content-container" style="height:120px;">
                                    <?php
                                    $content_arr = explode(',', $r->content);
                                    ?>
                                    <div class="hover-content ">
                                        <?php echo $content_arr[0] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php   }
                ?>


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
    </div>
</div>

<script>
    console.log("<?php print_r($contents) ?>")
</script>