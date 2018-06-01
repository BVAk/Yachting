<?php
namespace App\Http\Controllers;

use DB;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Yacht;
use Illuminate\Http\Request;


class YachtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $date = Carbon::now()->addDays(7);
       $yacht=DB::table('yachts')->join('marinas','Yacht_marina','=','marinas.marinas_id')->where('Marinas.Countries_Countries_id', $Countries_id)->where('yachts.yacht_date_contract','>=',$date)->paginate(15);
       $marina=DB::table('countries')->join('marinas','Countries_id','=','marinas.countries_countries_id')->where('Countries_Countries_id', $direct)->paginate(15);
       return view('yachts')->with ('marina', $marina)->with('yacht',$yacht)->with('Countries_id',$Countries_id);
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
    public function store(Request $request)
    {

       $yachts_id = $request->input('id');

    DB::table('Yachts')->where('Yachts_id', $yachts_id)->increment('Count_view');
        return redirect('/yachts/'.$yachts_id);

       
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function show(Yacht $yacht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yacht  $yacht
     * @return \Illuminate\Http\Response
     */
    public function edit($countView, Yacht $yacht)
    {
        //  public function edit(Booking $booking, $status)


        $yacht->update(['Count_View' => $countView]);
        

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
?>