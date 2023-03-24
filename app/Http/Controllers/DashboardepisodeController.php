<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Models\Readme;
use App\Models\Embed;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class DashboardepisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episode = Episode::with('series')->orderBy('created_at', 'desc')->paginate(10)->onEachSide(2);
        return view('dashboard.episode.index',[
            'title' => 'New Episode',
            'episodes' => $episode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nextId = Episode::nextId();   
        return view('dashboard.episode.create', [
            'title' => 'New Episode',
            'series' => Series::all(),
            'latestIdUsingOrderBy' => $nextId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:episodes',
            'series_id' => 'required',
            'embed' => 'nullable|max:255'
        ]);
      
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'episode_id' => 'required|integer',
                'image' => 'required|array|min:1',
                // 'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
        
            foreach($request->file('image') as $file){
                $imagePath = $file->store('readareas-images');
        
                $readme = new Readme;
                $readme->episode_id = $request->episode_id;
                $readme->image = $imagePath;
                $readme->save();
            }
        }
        if (is_array($request->input('embed'))) {
            foreach($request->input('embed') as $link) {
                $embed = new Embed;
                $embed->episode_id = $request->episode_id;
                $embed->embed = $link;
                $embed->save();
            }
        }
        Episode::create($validateData);

        return redirect('/dashboard/episode')->with('succes', 'New Episode added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
       
        $nextId = Episode::nextId();  
        return view('dashboard.episode.edit',[
            'title' => 'Edit Episode',
            'episode' => $episode,                                                                                        
            'serieses' => Series::all(),
            'userid' => $nextId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode){
        $rules = [
            'title' => 'required|max:255',
            'series_id' => 'required'
        ];
        
        if($request->slug != $episode->slug)
        {
            $rules['slug'] =  'required|unique:episode';
        }

        if(!$episode->embeds){
            return back()->withErrors(['message' => 'No embeds found for this episode.']);
        }
      

        $validator = Validator::make($request->all(), [
            'image' => 'array|min:1',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        if ($request->hasFile('image')) {
            $i = 0;
            foreach($request->file('image') as $file){
                if (isset($episode->readme[$i])) {
                    $imagePath = $file->store('readareas-images');
                    $episode->readme[$i]->image = $imagePath;
                    $episode->readme[$i]->save();
                } else {
                    $imagePath = $file->store('readareas-images');
                    $readme = new Readme;
                    $readme->episode_id = $episode->id;
                    $readme->image = $imagePath;
                    $readme->save();
                }
                $i++;
            }
        }        
        
        $validateData = $request->validate($rules);

        if (is_array($request->input('embed'))) {
            $i = 0;
            foreach ($request->input('embed') as $link) {
                if (isset($episode->embeds[$i])) {
                    $episode->embeds[$i]->embed = $link;
                    $episode->embeds[$i]->save();
                } else {
                    $embed = new Embed;
                    $embed->episode_id = $episode->id;
                    $embed->embed = $link;
                    $embed->save();
                }
                $i++;
            }
        
        Episode::where('id', $episode->id)->update($validateData);
        return redirect('/dashboard/episode')->with('succes', 'episode Updated');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        Episode::destroy($episode->id);
        $images = Readme::where('episode_id', $episode->id)->get();
        
        $embeds = $episode->embeds;
        foreach($embeds as $embed) {
            $embed->delete();
        }
        // Hapus file gambar dari filesystem
        foreach ($images as $image) {
            if (Storage::exists($image->image)) {
                Storage::delete($image->image);
            }
        }
        
        // Hapus entri gambar dari database
        Readme::where('episode_id', $episode->id)->delete();

        return redirect('/dashboard/episode')->with('deleted','Series Deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Episode::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    public function search(Request $request)
    {
        $output= '';
        $series = Episode::where('title', 'like','%'.$request->search.'%')->get();
        foreach($series as $item){
            $output.='<tr>
            <td>'.'1'.'</td>
            <td> '.'<a href="/dashboard/series/'.$item->slug.'/edit">'.$item->title.'</a> </td>
            <td>'.$item->created_at->format('Y-m-d').'</td>
            <td class="flex mt-2">'.'<a href="/dashboard/series/'.$item->slug.'/edit">'.
            '<span class="material-icons-sharp">'.
                'edit_note'.
            '</span>'.
            '</a>'.
            '</tr>';
        }
        if(count($series)>0){
            return response()->json(['data' => $output]);
        }else{
            return response()->json(['data' => 'Data tidak ditemukan']);
        }
    }
}
