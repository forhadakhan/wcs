<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{url('member')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                    Services
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav font-weight-light">
                        <a class="nav-link" href="{{url('#')}}"><i class="fas fa-pen-alt mr-2"></i>Request New Service</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Profile</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsP" aria-expanded="false" aria-controls="collapseLayoutsP">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    {{ explode(" ", $LoggedMemberInfo->name_member)[0] }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsP" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav font-weight-light">
                        <a class="nav-link" href="{{url('member/profile')}}"><i class="fas fa-eye mr-2"></i> View Profile</a>
                        <a class="nav-link" href="{{url('member/update')}}"><i class="fas fa-edit mr-2"></i> Update Profile</a>
                        <a class="nav-link" href="#"><i class="fas fa-lock mr-2"></i> Update Securiy</a>
                        <a class="nav-link" href="{{url('member/logout')}}"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </nav>
                </div>

            </div>
        </div>

    </nav>
</div>
