<?php use App\Models\Sidebar;
    $homeSidebar= Sidebar::first();
    $currentRoute = Route::currentRouteName();
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
            <a class="nav-link {{ $currentRoute === 'home' ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="fa-solid fa-user"></i> About Me
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'portfolio' ? 'active' : '' }}" href="{{ url('/get-portfolio') }}">
                <i class="fa-solid fa-briefcase"></i> Portfolio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'service' ? 'active' : '' }}" href="{{ url('/get-service') }}">
                <i class="fa-solid fa-cogs"></i> Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'resume' ? 'active' : '' }}" href="{{ url('/get-resume') }}">
                <i class="fa-solid fa-file"></i> Resume
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'product' ? 'active' : '' }}" href="{{ url('/get-product') }}">
                <i class="fa-solid fa-box"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'blog' ? 'active' : '' }}" href="{{ url('/get-blog') }}">
                <i class="fa-solid fa-blog"></i> Blog
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute === 'contact' ? 'active' : '' }}" href="{{ url('/get-contact') }}">
                <i class="fa-solid fa-envelope"></i> Contact
            </a>
        </li>
        <button class="main-btn text-center m-auto mt-5">
         <a class="text-white" href="{{url('/get-contact')}}"> Hire Me</a>
          <div class="arrow-wrapper">
              <div class="arrow"></div>

          </div>
      </button>
    </ul>
</nav>
