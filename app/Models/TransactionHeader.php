<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $table = 'transaction_headers';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactiondetail() {
        return $this->hasMany(TransactionDetail::class);
    }
}
