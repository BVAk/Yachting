<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{protected $table = 'booking';
protected $primaryKey = 'Booking_id';
public $timestamps = false;
	protected $fillable = [
        'Users_id','Yachts_Yachts_id', 'Booking_date', 'Booking_date_otpr','Booking_date_prib','Booking_status','Booking_cost'
    ];
    

}
?>