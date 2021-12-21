<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boardmember;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('back.members.list',compact('members'));
    }

    public function create(){
        return view('back.members.add');
    }

    public function store(Request $request){
        $parsed = $request->all();
        $mbrs = new Member();
        $mbrs->name = $parsed['name'];
        $mbrs->address = $parsed['address'];
        $mbrs->phone = $parsed['phone'];
        $mbrs->email = $parsed['email'];
        $mbrs->image = $parsed['image']->store('back/img/member');
        $mbrs->save();
        return redirect()->back()->with('success','Member added successfully !');
    }

    public function edit($id){
        $member = Member::where('id',$id)->first();
        return view('back.members.edit',compact('member'));
    }

    public function update(Request $request, $id){
        $parsed = $request->all();
        $mbrs = Member::where('id',$id)->first();
        $mbrs->name = $parsed['name'];
        $mbrs->address = $parsed['address'];
        $mbrs->phone = $parsed['phone'];
        $mbrs->email = $parsed['email'];

        $mbrs->image = $parsed['image']->store('back/img/member');
        $mbrs->save();
        return redirect()->back()->with('success','Member updated successfully !');
    }

    public function delete($id){
        $news= Member::where('id',$id)->first();
        Boardmember::where('member_id',$id)->delete();
        $news->delete();
        return redirect()->back()->with('success','Member deleted successfully !');
    }




}
