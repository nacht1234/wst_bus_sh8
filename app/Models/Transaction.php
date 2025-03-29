<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'voucher_id', 'amount'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
