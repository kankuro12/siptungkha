<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elibrary;
use App\Models\Leadership;
use App\Models\Menu;
use App\Models\Menupage;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('back.menu.list', compact('menu'));
    }

    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->parent_id = $request->parent_id;
        $menu->type = $request->type;
        $menu->link = $request->link;
        $menu->save();
        if ($menu->type == 1) {
            $page = new Menupage();
            $page->title = "Demo Test";
            $page->detail = "Demo Test";
            $page->subdetail = "Demo Test";
            $page->menu_id = $menu->id;
            $page->save();
        }
        return redirect()->back()->with('success', 'Menu added successfully.');
    }

    public function updateLink($id,Request $request)
    {
        Menu::where('id',$id)->update(['link'=>$request->link]);
        return redirect()->back()->with('success', 'Link updated successfully.');

    }
    public function delete($id)
    {
        $menu = Menu::where('id', $id)->first();
        // if($menu->type == 1){
        $page = Menupage::where('menu_id', $id)->first();
        if ($page != null) {

            $page->delete();
        }
        // }
        // else if($menu->type ==2){
        //    return redirect()->back()->with('warning','You con not delete this one!.');
        // }else{
        //    return redirect()->back()->with('warning','You con not delete this one!.');
        // }
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully.');
    }


    public function manage($id)
    {
        $menu = Menu::find($id);
        // dd($page);
        if ($menu->type == 1) {
            $page = Menupage::where('menu_id', $menu->id)->first();
            return view('back.menu.manage', compact('menu', 'page'));
        } else if ($menu->type == 2) {
            $elibrary = Elibrary::latest()->where('menu_id', $id)->get();
            return view('back.menu.manage1', compact('menu', 'elibrary'));
        } else {
            $leaders = Leadership::latest()->where('menu_id', $id)->get();
            return view('back.menu.manage2', compact('menu', 'leaders'));
        }
    }

    public function manageUpdate(Request $request, $id)
    {
        $page = Menupage::find($id);
        $page->title = $request->title;
        $page->detail = $request->detail;
        $page->subdetail = $request->subdetail;
        $page->image = $request->image->store('back/img/pages');
        $page->save();
        return redirect()->back()->with('success', 'Menu page updated successfully.');
    }

    public function managePage()
    {
        return view('back.menu.manage_page');
    }
}
