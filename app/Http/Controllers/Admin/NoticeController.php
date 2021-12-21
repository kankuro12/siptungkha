<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(){
        $notices = Notice::orderBy('id','desc')->get();
        // dd($news);
        return view('back.notice.list',compact('notices'));
    }

    public function create(){
        return view('back.notice.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $parsed = $request->all();
        $notice = new Notice();
        $notice->title = $parsed['title'];
        $notice->published = $parsed['published'];
        $notice->publisher = $parsed['publisher'];
        $notice->desc = $parsed['desc'];
        $notice->image = $parsed['image']->store('back/img/notice');
        $notice->save();
        return redirect()->back()->with('success','Notice added successfully !');
    }

    public function edit($id){
        $notice= Notice::where('id',$id)->first();
        return view('back.notice.edit',compact('notice'));
    }

    public function update(Request $request, $id){
        $parsed = $request->all();
        $notice= Notice::where('id',$id)->first();

        $notice->title = $parsed['title'];
        $notice->published = $parsed['published'];
        $notice->publisher = $parsed['publisher'];
        $notice->desc = $parsed['desc'];
        if($request->has('image')){
            $notice->image = $parsed['image']->store('back/img/notice');
        }
        $notice->save();
        return redirect()->back()->with('success','Notice updated successfully !');
    }

    public function delete($id){
        $news= Notice::where('id',$id)->first();
        $news->delete();
        return redirect()->back()->with('success','Notice deleted successfully !');

    }
}
