<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function updateEnabled(Request $request)
    {
        $item = DB::table($request->table)
                        ->where('id', $request->id)
                        ->update(['enabled' => $request->enabled]);
        
        return response($item);
    }
}
