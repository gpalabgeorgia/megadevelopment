<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    @if(Session::get('page')=="dashboard")
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
                    <a href="{{ url('admin/dashboard') }}" class="nav-link {{ $active }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            დაფა
                        </p>
                    </a>
                </li>
                @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{ $active }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            მონაცემები
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page')=="settings")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('admin/settings') }}" class="nav-link {{ $active }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>პაროლის გაახლება</p>
                            </a>
                        </li>
                            @if(Session::get('page')=="update-admin-details")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                        <li class="nav-item">
                            <a href="{{ url('admin/update-admin-details') }}" class="nav-link {{ $active }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ინფო-ს გაახლება</p>
                            </a>
                        </li>
                    </ul>
                </li>

<!-- Catalogs -->
                @if(Session::get('page')=="sections" || Session::get('page')=="categories")
                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{ $active }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            კატალოგი
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page')=="sections")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('admin/sections') }}" class="nav-link {{ $active }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>სექციები</p>
                            </a>
                        </li>
                        @if(Session::get('page')=="banners")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/banners') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ბანერები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="ourProjects")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/ourProjects') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ჩვენი პროექტები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="ourProjectsSlider")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/ourProjectsSlider') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>სლაიდერი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="videos")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/videos') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ვიდეოები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="special")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/special') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>განსაკუთრებულობები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="second-banner")
                           <?php $active = "active"; ?>
                        @else
                           <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/second-banner') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ჩვენი ბანერები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="about-slider")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/about-slider') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>გუნდის სლაიდერი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="staf")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/staf') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>გუნდი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="motto")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/motto') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ჩვენი დევიზი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="blog")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/blog') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>სიახლეები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="contactBanner")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/contactBanner') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>კონტაქტის ბანერი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="contactBlock")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/contactBlock') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>კონტაქტის ბლოკი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="ourProjectBanner")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/ourProjectBanner') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>პროექტების ბანერი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="ourProjectBlock")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/ourProjectBlock') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>პროექტები</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="blogBanner")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/blogBanner') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>სიახლეების ბანერი</p>
                                </a>
                            </li>
                        @if(Session::get('page')=="projectFilter")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/projectFilter') }}" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ფილტრები</p>
                                </a>
                            </li>
                            <br>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
