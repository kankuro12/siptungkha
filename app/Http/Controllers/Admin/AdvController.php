<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adv;
use Illuminate\Http\Request;

class AdvController extends Controller
{
    public function index(){
        $advs = Adv::all();
        // dd($advs);
        return view('back.adv.list',compact('advs'));
    }

    public function create(){
        return view('back.adv.create');
    }


    public function store(Request $request){
        $adv = new Adv();
        $adv->link = $request->link;
        $adv->image = $request->image->store('back/img/advtise');
        $adv->save();
        return redirect()->back()->with('success','Advertise added successfully !');
    }

    public function delete($id){
        $adv = Adv::find($id);
        $adv->delete();
        return redirect()->back()->with('success','Advertise deleted successfully !');
    }

}
