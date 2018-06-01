<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    //Dashboard
	public function dashboard(){
		return view('admin.dashboard');
	}
	public function agree(Request $Request){
		$current_cost=$Request->input('current_cost');
		$status="оплата подтверждена";
		$booking_id=$Request->input('booking_id');
		$up=array('Booking_status'=>$status,'Booking_money_oplacheno'=>$current_cost);

		DB::table('Booking')->where('Booking_id',$booking_id)->update($up);
		return redirect()->back();

	}
}
