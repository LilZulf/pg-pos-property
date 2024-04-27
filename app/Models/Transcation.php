<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    use HasFactory;
    protected $table = 'transcations';
    protected $fillable = ['date','orderID','type','channel','amount','email'];
    public $incrementing = true;
    public $timestamps = false;

}
