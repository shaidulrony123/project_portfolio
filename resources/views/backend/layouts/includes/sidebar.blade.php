
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Syndron</h4>
            </div>
            <div class="mobile-toggle-icon ms-auto"><i class='bx bx-x'></i>
            </div>
         </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="form-froala-editor.html">
                    <div class="parent-icon"><i class='bx bx-home-alt'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
           
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Application</div>
                </a>
                <ul>
                    <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
                    </li>
                    <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
                    </li>
                    <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
                    </li>
                    <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                    </li>
                    <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                    </li>
                    <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                    </li>
                    <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                    </li>
                </ul>
            </li>
            <li class="menu-label">Pages</li>
            <li>
                <a href="{{ url('news-page') }}">
                    <div class="parent-icon"><i class='bx bx-news'></i>
                    </div>
                    <div class="menu-title">News</div>
                </a>
            </li>
            <li>
                <a href="{{ url('topheader-page') }}">
                    <div class="parent-icon"><i class='bx bx-news'></i>
                    </div>
                    <div class="menu-title">Top Header</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-category'></i>
    
                    </div>
                    <div class="menu-title">Categories</div>
                </a>
                <ul>
                    <li> <a href="{{ url('category-page') }}"><i class='bx bx-radio-circle'></i>Category List</a>
                    </li>
                    <li> <a href="{{ url('sub-category-page') }}"><i class='bx bx-radio-circle'></i>Sub Category List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Avdertisement</div>
                </a>
                <ul>
                    <li> <a href="{{ url('advertisement-page') }}"><i class='bx bx-radio-circle'></i>Avdertisement List</a>
                    </li>
                    <li> <a href="{{ url('advertisement-position-page') }}"><i class='bx bx-radio-circle'></i>Advertisement Position</a>
                    </li>
                   
                    
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('profile-page') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">User Profile</div>
                </a>
            </li>
          
           
            <li>
                <a href="https://themeforest.net/user/codervent" target="_blank">
                    <div class="parent-icon"><i class="bx bx-support"></i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>


    
<!--end sidebar wrapper -->