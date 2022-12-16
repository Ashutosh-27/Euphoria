       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

       <script src="<?= base_url('assets/Javascript/navbar.js') ?>"></script>

       <!-- put jquery before owl carousel -->
       <!-- jquery -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

       <!-- owl carousel -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


       <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
       <script>
           tinymce.init({
               selector: '.mytextarea'
           });


           AOS.init();
       </script>

       <script>
           $(document).ready(function() {
               $('#add_blog_sec').on('click', function() {
                   $('#text_imgs').append(`
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
                    `)
                   addTinyMCE();
               })

               function addTinyMCE() {
                   tinymce.init({
                       selector: 'textarea'
                   });
               }
           })

           $(document).ready(function() {
               $(".owl-carousel").owlCarousel({
                   loop: true,
                   margin: 10,
                   nav: true,
                   dots: false,
                   autoplay: true,
                   autoplayTimeout: 3000,
                   autoplayHoverPause: true,
                   responsive: {
                       0: {
                           items: 1
                       },
                       600: {
                           items: 3,

                       },
                       1000: {
                           itwms: 6
                       }
                   }
               });
           });
       </script>
       </body>

       </html>