<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Allen Moreno</p>
                    <p class="designation">Administrator</p>
                </div>
                <div class="icon-container">
                    <i class="icon-bubbles"></i>
                    <div class="dot-indicator bg-danger"></div>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Driver Info</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('driver_list')}}">
                <span class="menu-title">Driver Info</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Passenger Info</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('passenger_list')}}">
                <span class="menu-title">Passenger Info</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>

        <li class="nav-item nav-category">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" href="../../pages/tables/report.html">
                <span class="menu-title">Reports</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Driver Report</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Passenger Report</a></li>
                </ul>
            </div>
        </li>
        {{--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>--}}
        <li class="nav-item nav-category">
            <span class="nav-link">Driver Register</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('driver_registration')}}">
                <span class="menu-title">Driver Register</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
