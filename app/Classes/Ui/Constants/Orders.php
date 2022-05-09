<?php


namespace App\Classes\Ui\Constants;


class Orders extends ConstantAbstract
{
    public $routes = [
        'cms.order.index',
        'cms.order.show',
    ];

    public function data()
    {
        return [
            'cms.order.index'=>[
                'title'=>Trans('order::cms.order_list')
            ],

            'cms.order.show'=>[
                'title'=>Trans('order::cms.order_details'),
                'back_link'=>[
                    'link'=>route('cms.order.index'),
                    'text'=>Trans('order::cms.order_list')
                ]
            ],
        ];
    }
}
