<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function transaction_detail() {
        return $this->hasMany(TransactionDetail::class, 'product_id', 'id');
    }
}
