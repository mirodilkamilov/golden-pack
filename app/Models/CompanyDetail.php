<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'about_title' => 'array',
        'about_description' => 'array',
        'phone' => 'array',
        'email' => 'array',
        'social_media' => 'array'
    ];


}
