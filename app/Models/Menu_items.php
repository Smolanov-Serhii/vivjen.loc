<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Menu_items extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'alias',
        'link_text',
        'title',
        'name',
        'slug',
        'type',
        'target',
        'menu_id',
        'class',
        'img',
        'model_id',
        'model_type',
    ];


    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }


//    Property model_addition
    public function addition($lang_id = null){

        $lang_id = $lang_id ?? $this->lang_id;

        return
            $this->hasOne(ModelAddition::class, 'model_id', 'id')
                ->where('model', class_basename(self::class))
                ->where('lang_id', $lang_id);

    }

    public function getTitle($lang_id = null)
    {
        if (is_null($lang_id)) {
            $lang_id = config('app.fallback_locale');
        }

        return json_decode($this->title)->$lang_id;
    }

    public function getName($lang_id = null)
    {
        if (is_null($lang_id)) {
            $lang_id = config('app.fallback_locale');
        }

        return json_decode($this->name)->$lang_id;
    }

}
