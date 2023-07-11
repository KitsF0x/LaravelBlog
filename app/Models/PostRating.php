<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'rating_value'
    ];
}
