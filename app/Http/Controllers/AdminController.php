<?php

namespace App\Http\Controllers;

use DB;
use App\Booking;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
    public function dashboard()
    {
        $this->middleware('auth:admin');
        return view('admin.dashboard');
    }

    public function podtverZakaz()
    {
        $this->middleware('auth:admin');
        return view('admin.categories.podtverZakaz');
    }

    public function insertnewyacht(Request $request)
    {
        $Yacht_name = $request->input('Yacht_name');
        $Yacht_builtin = $request->input('Yacht_builtin');
        $Yacht_cabins_count = $request->input('Yacht_cabins_count');
        $Yacht_toilets_count = $request->input('Yacht_toilets_count');
        $Yacht_guests_count = $request->input('Yacht_guests_count');
        $Yacht_length = $request->input('Yacht_length');
        $Yacht_price=$request->input('Yacht_price');
        $Yacht_owner_name=$request->input('Yacht_owner_name');
        $Yacht_date_contract=$request->input('Yacht_date_contract');
        $Yacht_marina=$request->get('Yacht_marina');
        $Yacht_about=$request->input('Yacht_about');
        $Yacht_type=$request->input('Yacht_type');
        $file = $request->file('Yacht_main_photo');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $a = $filename;
            Storage::disk('local')->put($filename, File::get($file));
        }
        $file2 = $request->file('Yacht_structure');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $structura = $filename;
            Storage::disk('local')->put($filename, File::get($file));
        }
        $newYacht=array('Yacht_main_photo'=>$a,'Yacht_structure'=>$structura,'Yacht_name'=>$Yacht_name,'Yacht_builtin'=>$Yacht_builtin,
            'Yacht_cabins_count'=>$Yacht_cabins_count,'Yacht_toilets_count'=>$Yacht_toilets_count,'Yacht_guests_count'=>$Yacht_guests_count,'Yacht_length'=>$Yacht_length,
       'Yacht_price'=>$Yacht_price,'Yacht_owner_name'=>$Yacht_owner_name,'Yacht_date_contract'=>$Yacht_date_contract,'Yacht_marina'=>$Yacht_marina,'Yacht_about'=>$Yacht_about,'Yacht_type'=>$Yacht_type  );

        DB::table('Yachts')->insert($newYacht);
        return redirect('/admin');
    }

    public function editprofile(Request $request)
    {
        $Yacht_name = $request->input('Yacht_name');
        $Yacht_builtin = $request->input('Yacht_builtin');
        $Yacht_cabins_count = $request->input('Yacht_cabins_count');
        $Yacht_toilets_count = $request->input('Yacht_toilets_count');
        $Yacht_guests_count = $request->input('Yacht_guests_count');
        $Yacht_length = $request->input('Yacht_length');
        $Yacht_price=$request->input('Yacht_price');
        $Yacht_owner_name=$request->input('Yacht_owner_name');
        $Yacht_date_contract=$request->input('Yacht_date_contract');
        $Yachts_id=$request->input('Yachts_id');
        $Yacht_about=$request->input('Yacht_about');
        $Yacht_type=$request->input('Yacht_type');
      
        $newYacht=array('Yacht_name'=>$Yacht_name,'Yacht_builtin'=>$Yacht_builtin,
            'Yacht_cabins_count'=>$Yacht_cabins_count,'Yacht_toilets_count'=>$Yacht_toilets_count,'Yacht_guests_count'=>$Yacht_guests_count,'Yacht_length'=>$Yacht_length,
       'Yacht_price'=>$Yacht_price,'Yacht_owner_name'=>$Yacht_owner_name,'Yacht_date_contract'=>$Yacht_date_contract,'Yacht_about'=>$Yacht_about,'Yacht_type'=>$Yacht_type  );

        DB::table('Yachts')->where('Yachts_id','=',$Yachts_id)->update($newYacht);
        return redirect('/admin');
    }

    public function editYacht()
    {
        $this->middleware('auth:admin');
        $yachts = DB::table('yachts')->get();
        return view('admin.categories.editYacht')->with('yachts', $yachts);
    }

    public function addYacht()
    {
        $this->middleware('auth:admin');
        $marinas = DB::table('marinas')->get();
        return view('admin.categories.addYacht')->with('marinas', $marinas);
    }

    public function zakazi()
    {
        $countries = DB::table('countries')->get();
        $yachtName = DB::table('yachts')->join('Booking', 'Yachts.Yachts_id', 'Booking.Yachts_Yachts_id')->join('users', 'users.id', '=', 'Booking.Users_id')->orderBy('Yachts.Yacht_name')->orderBy('Booking.Booking_date_otpr')->paginate(7);
        $this->middleware('auth:admin');
        return view('admin.categories.Zakazi', compact('yachtName'))->with('countries', $countries)->with('yachtName', $yachtName);
    }

    public function deleteYacht($Yachts_id)
    {
       
    $booking=DB::table('booking')->where('Yachts_Yachts_id','=',$Yachts_id)->update(['Booking_status'=>"отменено"]);
    $yachts=DB::table('yachts')->where('Yachts_id','=',$Yachts_id)->delete();
        return redirect('/admin');
    }
    public function deleteZakaz()
    {
        $this->middleware('auth:admin');
        return view('admin.categories.DeleteZakaz');
    }

    public function countries($Countries_id)
    {
        $this->middleware('auth:admin');

        $marinas = DB::table('countries')->join('Marinas', 'Countries.Countries_id', '=', 'Marinas.Countries_Countries_id')->where('Countries_id', '=', $Countries_id)->get();
        $yachtName = DB::table('yachts')->join('Booking', 'Yachts.Yachts_id', 'Booking.Yachts_Yachts_id')->join('Marinas', 'Marinas.Marinas_id', '=', 'Yachts.Yacht_marina')->join('Countries', 'Countries.Countries_id', '=', 'Marinas.Countries_Countries_id')->where('Countries_id', '=', $Countries_id)->orderBy('Yachts.Yacht_name')->get();

        return view('admin.Categories.Countries')->with('Countries_id', $Countries_id)->with('marinas', $marinas)->with('yachtName', $yachtName);
    }

    public function agree(Request $Request)
    {
        $this->middleware('auth:admin');
        $current_cost = $Request->input('current_cost');
        $status = "оплата подтверждена";
        $booking_id = $Request->input('booking_id');
        $podtver = $Request->file('podtver');
        if ($podtver) {
            $filename = $podtver->getClientOriginalName();

            $a = '<a href="../'.$filename.'" target="_blank">Подтверждение об оплате</a>';

            Storage::disk('local')->put($filename, File::get($podtver));
        }
        $up = array('Booking_status' => $status, 'Booking_money_oplacheno' => $current_cost,'Podtver'=>$a);
        DB::table('Booking')->where('Booking_id', $booking_id)->update($up);
        return redirect()->back();

    }

    public function cancel(Request $Request)
    {
        $this->middleware('auth:admin');
        $status = "оплата не подтверждена";
        $booking_id = $Request->input('booking_id');
        $podtver = $Request->file('podtver');
        if ($podtver) {
            $filename = $podtver->getClientOriginalName();

            $a = '<a href="../'.$filename.'" target="_blank">Причина не подтверждения</a>';

            Storage::disk('local')->put($filename, File::get($podtver));
        }
        $up = array('Booking_status' => $status,'Podtver'=>$a);

        DB::table('Booking')->where('Booking_id', $booking_id)->update($up);
        return redirect()->back();

    }

    public function delete(Request $Request)
    {
        $booking_id = $Request->input('booking_id');
        $this->middleware('auth:admin');
        DB::table('Booking')->where('Booking_id', $booking_id)->delete();
        return redirect()->back();

    }

    public function return(Request $Request)
    {
        $this->middleware('auth:admin');
        $booking_id = $Request->input('booking_id');
        $status = "оплата подтверждена";
        $up = array('Booking_status' => $status);
        DB::table('Booking')->where('Booking_id', $booking_id)->update($up);
        return redirect()->back();

    }
}

?>