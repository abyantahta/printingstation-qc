<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qcpass extends Model
{
    /** @use HasFactory<\Database\Factories\QcpassFactory> */
    use HasFactory;
    protected $guarded = [];
    // public function line()
    // {
    //     return $this->belongsTo(Line::class, 'id');
    // }
    public function histories()
    {
        return $this->hasMany(History::class, 'qcpass_id');
    }
}
