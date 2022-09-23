<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'order',
    ];

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(GalleryItemTranslation::class, 'gallery_item_id', 'id');
    }

    public function translate()
    {
        return $this
            ->hasOne(GalleryItemTranslation::class, 'gallery_item_id', 'id')
            ->current();
    }

    public function gallery(): BelongsTo
    {
        return $this
            ->belongsTo(
                Gallery::class,
                'gallery_id',
                'id'
            );
    }
}
