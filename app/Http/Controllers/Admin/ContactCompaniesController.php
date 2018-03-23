<?php

namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactCompaniesRequest;
use App\Http\Requests\Admin\UpdateContactCompaniesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ContactCompaniesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of ContactCompany.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


                $contact_companies = ContactCompany::all();

        return view('admin.contact_companies.index', compact('contact_companies'));
    }

    /**
     * Show the form for creating new ContactCompany.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_companies.create');
    }

    /**
     * Store a newly created ContactCompany in storage.
     *
     * @param  \App\Http\Requests\StoreContactCompaniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactCompaniesRequest $request)
    {
        $request = $this->saveFiles($request);
        $contact_company = ContactCompany::create($request->all());



        return redirect()->route('admin.contact_companies.index');
    }


    /**
     * Show the form for editing ContactCompany.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact_company = ContactCompany::findOrFail($id);

        return view('admin.contact_companies.edit', compact('contact_company'));
    }

    /**
     * Update ContactCompany in storage.
     *
     * @param  \App\Http\Requests\UpdateContactCompaniesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactCompaniesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->update($request->all());



        return redirect()->route('admin.contact_companies.index');
    }


    /**
     * Display ContactCompany.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = \App\Contact::where('company_id', $id)->get();

        $contact_company = ContactCompany::findOrFail($id);

        return view('admin.contact_companies.show', compact('contact_company', 'contacts'));
    }


    /**
     * Remove ContactCompany from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->delete();

        return redirect()->route('admin.contact_companies.index');
    }

    /**
     * Delete all selected ContactCompany at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ContactCompany::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
