<?php use App\Models\Sidebar;
    $homeSidebar= Sidebar::first();
?>  
  
  <!-- Sidebar (Offcanvas for Mobile) -->
  <nav class="col-md-4 col-lg-2 d-none d-md-block sidebar">
    <div class="profile text-center mt-4">
        <img src="{{ $homeSidebar->image }}" alt="Profile Image" class="img-fluid rounded-circle mb-2">
        <h4>{{ $homeSidebar->name }}</h4>
        <p>{{ $homeSidebar->slug }}</p>
        <div class="social-icons">
            <a target="_blank" href="{{ $homeSidebar->github_link }}"><i class="fa-brands fa-github"></i></a>
            <a target="_blank" href="{{ $homeSidebar->twitter_link }}"><i class="fa-brands fa-x-twitter"></i></a>
            <a target="_blank" href="{{ $homeSidebar->linkedin_link }}"><i class="fa-brands fa-linkedin"></i></a>
            <a target="_blank" href="{{ $homeSidebar->facebook_link }}"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </div>
    <ul class="nav main-menu flex-column mt-4">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">
                <i class="fa-solid fa-user"></i> About Me
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/get-portfolio') }}">
                <i class="fa-solid fa-briefcase"></i> Portfolio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/get-service') }}">
                <i class="fa-solid fa-cogs"></i> Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="resume.html">
                <i class="fa-solid fa-file"></i> Resume
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="product.html">
                <i class="fa-solid fa-box"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="blog.html">
                <i class="fa-solid fa-blog"></i> Blog
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.html">
                <i class="fa-solid fa-envelope"></i> Contact
            </a>
        </li>
        <button class="main-btn text-center m-auto mt-5">
          Hire Me
          <div class="arrow-wrapper">
              <div class="arrow"></div>
      
          </div>
      </button>
    </ul>
</nav>