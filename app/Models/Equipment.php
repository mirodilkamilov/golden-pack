<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $casts = [
        'title' => 'array',
        'description' => 'array'
    ];

    public function getImageAttribute($value)
    {
        return '/assets/uploads/' . $value;
    }
}