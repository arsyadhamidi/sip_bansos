<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkh extends Model
{
    use HasFactory;

    protected $table = "pkhs";
    protected $guarded = [];
    public $timestamps = false;
}
