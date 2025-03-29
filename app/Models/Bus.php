<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    protected $fillable = ['plate_number', 'capacity', 'status'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
