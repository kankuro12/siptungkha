<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Boardmember;
use App\Models\Callback;
use App\Models\Member;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index(){
        $boards = Board::all();
        return view('back.boardmember.list',compact('boards'));
    }

    public function create(){
        return view('back.boardmember.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $parsed = $request->all();
        $board = new Board();
        $board->startdate = $parsed['startdate'];
        $board->enddate = $parsed['enddate'];
        $board->active = $parsed['active'];
        $board->save();
        return redirect()->back()->with('success','Board added successfully !');
    }

    public function edit($id){
        $board=Board::where('id',$id)->first();
        return view('back.boardmember.edit',compact('board'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $parsed = $request->all();
        $board=Board::where('id',$id)->first();
        $board->startdate = $parsed['startdate'];
        $board->enddate = $parsed['enddate'];
        $board->active = $parsed['active'];
        $board->save();
        return redirect()->back()->with('success','Board Update successfully !');
    }

    public function delete($id){
        $news= Board::where('id',$id)->first();
        $news->delete();
        return redirect()->back()->with('success','Board deleted successfully !');
    }

    public function manage($id){
        $board= Board::where('id',$id)->first();
        $members = Member::all();
        return view('back.boardmember.manage',compact('board','members'));
    }

    public function manageMember(Request $request){
        // dd($request->all());
        $parsed = $request->all();
        $bm = new Boardmember();
        $bm->designation = $parsed['designation'];
        $bm->board_id = $parsed['board_id'];
        $bm->member_id = $parsed['member_id'];
        $bm->save();
        $mem=$bm->member;
        $bm->membername=$mem->name;
        if($mem->password=="" || $mem->password==null){
            $mem->password=md5($mem->phone);
            $mem->save();
        }
        return response()->json(new Callback(['member'=>$bm]));
    }

    public function manageMemberedit(Request $request){
        $parsed = $request->all();
        $bm = Boardmember::find($parsed['id']);
        $bm->designation = $parsed['designation'];
        $bm->save();
        return response()->json(new Callback(['member'=>$bm]));
    }

    public function manageMemberDel(Request $request){
        $parsed = $request->all();
        $bm = Boardmember::find($parsed['id']);
        $bm->delete();
        return response()->json(new Callback(['member'=>$bm]));
    }

}
