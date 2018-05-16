<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use App\Yacht;
use Illuminate\Http\Request;


class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
$a = DB::table('Countries')->get();
     return view('Countries.Countries',compact('a'));
 }
}
