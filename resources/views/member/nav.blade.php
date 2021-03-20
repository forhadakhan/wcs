
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand ml-5" href="/">WCS</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset(session('LoggedMemberImg')) }}" width="30" height="30" class="rounded-circle">
                {{ explode(" ", $LoggedMemberInfo->name_member)[0] }}
            </a>
            <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="nav-link pl-4" href="{{url('member/profile')}}"><i class="fas fa-eye"></i> Profile</a></li>
                <li><a class="nav-link pl-4" href="{{url('member/update')}}"><i class="fas fa-edit"></i> Update</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="nav-link pl-4" href="{{url('member/logout')}}"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
            </ul>
        </li>
    </ul>
</nav>


