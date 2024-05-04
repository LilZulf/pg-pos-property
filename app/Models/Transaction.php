<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['id', 'ref', 'status', 'amount', 'user_id', 'transaction_method_id'];
    public $incrementing = true;
    public function scopeSearch($query, $search)
    {
        $query->where('status', 'like', "%{$search}%")->orWhere('ref', 'like', "%{$search}%")
            ->orWhere('id', 'like', "%{$search}%")->orWhere('transaction_method_id', 'like', "%{$search}%");
    }
}
