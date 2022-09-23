<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Page;
use App\Models\ModuleItem;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $model
 * @property string $section
 * @property int|null $model_id
 * @property int $order
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use HasFactory, HasSystemFields;

    protected $table = 'menu';

    protected $fillable = [
        'model',
        'model_id',
        'order',
        'section',
        'title',
        'name',
        'location',
        'content',
    ];

    public function item()
    {
        return $this
            ->hasOne($this->model, 'id', 'model_id');
    }

    public function getTree()
    {
        $lang = App::getLocale();
        if ($this->content != '') {
            $menuitems = json_decode($this->content);
            $menuitems = $menuitems[0];
            foreach ($menuitems as $menu) {
                $menu->title = json_decode(Menu_items::where('id', $menu->id)->value('title'))->$lang;
                $menu->name = Menu_items::where('id', $menu->id)->value('name');
                if (!empty($menu->name)) {
                    $menu->title = json_decode($menu->name)->$lang;
                }
                $item = Menu_items::where('id', $menu->id)->first();
                if ($item->type == 'post') {
                    $item->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                    $item->slug = $item['model_type']::where('id', $item['model_id'])->first()->module->name . '/' . $item->slug;
                } elseif ($item->type == 'custom') {
                    $menu->slug = $item->slug??'';
                } else {
                    $menu->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                }
                $menu->type = Menu_items::where('id', $menu->id)->value('type');
                $menu->class = Menu_items::where('id', $menu->id)->value('class');
                $menu->img = Menu_items::where('id', $menu->id)->value('img');
                if (!empty($menu->children[0])) {
                    foreach ($menu->children[0] as $child) {
                        $child->title = json_decode(Menu_items::where('id', $child->id)->value('title'))->$lang;
                        $child->name = Menu_items::where('id', $child->id)->value('name');
                        if (!empty($child->name)) {
                            $child->title = json_decode($child->name)->$lang;
                        }
                        $item = Menu_items::where('id', $child->id)->first();
                        if ($item->type == 'post') {
                            $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                            $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->module->name . '/' . $item->slug;
                        } elseif ($item->type == 'custom') {
                            $child->slug = $item->slug??'';
                        } else {
                            $page = $item['model_type']::where('id', $item['model_id'])->first();
                            $child->slug = $page->seo->alias ?? '';
                            if ($page->allParent) {
                                $child->slug = ($page->allParent->seo->alias!='main')?$page->allParent->seo->alias.'/'.$child->slug:$child->slug;
                            }
                        }
                        $child->type = Menu_items::where('id', $child->id)->value('type');
                        $child->class = Menu_items::where('id', $child->id)->value('class');
                        $child->img = Menu_items::where('id', $child->id)->value('img');
                        if (!empty($child->children[0])) {
                            foreach ($child->children[0] as $child) {
                                $child->title = json_decode(Menu_items::where('id', $child->id)->value('title'))->$lang;
                                $child->name = Menu_items::where('id', $child->id)->value('name');
                                if (!empty($child->name)) {
                                    $child->title = json_decode($child->name)->$lang;
                                }
                                $item = Menu_items::where('id', $child->id)->first();
                                if ($item->type == 'post') {
                                    $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                                    $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->module->name . '/' . $item->slug;
                                } else {
                                    $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                                }
                                $child->type = Menu_items::where('id', $child->id)->value('type');
                                $child->class = Menu_items::where('id', $child->id)->value('class');
                                $child->img = Menu_items::where('id', $child->id)->value('img');
                                if (!empty($child->children[0])) {
                                    foreach ($child->children[0] as $child) {
                                        $child->title = json_decode(Menu_items::where('id', $child->id)->value('title'))->$lang;
                                        $child->name = Menu_items::where('id', $child->id)->value('name');
                                        if (!empty($child->name)) {
                                            $child->title = json_decode($child->name)->$lang;
                                        }
                                        $item = Menu_items::where('id', $child->id)->first();
                                        if ($item->type == 'post') {
                                            $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                                            $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->module->name . '/' . $item->slug;
                                        } elseif ($item->type == 'custom') {
                                            $child->slug = $item->slug??'';
                                        } else {
                                            $child->slug = $item['model_type']::where('id', $item['model_id'])->first()->seo->alias ?? '';
                                        }
                                        $child->type = Menu_items::where('id', $child->id)->value('type');
                                        $child->class = Menu_items::where('id', $child->id)->value('class');
                                        $child->img = Menu_items::where('id', $child->id)->value('img');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $menuitems = [];
            foreach (Menu_items::where('menu_id', $this->id)->get() as $item) {
                if (!empty($item->name)) {
                    $item->title = $item->getName(App::getLocale());
                } else {
                    $item->title = $item->getTitle(App::getLocale());
                }

                if (!is_null($item->model_type)) {
                    $class_name = $item->model_type;
                    if ($item->type == 'post') {
                        $item->slug = $class_name::where('id', $item->model_id)->first()->seo->alias ?? '';
                        $item->slug = $class_name::where('id', $item->model_id)->first()->module->name . '/' . $item->slug;
                    } else {
                        $item->slug = $class_name::where('id', $item->model_id)->first()->seo->alias ?? '';
                    }
                }
                array_push($menuitems, $item);
            }
        }

        return $menuitems;
    }
}
