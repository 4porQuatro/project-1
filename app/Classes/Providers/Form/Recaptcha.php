<?php


namespace App\Classes\Providers\Form;


class Recaptcha {



    public function authenticationData()
    {
        return ['public_key'=>'Chave pública', 'private_key'=>'Chave privada'];
    }
}
