<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCaisse
 */
class Caisse extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }

    public function entrers(){
        return $this->hasMany(Entrer::class);
    }
}
