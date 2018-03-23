<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocationsRequest;
use App\Http\Requests\Admin\UpdateLocationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocationsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Location.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request('show_deleted') == 1) {
            if (! Gate::allows('location_delete')) {
                return abort(401);
            }
            $locations = Location::onlyTrashed()->get();
        } else {
            $locations = Location::all();
        }

        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating new Location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created Location in storage.
     *
     * @param  \App\Http\Requests\StoreLocationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationsRequest $request)
    {
        $request = $this->saveFiles($request);
        $location = Location::create($request->all());



        return redirect()->route('admin.locations.index');
    }


    /**
     * Show the form for editing Location.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update Location in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $location = Location::findOrFail($id);
        $location->update($request->all());



        return redirect()->route('admin.locations.index');
    }


    /**
     * Display Location.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.locations.show', compact('location'));
    }


    /**
     * Remove Location from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.locations.index');
    }

    /**
     * Delete all selected Location at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Location::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Location from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $location = Location::onlyTrashed()->findOrFail($id);
        $location->restore();

        return redirect()->route('admin.locations.index');
    }

    /**
     * Permanently delete Location from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $location = Location::onlyTrashed()->findOrFail($id);
        $location->forceDelete();

        return redirect()->route('admin.locations.index');
    }
}
