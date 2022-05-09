<?php


namespace App\Classes\Providers\Form;


use App\Models\Setting;
use Packages\PaymentsMethods\Providers\EasyPay\EasyPay;
use Packages\PaymentsMethods\Providers\EuPago\EuPago;
use Packages\PaymentsMethods\Providers\Stripe\Stripe;

class FormProviders {

    public $avaliable_providers = [
        Recaptcha::class => 'Recaptcha V3',
    ];

    public $setting_name = 'form_providers';

    public function getDataProvider(string $class)
    {
        $settings = Setting::where('name', $this->setting_name)->first();
        if(empty($settings))
        {
            $settings = Setting::create(['data'=>[], 'name'=>$this->setting_name]);
        }

        if($this->checkIfDataProviderExists($class, $settings))
        {
            $key_for_the_setting = array_search($class, array_column($settings->data, 'provider'));
            $setting = $settings->data[$key_for_the_setting];
            unset($setting['provider']);
            return $setting;
        }
        return null;
    }

    private function checkIfDataProviderExists($class, $settings)
    {
        return !empty(array_column($settings->data, 'provider'))
            &&  in_array($class, array_column($settings->data, 'provider'));
    }

    public function getProviderName($class)
    {
        return isset($this->avaliable_providers[$class]) ? $this->avaliable_providers[$class] : 'undefined';
    }
}
