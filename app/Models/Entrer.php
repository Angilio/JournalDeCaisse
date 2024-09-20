<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperEntrer
 */
class Entrer extends Model
{
    use HasFactory;
    protected $fillable = [
        'Montant',
        'type',
    ];
    public function caisse(){
        return $this->BelongsTo(Caisse::class);
    }
    public function users(){
        return $this->BelongsTo(User::class);
    }
}
