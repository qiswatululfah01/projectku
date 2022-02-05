<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    // use softDelets;
    // protected $fillable = [
    //     'kode_admin', 'slug', 'nama_admin', 'nta',
    //     'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
    //     'alamat','tlp','agama','golongan','jabatan',
    //     'pangkalan','foto'
    // ];

    use HasFactory;
    protected $table = "admin";
}
