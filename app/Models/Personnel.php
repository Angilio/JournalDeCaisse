<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstName',
        'Contact',
        'email',
        'image'
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
}
