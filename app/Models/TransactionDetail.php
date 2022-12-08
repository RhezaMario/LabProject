<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id',
        'price',
        'quantity'
    ];
    public function trans(){
        return $this->belongsTo(Transactions::class);
    }
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
