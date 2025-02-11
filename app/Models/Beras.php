<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beras extends Model
{
    use HasFactory;

    protected $table = "beras";
    protected $guarded = [];
    public $timestamps = false;
}
