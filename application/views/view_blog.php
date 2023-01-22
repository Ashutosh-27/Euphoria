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


<div class="container mb-5">

    <div class="main-content mt-2 pt-5">

        <!-- <div class="row">
            <div class="row mb-5">
                <h2><?= $blog->blog_heading ?></h2>

                <div class="d-flex align-items-center justify-content-between">
                    <span><?= $blog->blog_subheading ?></span>
                    <span><?= date('d M,Y', strtotime($blog->created_At)); ?></span>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 col-12 m-auto">

                <div class="card p-5 pt-0" style="border:none;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class=" mb-5 blog_img" style="background-image: url('<?= base_url("assets/blogimages/" . $blog->header_image . "") ?>');">
                        <div class="row p-4 m-auto blog-overlay">
                            <div class="" style="color:#ff81da;">
    
                                <h2 style="font-family: 'Dancing Script', cursive;font-weight:700;font-size:2.7em"><?= $blog->blog_heading ?></h2>
                                <span><?= $blog->blog_subheading ?></span>
                            </div>
                        </div>
    
                    </div>
    
                    <div class="content-part2" id="content-part2">
    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var content = ((<?= json_encode($blog)?>).content).split('==>')
    var images = ((<?= json_encode($blog)?>).imgs).split('==>')
    
    for(let i =0;i<content.length;i++){
        var html = '';
        if(i%2==0){
            if(images[i]!=''){
                html = `<div class="d-flex flex-wrap  section${i+1}">
                    <div  class="col-md-8">
                    ${content[i]}
                    </div>
                    <div class="col-md-4">
                    <img src="<?= base_url("assets/blogimages")?>/${images[i]}" style="width:90%;height:auto">
                    </div>
                </div>`
            }
            else{
               html = `<div class="row section${i+1}">
                    <div class="col-md-12">
                    ${content[i]}
                    </div>
                </div>`
            }
            
        }
        else{
            if(images[i]!=''){
               html =  `<div class="d-flex flex-row-reverse flex-wrap section${i+1}">
                    <div  class="col-md-8">
                    ${content[i]}
                    </div>
                    <div class="col-md-4">
                    <img src="<?= base_url("assets/blogimages")?>/${images[i]}" style="width:90%;height:auto">
                    </div>
                </div>`
            }
            else{
                html = `<div class="row section${i+1}">
                    <div class="col-md-12">
                    ${content[i]}
                    </div>
                </div>`
            }
        }

        $('#content-part2').append(html)
    }
</script>   