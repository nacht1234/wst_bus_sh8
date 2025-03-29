<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['start_location', 'end_location', 'stops'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
