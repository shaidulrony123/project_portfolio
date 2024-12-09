<?php use App\Models\Sidebar;
$homeSidebar= Sidebar::first();
?>

   <!-- portfolio banner section -->
   <section id="common-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeInUp portfolio-banner-content text-center">
                    <h2>A collection of my best projects </h2>
                    <p>With many years in web development, I acquired extensive experience working on projects across multiple industries and technologies. Let me show you my best creations. </p>
                    <button class="main-btn mt-3 ">
                       <a class="text-white" href="{{url('get-contact')}}"> Hire Me</a>
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>

                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
   </section>
  <!-- portfolio banner section -->


<!-- resume section -->
<div class="wow fadeInUp resume-container" data-wow-delay="0.3s">
<!-- Header Section -->
<div class="row align-items-center mb-4">
<!-- Text Section -->
<div class="col-lg-9 col-md-8">
<h1 class="text-primary">{{ $homeSidebar->name }}</h1>
<h3 class="text-muted">{{$homeSidebar->slug}}</h3>
<div class="contact-info mt-2">
<p>📞 <a class="text-black" href="callto:01721413821">01721413821</a></p>
<p>✉️ <a class="text-black" href="mailto:shaiduls.official@gmail.com">shaiduls.official@gmail.com</a></p>
<p>🌐 <a class="text-black" href="https://shaidul.themesheaven.site/">shaiduls.themesheaven.site</a></p>
<p>📍 Zigatola, Dhaka, Bangladesh</p>
</div>
</div>
<!-- Image Section -->
<div class="col-lg-3 col-md-4 text-center">
<img class="resume-img img-fluid" src="{{ $homeSidebar->image }}" alt="Profile Picture">
</div>
</div>

<!-- Profile Section -->
<div class="row mb-4">
<div class="col-lg-12">
<h3 class="section-title">Profile</h3>
<p>
    I am a web developer with expertise in PHP, Laravel, JavaScript, Vue.js, Tailwind CSS, and Axios. I specialize in building dynamic, scalable applications, integrating third-party APIs, and bug fixing. I also create responsive, user-friendly designs and ensure high-quality, maintainable code. Additionally, I offer WordPress theme and plugin customization services, delivering tailored solutions to meet client needs. My goal is to provide efficient, well-crafted solutions that enhance user experience and meet business objectives.
</p>
</div>
</div>

<!-- Skills and Education Section -->
<div class="row">
<div class="col-lg-7">
<h3 class="section-title">Skills</h3>
<h5>Technical</h5>
<ul>
<li>PHP</li>
<li>Laravel</li>
<li>JavaScript</li>
<li>Vue.js</li>
<li>MySQL</li>
<li>Tailwind CSS</li>
<li>Axios</li>
<li>RESTful APIs</li>
<li>Theme Customization</li>
<li>Plugin Customization</li>
</ul>
<h5>Professional</h5>
<ul>
<li>Effective communication</li>
<li>Strong problem solver</li>
<li>Good time management</li>
</ul>
</div>
<div class="col-lg-1">
<div class="line"></div>
</div>
<div class="col-lg-4">
<h3 class="section-title">Education</h3>
<ul>
<li><strong>SSC</strong> - Ramgonj High School (2017)</li>
<li><strong>HSC</strong> - Ramgonj Model College (2019)</li>
<li><strong>BBA</strong> - Dr. Maleka College (Running)</li>
</ul>
<h3 class="section-title mt-4">Awards</h3>
<ul>
<li><strong>Web Development With Php And Laravel</strong> - Ostad</li>
<li><strong>Responsive Web Design</strong> - Creative IT Institute</li>
<li><strong>WordPress Theme Customization</strong> - MamurJorIT</li>
</ul>
</div>
</div>

<!-- Awards, Languages, and Interests Section -->
<div class="row mt-4">
<div class="col-lg-4">
<h3 class="section-title">Social Media</h3>
<ul>
<li> <a target="_blank" href="https://github.com/shaidulrony123"><i class="bi bi-github"></i> GitHub</a></li>
<li><a target="_blank" href="https://www.linkedin.com/in/shaidul007/"><i class="bi bi-linkedin"></i> LinkedIn</a></li>
<li> <a target="_blank" href="https://x.com/shaidul007"><i class="fa-brands fa-x-twitter"></i>Twitter</a></li>
<li><a target="_blank" href="https://www.facebook.com/shaidulislamrony007/"><i class="bi bi-facebook"></i> Facebook</a></li>
</ul>
</div>
<div class="col-lg-4">
<h3 class="section-title">Languages</h3>
<ul>
<li>English (Fluent)</li>
<li>Hindi (Fluent)</li>
</ul>
</div>
<div class="col-lg-4">
<h3 class="section-title">Interests</h3>
<ul>
<li>Climbing</li>
<li>Photography</li>
<li>Travelling</li>
</ul>
</div>
</div>
</div>
<!-- resume section -->
