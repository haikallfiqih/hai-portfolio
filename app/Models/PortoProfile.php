<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortoProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'title_header',
        'description',
        'contact',
        'media_social',
        'image',
    ];
}
