<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Profile</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsP" aria-expanded="false" aria-controls="collapseLayoutsP">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    {{ explode(" ", $LoggedAdminInfo->name_admin)[0] }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsP" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav font-weight-light">
                        <a class="nav-link" href="{{url('profile/admin')}}">View Profile</a>
                        <a class="nav-link" href="{{url('profile/update')}}">Update Profile</a>
                        <a class="nav-link" href="{{url('admin/logout')}}">Logout</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Lab</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Members
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav font-weight-light">
                        <a class="nav-link" href="{{url('members')}}">All Members</a>
                        <a class="nav-link" href="{{url('applications')}}">Applications</a>
                        <a class="nav-link" href="{{url('members/add')}}">Add Member</a>
                        <a class="nav-link" href="{{url('members/edit')}}">Edit Member</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fas fa-universal-access"></i></div>
                    Admins
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav font-weight-light">
                        <a class="nav-link" href="{{url('admins')}}">All Admins</a>
                        <a class="nav-link" href="{{url('admins/add')}}">Add Admin</a>
                        <a class="nav-link" href="{{url('admins/edit')}}">Edit Admin</a>
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ $LoggedAdminInfo->role_admin }}
        </div>
    </nav>
</div>
