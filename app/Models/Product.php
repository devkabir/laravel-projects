<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static where(string $string, string $string1)
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
}
