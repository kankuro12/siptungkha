<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;
use App\Models\OtherMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberList(){
        $arr=["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $member = OtherMember::orderBy('company','asc')->get();
        $sorted=$member->groupBy(function ($item, $key) {
            return substr($item['company'], 0,1);
        });

        // dd($sorted);
        return view('front.member.list',compact('sorted','arr'));
    }

    public function boardMember(){
        $board = Board::where('active',1)->first();
        return view('front.member.board',compact('board'));
    }

    public function singleMember($id){
        $member = OtherMember::find($id);
        return view('front.member.single',compact('member'));
    }

}
