<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id; 
        $all=DB::table('yachts')->join('booking','yachts.yachts_id','=','booking.Yachts_Yachts_id')->join('marinas','yachts.yacht_marina','=','marinas.marinas_id')->join('countries','marinas.countries_countries_id','=','countries.countries_id') ->join('yachts_photo','yachts.yachts_id','=','yachts_photo.yachts_id')->where('booking.users_id',$id)->orderBy('booking.booking_date_otpr')->paginate(5);
        return view('home',compact('all'))->with ('all', $all);
   }
}
