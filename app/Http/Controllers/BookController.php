<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use App\Yacht;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $all=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->join('countries','Countries.Countries_id','=','marinas.countries_countries_id')->join('Yachts_photo','Yachts.Yachts_id','=','Yachts_photo.Yachts_id')->paginate(15);
     return view('allyachts')->with ('all', $all);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDates()
    {

        $current = Carbon::now();
        $date = Carbon::now()->addDays(3);
        printf($current);
        printf($date);
    }

public function store(Request $request)
    {
     $Users_id = $request->input('Users_id');
     $Yachts_Yachts_id = $request->input('Yachts_Yachts_id');
     $Booking_date =new \DateTime('now');
     $Booking_date_otpr = $request->input('Booking_date_otpr');
     $Booking_date_prib=new \DateTime($Booking_date_otpr);
 $Booking_date_prib->modify('+ 7 days');
     $Booking_status = $request->input('Booking_status');
     $Booking_cost=$request->input('Booking_cost');

     $data = array('Users_id'=>$Users_id,'Yachts_Yachts_id'=>$Yachts_Yachts_id, 'Booking_date'=>$Booking_date, 'Booking_date_otpr'=>$Booking_date_otpr,'Booking_date_prib'=>$Booking_date_prib,'Booking_status'=>$Booking_status,'Booking_cost'=>$Booking_cost);
     DB::table('Booking')->insert($data);
     return redirect()->route('home');
 }
    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $yacht
     * @return \Illuminate\Http\Response
     */
    public function show(Book $yacht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function edit(Yacht $yacht)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yacht $yacht)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yacht $yacht)
    {
        //
    }
}
