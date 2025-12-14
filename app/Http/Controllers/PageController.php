<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Outlet;
use App\Models\Booking;

class PageController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function profile(){
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function menu(){
        $menus = DB::table('menus')->simplePaginate(6);

        return view('menu', compact('menus'));
    }

    public function menu_highlights()
    {
        $menu_highlights = Menu::whereIn('id', [4, 6, 7])->get();
        return view('home', compact('menu_highlights'));
    }

    public function search_menu(Request $request){
        $search = $request->input('search', '');
        if($request->input('search')){
            $search = $request->input('search');
        }
        $menus = Menu::where('name' , 'like', '%'.$search.'%')
        ->orwhere('type' , 'like', '%'.$search.'%')
        ->orwhere('description' , 'like', '%'.$search.'%')
        ->simplePaginate(5);
        return view('menu', compact('menus', 'search'));
    }

    public function outlets(){
        $outlets = DB::table('outlets')->get();
        return view('outlets', compact('outlets'));
    }

    public function search_outlets(Request $req){
        $search = $req->search;
        $outlets = Outlet::where('address' , 'like', '%'.$search.'%')
        ->orwhere('city' , 'like', '%'.$search.'%')->get();
        return view('outlets', compact('outlets'));
    }

    public function booking(){
        if(Auth::guest()){
            return view('login');
        }
        $user = Auth::user();
        if($user->role == 'admin'){
            $bookings = Booking::All();
            return view('booking', compact('bookings'));
        }
        if($user->role == 'customer'){
            $outlets = DB::table('outlets')->get();
            $bookings = Booking::where('user_id', $user->id)->get();
            return view('booking', compact('bookings'), compact('outlets'));
        }
    }

    public function insert_booking(Request $req){
        $user = Auth::user();
        $rules = [
            'time' => 'required|date|after:now',
            'guests' => 'required|gt:1'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->outlet_id  = $req->outlet_id;
        $booking->date_time = $req->time;
        $booking->guests = $req->guests;
        $booking->save();
        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}
