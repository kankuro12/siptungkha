<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
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

    public function eventList(){
        $events = Event::latest()->get();
        return view('front.event.list',compact('events'));
    }



    public function singleEvent($id){
        $event = Event::find($id);
        return view('front.event.single',compact('event'));
    }
}
