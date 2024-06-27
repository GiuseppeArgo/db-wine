<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    protected $fillable = [
        'winery',
        'wines',
        'type',
        'average',
        'reviews',
        'location',
        'image',
    ];

    public function spices()
    {
        return $this->belongsToMany(Spice::class);
    }
}
