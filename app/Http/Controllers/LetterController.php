<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Module;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmailExport;

use Illuminate\Http\Request;

class LetterController extends Controller
{

    public function store(Request $request)
    {
        $letter = Module::where('name', 'newsletter')->whereHas('items', function ($query) use ($request) {
            $query->whereHas('seo', function ($querySeo) use ($request) {
                $querySeo->where('title', $request->email);
            });
        })->first();
        
        if ($letter) {
            return response()->json(['status' => false], 200, []);
        }

        $letter = Module::where('name', 'newsletter')
            ->first()
            ->items()
            ->create();

        $lang_id = Language::where('iso', config('app.fallback_locale'))->first()->id;
        $seo['lang_id'] = $lang_id;
        $seo['title'] = $request->email;
        $seo['alias'] = $request->email;
        $seo['meta_keywords'] = $request->email;
        $seo['meta_description'] = $request->email;
        $letter->seo()->create($seo);

        $addition['lang_id'] = $lang_id;
        $addition['title'] = $request->email;
        $letter->addition()->create($addition);

        return response()->json(['status' => true], 200, []);
    }

    public function export()
    {
        return Excel::download(new EmailExport, 'emails.xlsx');
    }
}
