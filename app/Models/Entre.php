<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entre extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
        'Description',
        'user_id',
        'category_enter_id'
    ];

    public function categryEnter(){
        return $this->belongsTo(CategoryEnter::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
