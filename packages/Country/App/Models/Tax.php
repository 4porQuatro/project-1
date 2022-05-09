<?php


namespace Packages\Country\App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Country\database\factories\CountryFactory;
use Packages\Country\database\factories\TaxFactory;

class Tax extends Model {

    use HasFactory;

    protected $fillable = ['percentage'];

    protected static function newFactory()
    {
        return TaxFactory::new();
    }

    public function taxable()
    {
        return $this->morphTo();
    }

}
