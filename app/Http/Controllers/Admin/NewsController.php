<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galary;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('id','desc')->get();
        // dd($news);
        return view('back.news.list',compact('news'));
    }

    public function create(){
        return view('back.news.add',['galaries'=>Galary::all()]);
    }

    public function store(Request $request){
        // dd($request->all());
        $parsed = $request->all();
        $news = new News();
        $news->title = $parsed['title'];
        $news->publisher = $parsed['publisher'];
        $news->published = $parsed['published'];
        $news->descr = $parsed['descr'];
        $news->galary_id = null;
        $news->image = $parsed['image']->store('back/img/news');
        $news->save();
        return redirect()->back()->with('success','News added successfully !');
    }

    public function edit($id){
        $news= News::where('id',$id)->first();
        $galaries = Galary::all();
        return view('back.news.edit',compact('news','galaries'));
    }

    public function update(Request $request, $id){
        $parsed = $request->all();
        $news= News::where('id',$id)->first();
        $news->title = $parsed['title'];
        $news->publisher = $parsed['publisher'];
        $news->published = $parsed['published'];
        $news->descr = $parsed['descr'];
        $news->galary_id = null;
        if($request->has('image')){
            $news->image = $parsed['image']->store('back/img/news');
        }
        $news->save();
        return redirect()->back()->with('success','News updated successfully !');
    }

    public function delete($id){
        $news= News::where('id',$id)->first();
        $news->delete();
        return redirect()->back()->with('success','News deleted successfully !');

    }
}
