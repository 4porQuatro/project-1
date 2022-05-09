<?php


namespace Packages\PaymentsMethods\Providers\EuPago;


use Packages\PaymentsMethods\Providers\PaymentDataTransform;

class EuPagoDataTransform implements PaymentDataTransform {

    public $data_received;

    public function getData($data_received, $method, $total)
    {
        $this->data_received = json_decode($data_received);
        if($method == 'DB')
            return $this->transformCC();
        if($method == 'PA-MB')
            return $this->transformMB($total);
        if($method == 'PA-MBWAY')
            return $this->transformMBW();
    }

    public function transformCC()
    {
        return [
            'method'=>'cc',
            'redirect'=>true,
            'data'=>[
                'url'=> $this->data_received->url
            ],
        ];
    }

    public function transformMB($total)
    {
        return [
            'method'=>'mb',
            'redirect'=>false,
            'data'=>[
                'entity'=>$this->data_received->entidade,
                'reference'=> $this->data_received->referencia,
                'value'=>$total,
            ]
        ];
    }

    public function transformMBW()
    {
        return [
            'method'=>'mbw',
            'redirect'=>false,
            'data'=>[],
        ];
    }

}
