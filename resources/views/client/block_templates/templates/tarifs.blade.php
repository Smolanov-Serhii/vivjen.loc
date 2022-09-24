<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'tariffs')->first();
$items = $module->items;
?>
<section class="tarifs">
    <div class="tarifs__container main-container">
        <h2 class="tarifs__title section-title">
            {{ $contents['title']['value'] ?? '' }}
        </h2>
        <div class="tarifs__subtitle section-desc">
            {!! $contents['subtitle']['value'] ?? '' !!}
        </div>
        <div class="blog-page__rubriks">

            <?php            $module = \App\Models\Module::where('name', 'tariffs')
                ->with(['taxonomies', 'items.taxonomy_items'])
                ->first();
            $grouped_existed_taxonomy_items = \App\Models\TaxonomyItem::whereHas('module_items', function (\Illuminate\Database\Eloquent\Builder $query) use ($module) {
                $query->whereIn('id', $module['items']->pluck('id'));
            })->with('taxonomy')->get()->groupBy('taxonomy_id');
            ?>
            <form
                    class="category__search"
                    action="{{ route('client.module_items.filter') }}"
                    id="courses_filter"
                    method="get">


                <input type="hidden" value="tariffs" name="module">
                @foreach($module['taxonomies'] as $taxonomy)
                    @isset($grouped_existed_taxonomy_items[$taxonomy->id])
                        <div class="category__group">
                            @foreach($grouped_existed_taxonomy_items[$taxonomy->id] as $taxonomy_item)
                                <label class="blog-page__rubrik">
                                    <input type="checkbox"
                                           class="category__group-input"
                                           {{--                                        value="{{ $taxonomy_item->id }}"--}}
                                           name="taxonomy_item[{{ $taxonomy_item->id }}]"
                                           form="courses_filter"
                                           style="display: none">
                                    <div class="blog-page__rubrik">
                                        {{ $taxonomy_item->name }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </form>
        </div>

        <div class="tarifs__list">
            @includeIf('client.block_templates.includes.category_result')
        </div>
    </div>
</section>
@section('client_scripts')
    <script src="{{ asset('/js/modules/filter.js') }}"></script>
@endsection