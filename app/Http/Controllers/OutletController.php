<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Outlet;

class OutletController extends Controller
{
    //
    public function add_outlet(){
        $outlets = Outlet::All();
        return view('addoutlet', compact('outlets'));
    }

    public function insert_outlet(Request $req){
        // $user = Auth::user();
        $rules = [
            'open' => 'required',
            'address' => 'required|max:255',
            'city' => 'required|max:50',
            'close' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $outlet = new Outlet();
        $outlet->address = $req->address;
        $outlet->city  = $req->city;
        $outlet->open_time = $req->open;
        $outlet->close_time = $req->close;
        $outlet->save();
        return redirect()->back()->with('success', 'Outlet Added Successfully!');;
    }

    public function edit_outlet($id){
        $outlet = Outlet::findOrFail($id);
        return view('editoutlet', compact('outlet'));
    }

    public function update_outlet(Request $req, $id){
        $outlet = Outlet::find($id);
        $rules = [
            'open' => 'required',
            'address' => 'required|max:255',
            'city' => 'required|max:50',
            'close' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        // $outlet = new Outlet();
        $outlet->address = $req->address;
        $outlet->city  = $req->city;
        $outlet->open_time = $req->open;
        $outlet->close_time = $req->close;
        $outlet->save();
        return redirect()->back()->with('success', 'Outlet Updated Successfully!');;
    }
}
