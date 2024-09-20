<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPersonnel
 */
class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstName',
        'Contact',
        'sexe',
        'email',
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
}
