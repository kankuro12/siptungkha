<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\Notice;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{

    public function newsList(){
        $newss = News::latest()->get();
        return view('front.news.list',compact('newss'));
    }

    public function singleNews($id){
        $news = News::find($id);
        return view('front.news.single',compact('news'));
    }

    public function noticeList(){
        $notices = Notice::latest()->get();
        return view('front.notice.list',compact('notices'));
    }

    public function singleNotice($id){
        $notice = Notice::find($id);
        return view('front.notice.single',compact('notice'));
    }

    public function eventList(){
        $events = Event::latest()->get();
        return view('front.event.list',compact('events'));
    }



    public function singleEvent($id){
        $event = Event::find($id);
        return view('front.event.single',compact('event'));
    }
}
