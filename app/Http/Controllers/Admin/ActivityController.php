<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $areas = Area::latest()->get();
        return view('back.area.list',compact('areas'));
    }

    public function create(){
        return view('back.area.add');
    }

    public function store(Request $request){
        $parsed = $request->all();
        $area = new Area();
        $area->name = $parsed['name'];
        $area->detail = $parsed['detail'];
        $area->image = $parsed['image']->store('back/img/activity');
        $area->save();
        return redirect()->back()->with('success','Activity added successfully!');
    }

    public function edit($id){
        $area = Area::find($id);
        return view('back.area.edit',compact('area'));
    }


    public function update(Request $request,$id){
        $parsed = $request->all();
        $area = Area::find($id);
        $area->name = $parsed['name'];
        $area->detail = $parsed['detail'];
        if($request->has('image')){
            $area->image = $parsed['image']->store('back/img/activity');
        }
        $area->save();
        return redirect()->back()->with('success','Activity updated successfully!');
    }

    public function delete($id){
        $act = Area::find($id);
        $act->delete();
        return redirect()->back()->with('success','Activity deleted successfully!');
    }
}
