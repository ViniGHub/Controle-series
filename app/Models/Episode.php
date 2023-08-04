<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = ['watched' => 'boolean'];

    protected $fillable =[
        'number'
    ];

    public function Season() 
    {
        return $this->belongsTo(Season::class);    
    }
}
