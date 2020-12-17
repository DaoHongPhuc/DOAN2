<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="#"><i class="ti-home"></i> Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ti-briefcase"></i> Posts <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="{{route('newpost')}}">Add New</a></li>
                                <li><a href="{{route('listallpost')}}">List All</a></li>
                                <li><a href="{{route('listwaitingpost')}}">List Waiting</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="#"><i class="ti-harddrives">
                        </i> Documents <i class="mdi mdi-chevron-down mdi-drop"></i>
                    </a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="{{route('newdocument')}}">Add New</a></li>
                                <li><a href="{{route('listalldocument')}}">List All</a></li>
                                <li><a href="{{route('listwaitingdocument')}}">List Waiting</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ti-files"></i> Category <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li><a href="{{route('listcategory')}}">List Category</a></li>
                                <li><a href="{{route('listlevel')}}">List Level</a></li>
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