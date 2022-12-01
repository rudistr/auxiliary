<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gen_no extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function kode()
    {
    	$kode = DB::table('gen_nos')->max('id');
    	$kode = (int) $kode + 1;
    	return $kode;
    }  


    

    
}
