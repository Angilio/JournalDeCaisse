<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperBeneficiaire
 */
class Beneficiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }
}
