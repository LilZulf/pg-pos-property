<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['date','orderID','type','channel','amount','email'];
    public $incrementing = true;
    public $timestamps = false;

    public function scopeSearch($query, $search){
        $query->where('email', 'like', "%{$search}%")->orWhere('orderID', 'like', "%{$search}%")
        ->orWhere('amount', 'like', "%{$search}%")->orWhere('status', 'like', "%{$search}%");
    }
}
