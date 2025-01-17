<?php

namespace Modules\Area\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Area\Database\Factories\RegionFactory;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'is_enabled',
    ];

    // protected static function newFactory(): RegionFactory
    // {
    //     // return RegionFactory::new();
    // }
}
