	<!--start overlay-->
    <div class="overlay mobile-toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
      <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    {{-- <footer class="page-footer">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer> --}}
</div>
<!--end wrapper-->


<!-- search modal -->
<div class="modal" id="SearchModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header gap-2">
          <div class="position-relative popup-search w-100">
            <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
            <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
          </div>
          <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="search-list">
               <p class="mb-1">Html Templates</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Web Designe Company</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Software Development</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Online Shoping Portals</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
               </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- end search modal -->



<!--start switcher-->
<button class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
<i class='bx bx-cog bx-spin'></i>Customize
</button>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
<div class="offcanvas-header border-bottom h-60">
  <div class="">
    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
  <div>
    <p>Theme variation</p>

    <div class="row g-3">
      <div class="col-12 col-xl-6">
        <input type="radio" class="btn-check" name="theme-options" id="LightTheme" checked>
        <label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="LightTheme">
            <span><i class='bx bx-sun fs-2'></i></span>
            <span>Light</span>
        </label>
      </div>
      <div class="col-12 col-xl-6">
        <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
        <label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="DarkTheme">
            <span><i class='bx bx-moon fs-2'></i></span>
            <span>Dark</span>
        </label>
      </div>
      <div class="col-12 col-xl-6">
        <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
        <label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="SemiDarkTheme">
            <span><i class='bx bx-brightness-half fs-2'></i></span>
            <span>Semi Dark</span>
        </label>
      </div>
      <div class="col-12 col-xl-6">
        <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
        <label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="BoderedTheme">
            <span><i class='bx bx-border-all fs-2'></i></span>
            <span>Bordered</span>
        </label>
      </div>
    </div><!--end row-->

  </div>
</div>
</div>
<!--start switcher-->

<!-- Bootstrap JS -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
{{-- <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/js/myloader.js') }}"></script>
{{-- <script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script> --}}
<!--app JS-->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>

{{-- <script src="{{ asset('backend/assets/js/index.js') }}"></script> --}}
<script src="{{ asset('backend/assets/plugins/peity/jquery.peity.min.js') }}"></script>
<script>
   $(".data-attributes span").peity("donut")
</script>
</body>

</html>