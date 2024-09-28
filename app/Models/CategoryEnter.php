<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEnter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function entres(){
        return $this->hasMany(Entrer::class);
    }
}
