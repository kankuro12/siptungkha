<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    //
    public function index()
    {
        $popups=Popup::all();
        return view('back.popups.index',compact('popups'));
    }

    public function store(Request $request)
    {
       $popup=new Popup();
       $popup->link=$request->link;
       if($request->hasFile('image')){
           $popup->image=$request->image->store('uploads/popup');
       }
       $popup->save();
       return redirect()->back()->with('success','Popup Added Sucessfully');
    }
    public function del($id)
    {
        Popup::where('id',$id)->delete();

       return redirect()->back()->with('success','Popup Deleted Sucessfully');
    }
    public function active($id)
    {
        Popup::where('id','<>',$id)->update(['active'=>0]);
        Popup::where('id',$id)->update(['active'=>1]);
        return redirect()->back()->with('success','Popup Activated Sucessfully');

    }

    public function deactive($id)
    {
        Popup::where('id',$id)->update(['active'=>0]);
        return redirect()->back()->with('success','Popup Activated Sucessfully');

    }


}
