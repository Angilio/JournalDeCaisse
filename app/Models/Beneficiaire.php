<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBeneficiaire
 */
class Beneficiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
}
