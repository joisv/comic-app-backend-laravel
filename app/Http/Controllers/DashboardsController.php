<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class DashboardsController extends Controller
{
    public function index()
    {
        $counts = DB::table('series')
            ->selectRaw('count(*) as series_count, sum(views) as views_count')
            ->first();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'counts' => $counts
        ]);
    }
}
