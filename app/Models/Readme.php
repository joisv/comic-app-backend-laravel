<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Readme extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function episode()
    {
    return $this->belongsTo(Episode::class);
    }
}
