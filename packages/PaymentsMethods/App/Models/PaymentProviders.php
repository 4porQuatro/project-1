<?php


namespace Packages\PaymentsMethods\App\Models;


use App\Models\Setting;
use Packages\PaymentsMethods\Providers\EasyPay\EasyPay;
use Packages\PaymentsMethods\Providers\EuPago\EuPago;
use Packages\PaymentsMethods\Providers\Stripe\Stripe;

class PaymentProviders {

    public $avaliable_providers = [
        EasyPay::class => 'EasyPay',
        EuPago::class => 'EuPago',
        Stripe::class =>'Stripe'
    ];

    public $seting_name = 'payment_methods';

    public function getDataProvider(string $class)
    {
        $settings = Setting::where('name', 'payment_methods')->first();
        if(empty($settings))
        {
            $settings = Setting::create(['data'=>[], 'name'=>'payment_methods']);
        }

        if($this->checkIfDataProviderExists($class, $settings))
        {
            $key_for_the_setting = array_search($class, array_column($settings->data, 'provider'));
            $setting = $settings->data[$key_for_the_setting];
            unset($setting['provider']);
            return $setting;
        }
    }

    private function checkIfDataProviderExists($class, $settings)
    {
        return !empty(array_column($settings->data, 'provider'))
            &&  in_array($class, array_column($settings->data, 'provider'));
    }

    public function getPaymentProviderName($class)
    {
        return isset($this->avaliable_providers[$class]) ? $this->avaliable_providers[$class] : 'undefined';
    }

}
