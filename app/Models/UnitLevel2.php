<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitLevel2 extends Model
{
    use SoftDeletes;
    protected $table = 'unit_level2';

    public function kantorInduk()
    {
        return $this->belongsTo(KantorInduk::class, 'kantor_induk_id', 'id');
    }

    public function unitLevel3()
    {
        return $this->hasMany(UnitLevel3::class, 'unit_level2_id');
    }
}
