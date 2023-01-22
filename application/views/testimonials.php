<div class="head" style="height:120px;padding-top:10px;width:80%;margin:auto">
    <div class="row">
        <div class="col-md-6 col-6">
            <span>
            <a href="<?= base_url()?>"> <img src="<?= base_url('assets/images/rekiki.png') ?>" style="height:100px"></a>
            </span>
        </div>
        <div class="col-md-6 col-6 d-flex justify-content-end align-items-center pe-4">
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
        <h1>Testimonials</h1>

        <div class="container">
            <div class="row  m-auto">


                <?php
                
                foreach ($testimonials as $r) {
                   
                ?>
                    <div class="col-12 col-md-4 col-sm-6  mt-4 mb-4">
                        <div class="card blog_cards p-3 blog-card" style="width:90%;border:none;box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                            <div class="inr_container row  mt-2 w-90 m-auto">
                                <div class="userimg_container col-4" style="">
                                    <img src="<?php echo base_url("assets/userstestimonialimages/$r->testimonial_user_image") ?>" style="width:90px;height:90px;border-radius: 50%;">
                                </div>
                                <div class="col-8">
                                    <div class="mt-1 me-2">
                                        <h5><?php echo $r->testimonial_user_name?></h5>
                                    </div>
                                    <div>
                                        <?php
                                        $rating = (int) $r->testimonial_user_rating;
                                        for ($i=0; $i < $rating; $i++) { 
                                            echo"<span style='color:#ffbc00;margin:0 2.5px;font-size:20px' ><i class='bi bi-star-fill'></i></span>";
                                        }
                                        for ($i=0; $i < $rating - 5; $i++) { 
                                            echo"<span style='color:#e3e3e3;margin:0 2.5px;font-size:20px'><i class='bi bi-star'></i></span>";
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>   
                            <div class="p-3 ps-4 pe-4 mt-2 fs-4">
                                        <p>
                                        <?php echo $r->testimonial_user_review?>
                                        </p>
                                    </div> 
                        </div>
                    </div>
                <?php   }
                ?>


            </div>
        </div>
    </div>
    
</div>