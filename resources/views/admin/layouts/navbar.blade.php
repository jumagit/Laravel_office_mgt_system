<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                
                <a href="index.html" class="logo">
                    <img src="assets/images/nuglogo.png" style="width:100px;height:90px" alt="" class="logo-small">
                    <img src="assets/images/nuglogo.png" alt="" class="logo-large">
                </a>

            </div>

            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="navbar-right d-flex list-inline float-right mb-0">
                    <li class="dropdown notification-list d-none d-sm-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0"> 
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form> 
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell noti-icon"></i>
                            <span class="badge badge-pill badge-info noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (37)
                            </h6>
                            <div class="slimscroll notification-item-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-flag"></i></div>
                                    <p class="notify-details">Your item is shipped<span class="text-muted">It is a long established fact that a reader will</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<span class="text-muted">You have 87 unread messages</span></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>        
                    </li>


  
                @if (Auth::guest())
               
            @else
                    <li class="dropdown notification-list">
                        <div class="dropdown notification-list">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                              <span class="text-white"> {{ Auth::user()->name }}</span> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                            <a class="dropdown-item" href="{{ route('user.profile.show')}}"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('settings')}}"><i class="mdi mdi-settings m-r-5"></i> Settings</a>
                            <a class="dropdown-item" href="{{ route('changepassword')}}"><i class="mdi mdi-lock m-r-5"></i> Change Password</a>
                            
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="dropdown-item text-danger">
                                <i class="mdi mdi-power text-danger"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                
                            </div>                                                                    
                        </div>
                    </li>
                @endif
                
                
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>



            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home"></i>Dashboard</a>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-box"></i>User Management</a>
                        <ul class="submenu">
                        <li><a href="{{ route('users')}}">View All Users</a></li>
                        <li><a href="{{ route('user.trashed')}}">View Trashed Users</a></li>
                        <li><a href="{{ route('users.create') }}">Register User</a></li>
                        </ul>
                    </li>

                    
                    <li class="has-submenu">
                        <a href="#"><i class="fas fa-th"></i>Project Management</a>

                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="{{ route('projects') }}">View All Projects</a></li>                                   
                                    <li><a href="{{ route('categories') }}">Project Categories</a></li>
                                    <li><a href="{{ route('inactiveProjects') }}">Inactive Projects</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="{{ route('projects.create') }}">Register Project</a></li> 
                                    <li><a href="{{ route('categories.create') }}">Create category</a></li>
                                </ul>
                            </li>
                        </ul>
                      
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="fas fa-users"></i>Client Management</a>
                        <ul class="submenu">
                            <li><a href="{{ route('clients.main') }}">View All Clients</a></li>
                            <li><a href="{{ route('clients') }}">Create Client</a></li>
                        </ul>
                    </li>



                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-credit-card"></i>Sales Management</a>
                        <ul class="submenu">
                            <li><a href="{{ route('sales') }}">View All Sales</a></li>
                            <li><a href="{{ route('sales.subscribers') }}">View All Subscribers</a></li>                           
                            <li><a href="{{ route('sales.create') }}">Create Sale</a></li>
                        </ul>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-finance"></i> Payments Management <span class="badge badge-danger"><small class="text-white">1</small></span> | <span class="badge badge-primary"><small class="text-white">4</small></span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('sales.creditors') }}" ><small class="badge badge-primary"><small class="text-white lead">4</small></small> Creditors  </a></li>
                            <li><a href="{{ route('sales.debtors') }}"><small class="badge badge-danger"><small class="text-white lead">1</small></small>Debtors </a></li>
                        </ul>
                    </li>



                  

             

             
{{--                    

                    <li class="has-submenu">
                        <a href="#"><i class="fas fa-users"></i>Client Management</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="{{ route('clients') }}">View All Clients</a></li>
                                    <li><a href="{{ route('clients.active') }}">Continuing Clients</a></li>                                   
                                    {{-- <li><a href="{{ route('ctypes') }}">View Client Types</a></li> --}}
                                   
                                {{-- </ul>
                            </li>
                            <li>
                                <ul> --}}
                                    {{-- <li><a href="{{ route('ctype.create') }}">Register Client Type</a></li> --}}
                                    {{-- <li><a href="{{ route('clients.create') }}">Register Client</a></li>
                                </ul>
                            </li>
                        </ul>
                      
                    </li> --}} 

                 


                   



                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>