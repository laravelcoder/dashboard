<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

use App\Booking;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Blade;


class LcaDashboardsController extends Controller
{
    /**
     * @var mixed
     */
    protected $bookings;

    /**
     * @param Booking $bookings
     */
    public function __construct(Booking $bookings)
    {
        $this->booking = $bookings;
    }

    public function index()
    {
 		$total_bookings = Booking::all()->count();


        return view('admin.lca_dashboards.index', compact('total_bookings'));
    }
}
