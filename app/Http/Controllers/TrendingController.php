<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
class TrendingController extends Controller
{
    public function trending()
    {
        // return view('trending.index', [
        //     'title' => 'trending',
        //     'series' => Series::with('episodes')
        //            ->orderBy('views', 'desc')
        //            ->take(10)
        //            ->get(),
        // ]);
        $trendings = Series::with('episodes')
        ->orderBy('views', 'desc')
        ->take(10)
        ->get();

        if (count($trendings) > 0) {
            return response()->json([
                "data" => [
                    $trendings
                ]
            ]);
        } else {
            return response()->json([
                "data" => "Data not found"
            ]);
        }

    }
    public function favourite()
    {
        return view('trending.fav', [
            'title' => 'Favourite'
        ]);
    }
}
