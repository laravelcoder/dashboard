<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactsRequest;
use App\Http\Requests\Admin\UpdateContactsRequest;

class ContactsController extends Controller
{
    /**
     * Display a listing of Contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


                $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating new Contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $companies = \App\ContactCompany::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $clinics = \App\Clinic::get()->pluck('nickname', 'id')->prepend(trans('global.app_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $company_contacts = \App\Contact::get()->pluck('first_name', 'id');


        return view('admin.contacts.create', compact('companies', 'clinics', 'users', 'company_contacts'));
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactsRequest $request)
    {
        $contact = Contact::create($request->all());
        $contact->company_contacts()->sync(array_filter((array)$request->input('company_contacts')));



        return redirect()->route('admin.contacts.index');
    }


    /**
     * Show the form for editing Contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $companies = \App\ContactCompany::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $clinics = \App\Clinic::get()->pluck('nickname', 'id')->prepend(trans('global.app_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $company_contacts = \App\Contact::get()->pluck('first_name', 'id');


        $contact = Contact::findOrFail($id);

        return view('admin.contacts.edit', compact('contact', 'companies', 'clinics', 'users', 'company_contacts'));
    }

    /**
     * Update Contact in storage.
     *
     * @param  \App\Http\Requests\UpdateContactsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactsRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        $contact->company_contacts()->sync(array_filter((array)$request->input('company_contacts')));



        return redirect()->route('admin.contacts.index');
    }


    /**
     * Display Contact.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $companies = \App\ContactCompany::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $clinics = \App\Clinic::get()->pluck('nickname', 'id')->prepend(trans('global.app_please_select'), '');
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $company_contacts = \App\Contact::get()->pluck('first_name', 'id');
$contacts = \App\Contact::whereHas('company_contacts',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$locations = \App\Location::where('contact_person_id', $id)->get();

        $contact = Contact::findOrFail($id);

        return view('admin.contacts.show', compact('contact', 'contacts', 'locations'));
    }


    /**
     * Remove Contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Delete all selected Contact at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Contact::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
