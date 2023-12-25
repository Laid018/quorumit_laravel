<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table products
 * @param string name
 * @param string description
 * @param decimal price
 */
class Product extends Model
{
    use HasFactory;

    public $fillable = ["name", "description", "price"];
}
