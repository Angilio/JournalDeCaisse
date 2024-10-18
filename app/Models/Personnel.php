<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin IdeHelperPersonnel
 */
class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstName',
        'email',
        'Contact',
        'Image'
    ];

    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }

    public function imageUrl()
    {
        return Storage::disk('public')->url($this->Image);
    }
}
