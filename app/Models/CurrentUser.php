<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentUser extends Model
{
    /** @use HasFactory<\Database\Factories\CurrentUserFactory> */
    use HasFactory;
    protected $guarded = [];
}
