<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardgenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::select('name', 'created_at', 'slug')->orderBy('created_at', 'desc')->paginate(10)->onEachSide(2);
        return view('dashboard.genre.index',[
            'title' => 'New Genre',
            'genres' => $genre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.genre.create',[
            'title' => 'New Genre'
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
            'name' => 'required|unique:genres',
            'slug' => 'required|unique:genres'
        ]);

        Genre::create($validateData);
        return redirect('/dashboard/genre')->with('succes', 'New Genre Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('dashboard.genre.edit',[
            'title' => 'Edit Genre',
            'genres' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $rules = [
            'name' => 'required|max:255',
        ];
        
        if($request->slug != $genre->slug)
        {
            $rules['slug'] =  'required|unique:series';
        }

        $validateData = $request->validate($rules);
        Genre::where('id', $genre->id)->update($validateData);
        
        return redirect('/dashboard/genre')->with('succes', 'Genre Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
       Genre::destroy($genre->id);
       return redirect('/dashboard/genre')->with('deleted','Genre Deleted');
    }

    public function search(Request $request)
    {
        $output= '';
        $series = Genre::where('name', 'like', '%'.$request->search.'%')->get();
      
        foreach($series as $item){
            $output.='<tr>
            <td>'.'1'.'</td>
            <td> '.'<a href="/dashboard/series/'.$item->slug.'/edit">'.$item->name.'</a> </td>
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
