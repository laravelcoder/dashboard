<?php

namespace App\Http\Controllers\Api\V1;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocationsRequest;
use App\Http\Requests\Admin\UpdateLocationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocationsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Location::all();
    }

    public function show($id)
    {
        return Location::findOrFail($id);
    }

    public function update(UpdateLocationsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $location = Location::findOrFail($id);
        $location->update($request->all());
        

        return $location;
    }

    public function store(StoreLocationsRequest $request)
    {
        $request = $this->saveFiles($request);
        $location = Location::create($request->all());
        

        return $location;
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return '';
    }
}
