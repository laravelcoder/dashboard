<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;


class BookingsDashboardsController extends Controller
{
	protected $booking;

	function __construct(Booking $booking)
	{
		$this->booking = $booking;
	}

    public function index()
    {
    	$bookings = $this->booking->all();


        return view('admin.bookings_dashboards.index', compact('bookings'));
    }
}
