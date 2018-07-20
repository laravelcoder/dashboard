<?php

namespace App\Http\Controllers\Api\V1;

use App\TrackingNumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTrackingNumbersRequest;
use App\Http\Requests\Admin\UpdateTrackingNumbersRequest;
use Yajra\DataTables\DataTables;

class TrackingNumbersController extends Controller
{
    public function index()
    {
        return TrackingNumber::all();
    }

    public function show($id)
    {
        return TrackingNumber::findOrFail($id);
    }

    public function update(UpdateTrackingNumbersRequest $request, $id)
    {
        $tracking_number = TrackingNumber::findOrFail($id);
        $tracking_number->update($request->all());
        

        return $tracking_number;
    }

    public function store(StoreTrackingNumbersRequest $request)
    {
        $tracking_number = TrackingNumber::create($request->all());
        

        return $tracking_number;
    }

    public function destroy($id)
    {
        $tracking_number = TrackingNumber::findOrFail($id);
        $tracking_number->delete();
        return '';
    }
}
