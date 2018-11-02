				<div class="app-header header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">

							<a class="header-brand" href="{!! url('admin') !!}">
								{{-- <img src="assets/images/brand/logo.png" class="header-brand-img" alt="Viboon logo"> --}}
			{{-- @if(isset($siteTitle)) --}}
               LCA Dashboard 
            {{-- @endif --}}
							</a>

							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class=" ">
	                            {{--  <form class="input-icon mt-2 ">
									<div class="input-icon-addon">
										<i class="fe fe-search"></i>
									</div>
									<input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
								</form> --}}
							</div>
							<div class="d-flex order-lg-2 ml-auto">
								<div class="dropdown d-none d-md-flex mt-1" > 
								</div>
								<div class="dropdown d-none d-md-flex mt-1 country-selector"> 
								</div>
								<div class="dropdown d-none d-md-flex mt-1"> 
								</div>
								<div class="dropdown d-none d-md-flex mt-1"> 
								</div>
								<div class="dropdown d-none d-md-flex mt-1"> 
								</div>
								<div class="dropdown mt-1">
									<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
										<span class="avatar avatar-md brround" style="background-image: url(assets/images/faces/female/25.jpg)"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<div class="text-center">
											<a href="#" class="dropdown-item text-center font-weight-sembold user">Jessica Allan</a>
											<span class="text-center user-semi-title text-dark">web designer</span>
											<div class="dropdown-divider"></div>
										</div>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Profile
										</a>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon  mdi mdi-settings"></i> Settings
										</a>
										<a class="dropdown-item" href="#">
											<span class="float-right"><span class="badge badge-primary">6</span></span>
											<i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
										</a>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
										</a>
										<a class="dropdown-item" href="login.html">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>