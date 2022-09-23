<?php

namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use PeterColes\Languages\LanguagesFacade;

class LocaleLinksWidget implements ContractWidget
{
    protected $page = 0;

    public function __construct($data = [])
    {
        if (isset($data['page'])) {
            $this->page = $data['page'];
        }
    }

    /**
     * @return View
     */
    public function execute(): View
    {

//        TODO CACHE IT
        $links = [];
        $isoById = Cache::get('languages')->flip();

        $seos = $this->page->seos->keyBy('lang_id');
        foreach (Cache::get('languages') as $iso => $lang_id) {
            $seo = $seos->get($lang_id);
            
            $text = LanguagesFacade::keyValue([$isoById->get($lang_id)], 'mixed')[0]->value;

            if ($isoById->get($lang_id) != App::getLocale()) {
                if ($isoById->get($lang_id) == config('app.fallback_locale') || !$seo) {
                    if (!$seo) {
                        $fallbackLanguageId = Cache::get('languages')->get(config('app.fallback_locale'));
                        $seo = $seos->get($fallbackLanguageId);
                        $links[$isoById->get($lang_id)]['link'] = ($seo->alias!='main')?"/{$seo->alias}":'/';
                    } else {
                        $links[$isoById->get($lang_id)]['link'] = ($seo->alias!='main')?"/{$seo->alias}":'/';
                    }
                } else {
                    $links[$isoById->get($lang_id)]['link'] = ($seo->alias!=='main')?"/{$isoById->get($lang_id)}/{$seo->alias}":"/{$isoById->get($lang_id)}/";
                }
            } else {
                $links[$isoById->get($lang_id)]['link'] = false;
            }

            $links[$isoById->get($lang_id)]['text'] = $text;

        }

        return view('Widgets::localeLinks', [
            'links' => $links
        ]);
    }
}