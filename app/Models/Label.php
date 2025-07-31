<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /** @use HasFactory<\Database\Factories\LabelFactory> */
    use HasFactory;
    protected $guarded = [];

    public function line()
    {
        return $this->belongsTo(Line::class, 'id');
    }
    public function histories()
    {
        return $this->hasMany(History::class, 'label_id');
    }
}
