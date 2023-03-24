<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // return view('genre.index', [
        //     'title' => 'Genre',
        //     'genres' => Genre::withCount('series')->get()
        // ]);
        $genres = Genre::withCount('series')->get();
        return response()->json([
           'data' => $genres
        ]);
    }

    public function getSeries($slug)
    {
        $genre = Genre::with('series.info')->where('slug', $slug)->first();
        $series = $genre->series;
        return response()->json(['data' => $series]);
    }

}
