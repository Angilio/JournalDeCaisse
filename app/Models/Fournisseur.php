<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperFournisseur
 */
class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Contact',
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
}
