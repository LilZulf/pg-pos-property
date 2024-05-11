<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = ['id', 'ref', 'status', 'amount', 'user_id', 'transaction_method_id'];
    public $incrementing = true;
    public function scopeSearch($query, $search)
    {
        $query->where('status', 'like', "%{$search}%")->orWhere('ref', 'like', "%{$search}%")
            ->orWhere('id', 'like', "%{$search}%")->orWhere('transaction_method_id', 'like', "%{$search}%");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionLog()
    {
        return $this->hasMany(TransactionLog::class);
    }
}
