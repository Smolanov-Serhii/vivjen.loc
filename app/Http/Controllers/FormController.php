<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::all();
        return view('admin.forms.index', compact('forms'));
    }

    public function create()
    {
        $form = new Form;
        return view('admin.forms.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $var = Form::create($data);

        foreach ($data['name'] as $iso => $name) {
            $var->translations()->create([
                'lang_id' => Cache::get('languages')->get($iso),
                'name' => $name,
            ]);
        }

        return redirect(route('admin.forms.list'));
    }

    public function edit(Form $form)
    {
        return view('admin.forms.update', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        $data = $request->all();

        $form->update($data);

        foreach ($data['name'] as $iso => $name) {
            if ($name) {
                $translation = $form
                    ->translations()
                    ->where('lang_id', Cache::get('languages')->get($iso))
                    ->first();

                if($translation) {
                    $translation->update([
                        'name' => $name,
                        'subject' => $data['subject'][$iso]??null,
                        'body' => $data['body'][$iso]??null,
                        'attach' => $data['attach'][$iso]??null,
                    ]);
                } else {
                    $form->translations()->create([
                        'lang_id' => Cache::get('languages')->get($iso),
                        'name' => $name,
                        'subject' => $data['subject'][$iso]??null,
                        'body' => $data['body'][$iso]??null,
                        'attach' => $data['attach'][$iso]??null,
                    ]);
                }
            }
        }

        return redirect(route('admin.forms.edit', ['form' => $form]));
    }

    public function destroy(Form $form)
    {
        if ($form->translations()->delete() && $form->delete()) {
            return redirect()->route('admin.forms.list');
        }

        return back();
    }
}
