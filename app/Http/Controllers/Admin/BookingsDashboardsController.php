<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;
use Yajra\DataTables\DataTables;


class BookingsDashboardsController extends Controller
{
	protected $booking;

	function __construct(Booking $booking)
	{
		$this->booking = $booking;
	}


    /**
     * Display a listing of Booking.
     * TODO NEED TO MAKE IT SELECT ONLY CLINIC_ID IN THE ABOVE SELECTED INPUT.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$totalbookings = App\Booking::whereHas('requested_clinic')->count();
		// $count_preferred = Booking::whereHas('requested_clinic', function($q) use ($request) {
		//     $q->where('question_id', $request->question_id);
		//     $q->where('pref', 1);
		//     $q->orderBy('created_at', 'desc'); // Sort the results by latest added
		// })->get()->count();

		// foreach($count_preferred as $count)
		// {
		//     $count->answers->first(); // Shit should return the last first added item
		// }


        if (! Gate::allows('booking_access')) {
            return abort(401);
        }



        if (request()->ajax()) {
            $query = Booking::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {

        if (! Gate::allows('booking_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'bookings.id',
                'bookings.submitted',
                'bookings.customername',
                'bookings.email',
                'bookings.phone',
                'bookings.family_number',
                'bookings.how_long',
                'bookings.requested_date',
                'bookings.requested_time',
                'bookings.requested_clinic',
                'bookings.clinic_id',
                'bookings.clinic_email',
                'bookings.clinic_address',
                'bookings.clinic_phone',
                'bookings.clinic_text_numbers',
                'bookings.client_firstname',
                'bookings.submitted_user_city',
                'bookings.submitted_user_state',
                'bookings.searched_for',
                'bookings.latitude',
                'bookings.longitude',
                'bookings.country',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'booking_';
                $routeKey = 'admin.bookings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('submitted', function ($row) {
                return $row->submitted ? $row->submitted : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('family_number', function ($row) {
                return $row->family_number ? $row->family_number : '';
            });
            $table->editColumn('how_long', function ($row) {
                return $row->how_long ? $row->how_long : '';
            });
            $table->editColumn('requested_date', function ($row) {
                return $row->requested_date ? $row->requested_date : '';
            });
            $table->editColumn('requested_time', function ($row) {
                return $row->requested_time ? $row->requested_time : '';
            });
            $table->editColumn('requested_clinic', function ($row) {
                return $row->requested_clinic ? $row->requested_clinic : '';
            });
            $table->editColumn('clinic_id', function ($row) {
                return $row->clinic_id ? $row->clinic_id : '';
            });
            $table->editColumn('clinic_email', function ($row) {
                return $row->clinic_email ? $row->clinic_email : '';
            });
            $table->editColumn('clinic_address', function ($row) {
                return $row->clinic_address ? $row->clinic_address : '';
            });
            $table->editColumn('clinic_phone', function ($row) {
                return $row->clinic_phone ? $row->clinic_phone : '';
            });
            $table->editColumn('clinic_text_numbers', function ($row) {
                return $row->clinic_text_numbers ? $row->clinic_text_numbers : '';
            });
            $table->editColumn('client_firstname', function ($row) {
                return $row->client_firstname ? $row->client_firstname : '';
            });
            $table->editColumn('submitted_user_city', function ($row) {
                return $row->submitted_user_city ? $row->submitted_user_city : '';
            });
            $table->editColumn('submitted_user_state', function ($row) {
                return $row->submitted_user_state ? $row->submitted_user_state : '';
            });
            $table->editColumn('searched_for', function ($row) {
                return $row->searched_for ? $row->searched_for : '';
            });
            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : '';
            });
            $table->editColumn('longitude', function ($row) {
                return $row->longitude ? $row->longitude : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.bookings_dashboards.index', compact('totalbookings'));
    }
}
