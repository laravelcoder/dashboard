<?php

namespace App\Http\Controllers\Admin;

use App\ApiTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreApiTestsRequest;
use App\Http\Requests\Admin\UpdateApiTestsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ApiTestsController extends Controller
{
    /**
     * Display a listing of ApiTest.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('api_test_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('ApiTest.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('ApiTest.filter', 'my');
            }
        }

        
        if (request()->ajax()) {
            $query = ApiTest::query();
            $query->with("created_by");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('api_test_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'api_tests.id',
                'api_tests.submitted_user_city',
                'api_tests.submitted_user_state',
                'api_tests.name',
                'api_tests.subject',
                'api_tests.message',
                'api_tests.created_by_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'api_test_';
                $routeKey = 'admin.api_tests';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('submitted_user_city', function ($row) {
                return $row->submitted_user_city ? $row->submitted_user_city : '';
            });
            $table->editColumn('submitted_user_state', function ($row) {
                return $row->submitted_user_state ? $row->submitted_user_state : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->editColumn('created_by.name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.api_tests.index');
    }

    /**
     * Show the form for creating new ApiTest.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('api_test_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.api_tests.create', compact('created_bies'));
    }

    /**
     * Store a newly created ApiTest in storage.
     *
     * @param  \App\Http\Requests\StoreApiTestsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApiTestsRequest $request)
    {
        if (! Gate::allows('api_test_create')) {
            return abort(401);
        }
        $api_test = ApiTest::create($request->all());



        return redirect()->route('admin.api_tests.index');
    }


    /**
     * Show the form for editing ApiTest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('api_test_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $api_test = ApiTest::findOrFail($id);

        return view('admin.api_tests.edit', compact('api_test', 'created_bies'));
    }

    /**
     * Update ApiTest in storage.
     *
     * @param  \App\Http\Requests\UpdateApiTestsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApiTestsRequest $request, $id)
    {
        if (! Gate::allows('api_test_edit')) {
            return abort(401);
        }
        $api_test = ApiTest::findOrFail($id);
        $api_test->update($request->all());



        return redirect()->route('admin.api_tests.index');
    }


    /**
     * Display ApiTest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('api_test_view')) {
            return abort(401);
        }
        $api_test = ApiTest::findOrFail($id);

        return view('admin.api_tests.show', compact('api_test'));
    }


    /**
     * Remove ApiTest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('api_test_delete')) {
            return abort(401);
        }
        $api_test = ApiTest::findOrFail($id);
        $api_test->delete();

        return redirect()->route('admin.api_tests.index');
    }

    /**
     * Delete all selected ApiTest at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('api_test_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ApiTest::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ApiTest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('api_test_delete')) {
            return abort(401);
        }
        $api_test = ApiTest::onlyTrashed()->findOrFail($id);
        $api_test->restore();

        return redirect()->route('admin.api_tests.index');
    }

    /**
     * Permanently delete ApiTest from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('api_test_delete')) {
            return abort(401);
        }
        $api_test = ApiTest::onlyTrashed()->findOrFail($id);
        $api_test->forceDelete();

        return redirect()->route('admin.api_tests.index');
    }
}
