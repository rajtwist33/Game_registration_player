<nav class="main-header navbar  navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-block">
            <span style="font-size: 140%;margin-left:10px; color:green; font-weight:500;" id="nepali_date"></span>
        </li>
        <li class="nav-item ">
            <span id="clock"></span>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto" style="font-size: 20px;">

        <li class="nav-item mr-3">
            <a class="nav-link btn btn-outline-success text-dark " data-widget="fullscreen" href="#"
                role="button">
                <i class="bi bi-arrows-angle-expand "></i>
            </a>
        </li>
        <li class="nav-item mr-3">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class=" btn btn-danger text-light" type="submit" role="button">
                    <i class="bi bi-box-arrow-left "></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ Auth::user()->logo != null ? asset(Auth::user()->logo_path) : asset('backend/logo/logo.png') }}"
            alt="{{ Auth::user()->name }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span
            class="brand-text font-weight-light">{{ Auth::user()->company_name != null ? Auth::user()->company_name : 'Demo' }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->image_profile != null ? asset(Auth::user()->profile_path) : asset('backend/avatar/avatar.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/home') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li
                    class="nav-item  {{ request()->is('admin/manage/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/manage/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Setup
                            <i class="right fas fa-angle-left "></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('admin.gamecategory.index') }}"
                                class="nav-link {{ request()->is('*/manage/gamecategory*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Game Category
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.index') }}"
                                class="nav-link {{ request()->is('*/manage/setting*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#"
                        class="nav-link ">
                        <i class="bi bi-people ml-1" style="font-size: 20px;"></i>
                        <p class="ml-2">
                           Player
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
