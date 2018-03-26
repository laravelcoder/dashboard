<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class LcaDashboardsController extends Controller
{
    public function index()
    {
        return view('admin.lca_dashboards.index');
    }
}
