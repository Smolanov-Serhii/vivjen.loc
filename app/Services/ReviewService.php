<?php

namespace App\Services;

use App\Models\Language;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewService
{

    public function createReview(array $data)
    {
        $review = Module::where('name', 'reviews')
            ->first()
            ->items()
            ->create();

        foreach ($review->module->attrs as $attr) {
            switch ($attr->key) {
                case 'photo':
                    $photo = Auth::user()->client->module->attrs->where('key', 'photo')->first();
                    $userPhoto = Auth::user()->client->props->where('module_attribute_id', $photo->id)->first()->value??'';
                    $value = (!empty($userPhoto))?$userPhoto:'';
                    break;
                case 'fio':
                    $value = $data['name'];
                    break;
                case 'age':
                    $value = 25;
                    break;
                case 'data':
                    $value = Carbon::now()->toDateTimeString();
                    break;
                case 'rate':
                    $value = $data['rate'];
                    break;
                case 'like':
                case 'dislike':
                    $value = '';
                    break;
                case 'rev':
                    $value = $data['rev'];
                    break;
                case 'is_approved':
                    $value = 0;
                    break;
            }

            $review->props()->create([
                'value' => $value,
                'module_attribute_id' => $attr_id = $attr->id,
            ]);
        }

        $lang_id = Language::where('iso', config('app.fallback_locale'))->first()->id;
        $seo['lang_id'] = $lang_id;
        $seo['title'] = $data['name'];
        $seo['alias'] = $data['name'];
        $seo['meta_keywords'] = $data['name'];
        $seo['meta_description'] = $data['name'];
        $review->seo()->create($seo);

        $addition['lang_id'] = $lang_id;
        $addition['title'] = $data['name'];
        $review->addition()->create($addition);

        return $review->id;
    }

}
