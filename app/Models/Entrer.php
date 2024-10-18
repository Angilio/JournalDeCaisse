<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperEntrer
 */
class Entrer extends Model
{
    use HasFactory;
    protected $fillable =[
        'Montant',
        'Description'
    ];

    public function Category_Enter():BelongsTo
    {
        return $this->belongsTo(Category_enter::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
