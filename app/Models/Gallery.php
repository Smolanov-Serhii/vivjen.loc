<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'image',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(GalleryTranslation::class, 'gallery_id', 'id');
    }

    public function translate()
    {
        return $this
            ->hasOne(GalleryTranslation::class, 'gallery_id', 'id')
            ->current();
    }

    public function items(): HasMany
    {
        return $this->hasMany(GalleryItem::class)->orderBy('order');
    }
}
