<?php

namespace Packages\PaymentsMethods\database\seeders;

use App\Models\ModelSetting;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Article;

class AddModelSettings extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelSetting::create(['name'=>'Pagamentos', 'model'=>Article::class, 'allowed_fields'=>["title","subtitle","small_body","images"]]);
    }

    public function runInverse()
    {
        ModelSetting::where('name', 'Pagamentos')->get()->each(function($m){
            $m->delete();
        });
    }



}
