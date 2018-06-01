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


      $booking_id=$request->input('booking_id');

      $id=Auth::user()->id; 

      
      $all=DB::table('yachts')->join('booking','yachts.yachts_id','=','booking.Yachts_Yachts_id')->join('marinas','yachts.yacht_marina','=','marinas.marinas_id')->join('countries','marinas.countries_countries_id','=','countries.countries_id')->join('yachts_photo','yachts.yachts_id','=','yachts_photo.yachts_id')->where('booking.booking_id',$booking_id)->paginate(5); 
      if($is_avaible){
       $up=array('image'=>$a);




       DB::table('Booking')->update($up);
   }
   return view('oplata',compact('all'))->with ('all', $all)->with('booking_id',$booking_id);
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

public function loadImage1(Request $request){

    $booking_id=$request->input('booking_id');
    $status="оплачено";
    $data=$request->input('image');
    $file = $request->file('image');
    $destination = base_path() . '/public/';
    $request->file('image')->move($destination, $file);

    if ($request->hasFile('image')) {
        $a = '<a href="../uploads'.$file.'" target="_blank">Квитанция об оплате</a>';
  }

  $upd=array('URL_oplata'=>$a,'Booking_status'=>$status);

  DB::table('Booking')->where('Booking_id',$booking_id)->update($upd);
  return redirect('/home');
}

public function getForm()
{
    return view('oplata')->with('booking_id',$booking_id);
}

public function upload(Request $request)
{

 $booking_id=$request->input('booking_id');
 foreach ($request->file() as $file) {
    foreach ($file as $f) {
        $f->move(storage_path('documents'), time().'_'.$f->getClientOriginalName());

    }
}
return redirect()->back()->with('status', 'Файл загружен! Нажмите на "Оплатить"');
}

}
?>