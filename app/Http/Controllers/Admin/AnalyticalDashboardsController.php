<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class AnalyticalDashboardsController extends Controller
{
    public function index()
    {
        return view('admin.analytical_dashboards.index');
    }
}
