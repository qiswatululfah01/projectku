<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembina extends Model
{

    //tabel pembina
    use HasFactory;
    protected $table = "pembina";
}
