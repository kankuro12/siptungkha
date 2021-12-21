<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherMember;
use Illuminate\Http\Request;

class OtherMemberController extends Controller
{
    public function index(){
        $members = OtherMember::all();
        return view('back.other_member.list',compact('members'));
    }

    public function create(){
        return view('back.other_member.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $member = new OtherMember();
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->gmail = $request->email;
        $member->addresss = $request->address;
        $member->phone = $request->phone;
        $member->memberid = $request->memberid;
        $member->website = $request->website;
        $member->company = $request->company;
        if($request->hasFile('image')){
            $member->image = $request->image->store('back/img/others/member');
        }
        $member->save();
        return redirect()->back()->with('success','Added successfully !');
    }

    public function edit($id){
        $member = OtherMember::find($id);
        return view('back.other_member.edit',compact('member'));
    }

    public function update(Request $request,$id){
        $member = OtherMember::find($id);
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->gmail = $request->email;
        $member->addresss = $request->address;
        $member->phone = $request->phone;
        $member->memberid = $request->memberid;
        $member->website = $request->website;
        $member->company = $request->company;
        if($request->has('image')){
            $member->image = $request->image->store('back/img/others/member');
        }
        $member->save();
        return redirect()->back()->with('success','Updated successfully !');
    }

    public function delete($id){
        $member = OtherMember::find($id);
        $member->delete();
        return redirect()->back()->with('success','Deleted successfully !');
    }

}
