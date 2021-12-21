<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::latest()->get();
        return view('back.event.list',compact('events'));
    }

    public function create(){
        return view('back.event.add');
    }

    public function store(Request $request){
        $parsedBody = $request->all();
        $event = new Event();
        $event->title = $parsedBody['title'];
        $event->descr = $parsedBody['descr'];
        $event->eventtime = $parsedBody['eventtime'];
        $event->eventdate = $parsedBody['eventdate'];
        $event->address = $parsedBody['address'];
        $event->image = $parsedBody['image']->store('back/img/event');
        $event->save();
        return redirect()->back()->with('success','Event added successfully !');
    }

    public function edit($id){
        $event = Event::where('id',$id)->first();
        return view('back.event.edit',compact('event'));
    }

    public function update(Request $request, $id){
        $parsedBody = $request->all();
        $event = Event::where('id',$id)->first();
        $event->title = $parsedBody['title'];
        $event->descr = $parsedBody['descr'];
        $event->eventtime = $parsedBody['eventtime'];
        $event->eventdate = $parsedBody['eventdate'];
        $event->address = $parsedBody['address'];
        if($request->has('image')){
            $event->image = $parsedBody['image']->store('back/img/event');
        }
        $event->save();
        return redirect()->back()->with('success','Event updated successfully !');
    }

    public function delete($id){
        $news= Event::where('id',$id)->first();
        $news->delete();
        return redirect()->back()->with('success','Event deleted successfully !');

    }
}
