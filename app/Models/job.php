<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class job extends Model
{
use HasFactory;
protected $guarded = [];
public static function getid()
{
  return $getid = DB::table('jobs')->orderby('id','DESC')->take(1)->get();
}

}
  

