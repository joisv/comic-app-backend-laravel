<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Series;
use App\Models\Info;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardseriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::select('title', 'created_at', 'slug', 'id')->orderBy('created_at', 'desc')->paginate(5)->onEachSide(2)->fragment('series');

        return view('dashboard.series.index',[
            'title' => 'New Series',
            'posts' => $series
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.series.create',[
            'title' => 'New Series',
            'genres' => Genre::all(),
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
            'slug' => 'required|unique:series',
            'body' => 'nullable',
            'name' => 'required',
            'image' => 'image|file|max:2048',
            'status' => 'nullable',
            'type' => 'nullable',
            'rating' => 'nullable',
            'author' => 'nullable',
        ]);
        // if($request->file('image')){
        //     $validateData['image'] = $request->file('image')->store('series-images');
        // }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.webp';
            $img = Image::make($image->getRealPath())->encode('webp', 50);
            $path = $image->storeAs('series-images', $name, 'public');
            Storage::put($path, (string) $img);
            $validateData['image'] = $path;
        }
        
        $series = new Series();
        $series->title = $request->title;
        $series->slug = $request->slug;
        $series->body = $request->body;
        $series->image = $validateData['image'];
        $series->save();
 
        $info = new Info;
        $info->series_id = $series->id;
        $info->status = $request->status;
        $info->author = $request->author;
        $info->type = $request->type;
        $info->rating = $request->rating;
        $info->save();
        $series->genres()->sync($request->name);
        return redirect('/dashboard/series')->with('succes', 'New Series added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        return view('dashboard.series.edit',[
            'title' => 'New Series',
            'series' => $series,
            'genres' => Genre::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'name' => 'required|array',
            'status' => 'required'
            
        ];
        
        if($request->slug != $series->slug)
        {
            $rules['slug'] =  'required|unique:series';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if ($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $image = $request->file('image');
            $name = time().'.webp';
            $img = Image::make($image->getRealPath())->encode('webp', 50);
            $path = $image->storeAs('series-images', $name, 'public');
            Storage::put($path, (string) $img);
            $validateData['image'] = $path; 
        }

        $series->update($validateData);
        $info = $series->info;
        if($info != null){
            $info->status = $request->status;
            $info->author = $request->author;
            $info->type = $request->type;
            $info->rating = $request->rating;
            $info->save();
        }        
        $series->genres()->sync($request->name);

        return redirect('/dashboard/series')->with('succes', 'Series Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        $info = Info::where('series_id',$series->id)->first();
        $info->delete();

        if ($series->image)
        {
         Storage::delete($series->image);
        }
        Series::destroy($series->id);
        return redirect('/dashboard/series')->with('deleted','Series Deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Series::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function search(Request $request)
    {
        $output= '';
        $series = Series::where('title', 'like', '%'.$request->search.'%')->get();
      
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
    // orWhere('created_at', 'Like','%'.$request->search,'%')
}
