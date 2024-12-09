<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Shaidul</h4>
        </div>
        <div class="mobile-toggle-icon ms-auto"><i class='bx bx-x'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Pages</li>
        <li>
            <a href="{{ url('home-sidebar-page') }}">
                <div class="parent-icon"><i class='bx bx-layout'></i></div>
                <div class="menu-title">Sidebar</div>
            </a>
        </li>
        <li>
            <a href="{{ url('project-page') }}">
                <div class="parent-icon"><i class='bx bx-folder'></i></div>
                <div class="menu-title">Project</div>
            </a>
        </li>
        <li>
            <a href="{{ url('service-page') }}">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Service</div>
            </a>
        </li>

        <li>
            <a href="{{ url('pricing-page') }}">
                <div class="parent-icon"><i class='bx bx-dollar-circle'></i></div>
                <div class="menu-title">Pricing</div>
            </a>
        </li>

        <li>
            <a href="{{ url('product-page') }}">
                <div class="parent-icon"><i class='bx bx-package'></i></div>
                <div class="menu-title">Product</div>
            </a>
        </li>
        <li>
            <a href="{{ url('contact-page') }}">
                <div class="parent-icon"><i class='bx bx-phone'></i></div>
                <div class="menu-title">Contact</div>
            </a>
        </li>
        <li>
            <a href="{{ url('category-page') }}">
                <div class="parent-icon"><i class='bx bx-list-ul'></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        <li>
            <a href="{{ url('blog-page') }}">
                <div class="parent-icon"><i class='bx bx-pencil'></i></div>
                <div class="menu-title">Blog</div>
            </a>
        </li>
        <li>
            <a href="{{ url('profile-page') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i></div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
