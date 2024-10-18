<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperSortie
 */
class Sortie extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
        'Context'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function personnel():BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }

    public function beneficiaire():BelongsTo
    {
        return $this->belongsTo(Beneficiaire::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
