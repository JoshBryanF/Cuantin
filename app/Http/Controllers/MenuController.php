<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    //
    public function add_menu(){
        $menus = Menu::All();
        $types = Menu::select('type')->distinct()->get();
        return view('addmenu', compact('menus', 'types'));
    }

    public function insert_menu(Request $req){
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ];
        $message = [
            'image.mimes' => 'the image field must be an image'
        ];

        $validator = Validator::make($req->all(), $rules, $message);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $menu = new Menu();
        $file = $req->file('image');
        $menu->name = $req->name;
        $imagename = $menu->name.'_'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('menu_image/', $file, $imagename);
        $imagename = 'storage/menu_image/'.$imagename;
        $menu->image = $imagename;
        $menu->type = $req->type;
        $menu->description = $req->description;
        $menu->save();
        return redirect()->back()->with('success', 'Menu Added Successfully!');;
    }

    public function edit_menu($id){
        $menu = Menu::find($id);
        $types = Menu::select('type')->distinct()->get();
        return view('editmenu', compact('menu', 'types'));
    }

    public function update_menu($id, Request $req){
        $menu = Menu::find($id);
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ];

        $message = [
            'image.mimes' => 'the image field must be an image'
        ];

        $validator = Validator::make($req->all(), $rules, $message);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $file = $req->file('image');
        $menu->name = $req->name;
        $imagename = $menu->name.'_'.time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('menu_image/', $file, $imagename);
        $imagename = 'storage/menu_image/'.$imagename;
        $menu->image = $imagename;
        $menu->type = $req->type;
        $menu->description = $req->description;
        $menu->save();
        return redirect()->back()->with('success', 'Menu Updated Successfully!');
    }
}
