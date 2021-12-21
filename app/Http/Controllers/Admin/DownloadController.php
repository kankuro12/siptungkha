<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(){
        $download = Download::latest()->get();
        return view('back.download.list',compact('download'));
    }

    public function store(Request $request){
        $d = new Download();
        $d->title = $request->title;
        $d->file = $request->file->store('back/file/download');
        $d->save();
        return redirect()->back()->with('success','Download addedd successfully !');
    }

    public function delete($id){
        $d = Download::find($id);
        $d->delete();
        return redirect()->back()->with('success','Download addedd successfully !');
    }
}
