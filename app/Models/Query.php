<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Query extends Model
{
    use HasFactory;
    protected $fillable = [
        'query',
        'user_id',
        'status'
    ];

    public function user (){
        return $this->belongsTo(User::class, 'user_id');
    }

}
