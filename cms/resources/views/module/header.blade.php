<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
            </a>
        </li>
        
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
        

        
        <!--begin::User Menu Dropdown-->
        <li class="nav-item dropdown user-menu">
            <a href="{{url('/') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img src="{{ Auth::user()->photo ? url(Auth::user()->photo) : url('/views/img/User_Icon.png') }}" class="user-image rounded-circle shadow" alt="User Image">
            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--begin::User Image-->
            <li class="user-header text-bg-primary">
                <img src="{{ Auth::user()->photo ? url(Auth::user()->photo) : url('/views/img/User_Icon.png') }}" class="rounded-circle shadow" alt="User Image">
                <p>
                {{ Auth::user()->name }} 

                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                </p>
            </li>
            <!--end::User Image-->
            <!--begin::Menu Body-->
            <li class="user-body">
                <!--begin::Row-->
                <div class="row">
                <div class="col-4 text-center"><a href="#">Followers</a></div>
                <div class="col-4 text-center"><a href="#">Sales</a></div>
                <div class="col-4 text-center"><a href="#">Friends</a></div>
                </div>
                <!--end::Row-->
            </li>
            <!--end::Menu Body-->
            <!--begin::Menu Footer-->
            <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
            </li>
            <!--end::Menu Footer-->
            </ul>
        </li>
        <!--end::User Menu Dropdown-->
        <!--begin::Close section-->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            title="close section">
                <i class="bi bi-door-open"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none" class="d-none">
                @csrf
            </form>
        </li>
        <!--end::Close section-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>