<?php

namespace App\Http\Controllers;

use DB;
use App\Booking;
use Carbon\Carbon;
use Carbon\CarbonInterval;
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
        $all=DB::table('booking')->join('yachts','yachts.yachts_id','=','booking.Yachts_Yachts_id')->join('marinas','yachts.yacht_marina','=','marinas.marinas_id')->join('countries','marinas.countries_countries_id','=','countries.countries_id') ->where('booking.users_id',$id)->where('booking.booking_status','!=',"отменено")->where('booking.booking_date_otpr','>=',Carbon::now())->orderBy('booking.booking_date_otpr')->paginate(5);
        return view('home',compact('all'))->with ('all', $all);
   }

    public function edit(Booking $booking, $status)
    {
        
        $booking->update(['Booking_status' => $status]);
        return redirect('/home');
    }
   
}
?>