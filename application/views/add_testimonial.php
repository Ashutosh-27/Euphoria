<style>
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

<div class="container" style="margin-bottom: 10em;">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col">

                        <div class="card p-3" style="width: 400px;margin:auto;border:none;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="card-head">
                                <h4>Give Review<h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('home/addtestimonial_db')?>" enctype='multipart/form-data'>
                                    <div class="row mb-4">
                                        <div class="col-4">
                                            <div class="img_container_review" id="user_image_preview" style="background-image:url('https://icons.veryicon.com/png/o/internet--web/prejudice/user-128.png');">
                                                <div class="image-upload" style="position: absolute;">
                                                    <label class="camera_input d-flex justify-content-center align-items-center" for="file-input">
                                                        <i class="bi bi-camera"></i>
                                                    </label>
                                                    <input id="file-input" type="file" name="user_img_testimonial" onchange="loadFile(event)"/>
                                                </div>
                                                <img id="output" style="width: 100%;height:100%;border-radius:50%;;position:relative;z-index:9;margin:auto"/>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="user_name" id="exampleInputEmail1"  placeholder="Enter your name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="rating"></div>
                                        <input type="hidden" id="ratingcount" name="rating">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="mb-2" for="exampleFormControlTextarea1">Say Something</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="user_review" rows="3"></textarea>
                                    </div>
                                    <div class="form-group mb-3 d-flex justify-content-end align-items-end" style="width: 100%;">
                                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.rating').starRating({
        starIconEmpty: 'far fa-star',
        starIconFull: 'fas fa-star',
        starColorEmpty: 'lightgray',
        starColorFull: '#FFC107',
        starsSize: 2, // em
        stars: 5,
        showInfo: false,

    });

    $(document).on('change', '.rating', function(e, stars, index) {
        $('#ratingcount').val(`${stars}`)
    });
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
</script>
