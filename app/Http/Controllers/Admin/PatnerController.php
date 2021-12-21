<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patner;
use Illuminate\Http\Request;

class PatnerController extends Controller
{
    public function index(){
        $patner = Patner::all();
        return view('back.patner.list',compact('patner'));
    }

    public function store(Request $request){
        $adv = new Patner();
        $adv->link = $request->link;
        $adv->image = $request->image->store('back/img/patner');
        $adv->save();
        return redirect()->back()->with('success','patner added successfully !');
    }

    public function delete($id){
        $adv = Patner::find($id);
        $adv->delete();
        return redirect()->back()->with('success','patner deleted successfully !');
    }
}
