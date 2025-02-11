<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpnt extends Model
{
    use HasFactory;

    protected $table = "bpnts";
    protected $guarded = [];
    public $timestamps = false;
}
