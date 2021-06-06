<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitLevel2 extends Model
{
    use SoftDeletes;
    protected $table = 'unit_level2';
}
