<?php

namespace App\Http\Controllers\Admin;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWebsitesRequest;
use App\Http\Requests\Admin\UpdateWebsitesRequest;

class WebsitesController extends Controller
{
    /**
     * Display a listing of Website.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request('show_deleted') == 1) {
            if (! Gate::allows('website_delete')) {
                return abort(401);
            }
            $websites = Website::onlyTrashed()->get();
        } else {
            $websites = Website::all();
        }

        return view('admin.websites.index', compact('websites'));
    }

    /**
     * Show the form for creating new Website.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.websites.create');
    }

    /**
     * Store a newly created Website in storage.
     *
     * @param  \App\Http\Requests\StoreWebsitesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebsitesRequest $request)
    {
        $website = Website::create($request->all());



        return redirect()->route('admin.websites.index');
    }


    /**
     * Show the form for editing Website.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $website = Website::findOrFail($id);

        return view('admin.websites.edit', compact('website'));
    }

    /**
     * Update Website in storage.
     *
     * @param  \App\Http\Requests\UpdateWebsitesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebsitesRequest $request, $id)
    {
        $website = Website::findOrFail($id);
        $website->update($request->all());



        return redirect()->route('admin.websites.index');
    }


    /**
     * Display Website.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $website = Website::findOrFail($id);

        return view('admin.websites.show', compact('website'));
    }


    /**
     * Remove Website from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $website = Website::findOrFail($id);
        $website->delete();

        return redirect()->route('admin.websites.index');
    }

    /**
     * Delete all selected Website at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Website::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Website from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $website = Website::onlyTrashed()->findOrFail($id);
        $website->restore();

        return redirect()->route('admin.websites.index');
    }

    /**
     * Permanently delete Website from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $website = Website::onlyTrashed()->findOrFail($id);
        $website->forceDelete();

        return redirect()->route('admin.websites.index');
    }
}
