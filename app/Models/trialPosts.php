<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trialPosts extends Model
{
    use HasFactory;

    protected $fillable=['title','detail'];
}
