<!-- =========================================================== -->
						<div class="row row-cards">
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-primary card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">Total Bookings
											<i class="fa fa-user-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{{ number_format(@$total_bookings) }}</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-warning card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">Today's Bookings
											<i class="fa fa-heart-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{!! number_format(@$todays_bookings) !!}</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-info card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal mb-3">This Week's Bookings
											<i class="fa fa-comment-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{{ number_format(@$this_weeks_bookings) }}</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-success card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">Bookings This Month
											<i class="fa fa-paper-plane-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0"> {{ number_format(@$this_months_bookings) }}</h2>
									</div>
								</div>
							</div>
						</div>



						<div class="row row-cards">
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-primary card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">Bookings Last Month
											<i class="fa fa-user-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{!! number_format(@$last_months_bookings) !!}</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-warning card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">This Week's Appointments
											<i class="fa fa-heart-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{!! number_format(@$this_weeks_appointments) !!}</h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-info card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal mb-3">This Month's Appointment's
											<i class="fa fa-comment-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{!! number_format(@$this_months_appointments) !!} </h2>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="card bg-success card-img-holder text-white">
									<div class="card-body">
										<img src="assets/images/circle.svg" class="card-img-absolute" alt="circle-image">
										<h4 class="font-weight-normal  mb-3">Last Month's Appointment's
											<i class="fa fa-paper-plane-o fs-30 float-right"></i>
										</h4>
										<h2 class="mb-0">{!! number_format(@$last_months_appointments) !!} </h2>
									</div>
								</div>
							</div>
						</div>

<!-- =========================================================== -->