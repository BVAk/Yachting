<?php

namespace App\Http\Controllers;

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
        $booking_id=$request->input('booking_id');
        
        $id=Auth::user()->id; 
      
$all=DB::table('yachts')->join('booking','yachts.yachts_id','=','booking.Yachts_Yachts_id')->join('marinas','yachts.yacht_marina','=','marinas.marinas_id')->join('countries','marinas.countries_countries_id','=','countries.countries_id')->join('yachts_photo','yachts.yachts_id','=','yachts_photo.yachts_id')->where('booking.booking_id',$booking_id)->paginate(5); 
   return view('oplata',compact('all'))->with ('all', $all)->with('booking_id',$booking_id);
   }

    public function edit(Booking $booking, $status)
    {
        
        $booking->update(['Booking_status' => $status]);
        return redirect('/home');
    }

     public function getForm()
        {
            return view('oplata')->with('booking_id',$booking_id);
        }

        public function upload(Request $request)
        {
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
                }
            }
            return "Успех";
        }
   
}
?>