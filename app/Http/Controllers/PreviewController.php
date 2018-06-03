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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Yacht $yacht, $Count_view)
    {

        $Count_view = $request->input('countView');
        $yachts_id = $request->input('id');

        $yacht->update(['Count_view' => $Count_view]);
        return redirect('/yachts/' .{{$yachts_id} . '');

 }
    /**
     * Display the specified resource.
     *
     * @param  \App\Book $yacht
     * @return \Illuminate\Http\Response
     */
    public function show(Book $yacht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yacht $yacht
     * @return \Illuminate\Http\Response
     */
    public function edit(Yacht $yacht)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Yacht $yacht
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $yachts_id)
    {
        //public function store(Request $request,$yachts_id)


        $Count_view = $request->input('countView');
        $yachts_id = $request->input('yachts_id');

        DB::update('update Yachts set Count_view = ? where Yachts_id = ?', [$Count_view, $yachts_id]);

        return view('previewyachts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yacht $yacht
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yacht $yacht)
    {
        //
    }


}
