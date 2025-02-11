<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPkh extends Model
{
    use HasFactory;

    protected $table = "log_pkhs";
    protected $guarded = [];
    public $timestamps = false;
}
