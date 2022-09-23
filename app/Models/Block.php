<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

/**
 * App\Models\Block
 *
 * @property int $id
 * @property int $enabled
 * @property int|null $order
 * @property int|null $blockable_id
 * @property string $blockable_type
 * @property int|null $block_template_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $blockable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockContent[] $contents
 * @property-read int|null $contents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateRepeaterIteration[] $iterations
 * @property-read int|null $iterations_count
 * @property-read \App\Models\BlockTemplate|null $template
 * @method static \Illuminate\Database\Eloquent\Builder|Block enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newQuery()
 * @method static \Illuminate\Database\Query\Builder|Block onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Block query()
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereBlockTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereBlockableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereBlockableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Block withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Block withoutTrashed()
 * @mixin \Eloquent
 */
class Block extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'block_template_id',
        'order',
        'enabled',
        'deleted'
    ];


    /**
     * Owner model con be
     * Pages, Module_items, Widget....
     *
     * @return MorphTo
     */
    public function blockable(): MorphTo
    {
        return $this->morphTo();
    }

    // PROPERTY TEMPLATE

    /**
     * @return HasOne
     */
    public function template(): HasOne
    {
        return $this
            ->hasOne(BlockTemplate::class, 'id', 'block_template_id')
            ->with(['attrs', 'repeaters.attrs']);
    }

    public function attrs()
    {
        return $this
            ->template
            ->attrs()
            ->with('setting');
    }

    public function repeaters()
    {
        return $this
            ->template
            ->repeaters();
    }

    public function mappedByKey()
    {
        $contents = $this
            ->contents()
            ->with('translations')
            ->get()
            ->mapWithKeys(function ($content) {
                return [$content->block_template_attribute_id => $content];
            });

        return $this
            ->template
            ->attrs
            ->mapWithKeys(function ($attr) use ($contents) {
                $value = isset($contents[$attr->id])
                    ? $contents[$attr->id]->mappedByLang()[Cache::get('languages')->get(App::getLocale())]
                    : $attr;
                return [$attr->key => $value];
            });
    }

    // PROPERTIES CONTENT

    /**
     * @return MorphMany
     */
    public function contents(): MorphMany
    {
        return $this
            ->morphMany(BlockContent::class, 'contentable');
//        return $this
//            ->hasMany(Block_contents::class,'block_id', 'id');
    }

    // PROPERTIES ITERATIONS

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeaterIteration::class, 'iterable')->with('iterations');
    }

    public function localeIterations(): MorphMany
    {
        return $this
            ->morphMany(BlockTemplateRepeaterIteration::class, 'iterable')
            ->where('lang_id', Cache::get('languages')->get(App::getLocale()))
            ->orderBy('order')
            ->with('iterations');
    }

    public function groupedIterationsByRepeaterId($model, $language)
    {
        $groupedByRepeater = $model
            ->iterations()
            ->where('lang_id', $language->id)
            ->orderBy('order')
            ->with('contents.translations')
            ->get()
            ->groupBy('block_template_repeater_id');

        foreach ($groupedByRepeater as $iterations) {
            foreach ($iterations as $iteration) {
                if ($iteration->iterations()->count()) {
                    $iteration['iterations'] = $this->groupedIterationsByRepeaterId($iteration, $language);
                }
            }
        }
        return $groupedByRepeater;
    }

    public function scopeEnabled($query)
    {
        return $this->where('enabled');
    }

    /**
     * @return Collection
     */
    public function fillings(Language $language): Collection
    {
        $fillings = collect([
            'contents' => $this
                ->contents()
                ->with('translations')
                ->get(),
            'iterations' => $this->groupedIterationsByRepeaterId($this, $language)
        ]);
        return $fillings;
    }
}
