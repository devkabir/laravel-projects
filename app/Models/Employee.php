<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'name',
            'birthDate',
            'cv',
            'salary',
            'active',
            'leaveDaysPerYear',
            'sickDaysPerYear',
        ];

    protected $casts
        = [
            'birthDate'        => 'datetime:Y-m-d',
            'active'           => 'boolean',
            'salary'           => 'float',
            'leaveDaysPerYear' => 'integer',
            'sickDaysPerYear'  => 'integer',
        ];

}
