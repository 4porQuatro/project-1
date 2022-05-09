<?php

namespace Packages\shipping_methods\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Packages\Country\App\Models\Zone;
use Packages\shipping_methods\App\Models\ShippingMethod;
use Packages\Store\app\Classes\Front\Shoppingcart\Cart;

class ShippmentMethodsController extends Controller {

    public function get()
    {
        if(request()->has('country'))
        {
            $country_id = request()->get('country');
            $zones = Zone::whereHas('countries', function($q) use ($country_id){
                $q->where('countries.id', $country_id);
            })->get();
            $shipping_methods = ShippingMethod::whereHas('zones', function($q) use ($zones){
                $q->whereIn('zones.id', $zones->pluck('id')->toArray());
            })->get();
            $cart_instance = new Cart(session());

            $shipping_methods = $shipping_methods->map(function($item) use ($country_id, $cart_instance){
                $item->setShippingPriceByAttributesAndCountry($country_id, $cart_instance->getShippmentWeight(), $cart_instance->getShippmentVolume());
                return $item;
            });

            return $shipping_methods;
        }
    }
}
