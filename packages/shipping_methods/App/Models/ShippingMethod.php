<?php


namespace Packages\shipping_methods\App\Models;

use App\Models\Article;
use App\Models\ModelSetting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Country\App\Models\Country;
use Packages\Country\App\Models\Zone;
use Packages\shipping_methods\database\factories\ShippingMethodFactory;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ShippingMethod extends Model implements Sortable {

    use HasFactory;
    use SortableTrait;

    protected $guarded = [];

    protected $casts = ['default_price' => 'float', 'default_free_order_price' => 'float', 'active' => 'boolean'];

    /**
     * The sortable library data for this model
     *
     * @var array
     */
    public $sortable = ['order_column_name' => 'priority', 'sort_when_creating' => true,];

    protected $with = ['article'];

    protected static function newFactory()
    {
        return ShippingMethodFactory::new();
    }

    public function article()
    {
        return $this->morphOne(Article::class, 'articlable');
    }

    /**
     * Used to automatic model setting
     */
    public function getDefaultModelSetting()
    {
        return ModelSetting::where('name', 'Metódos de envio')->first()->id;
    }

    public function shippingPrices()
    {
        return $this->hasMany(ShippingPrice::class);
    }

    public function zones()
    {
        return $this->morphedByMany(Zone::class, 'shipping_methodable');
    }

    public function avaliableCountries()
    {
        $zones = $this->zones()->with('countries')->get();

        $countries = collect();
        $zones->each(function ($item) use (&$countries) {
            $countries = $countries->merge($item->countries);
        });
        return  $countries->unique('id');

    }

    public function setShippingPriceByAttributesAndCountry($country, float $weight, float $volume)
    {
        $zones = $this->getZones($country);
        $shipping_prices = $this->getShippingPrices($zones, $weight, $volume);
        if(!empty($shipping_prices) && $shipping_prices->price > $this->default_price)
        {
           $this->price = $shipping_prices->price;
           $this->free_order_price = $shipping_prices->free_order_price;
        } else {
            $this->price = $this->default_price;
            $this->free_order_price = $this->default_free_order_price;
        }
    }

    /**
     * @param $country
     * @return array
     */
    private function getZones($country): array
    {
        $zones = $this->zones()->with('countries')->get();
        $zones = $zones->filter(function ($zone) use ($country) {
            return (bool) $zone->countries->where('id', $country)->count();
        })->pluck('id')->toArray();
        return $zones;
    }

    /**
     * @param array $zones
     * @param float $weight
     * @param float $volume
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    private function getShippingPrices(array $zones, float $weight, float $volume)
    {
        $shipping_prices = $this->shippingPrices()->where(function ($q) use ($zones, $weight) {
                $q->whereIn('priceable_id', $zones)->where('priceable_type', Zone::class)->where('min_weight', '<=', $weight)->where('max_weight', '>=', $weight);
            })->orWhere(function ($q) use ($zones, $volume) {
                $q->whereIn('priceable_id', $zones)->where('priceable_type', Zone::class)->where('min_volume', '<=', $volume)->where('max_volume', '>=', $volume);
            })->orderBy('price', 'desc')->first();

        return $shipping_prices;
    }


}
