<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Caisse extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
        'entres_id',
        'sorties_id'
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
    
    
}
