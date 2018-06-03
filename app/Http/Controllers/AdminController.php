<?php

namespace App\Http\Controllers;

use DB;
use App\Booking;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function dashboard(){
       $this->middleware('auth:admin');
        return view('admin.dashboard');
    }
    public function podtverZakaz(){
        $this->middleware('auth:admin');
        return view('admin.categories.podtverZakaz');
    }

    public function zakazi(){
        $this->middleware('auth:admin');
        return view('admin.categories.Zakazi');
    }

    public function deleteZakaz(){
        $this->middleware('auth:admin');
        return view('admin.categories.DeleteZakaz');
    }


    public function agree(Request $Request){
        $this->middleware('auth:admin');
        $current_cost=$Request->input('current_cost');
        $status="оплата подтверждена";
        $booking_id=$Request->input('booking_id');
        $up=array('Booking_status'=>$status,'Booking_money_oplacheno'=>$current_cost);

        DB::table('Booking')->where('Booking_id',$booking_id)->update($up);
        return redirect()->back();

    }
    public function cancel(Request $Request){
        $this->middleware('auth:admin');
        $status="оплата не подтверждена";
        $booking_id=$Request->input('booking_id');
        $up=array('Booking_status'=>$status);

        DB::table('Booking')->where('Booking_id',$booking_id)->update($up);
        return redirect()->back();

    }
    public function delete(Request $Request){
        $booking_id=$Request->input('booking_id');
        $this->middleware('auth:admin');
        DB::table('Booking')->where('Booking_id',$booking_id)->delete();
        return redirect()->back();

    }
    public function return(Request $Request){
        $this->middleware('auth:admin');
        $booking_id=$Request->input('booking_id');
        $status="оплата подтверждена";
        $up=array('Booking_status'=>$status);
        DB::table('Booking')->where('Booking_id',$booking_id)->update($up);
        return redirect()->back();

    }
}
?>s