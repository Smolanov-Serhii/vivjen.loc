<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class FormTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'name',
        'subject',
        'body',
        'attach',
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
    public function form(): HasOne
    {
        return $this->hasOne(Form::class, 'id', 'form_id');
    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
