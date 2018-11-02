@inject('request', 'Illuminate\Http\Request')
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar ">
{{-- @include('newpartials.profile_block') --}}

					<ul class="side-menu">
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-home"></i>
								<span class="side-menu__label">DASHBOARDS</span><i class="angle fa fa-angle-right"></i>
							</a>
							<ul class="slide-menu">
								@can('analytical_dashboard_access')
				                <li class="{{ $request->segment(2) == 'analytical_dashboards' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.analytical_dashboards.index') }}">
				                            <i class="side-menu__icon fa fa-circle-o text-yellow"></i>
				                            <span class="title">
				                                @lang('global.analytical-dashboard.title')
				                            </span>
				                        </a>
				                    </li> 
				                @endcan
								@can('call_metric_access')
				                <li class="{{ $request->segment(2) == 'call_metrics' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.call_metrics.index') }}">
				                            <i class="side-menu__icon fa fa-phone-square text-purple"></i>
				                            <span class="title">
				                                @lang('global.call-metrics.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan 
								@can('adwords_dashboard_access')
				                <li class="{{ $request->segment(2) == 'adwords_dashboards' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.adwords_dashboards.index') }}">
				                            <i class="side-menu__icon fa fa-google text-red"></i>
				                            <span class="title">
				                                @lang('global.adwords-dashboard.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('bookings_dashboard_access')
				                <li class="{{ $request->segment(2) == 'bookings_dashboards' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.bookings_dashboards.index') }}">
				                            <i class="side-menu__icon fa fa-calendar-check-o text-green"></i>
				                            <span class="title">
				                                @lang('global.bookings-dashboard.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
							</ul>
						</li>
						@can('clinic_management_access')
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-area-chart"></i><span class="side-menu__label">@lang('global.clinic-management.title')</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								@can('contact_company_access')
				                <li class="{{ $request->segment(2) == 'contact_companies' ? 'active active-sub' : '' }}">
			                        <a class="slide-item" href="{{ route('admin.contact_companies.index') }}">
			                            <i class="side-menu__icon fa fa-building-o"></i>
			                            <span class="title">
			                                @lang('global.contact-companies.title')
			                            </span>
			                        </a>
			                    </li>
				                @endcan
				                @can('clinic_access')
				                <li class="{{ $request->segment(2) == 'clinics' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.clinics.index') }}">
				                            <i class="side-menu__icon fa fa-map-marker"></i>
				                            <span class="title">
				                                @lang('global.clinics.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('contact_access')
				                <li class="{{ $request->segment(2) == 'contacts' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.contacts.index') }}">
				                            <i class="side-menu__icon fa fa-user-plus"></i>
				                            <span class="title">
				                                @lang('global.contacts.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('location_access')
				                <li class="{{ $request->segment(2) == 'locations' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.locations.index') }}">
				                            <i class="side-menu__icon fa fa-sitemap"></i>
				                            <span class="title">
				                                @lang('global.locations.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('website_access')
				                <li class="{{ $request->segment(2) == 'websites' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.websites.index') }}">
				                            <i class="side-menu__icon fa fa-internet-explorer"></i>
				                            <span class="title">
				                                @lang('global.website.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('analytic_access')
				                <li class="{{ $request->segment(2) == 'analytics' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.analytics.index') }}">
				                            <i class="side-menu__icon fa fa-bar-chart-o"></i>
				                            <span class="title">
				                                @lang('global.analytics.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('adword_access')
				                <li class="{{ $request->segment(2) == 'adwords' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.adwords.index') }}">
				                            <i class="side-menu__icon fa fa-bookmark"></i>
				                            <span class="title">
				                                @lang('global.adwords.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('zipcode_access')
				                <li class="{{ $request->segment(2) == 'zipcodes' ? 'active active-sub' : '' }}">
				                        <a class="slide-item" href="{{ route('admin.zipcodes.index') }}">
				                            <i class="side-menu__icon fa fa-code-fork"></i>
				                            <span class="title">
				                                @lang('global.zipcodes.title')
				                            </span>
				                        </a>
				                    </li>
				                @endcan
				                @can('tracking_number_access')
				                <li>
				                    <a class="slide-item" href="{{ route('admin.tracking_numbers.index') }}">
				                        <i class="side-menu__icon fa fa-gears"></i>
				                        <span>@lang('global.tracking-numbers.title')</span>
				                    </a>
				                </li>
				                @endcan				                
							</ul>
						</li>
						@endcan
            @can('booking_access')
            <li class="slide {{ $request->segment(2) == 'bookings' ? 'active' : '' }}">
                <a class="side-menu__item" href="{{ route('admin.bookings.index') }}">
                    <i class="side-menu__icon fa fa-calendar-plus-o"></i>
                    <span class="side-menu__label">@lang('global.bookings.title')</span>
                </a>
            </li>
            @endcan

            @can('booking_access')
            <li class="slide {{ $request->segment(2) == 'bookings' ? 'active' : '' }}">
                <a class="side-menu__item" href="{{ route('admin.bookings.newindex') }}">
                    <i class="side-menu__icon fa fa-calendar-plus-o"></i>
                    <span class="side-menu__label">new Booking</span>
                </a>
            </li>
            @endcan
@can('user_management_access')
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-calendar"></i><span class="side-menu__label">@lang('global.user-management.title')</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
	 
				                @can('role_access')
				                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
			                        <a class="slide-item" href="{{ route('admin.roles.index') }}">
			                            <i class="side-menu__icon fa fa-briefcase"></i>
			                            <span class="title">
			                                @lang('global.roles.title')
			                            </span>
			                        </a>
			                    </li>
				                @endcan
				                @can('user_access')
				                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
			                        <a class="slide-item" href="{{ route('admin.users.index') }}">
			                            <i class="side-menu__icon fa fa-user"></i>
			                            <span class="title">
			                                @lang('global.users.title')
			                            </span>
			                        </a>
			                    </li>
				                @endcan
				                @can('permission_access')
				                <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
			                        <a class="slide-item" href="{{ route('admin.permissions.index') }}">
			                            <i class="side-menu__icon fa fa-briefcase"></i>
			                            <span class="title">
			                                @lang('global.permissions.title')
			                            </span>
			                        </a>
			                    </li>
				                @endcan
							</ul>
						</li>
@endcan


@can('task_management_access')
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
								<i class="side-menu__icon fa fa-snowflake-o"></i>
								<span class="side-menu__label">@lang('global.task-management.title')</span><i class="angle fa fa-angle-right"></i>
							</a>
							<ul class="slide-menu">
								@can('task_access')
				                <li class="{{ $request->segment(2) == 'tasks' ? 'active active-sub' : '' }}">
				                    <a class="slide-item" href="{{ route('admin.tasks.index') }}">
				                        <i class="side-menu__icon fa fa-briefcase"></i>
				                        <span class="title">
				                            @lang('global.tasks.title')
				                        </span>
				                    </a>
				                </li>
				                @endcan
				                @can('task_status_access')
				                <li class="{{ $request->segment(2) == 'task_statuses' ? 'active active-sub' : '' }}">
				                    <a class="slide-item" href="{{ route('admin.task_statuses.index') }}">
				                        <i class="side-menu__icon fa fa-server"></i>
				                        <span class="title">
				                            @lang('global.task-statuses.title')
				                        </span>
				                    </a>
				                </li>
				                @endcan
				                @can('task_tag_access')
				                <li class="{{ $request->segment(2) == 'task_tags' ? 'active active-sub' : '' }}">
				                    <a class="slide-item" href="{{ route('admin.task_tags.index') }}">
				                        <i class="side-menu__icon fa fa-server"></i>
				                        <span class="title">
				                            @lang('global.task-tags.title')
				                        </span>
				                    </a>
				                </li>
				                @endcan
				                @can('task_calendar_access')
				                <li class="{{ $request->segment(2) == 'task_calendars' ? 'active active-sub' : '' }}">
				                    <a class="slide-item" href="{{ route('admin.task_calendars.index') }}">
				                        <i class="side-menu__icon fa fa-calendar"></i>
				                        <span class="title">
				                            @lang('global.task-calendar.title')
				                        </span>
				                    </a>
				                </li>
				                @endcan
							</ul>
						</li>
@endcan


						 @php ($unread = App\MessengerTopic::countUnread())
						<li class="{{ $request->segment(2) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
						    <a class="side-menu__item" href="{{ route('admin.messenger.index') }}">
						        <i class="side-menu__icon fa fa-envelope"></i>

						        <span>Messages</span>
						        @if($unread > 0)
						            {{ ($unread > 0 ? '('.$unread.')' : '') }}
						        @endif
						    </a>
						</li>
 
			            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
			                <a class="side-menu__item" href="{{ route('auth.change_password') }}">
			                    <i class="side-menu__icon fa fa-key"></i>
			                    <span class="title">@lang('global.app_change_password')</span>
			                </a>
			            </li>

			            <li>
			                <a class="side-menu__item" href="#logout" onclick="$('#logout').submit();">
			                    <i class="side-menu__icon fa fa-arrow-left"></i>
			                    <span class="title">@lang('global.app_logout')</span>
			                </a>
			            </li>

						<li>
							<a class="side-menu__item" href="#"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help & Support</span></a>
						</li>
					</ul>
				</aside>