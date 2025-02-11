<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBpnt extends Model
{
    use HasFactory;

    protected $table = "log_bpnts";
    protected $guarded = [];
    public $timestamps = false;
}
