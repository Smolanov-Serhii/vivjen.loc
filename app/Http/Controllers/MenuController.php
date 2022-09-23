<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menu_items;
use App\Models\Module;
use App\Models\ModuleItem;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Language;

class MenuController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $pages = Pages::all();
//        $mapped_menu = Menu::all()->mapWithKeys(function ($model) {
//            $key = $model->model .'-'. $model->model_id;
//
//            return [$key => $model];
//        });

//        $concated_items = $pages->concat($menu_items)->mapWithKeys(function ($model) use ($mapped_menu) {
//            $key = class_basename($model) .'-'. $model->id;
//
//            switch (class_basename($model)) {
//                case 'Pages':
//                    $title = $model->seo->title;
//                    $alias = $model->seo->alias;
//                    break;
//                case 'Menu_items':
//                    $title = $model->link_text;
//                    $alias = $model->alias;
//                    break;
//            }
//
//            if(isset($mapped_menu[$key])) {
//                $data = [
//                    'id' => $model->id,
//                    'class_name' => class_basename($model),
//                    'order' => $mapped_menu[$key]->order,
//                    'checked' => true,
//
//                ];
//            } else {
//                $data = [
//                    'id' => $model->id,
//                    'class_name' => class_basename($model),
//                    'order' => 999999,
//                    'checked' => false,
//                ];
//            }
//
//            $data['title'] = $title;
//            $data['alias'] = $alias;
//            $data['type'] = class_basename($model);
//
//
////            $value = $mapped_menu[$key] ?? $model;
//
//            return [$key => $data];
//        });
//
//        $sorted_items = $concated_items->sort(function ($a, $b) {
//            return $a['order'] <=> $b['order'];
//        });

//        $menu_items = Menu_items::all();

//        return view('admin.menu.index', compact('menu_items'));
//    }

    public function index()
    {
        $menuitems = '';
        $desiredMenu = '';
        if(isset($_GET['id']) && $_GET['id'] != 'new'){
            $id = $_GET['id'];
            $desiredMenu = menu::where('id',$id)->first();
            if($desiredMenu->content != ''){
                $menuitems = json_decode($desiredMenu->content);
                $menuitems = $menuitems[0];
                foreach($menuitems as $menu){
                    $menu->title = json_decode(Menu_items::where('id',$menu->id)->value('title'));
                    $menu->name = json_decode(Menu_items::where('id',$menu->id)->value('name'));
                    $menu->slug = Menu_items::where('id',$menu->id)->value('slug');
                    $menu->target = Menu_items::where('id',$menu->id)->value('target');
                    $menu->type = Menu_items::where('id',$menu->id)->value('type');
                    $menu->class = Menu_items::where('id',$menu->id)->value('class');
                    $menu->img = Menu_items::where('id',$menu->id)->value('img');
                    if(!empty($menu->children[0])){
                        foreach ($menu->children[0] as $child) {
                            $child->title = json_decode(Menu_items::where('id',$child->id)->value('title'));
                            $child->name = json_decode(Menu_items::where('id',$child->id)->value('name'));
                            $child->slug = Menu_items::where('id',$child->id)->value('slug');
                            $child->target = Menu_items::where('id',$child->id)->value('target');
                            $child->type = Menu_items::where('id',$child->id)->value('type');
                            $child->class = Menu_items::where('id',$child->id)->value('class');
                            $child->img = Menu_items::where('id',$child->id)->value('img');
                            if(!empty($child->children[0])){
                                foreach ($child->children[0] as $child) {
                                    $child->title = json_decode(Menu_items::where('id',$child->id)->value('title'));
                                    $child->name = json_decode(Menu_items::where('id',$child->id)->value('name'));
                                    $child->slug = Menu_items::where('id',$child->id)->value('slug');
                                    $child->target = Menu_items::where('id',$child->id)->value('target');
                                    $child->type = Menu_items::where('id',$child->id)->value('type');
                                    $child->class = Menu_items::where('id',$child->id)->value('class');
                                    $child->img = Menu_items::where('id',$child->id)->value('img');
                                    if(!empty($child->children[0])){
                                        foreach ($child->children[0] as $child) {
                                            $child->title = json_decode(Menu_items::where('id',$child->id)->value('title'));
                                            $child->name = json_decode(Menu_items::where('id',$child->id)->value('name'));
                                            $child->slug = Menu_items::where('id',$child->id)->value('slug');
                                            $child->target = Menu_items::where('id',$child->id)->value('target');
                                            $child->type = Menu_items::where('id',$child->id)->value('type');
                                            $child->class = Menu_items::where('id',$child->id)->value('class');
                                            $child->img = Menu_items::where('id',$child->id)->value('img');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                $menuitems = Menu_items::where('menu_id',$desiredMenu->id)->get();
            }
        }

        $modules = Module::all();

        return view ('admin.menu.index',['categories'=>Page::all(),'modules'=>$modules,'menus'=>menu::all(),'desiredMenu'=>$desiredMenu,'menuitems'=>$menuitems]);
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $data = $request->all('model');
//        foreach ($data as $class) {
//            foreach ($class as $class_name => $items) {
//                foreach ($items as $id => $item) {
//                    if($class_name == 'Menu_items' && is_array($item)) {
//                        $menu_item = Menu_items::create($item);
//                        $menu = Menu::firstOrCreate([
//                            'model' => 'Menu_items',
//                            'model_id' => $menu_item->id,
//                            'section' => 'header',
//                        ]);
//                    } else {
//                        if($item === 'true') {
//                            $menu = Menu::firstOrCreate([
//                                'model' => $class_name,
//                                'model_id' => $id,
//                                'section' => 'header',
//                            ]);
//                        } else {
//                            Menu::where([
//                                ['model', '=', $class_name],
//                                ['model_id','=', $id],
//                                ['section','=', 'header']
//                            ])
//                                ->delete();
//                        }
//                    }
//
//                }
//            }
//        }
//
//        return redirect(route('admin.menu.list'));
//    }

    public function store(Request $request)
    {
        $data = $request->all();
        if(menu::create($data)){
            $newdata = menu::orderby('id','DESC')->first();
            session::flash('success','Menu saved successfully !');
            return redirect("/admin/menu/manage-menus?id=$newdata->id");
        }else{
            return redirect()->back()->with('error','Failed to save menu !');
        }
    }

    public function addCatToMenu(Request $request){
        $data = $request->all();
        $menuid = $request->menuid;
        $ids = $request->ids;
        $menu = menu::findOrFail($menuid);
        if($menu->content == '' || is_null($menu->content)){
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = Page::where('id',$id)->first()->title;
                }
                $title = json_encode($titles);
                $data['title'] = $title;
                $data['type'] = 'category';
                $data['menu_id'] = $menuid;
                $data['updated_at'] = NULL;
                $data['model_id'] = $id;
                $data['model_type'] = 'App\Models\\'.class_basename(Page::class);
                Menu_items::create($data);
            }
        }else{
            $olddata = json_decode($menu->content,true);
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = Page::where('id',$id)->first()->title;
                }
                $title = json_encode($titles);
                $data['title'] = $title;
                $data['type'] = 'category';
                $data['menu_id'] = $menuid;
                $data['updated_at'] = NULL;
                Menu_items::create($data);
            }
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = Page::where('id',$id)->first()->title;
                }
                $title = json_encode($titles);
                $array['title'] = $title;
                $data['model_id'] = $id;
                $data['model_type'] = 'App\Models\\'.class_basename(Page::class);
                $array['name'] = NULL;
                $array['type'] = 'category';
                $array['target'] = NULL;
                $array['id'] = Menu_items::where('slug',$array['slug'])->where('name',$array['name'])->where('type',$array['type'])->value('id');
                $array['children'] = [[]];
                array_push($olddata[0],$array);
                $olddata = json_encode($olddata);
                $menu->update(['content'=>$olddata]);
            }
        }
    }

    public function addPostToMenu(Request $request){
        $data = $request->all();
        $menuid = $request->menuid;
        $ids = $request->ids;
        $menu = menu::findOrFail($menuid);
        if($menu->content == ''){
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = ModuleItem::where('id',$id)->first()->seo->title;
                }
                $title = json_encode($titles);
                $data['title'] = $title;
                $data['model_id'] = $id;
                $data['model_type'] = 'App\Models\\'.class_basename(ModuleItem::class);
                $data['type'] = 'post';
                $data['menu_id'] = $menuid;
                $data['updated_at'] = NULL;
                Menu_items::create($data);
            }
        }else{
            $olddata = json_decode($menu->content,true);
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = ModuleItem::where('id',$id)->first()->seo->title;
                }
                $title = json_decode($titles);
                $data['title'] = $title;
                $data['model_id'] = $id;
                $data['model_type'] = 'App\Models\\'.class_basename(ModuleItem::class);
                $data['type'] = 'post';
                $data['menu_id'] = $menuid;
                $data['updated_at'] = NULL;
                Menu_items::create($data);
            }
            foreach($ids as $id){
                $titles = [];
                foreach(Language::where('enabled', true)->get() as $language) {
                    $titles[$language->iso] = ModuleItem::where('id',$id)->first()->seo->title;
                }
                $title = json_decode($titles);
                $array['title'] = $title;
                $data['model_id'] = $id;
                $data['model_type'] = 'App\Models\\'.class_basename(ModuleItem::class);
                $array['name'] = NULL;
                $array['type'] = 'post';
                $array['target'] = NULL;
                $array['id'] = Menu_items::where('slug',$array['slug'])->where('name',$array['name'])->where('type',$array['type'])->orderby('id','DESC')->value('id');
                $array['children'] = [[]];
                array_push($olddata[0],$array);
                $oldata = json_encode($olddata);
                $menu->update(['content'=>$olddata]);
            }
        }
    }

    public function addCustomLink(Request $request){
        $data = $request->all();
        $menuid = $request->menuid;
        $menu = menu::findOrFail($menuid);
        if($menu->content == ''){
            $titles = [];
            foreach(Language::where('enabled', true)->get() as $language) {
                $titles[$language->iso] = $request->link;
            }
            $data['title'] = json_encode($titles);
            $data['slug'] = $request->url;
            $data['type'] = 'custom';
            $data['menu_id'] = $menuid;
            $data['updated_at'] = NULL;
            Menu_items::create($data);
        }else{
            $olddata = json_decode($menu->content,true);
            $titles = [];
            foreach(Language::where('enabled', true)->get() as $language) {
                $titles[$language->iso] = $request->link;
            }
            $data['title'] = json_encode($titles);
            $data['slug'] = $request->url;
            $data['type'] = 'custom';
            $data['menu_id'] = $menuid;
            $data['updated_at'] = NULL;
            Menu_items::create($data);
            $array = [];
            $titles = [];
            foreach(Language::where('enabled', true)->get() as $language) {
                $titles[$language->iso] = $request->link;
            }
            $data['title'] = json_encode($titles);
            $array['slug'] = $request->url;
            $array['name'] = NULL;
            $array['type'] = 'custom';
            $array['target'] = NULL;
            $array['id'] = Menu_items::where('slug',$array['slug'])->where('name',$array['name'])->where('type',$array['type'])->orderby('id','DESC')->value('id');
            $array['children'] = [[]];
            array_push($olddata[0],$array);
            $oldata = json_encode($olddata);
            $menu->update(['content'=>$olddata]);
        }
    }

    public function updateMenu(Request $request){
        $newdata = $request->all();
        $menu=menu::findOrFail($request->menuid);
        $content = $request->data;
        $newdata = [];
        $newdata['location'] = $request->location;
        $newdata['content'] = json_encode($content);
        $menu->update($newdata);
    }

    public function updateMenuItem(Request $request){
        $data = $request->all();
        if ($request->has('img') && !empty($request->get('img'))) {
            $imageURL = request()->file("img")->store('menu_items');
            $path_ar = explode('/', $imageURL);
            $data['img'] = end($path_ar);
        }

        $data['name'] = json_encode($data['name']);
        $item = Menu_items::findOrFail($request->id);
        $item->update($data);
        return redirect()->back();
    }

    public function deleteMenuItem($id,$key,$in=''){
        $menuitem = Menu_items::findOrFail($id);
        $menu = menu::where('id',$menuitem->menu_id)->first();
        if($menu->content != ''){
            $data = json_decode($menu->content,true);
            $maindata = $data[0];
            if($in == ''){
                unset($data[0][$key]);
                $newdata = json_encode($data);
                $menu->update(['content'=>$newdata]);
            }else{
                unset($data[0][$key]['children'][0][$in]);
                $newdata = json_encode($data);
                $menu->update(['content'=>$newdata]);
            }
        }
        $menuitem->delete();
        return redirect()->back();
    }

    public function destroy(Request $request){
        Menu_items::where('menu_id',$request->id)->delete();
        menu::findOrFail($request->id)->delete();
        return redirect('/admin/menu/manage-menus')->with('success','Menu deleted successfully');
    }

    /**
     * Update child blocks orders.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $data = $request->all();
//        dd($data);

        foreach ($data['sequence'] as $order => $model) {
//            dd($id, Menu::all());
            list($model_name, $id) = explode('-', $model);


            Menu::firstOrCreate([
                'model' => $model_name,
                'model_id' => $id
            ],[
                'section' => 'header',
                'order' => $order
            ]);
        }

        return response()
            ->json(['status' => true]);
    }
}
