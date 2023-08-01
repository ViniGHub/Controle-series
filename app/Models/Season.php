<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable =[
        'number'
    ];

    // protected $with = ['episodes'];

    public function Series() 
    {
        return $this->belongsTo(Serie::class);    
    }

    public function Episodes() 
    {
        return $this->hasMany(Episode::class);    
    }
}
