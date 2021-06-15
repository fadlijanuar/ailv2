<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
		use HasFactory, SoftDeletes;
    protected $table = 'pelanggan';

    protected $fillable = [
        'IDPEL',
        'NAMA',
        'NAMAPNJ',
        'TARIF',
        'DAYA',
        'JENIS_MK',
        'TGLRUBAH_MK',
        'JENISLAYANAN',
        'STATUS_DIL'
    ];

		public $timestamps = false;
}
