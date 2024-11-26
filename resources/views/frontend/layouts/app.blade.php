@include('frontend.layouts.includes.header')

@include('frontend.layouts.includes.navbar')
<div class="container-fluid">
    <div class="row">
      @include('frontend.layouts.includes.sidebar')


        <!-- Main content -->
        <main class="col-md-8 col-lg-10 ms-sm-auto px-md-4">
            @yield('content')
            <section class="intro text-center my-5">
               <div class="container">
                <div class="row">
                    <div class="col-lg-7 order-2 order-lg-1 order-md-1">
                        <div class="wow fadeInLeft banner-left-text">
                            <h1>HI, I'M </h1>
                            <h2>Shaidul Islam</h2>
                        <h3>Full Stack Web Developer</h3>
                        <p class="mt-1">Html & CSS, Bootstrap, JavaScript, jQuery, Vue.js,Tailwind CSS, PHP, Laravel, API Development & Integration, WP Theme & Plugin Development, Shopify, SquireSpace, WooCommerce</p>
                        <div class="banner-btn d-flex gap-3 mt-3">
                        <button class="main-btn">
                            View Portfolio
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                        
                            </div>
                        </button>
                        
                        <button class="main-btn">
                            View Resume
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                        
                            </div>
                        </button>
                       </div>
                       <!-- counter -->
                        <div class="count-section">
                            <div class="row">
                                <!-- Years of Experience -->
                                <div class="col-12 col-md-4">
                                  <div class="counter" data-count="5">0</div>
                                  <div class="label">Years of Experience</div>
                                </div>
                            
                                <!-- Projects Completed -->
                                <div class="col-12 col-md-4">
                                  <div class="counter" data-count="110">0</div>
                                  <div class="label">Projects Completed</div>
                                </div>
                            
                                <!-- Clients Worldwide -->
                                <div class="col-12 col-md-4">
                                  <div class="counter" data-count="6000">0</div>
                                  <div class="label">Clients Worldwide</div>
                                </div>
                              </div>
                        </div>
                       <!-- counter -->
                    
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 order-md-2">
                      <div id="banner-img" class="wow fadeInRight rotating-bg">
                          <div class="background-rotating"></div>
                          <img src="{{ asset('frontend/assets/images/rony.jpg') }}" alt="Your Photo" class="img-fluid mt-4">
                      </div>
                  </div>
                  
                  
                </div>
               </div>
            </section>
            <!-- What I do -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="what-i-do">
                                <div class="wow fadeInUp what-top-text ">
                                    <h2>What I do</h2>
                                    
                                </div>
                                <div class="wow fadeInUp what-text">
                                    <p>I have more than 10 years' experience building software for clients all over the world. Below is a quick overview of my main technical skill sets and technologies I use. Want to find out more about my experience? Check out my  online resume and project portfolio. </p>
                                    <button class="main-btn ">
                                        View Resume
                                        <div class="arrow-wrapper">
                                            <div class="arrow"></div>
                                    
                                        </div>
                                    </button>
                                </div>
                                <div class="service-content">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="wow fadeInUp service-item" data-wow-delay=".2s">
                                                <img src="{{ asset('frontend/assets/images/html.png') }}" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="service-item">
                                                <img src="images/html.png" alt="Service Image">
                                                <h3>Web Development</h3>
                                                <p>List skills and technologies here. Customize as needed. Built on HTML5, Sass, and Bootstrap 5.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- What I do -->
            <!-- work with me -->
             <section id="work-with-me" style="background: url({{ asset('frontend/assets/images/bg.png') }}) no-repeat center/cover fixed;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="work-with-me">
                                <div class="wow fadeInUp work-left-text">
                                    <h2>Let’s Work together on <span>your next Project</span></h2>
                                    <p>I am available for freelance projects. Hire me and get your project done.</p>
                                </div>
                                <button class="wow fadeInUp main-btn mt-3">
                                    Contact Me
                                    <div class="arrow-wrapper">
                                        <div class="arrow"></div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
             </section>
            <!-- work with me -->
             
        <!-- project section -->
        <section id="project">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="wow fadeInLeft what-i-do">
                    <div class="wow fadeInUp what-top-text">
                        <h2>Featured Projects </h2>
                      
                    </div>
                    <div class="wow fadeInUp what-text">
                        <p>My step-by-step guide ensures a smooth project journey, from the initial consultation to the final delivery. I take care of every detail, allowing you to focus on what you do best.</p>
                        <button class="main-btn mt-3">
                            View Portfolio
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                        
                            </div>
                        </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="project-content">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInLeft project-inner" data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="{{ asset('frontend/assets/images/project-1.jpg') }}" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInUp project-inner" data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="images/project-1.jpg" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInRight project-inner cus-top" data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="images/project-1.jpg" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInRight project-inner custom-project" data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="images/project-1.jpg" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInRight project-inner cus-top " data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="images/project-1.jpg" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInRight project-inner custom-project" data-wow-delay=".2s">
                      <div class="project-img">
                        <img src="images/project-1.jpg" class="img-fluid w-100" alt="">
                        <div class="porject-details">
                          <h4><a target="_blank" href="#">Project 1</a></h4>
                          <p>An online school website serves as the digital gateway to a virtual learning environment. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </section>
        <!-- project section -->
<!-- feedback section -->
<section id="feedback">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="wow fadeInLeft what-i-do">
                <div class="what-top-text d-flex justify-content-between align-items-center">
                    <h2>Testimonials</h2>
                    <!-- <button class="main-btn mt-3">
                        View Portfolio
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
                    
                        </div>
                    </button> -->
                </div>
                <div class="what-text">
                    <p>See how I've helped our clients succeed. IT’s a highly Customizable,creative, modern, visually stunning and Bootstrap5 HTML5 Template.</p>
                </div>
              </div>
        </div>
      </div>
      <div class="feedback-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="feedback-slider">
              <div class="wow fadeInRight feedback-inner">
                <h6>
                  "Increased my savings significantly - John from New York."
                </h6>
                <h4>Impressive Results</h4>
                <div class="star mt-2">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="feedback-img">
                  <img src="{{ asset('frontend/assets/images/pic1.jpg') }}" alt="">
                </div>
              </div>
              <div class="wow fadeInLeft feedback-inner">
                <h6>
                  "Increased my savings significantly - John from New York."
                </h6>
                <h4>Impressive Results</h4>
                <div class="star mt-2">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="feedback-img">
                  <img src="images/pic1.jpg" alt="">
                </div>
              </div>
              <div class="feedback-inner">
                <h6>
                  "Increased my savings significantly - John from New York."
                </h6>
                <h4>Impressive Results</h4>
                <div class="star mt-2">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="feedback-img">
                  <img src="images/pic1.jpg" alt="">
                </div>
              </div>
              <div class="feedback-inner">
                <h6>
                  "Increased my savings significantly - John from New York."
                </h6>
                <h4>Impressive Results</h4>
                <div class="star mt-2">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="feedback-img">
                  <img src="images/pic1.jpg" alt="">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- feedback section -->

<!-- blog section -->
 <section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeInLeft what-i-do">
                    <div class="wow fadeInUp what-top-text ">
                        <h2>Latest Blog Posts</h2>
                     
                    </div>
                    <div class="wow fadeInUp what-text">
                        <p>More than 1500+ agencies using Portfolify</p>
                        <button class="main-btn mt-3">
                            See All Articles
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>
                        
                            </div>
                        </button>
                    </div>
                  </div>
            </div>
        </div>
        <div class="bolg-inner">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInLeft blog-content">
                        <div class="blog-img">
                            <img src="{{ asset('frontend/assets/images/blog1.png') }}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-text">
                            <p>12 Jan 2024 / Web Development</p>
                            <h4>7 Great Web Development Languages to Learn this Year</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInUp blog-content">
                        <div class="blog-img">
                            <img src="images/blog1.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-text">
                            <p>12 Jan 2024 / Web Development</p>
                            <h4>7 Great Web Development Languages to Learn this Year</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="wow fadeInRight blog-content custom-blog">
                        <div class="blog-img">
                            <img src="images/blog1.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-text">
                            <p>12 Jan 2024 / Web Development</p>
                            <h4>7 Great Web Development Languages to Learn this Year</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- blog section -->

<!-- footer section -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-inner">
                            <p>Copyright © 2024 <a href="#" target="_blank">Themes_Heaven</a>. All Rights Reserved.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>   
        



         
        </main>
    </div>
</div>

@include('frontend.layouts.includes.footer')