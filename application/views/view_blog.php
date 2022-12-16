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


<div class="container mb-5">

    <div class="main-content mt-2 pt-5">

        <div class="row">
            <div class="row mb-5">
                <h2><?= $blog->blog_heading ?></h2>

                <div class="d-flex align-items-center justify-content-between">
                    <span><?= $blog->blog_subheading ?></span>
                    <span><?= date('d M,Y', strtotime($blog->created_At)); ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card p-5" style="border:none;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <?php 
                    echo $blog->content;
                ?>
            </div>
        </div>
    </div>
</div>