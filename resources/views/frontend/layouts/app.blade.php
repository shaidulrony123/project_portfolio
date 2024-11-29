@include('frontend.layouts.includes.header')

@include('frontend.layouts.includes.navbar')
<div class="container-fluid">
    <div class="row">
        @include('frontend.layouts.includes.sidebar')


        <!-- Main content -->
        <main class="col-md-8 col-lg-10 ms-sm-auto px-md-4">
            @yield('content')


        

          



            <!-- footer section -->
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-inner">
                                <p>Copyright © 2024 <a href="#" target="_blank">Themes_Heaven</a>. All Rights
                                    Reserved.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>





        </main>
    </div>
</div>

@include('frontend.layouts.includes.footer')
