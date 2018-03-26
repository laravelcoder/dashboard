<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class DashboardsController extends Controller
{
    public function index()
    {
        return view('admin.dashboards.index');
    }
}
