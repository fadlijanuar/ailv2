<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KantorInduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kantor_induk';

    public function unitLevel2()
    {
        return $this->hasMany(UnitLevel2::class, 'kantor_induk_id');
    }
}
