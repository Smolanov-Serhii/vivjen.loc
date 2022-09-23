<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class GalleryItemTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'name',
        'alt',
        'description',
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
