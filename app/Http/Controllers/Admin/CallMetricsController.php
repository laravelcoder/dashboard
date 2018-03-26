<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CallMetricsController extends Controller
{
    public function index()
    {
        return view('admin.call_metrics.index');
    }
}
