<?php


namespace Packages\Country\App\Models;


use App\Models\Setting;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Packages\Country\database\factories\CountryFactory;

class   Country extends Model {

    use HasFactory;
    use Translatable;

    protected $fillable = ['code'];
    protected $translatedAttributes = ['name'];
    protected $with=['translations'];
    protected $casts = [
        'active'=>'boolean'
    ];

    protected static function newFactory()
    {
        return CountryFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function taxes()
    {
        return $this->morphMany(Tax::class, 'taxable');
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'country_code', 'code');
    }

    public function getFlagImage($size = '128x128')
    {
        return '/img/cms/flags/'.$size.'/'.$this->code.'.png';
    }

    public function defaultTax()
    {
        $default_tax = Cache::get('default_tax', function(){
            $setting = Setting::where('name', 'default_tax')->first();
            return !empty($setting) ? Setting::where('name', 'default_tax')->first()->data['default_value'] : __('cms.not_defined');
        }, 120);
        return $this->taxes->count() ? $this->taxes->first()->percentage : $default_tax;
    }

    public function getFlagImageAttribute()
    {
        return $this->getFlagImage();
    }

    public function postCodes()
    {
        //https://gist.githubusercontent.com/jayadevn/1a99f8de2b3d95185bf8/raw/bbbe9c50acb24c6930e19e3b0a1951b00a1aebfb/postal-codes.json
        //https://github.com/country-regions/country-region-data/blob/master/data.json
    }

    public function zones()
    {
        return $this->morphToMany(Zone::class, 'zonable');
    }

}
