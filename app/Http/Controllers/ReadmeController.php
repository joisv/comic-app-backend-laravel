<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class ReadmeController extends Controller
{
    public function index(Episode $episode)
    {
        return response()->json([
            'nextepisode' => $episode->where('series_id',           $episode->series_id)
            ->where('slug', '>', $episode->slug)
            ->first(),
            'embeds' => $episode->embeds->load('episode'),
            'readareas' => $episode->readmes,
        ]);
        
    }
}
