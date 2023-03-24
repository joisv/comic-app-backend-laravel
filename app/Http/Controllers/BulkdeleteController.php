<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class BulkdeleteController extends Controller
{
    public function delete(Request $request)
    {
        dd($request);
        $ids = $request->input('id');
        Series::destroy($ids);
        return response()->json(['status' => 'success', 'message' => 'Series berhasil dihapus']);
    }


}
