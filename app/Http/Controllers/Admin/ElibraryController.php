<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elibrary;
use Illuminate\Http\Request;

class ElibraryController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $e = new Elibrary();
        $e->title = $request->title;
        $e->date = $request->date;
        $e->menu_id = $request->menu_id;
        $e->detail = $request->detail;
        $e->file = $request->file->store('back/elibrary/file');
        $e->save();
        return redirect()->back()->with('success','Data addedd successfully!');
    }
}
