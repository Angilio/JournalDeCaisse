<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function sorties(){
        return $this->hasMany(Sortie::class);
    }
}
