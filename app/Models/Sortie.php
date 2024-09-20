<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperSortie
 */
class Sortie extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
        'Context',
    ];
    public function categorie(): BelongsTo{
        return $this->BelongsTo(Category::class);
    }
    public function caisse(): BelongsTo{
        return $this->BelongsTo(Caisse::class);
    }
    public function user(): BelongsTo{
        return $this->BelongsTo(User::class);
    }
    public function benefiere(){
        return $this->BelongsTo(Beneficiaire::class);
    }
    public function personel(){
        return $this->BelongsTo(Personnel::class);
    }
    public function fournisseur(){
        return $this->BelongsTo(Fournisseur::class);
    }
}
