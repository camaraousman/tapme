<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendly extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'english_text', 'french_text', 'user_id'];
}
