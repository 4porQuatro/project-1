@php
$articles = \App\Models\Article::whereIn('id', $data->list->default->pluck('id')->toArray())
->with('categories', fn($q)=> $q->where('parent_id', '<>', null)->ordered())->ordered()->get()->map(function($item) {
    $item->category_slug = $item->categories->first()->slug;
    return $item;
});

$categories = $articles->map(function($item){
    return $item->categories->first();
})->unique('id');
$articles = $articles->groupBy('category_slug');
@endphp

<list_with_tabs title="{{$data->title->default}}" :articles="{{json_encode($articles)}}" :categories="{{json_encode($categories)}}"></list_with_tabs>
