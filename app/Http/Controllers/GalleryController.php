<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{

    private $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $gallery = new Gallery;
        return view('admin.galleries.create', compact('gallery'));
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

        $data['image'] = $this
            ->imageRepository
            ->uploadImage($data['image'], 'galleries');

        $var = Gallery::create($data);

        foreach ($data['name'] as $iso => $name) {
            $var->translations()->create([
                'lang_id' => Cache::get('languages')->get($iso),
                'name' => $name,
                'description' => $data['description'][$iso],
            ]);
        }

        return redirect(route('admin.galleries.list'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.update', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->all();

        if (isset($data['image'])) {
            $data['image'] = $this
                ->imageRepository
                ->uploadImage($data['image'], 'galleries');
        }

        $gallery->update($data);

        foreach ($data['name'] as $iso => $name) {
            if ($name) {
                $translation = $gallery
                    ->translations()
                    ->where('lang_id', Cache::get('languages')->get($iso))
                    ->first();

                if($translation) {
                    $translation->update([
                        'name' => $name,
                        'description' => $data['description'][$iso],
                    ]);
                } else {
                    $gallery->translations()->create([
                        'lang_id' => Cache::get('languages')->get($iso),
                        'name' => $name,
                        'description' => $data['description'][$iso],
                    ]);
                }
            }
        }

        return redirect(route('admin.galleries.list'));
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->delete()) {
            return redirect()->route('admin.galleries.list');
        }

        return back();
    }
}
