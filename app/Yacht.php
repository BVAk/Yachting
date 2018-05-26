<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    {protected $table = 'Yachts';
protected $primaryKey = 'Yachts_id';
public $timestamps = false;
	protected $fillable = ['Yacht_name','Yacht_builtin','Yacht_cabins_count','Yacht_toilets_count','Yacht_guests_count','Yacht_length','Yacht_price ','Yacht_about ','Yacht_owner_name ','Yacht_date_contract','Yacht_marina','Yacht_type ','Count_view ' 
    ];//
}
