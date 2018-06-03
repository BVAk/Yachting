<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Auth;

class OplataController extends Controller
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
    public function index(Request $request)
    {
}

public function edit(Booking $booking, $status)
{

    $booking->update(['Booking_status' => $status]);
    return redirect('/home');
}




public function loadImage(Request $request){

    $booking_id=$request->input('booking_id');
    $file = $request->file('image');
    $a = 'нет';
$status="оплачено";
    if ($file) {
        $filename = $file->getClientOriginalName();

        $a = '<a href="../'.$filename.'" target="_blank">Тут</a>';

        Storage::disk('local')->put($filename, File::get($file));
    }
    $upd=array('URL_oplata'=>$a,'Booking_status'=>$status);

    DB::table('Booking')->where('Booking_id',$booking_id)->update($upd);
    return redirect('/home');
}



}
?>