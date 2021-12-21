<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $video = Video::latest()->get();
        return view('back.video.list',compact('video'));
    }

    public function store(Request $request){
        $video = new Video();
        $video->link = $request->link;
        $video->title = $request->title;
        $video->save();
        return redirect()->back()->with('success','video added successfully !');
    }

    public function delete($id){
        $v = Video::find($id);
        $v->delete();
        return redirect()->back()->with('success','video deleted successfully !');
    }
}
