<?php


namespace Packages\Orders\App\Http\Requests;

use App\Classes\Rules\RuleSelector;
use App\Models\Form;
use Illuminate\Foundation\Http\FormRequest;
use Packages\Store\app\Classes\Front\Shoppingcart\Cart;

class CheckoutRequest extends FormRequest{

    private $array_rules = [];

    public function authorize()
    {
        $checkout = $this->route('checkout');
        if(!empty($checkout->reservedArea))
            return  auth()->check() &&  auth()->user()->reserved_area_id == $checkout->reserved_area_id;

        return true;
    }

    public function rules()
    {
        $this->generateBillingDataRules();
        $this->generateShippingDataRules();
        $this->generatePaymentMehtodRules();
        $this->generateShippmentMehtodRules();
        return $this->array_rules;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (! (new Cart(session()))->count()) {
                $validator->errors()->add('cart', 'The cart cant be empty');
            }
        });
    }

    public function generateBillingDataRules()
    {
        $form = $this->route('checkout')->billingForm();
        $rules = !empty($form) ? $rules = $this->generateFormRules($form) : [];
        $this->array_rules = array_merge($this->array_rules, $rules);
    }

    public function generateShippingDataRules()
    {
        $form = $this->route('checkout')->shippingForm();
        $rules = !empty($form) ? $rules = $this->generateFormRules($form) : [];
        $this->array_rules = array_merge($this->array_rules, $rules);
    }

    public function generatePaymentMehtodRules()
    {
        $rules = $this->route('checkout')->paymentMethods()->exists() ? ['payment_method_id'=>'required'] : [];
        $this->array_rules = array_merge($this->array_rules, $rules);
    }

    public function generateShippmentMehtodRules()
    {
        $rules = $this->route('checkout')->shippingMethods()->exists() ? ['shipping_method_id'=>'required'] : [];
        $this->array_rules = array_merge($this->array_rules, $rules);
    }

    public function generateFormRules($form)
    {
        $rules = [];
        $rules_selector = new RuleSelector();
        foreach($form->fields as $field)
        {
            $field_rules = $rules_selector->getFromArray($field->rules);
            if($field->type == 'doc')
            {
                $field_rules[] = 'max:2097152';

            }
            $rules[$field->name] = $field_rules;

        }
        return $rules;
    }


}
