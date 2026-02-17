<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
                <i class="fa fa-user fa-2x"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            {{--<div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>--}}
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--<li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class=" nav-link {!! Route::is('dashboard') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog_items')}}" class=" nav-link {!! Route::is('blog_items') || Route::is('create_blog') || Route::is('edit_blog') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Blogs
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('areas_of_focus')}}" class=" nav-link
                        {!!
                        Route::is('areas_of_focus') ||
                        Route::is('create_area_of_focus') ||
                        Route::is('edit_area_of_focus')
                        ? 'active' :null
                        !!}"
                    >
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Areas Of Focus
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_about_page')}}" class=" nav-link {!! Route::is('admin_about_page') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            About Us
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_team_members')}}" class=" nav-link {!! Route::is('admin_team_members') || Route::is('team_member_create') || Route::is('team_member_edit') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Team
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('events')}}" class=" nav-link {!! Route::is('events') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Events
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_slideshow')}}" class=" nav-link {!! Route::is('admin_slideshow') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Slideshow
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('accreditation_items')}}" class=" nav-link {!! Route::is('accreditation_items') || Route::is('create_accreditation') || Route::is('edit_accreditation') ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Accreditations
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_contact_page')}}" class=" nav-link {!! Route::is('admin_contact_page')  ? 'active' :null !!}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Contacts
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('event_regs_index')}}" class=" nav-link
                    {!!
                        Route::is('event_regs_index') ||
                        Route::is('event_view_regs') ||
                        Route::is('event_view_regs')
                        ? 'active' :null
                        !!}"
                    >
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Event Registrations
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('users_index')}}" class=" nav-link
{{--                    <a href="#" class=" nav-link--}}
                    {!!
                        Route::is('users_index')            ||
                        Route::is('users.create')           ||
                        Route::is('users.edit')             ||
                        Route::is('roles.index')            ||
                        Route::is('roles.create')           ||
                        Route::is('roles.edit')             ||
                        Route::is('permissions.index')      ||
                        Route::is('permissions.create')     ||
                        Route::is('permissions.edit')
                        ? 'active' :null
                        !!}"
                    >
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users and Roles
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
