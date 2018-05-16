<?php

namespace App\Http\Controllers;

use DB;
use App\Yacht;
use Illuminate\Http\Request;


class AllYachtController extends Controller
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
    public function store(Request $request)
    {
        //
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
