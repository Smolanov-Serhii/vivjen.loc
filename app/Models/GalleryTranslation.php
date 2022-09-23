<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class GalleryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'name',
        'description',
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    /**
     * @return HasOne
     */
    public function gallery(): HasOne
    {
        return $this->hasOne(Gallery::class, 'id', 'gallery_id');
    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
