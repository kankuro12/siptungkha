<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{

    public function edit(Leadership $leader,Request $request){
        if($request->getMethod()=="GET"){
            return view('back.menu.leadership',compact('leader'));
        }else{
            $leader->name = $request->name;
            $leader->designation = $request->designation;
            $leader->gmail = $request->email;
            $leader->phone = $request->phone;
            $leader->addresss = $request->address;
            $leader->sn = $request->sn??0;
            if($request->hasFile('image')){
                $leader->image = $request->image->store('back/img/leadership');
            }
            $leader->website = $request->website;
            $leader->save();
            return redirect()->route('admin.menu.manage',['id'=>$leader->menu_id])->with('success','Member added successfully !');
        }
    }
    public function store(Request $request){
        // dd($request->all());
        $leader = new Leadership();
        $leader->name = $request->name;
        $leader->designation = $request->designation;
        $leader->gmail = $request->email;
        $leader->phone = $request->phone;
        $leader->addresss = $request->address;
        $leader->sn = $request->sn??0;
        $leader->menu_id = $request->menu_id;
        if($request->hasFile('image')){
            $leader->image = $request->image->store('back/img/leadership');
        }
        $leader->website = $request->website;
        $leader->save();
        return redirect()->back()->with('success','Member added successfully !');

    }

    public function delete($id){
        $le = Leadership::find($id);
        $le->delete();
        return redirect()->back()->with('success','Deleted successfully !');
    }
}
