<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBookingsRequest;
use App\Http\Requests\Admin\UpdateBookingsRequest;
use Yajra\DataTables\DataTables;

class BookingsController extends Controller
{
    /**
     * Display a listing of Booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        
        if (request()->ajax()) {
            $query = Booking::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
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

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.bookings.index');
    }

    /**
     * Show the form for creating new Booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bookings.create');
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param  \App\Http\Requests\StoreBookingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingsRequest $request)
    {
        $booking = Booking::create($request->all());



        return redirect()->route('admin.bookings.index');
    }


    /**
     * Show the form for editing Booking.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update Booking in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingsRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());



        return redirect()->route('admin.bookings.index');
    }


    /**
     * Display Booking.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.bookings.show', compact('booking'));
    }


    /**
     * Remove Booking from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index');
    }

    /**
     * Delete all selected Booking at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Booking::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Booking from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $booking = Booking::onlyTrashed()->findOrFail($id);
        $booking->restore();

        return redirect()->route('admin.bookings.index');
    }

    /**
     * Permanently delete Booking from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $booking = Booking::onlyTrashed()->findOrFail($id);
        $booking->forceDelete();

        return redirect()->route('admin.bookings.index');
    }
}
