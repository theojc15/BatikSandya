<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $guarded = [];

    public function transactionheader() {
        return $this->hasMany(TransactionHeader::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
