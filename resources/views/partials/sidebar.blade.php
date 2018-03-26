@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            
            @can('dashboard_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('global.dashboards.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('lca_dashboard_access')
                <li class="{{ $request->segment(2) == 'lca_dashboards' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.lca_dashboards.index') }}">
                            <i class="fa fa-dashboard"></i>
                            <span class="title">
                                @lang('global.lca-dashboard.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('analytical_dashboard_access')
                <li class="{{ $request->segment(2) == 'analytical_dashboards' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.analytical_dashboards.index') }}">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="title">
                                @lang('global.analytical-dashboard.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('adwords_dashboard_access')
                <li class="{{ $request->segment(2) == 'adwords_dashboards' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.adwords_dashboards.index') }}">
                            <i class="fa fa-google"></i>
                            <span class="title">
                                @lang('global.adwords-dashboard.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('call_metric_access')
                <li class="{{ $request->segment(2) == 'call_metrics' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.call_metrics.index') }}">
                            <i class="fa fa-phone-square"></i>
                            <span class="title">
                                @lang('global.call-metrics.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('bookings_dashboard_access')
                <li class="{{ $request->segment(2) == 'bookings_dashboards' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.bookings_dashboards.index') }}">
                            <i class="fa fa-calendar-check-o"></i>
                            <span class="title">
                                @lang('global.bookings-dashboard.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('clinic_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i>
                    <span class="title">@lang('global.clinic-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('contact_company_access')
                <li class="{{ $request->segment(2) == 'contact_companies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contact_companies.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span class="title">
                                @lang('global.contact-companies.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('clinic_access')
                <li class="{{ $request->segment(2) == 'clinics' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.clinics.index') }}">
                            <i class="fa fa-map-marker"></i>
                            <span class="title">
                                @lang('global.clinics.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('contact_access')
                <li class="{{ $request->segment(2) == 'contacts' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">
                                @lang('global.contacts.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('location_access')
                <li class="{{ $request->segment(2) == 'locations' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.locations.index') }}">
                            <i class="fa fa-sitemap"></i>
                            <span class="title">
                                @lang('global.locations.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('website_access')
                <li class="{{ $request->segment(2) == 'websites' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.websites.index') }}">
                            <i class="fa fa-internet-explorer"></i>
                            <span class="title">
                                @lang('global.website.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('analytic_access')
                <li class="{{ $request->segment(2) == 'analytics' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.analytics.index') }}">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="title">
                                @lang('global.analytics.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('adword_access')
                <li class="{{ $request->segment(2) == 'adwords' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.adwords.index') }}">
                            <i class="fa fa-bookmark"></i>
                            <span class="title">
                                @lang('global.adwords.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('permission_access')
                <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('booking_access')
            <li class="{{ $request->segment(2) == 'bookings' ? 'active' : '' }}">
                <a href="{{ route('admin.bookings.index') }}">
                    <i class="fa fa-calendar-plus-o"></i>
                    <span class="title">@lang('global.bookings.title')</span>
                </a>
            </li>
            @endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

