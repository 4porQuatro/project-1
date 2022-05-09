<?php

namespace Packages\Store\app\Models;

use App\Interfaces\ModelSettignable;
use App\Interfaces\Pathable;
use App\Models\Category;
use App\Models\ExternalReference;
use App\Models\Layout;
use App\Models\Section;
use App\Models\Sectionable;
use App\Models\Seo;
use App\Models\Setting;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Cache;
use Packages\Store\app\Classes\Repositories\ProductRepository;
use Packages\Store\app\Interfaces\Buyable;
use Packages\Store\database\factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Product extends Model implements Sortable, Pathable, Buyable, ModelSettignable
{
    use HasFactory;
    use SortableTrait;
    use Translatable;

    public $fillable = [
        'attribute_family_id',
        'parent_id',
        'images',
        'images_detail',
        'videos',
        'docs',
        'default_layout',
        'priority',
        'layout_id',
        'price',
        'promoted_price',
        'stock',
        'has_variants',
        'sku',
        'ref',
        'model_setting_id',
        'shippment_length',
        'shippment_weight',
        'shippment_width',
        'shippment_height'
    ];

    public $translatedAttributes = [
        'title',
        'slug',
        'small_body',
        'body',
        'active',
        'promoted',
        'highlighted'
    ];

    protected $casts = [
        'default_layout'=>'boolean',
        'priority'=>'integer',
        'price'=>'float',
        'promoted_price'=>'float',
        'stock'=>'int',
        'has_variants'=>'boolean',
        'shippment_length'=>'integer',
        'shippment_weight'=>'integer',
        'shippment_width'=>'integer',
        'shippment_height'=>'integer'
    ];

    protected $appends = [
        'final_price'
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public static function getReadableName($plural = true)
    {
        return $plural ? 'Produtos' : 'Produto';
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function setImagesDetailAttribute($value)
    {
        $this->attributes['images_detail'] = json_encode($value);
    }

    public function setVideosAttribute($value)
    {
        $this->attributes['videos'] = json_encode($value);
    }

    public function setDocsAttribute($value)
    {
        $this->attributes['docs'] = json_encode($value);
    }

    public function getImagesAttribute($value)
    {
        $images_array = json_decode($value, true);
        if(empty($images_array) && ! $this->has_variants && !empty($this->parent_id))
        {
            $images_array = $this->parent->images;
        }
        return $images_array ?? [];
    }

    public function getImagesDetailAttribute($value)
    {
        $images_array = json_decode($value, true);
        if(empty($images_array) && ! $this->has_variants && !empty($this->parent_id))
        {
            $images_array = $this->parent->images_detail;
        }
        return $images_array ?? [];
    }

    public function getVideosAttribute($value)
    {
        $videos_array = json_decode($value, true);
        return $videos_array ?? [];
    }

    public function getDocsAttribute($value)
    {
        $docs_array = json_decode($value, true);
        return $docs_array ?? [];
    }

    public function getPathAttribute()
    {
        return $this->path();
    }

    public function getAttributesAttribute()
    {
        return $this->family->attributes()->with('translations')->get()->keyBy('admin_title');
    }

    public function getAttributesOptionsAttribute()
    {
        return $this->attributeOptions()->with(['translations', 'attribute.translations'])->get()->groupBy('attribute.admin_title');
    }

    public function getDefaultVariationAttribute()
    {
        $variation = $this->variations()->with(['translations'])->first() ?? new Product();

        return $variation->append('attributesOptions');
    }

    public function scopeActive($q)
    {
        return $q->whereTranslation('active', true, app()->getLocale());
    }

    public function scopePromoted($q)
    {
        return $q->whereTranslation('promoted', true, app()->getLocale());
    }

    public function scopeHighlighted($q)
    {
        return $q->whereTranslation('highlighted', true, app()->getLocale());
    }

    public function scopePrimary($q)
    {
        return $q->whereNull('parent_id');
    }

    public function scopeFilter($q, array $attributes)
    {
        return (new ProductRepository($q, $attributes))->filter();
    }

    public function scopeWithStock($q)
    {
        return $q->where('stock', '>', 0);
    }

    public function variations()
    {
        return $this->hasMany(Product::class, 'parent_id')->ordered();
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function family()
    {
        return $this->belongsTo(AttributeFamily::class, 'attribute_family_id');
    }

    public function attributeOptions()
    {
        return $this->belongsToMany(AttributeOption::class);
    }

    public function layout()
    {
        return $this->belongsTo(Layout::class);
    }

    public function getLayout()
    {
        return !empty($this->layout_id) ? $this->layout : Layout::default()->first();
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }

    public function sections()
    {
        return $this->morphToMany(Section::class, 'sectionable')->as('sectionable')->using(Sectionable::class)->withPivot(['id', 'grid_id']);
    }

    public function optionals()
    {
        return $this->belongsToMany(Product::class, 'optional_product', 'product_id', 'product_optional_id');
    }

    public function externalReference()
    {
        return $this->morphOne(ExternalReference::class, 'external_referenceable');
    }

    public function facebookShareLink()
    {
        return 'https://www.facebook.com/sharer/sharer.php?u=' . $this->path();
    }

    public function linkedinShareLink()
    {
        return 'https://www.linkedin.com/shareArticle?mini=true&summary='.$this->subtitle.'&title='.$this->title.'&url='.$this->path();
    }

    public function twitterShareLink()
    {
        return 'https://twitter.com/intent/tweet?url=' . $this->path();
    }

    public function emailShareLink()
    {
        return 'mailto:?subject='.$this->title.'&amp;body='.$this->path().'%0A';
    }

    public function path()
    {
        return env('APP_URL').'/product/'.$this->slug;
    }

    public function getPathables()
    {
        // TODO: Implement getPathables() method.
    }

    public function previewPath()
    {
       return $this->path();
    }

    public function detailView()
    {
        return 'front.product.show';
    }

    public function totalStock()
    {
        return $this->has_variants ? $this->variations->sum('stock') : $this->stock;
    }

    public function canBeBought(): bool
    {
        return $this->has_variants == false && $this->stock > 0 && $this->active == true;
    }

    public function getBuyablePrice()
    {
        if($this->priceHasTaxesIncluded())
        {
            return !empty($this->promoted_price) && $this->promoted_price ? $this->promoted_price : $this->price;
        }
        throw new \Exception('A desenvolver');;
    }

    public static function getModelSettingsFields()
    {
        return [];
    }

    public function getFinalPriceAttribute()
    {
        return $this->getBuyablePrice();
    }

    public function priceHasTaxesIncluded()
    {
        $product_settings = Cache::rememberForever('product_settings', function (){
            return Setting::getByName('product_settings')->data;
        });

        return (bool) $product_settings['taxes_included'];
    }

    public function getShippmentVolume()
    {
        return $this->shippment_width*$this->shippment_length*$this->shippment_height;
    }

    public function getShippmentWeight()
    {
        return $this->shippment_weight;
    }
}
