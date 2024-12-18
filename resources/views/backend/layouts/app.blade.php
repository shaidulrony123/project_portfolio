
@include('backend.layouts.includes.header')
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('backend.layouts.includes.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('backend.layouts.includes.top-header')
		<!--end header -->
		<!--start page wrapper -->
    <div class="page-wrapper">
			<div class="page-content">
	@yield('content')
	<!-- Loader Element -->
{{-- <div id="loader" class="d-none">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div> --}}

      </div>
    </div>

		<!--end page wrapper -->

		<!--start overlay-->
		 <div class="overlay mobile-toggle-icon"></div>
		<!--end overlay-->
        
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        
	</div>
	<!--end wrapper-->



@include('backend.layouts.includes.footer')