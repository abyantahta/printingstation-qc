<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    /** @use HasFactory<\Database\Factories\LineFactory> */
    use HasFactory;
    protected $guarded = [];
    public function qcpasses()
    {
        return $this->hasMany(Qcpass::class, 'line_id');
    }
    public function labels()
    {
        return $this->hasMany(Label::class, 'line_id');
    }
}
