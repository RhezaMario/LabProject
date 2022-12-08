<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transaction_id',
        'transaction_date'
    ];
    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
