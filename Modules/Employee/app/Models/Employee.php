<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Employee\Database\Factories\EmployeeFactory;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'employee_name',
        'father_name',
        'designation_id',
        'cnic',
        'postal_addr',
        'contact_numb',
        'department_id',
        'user_category_id',
        'region_id',
        'city_id',
        'emp_status',
        'group_id',
        'vehicle_id',
        'latitude',
        'longitude',
        'week_of_days',
    ];

    protected $casts = [
        'week_of_days' => 'array',
    ];
    // protected static function newFactory(): EmployeeFactory
    // {
    //     // return EmployeeFactory::new();
    // }
}