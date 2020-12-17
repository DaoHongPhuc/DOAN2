<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="index.html"><i class="ti-home"></i> Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ti-briefcase"></i> Posts <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="{{route('newpost')}}">Add New</a></li>
                                <li><a href="{{route('listallpost')}}">List All</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-harddrives"></i> Account <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu">
                        <li class="has-submenu">
                            <a href="#">Icons</a>
                            <ul class="submenu">
                                <li><a href="icons-material.html">Material Design</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
               
                <li class="has-submenu">
                    <a href="{{route('myinformation')}}"><i class="ti-user"></i> My Information </a>
                </li>
            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->