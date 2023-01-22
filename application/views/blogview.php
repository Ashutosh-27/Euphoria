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
        <div class="col-md-6 col-8">
            <span>
                <a href="<?= base_url() ?>"> <img src="<?= base_url('assets/images/rekiki.png') ?>" style="height:100px"></a>
            </span>
        </div>
        <div class="col-md-6 col-4 d-flex justify-content-end align-items-center pe-4">
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
                <div class="col-md-6 col-6">

                    <h1  style="font-family: 'Dancing Script', cursive;color:#ff95e0;font-size:3rem"><i>BLog</i></h1>
                </div>
               
            </div>
        </div>

        <div class="container">
            <div class="row  m-auto">

                <?php
                foreach ($contents as $r) {
                    $dt = date('d M,Y', strtotime($r->created_At));
                ?>
                    <div class="col-12 col-md-4 col-sm-6  mt-4 mb-4">
                        <a class="text-dark" href="<?php echo base_url("blog/view_blog/" . $r->blog_id . "") ?>">
                            <div class="card blog_cards p-0 blog-card" style="height:550px;width:90%; background-image: url('<?= base_url("assets/blogimages/".$r->header_image."")?>');">
                                <div class="row card-overlay m-auto">

                                    <div class="d-flex align-items-center justify-content-center flex-column heading-sub_heading">
                                        <h2 class="text-center"><?= $r->blog_heading ?></h2>
                                        <div><?= $r->blog_subheading ?></div>
                                        <div class="mt-4">
                                            <span class="d-block mt-1 text-center fs-5 blog_card-icon"><i class="bi bi-arrow-up-circle"></i></span>
                                            <span class="blog_card-read_more mt-4"><u>Read More</u></span>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex align-items-center justify-content-between">
                                        <span><?= $r->blog_subheading ?></span>
                                        <span><?= $dt ?></span>
                                    </div> -->
                                </div>
                                
                            </div>
                        </a>
                    </div>
                <?php   }
                ?>


            </div>
        </div>






        
    </div>
</div>

<script>
    console.log("<?php print_r($contents) ?>")
</script>