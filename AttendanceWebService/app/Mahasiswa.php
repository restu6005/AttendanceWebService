<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama_mhs'];
    protected $primaryKey = 'nrp';
    public $incrementing = false;
}
