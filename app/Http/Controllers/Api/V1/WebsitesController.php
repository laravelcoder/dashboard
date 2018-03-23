<?php

namespace App\Http\Controllers\Api\V1;

use App\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWebsitesRequest;
use App\Http\Requests\Admin\UpdateWebsitesRequest;

class WebsitesController extends Controller
{
    public function index()
    {
        return Website::all();
    }

    public function show($id)
    {
        return Website::findOrFail($id);
    }

    public function update(UpdateWebsitesRequest $request, $id)
    {
        $website = Website::findOrFail($id);
        $website->update($request->all());
        

        return $website;
    }

    public function store(StoreWebsitesRequest $request)
    {
        $website = Website::create($request->all());
        

        return $website;
    }

    public function destroy($id)
    {
        $website = Website::findOrFail($id);
        $website->delete();
        return '';
    }
}
