<style>
  .sidebar_tabs_links .sidebar_anchor{
    letter-spacing: 0;
    transition: .3s;
  }
  .sidebar_tabs_links .sidebar_anchor:hover{
    letter-spacing: 1px;
    transition: .3s;
  }
</style>

<div class="page-wrapper chiller-theme ">
 
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">

        <div id="close-sidebar">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>


      <div class=" sidebar_tabs_container d-flex flex-column align-items-center justify-content-center" style="height:60vh;transform:translateY(3em)">
        <ul>
          <li class="sidebar_tabs_links mt-2 mb-2 fs-4">
            <a class="sidebar_anchor" href="<?= base_url()?>" style="color: #f3a0cf;">Home</a>
          </li>
          <li class="sidebar_tabs_links mt-2 mb-2 fs-4">
            <a class="sidebar_anchor" href="<?= base_url('home/about')?>" style="color: #f3a0cf;">About</a>
          </li>
          <li class="sidebar_tabs_links mt-2 mb-2 fs-4">
            <a class="sidebar_anchor" href="<?= base_url('home/testimonial')?>" style="color: #f3a0cf;">Testimonials</a>
          </li>
          <li class="sidebar_tabs_links mt-2 mb-2 fs-4">
            <a class="sidebar_anchor" href="<?= base_url('Blog')?>" style="color: #f3a0cf;">Blog</a>
          </li>
        </ul>
      </div>



      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

  </nav>
</div>