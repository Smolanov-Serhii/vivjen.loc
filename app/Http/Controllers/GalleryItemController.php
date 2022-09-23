<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Repositories\ImageRepository;

class GalleryItemController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index(Gallery $gallery)
    {
        return view('admin.gallery_items.index', compact('gallery'));
    }
    
    public function store(Request $request, Gallery $gallery)
    {
        $data = $request->all();

        $count = count($gallery->items()->get());

        $data['order'] = $count+1;

        $data['image'] = $this
            ->imageRepository
            ->uploadImage($data['image'], 'galleries');

        $item = $gallery->items()->create($data);

        foreach ($data['alt'] as $iso => $alt) {
            $item->translations()->create([
                'lang_id' => Cache::get('languages')->get($iso),
                'alt' => $alt,
                'name' => $data['name'][$iso],
                'description' => $data['description'][$iso],
            ]);
        }

        $item = $item->with('translate')->latest()->first();
        
        return view('admin.gallery_items.item', compact('item'))->render();
    }

    public function sort(Request $request)
    {
        $ids = $request->get('order');

        foreach ($ids as $key => $item) {
            GalleryItem::where('id', $item)->first()->update(['order'=>$key+1]);
        }

        return true;
    }
    
    public function edit(GalleryItem $galleryItem)
    {
        return view('admin.gallery_items.includes.form_edit', compact('galleryItem'))->render();
    }
    
    public function update(Request $request, GalleryItem $galleryItem)
    {
        $data = $request->all();

        if (isset($data['image'])) {
            $data['image'] = $this
                ->imageRepository
                ->uploadImage($data['image'], 'galleries');
        }

        $galleryItem->update($data);

        foreach ($data['alt'] as $iso => $alt) {
            if ($alt) {
                $translation = $galleryItem
                    ->translations()
                    ->where('lang_id', Cache::get('languages')->get($iso))
                    ->first();

                if($translation) {
                    $translation->update([
                        'alt' => $alt,
                        'name' => $data['name'][$iso],
                        'description' => $data['description'][$iso],
                    ]);
                } else {
                    $galleryItem->translations()->create([
                        'lang_id' => Cache::get('languages')->get($iso),
                        'alt' => $alt,
                        'name' => $data['name'][$iso],
                        'description' => $data['description'][$iso],
                    ]);
                }
            }
        }

        $item = $galleryItem;

        return ['form' =>view('admin.gallery_items.includes.form')->render(), 'item' => view('admin.gallery_items.item', compact('item'))->render()];
    }
    
    public function destroy(GalleryItem $galleryItem)
    {
        $gallery = $galleryItem->gallery;
        if ($galleryItem->translations()->delete() && $galleryItem->delete()) {
            return redirect()->route('admin.galleries.items.list', ['gallery' => $gallery]);
        }
        return back();
    }
    
}
