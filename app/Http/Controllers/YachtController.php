
<?php

namespace App\Http\Controllers;

use DB;
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
        
        $marina=DB::table('countries')->join('marinas','Countries_id','=','marinas.countries_countries_id')->where('Countries_Countries_id', $direct)->paginate(15);
        return view('yachts')->with ('marina', $marina);
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
    
     $Count_view = $request->input('countView');
     $yachts_id = $request->input('yachts_id');

     DB::update ('update Yachts set Count_view = ? where Yachts_id = ?',[$Count_view,$yachts_id];
     
      return view('previewyachts');
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
