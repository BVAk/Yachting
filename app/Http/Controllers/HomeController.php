<?php

namespace App\Http\Controllers;

use DB;
use App\Booking;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Auth;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function downloadPDF($booking_id){
       $book = DB::table('booking')->join('users','booking.users_id','=','users.id')->join('yachts','yachts.yachts_id','=','booking.yachts_yachts_id')->where('booking.booking_id','=',$booking_id);

       $pdf = PDF::loadView('pdf', compact('book'));
       return $pdf->download('invoice.pdf');


   }
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
        $bookings=DB::table('booking')->where('Booking_status','=','отменено')->where('Booking_money_oplacheno','=',"0")->delete();
        return redirect('/home');
    }
   
}
?>