<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperFournisseur
 */
class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Contact',
        'Image'
    ];

    public function sorties():HasMany
    {
        return $this->hasMany(Sortie::class);
    }

    public function imageUrl()
    {
        return Storage::disk('public')->url($this->Image);
    }
}
