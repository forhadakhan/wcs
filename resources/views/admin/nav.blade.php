<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ml-5" href="/">WCS</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    {{-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form> --}}
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('a/admin/logout')}}"> <i class="fas fa-sign-out-alt"></i> Logout </a>
        </li>
    </ul>
</nav>


<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand ml-5" href="/">WCS</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset(session('LoggedAdminImg'))}}" width="30" height="30" class="rounded-circle">
                {{ explode(" ", $LoggedAdminInfo->name_admin)[0] }}
            </a>
            <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="nav-link pl-4" href="{{url('a/profile')}}"><i class="fas fa-eye"></i> Profile</a></li>
                <li><a class="nav-link pl-4" href="{{url('a/profile/update')}}"><i class="fas fa-edit"></i> Update</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="nav-link pl-4" href="{{url('a/admin/logout')}}"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
            </ul>
        </li>
    </ul>
</nav>

