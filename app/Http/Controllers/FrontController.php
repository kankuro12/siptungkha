<?php

namespace App\Http\Controllers;

use App\Models\Adv;
use App\Models\Area;
use App\Models\Download;
use App\Models\Elibrary;
use App\Models\Event;
use App\Models\Galary;
use App\Models\Galaryimage;
use App\Models\Leadership;
use App\Models\Menu;
use App\Models\Menupage;
use App\Models\Message;
use App\Models\News;
use App\Models\Patner;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index(){
        $newstab = News::latest()->take(3)->get();
        $news = News::latest()->get();
        $event = Event::latest()->take(5)->get();
        $activity = Area::latest()->take(5)->get();
        $patner = Patner::all();
        $adv = Adv::all();
        $advs = Adv::latest()->take(4)->get();
        return view('front.index',compact('news','newstab','event','activity','patner','adv','advs'));
    }
    public function aboutUs(){
        return view('front.page.about');
    }
    public function contactUs(){
        return view('front.page.contact');
    }

    public function downloads(){
        $download = Download::latest()->get();
        return view('front.page.download',compact('download'));
    }

    public function videos(){
        $video = Video::latest()->get();
        return view('front.page.video',compact('video'));
    }

    public function gallery(){
        $galleries = Galary::all();
        return view('front.page.gallery',compact('galleries'));
    }

    public function galleryDetail($id){
        $gallery = Galary::find($id);
        $images = Galaryimage::where('galary_id',$id)->get();
        return view('front.page.gallery_detail',compact('gallery','images'));
    }

    public function dynamicPage($id){
        $menu = Menu::where('id',$id)->first();
        $pageIitem = Menupage::where('menu_id',$id)->first();
        $library = Elibrary::latest()->where('menu_id',$id)->get();
        $leader = Leadership::latest()->where('menu_id',$id)->get();
        if($menu->type == 1){
            return view('front.page.dynamic',compact('pageIitem'));
        }else if($menu->type == 2){
            return view('front.page.library',compact('library','menu'));
        }else{
            return view('front.page.leadership',compact('menu','leader'));
        }
    }

    public function message(Request $request){
        $message = New Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->sub = $request->phone;
        $message->detail = $request->message;
        $message->save();
        return redirect()->back()->with('success','Message sent successfully!');
    }


}
