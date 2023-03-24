<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($categ)
    {
        switch ($categ) {
            case 'series':
                $data = Series::with('genres','info')
                    ->orderBy('created_at', 'desc')
                    ->take(11)
                    ->get();
                break;
            case 'episodes':
                $data = Episode::with('series.genres', 'series.info')->latest()
                    ->take(10)
                    ->get();
                break;
            default:
                return response()->json([
                    "error" => "Invalid category"
                ], 400);
        }
        return response()->json($data);
    
    
        // return view('home.index',[
        //     'title' => 'Manga-App',
        //     'series' => $series,
        //     'episodes' => $episodes
        // ]);
    }

    public function show(Series $series)
    {
        // if ($series->views == null) {
        //     $series->views = 1;
        //   } else {
        //     $series->views += 1;
        //   }
        //   $series->save();
        return response()->json([
            "series" => $series->load('episodes','genres', 'info'),
            "episodes" => $series->episodes->load('embeds')
        ]);        
    }
    public function search($query)
    {
        $output = [];
        $series = Series::where('title', 'like', '%'.$query.'%')->get();
        if(count($series) > 0) {
            foreach ($series as $item) {
                $output_item = [
                    'title' => $item->title,
                    'slug' => $item->slug,
                ];
                if($item->info) {
                    $output_item['info'] = $item->info->type;
                } else {
                    $output_item['info'] = 'N/A';
                }
                $output[] = $output_item;
            }
            return response()->json( $output);
        } else {
            return response()->json('Data Not Found');
        }

    }
}
