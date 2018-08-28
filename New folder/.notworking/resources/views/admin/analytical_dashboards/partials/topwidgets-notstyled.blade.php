<div class="row">
	<div class="col-sm-12">
		<div class="row space12">
			<ul class="mini-stats col-sm-12">
				<li class="col-sm-4">
					<div class="values alert alert-info">
						<strong>{{ $online }}</strong>
						Active Users right now
					</div>
				</li>
				<li class="col-sm-4">
					<div class="values alert alert-success">
						<strong>{{$total_visitors}}</strong>
						Visitors
					</div>
				</li>
				<li class="col-sm-4">
					<div class="values alert alert-danger">
						<strong>{{$total_pageviews}}</strong>
						Pageviews
					</div>
				</li>
				{{-- <li class="col-sm-4"> <div class="values alert alert-warning"> <strong> </strong> Customers </div> </li> --}}
				{{-- <li class="col-sm-4"> <div class="values alert alert-info"> <strong> </strong> Orders </div> </li> --}}
				{{-- <li class="col-sm-4"> <div class="values alert alert-success"> <strong> </strong> Revenue </div> </li> --}}
			</ul>
		</div>
	</div>
</div>