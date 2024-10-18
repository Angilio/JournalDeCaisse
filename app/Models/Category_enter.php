<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategory_enter
 */
class Category_enter extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];

    public function entres():HasMany
    {
        return $this->hasMany(Entrer::class);
    }
}
