<?php

namespace Packages\Store\tests\Api;

use App\Models\ExternalReference;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Packages\Store\app\Models\Attribute;
use Packages\Store\app\Models\AttributeFamily;
use Tests\Feature\cms\CmsTestCase;
use Tests\TestCase;

class AttributeFamilyTest extends CmsTestCase
{
    use DatabaseMigrations;

    public $external_references;
    public $attributes;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Sanctum::actingAs(
            $this->user_with_permissions,
            ['store_items']
        );
        $this->attributes = Attribute::factory(4)->create();
    }

    /** @test */
    public function a_authorized_user_can_create_a_new_attribute_family()
    {
        $data = ['title'=>'reco'];

        $response = $this->post(route('api.attribute_family.store'), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('attribute_family_translations', ['title'=>$data['title']] );
    }


    /** @test */
    public function when_a_user_create_a_new_attribute_family_it_can_add_attributes()
    {
        $data = ['title' => 'reco', 'attribute_identifiers' => $this->attributes->pluck('id')->toArray()];

        $response = $this->post(route('api.attribute_family.store'), $data);

        $response->assertStatus(200);
        foreach(AttributeFamily::first()->attributes as $attribute)
            $this->assertTrue(!empty(array_intersect([$attribute->id], $this->attributes->pluck('id')->toArray())));

    }

    /** @test */
    public function on_creation_the_family_must_have_a_title()
    {
        $data = ['attribute_identifiers' => $this->attributes->pluck('id')->toArray()];

        $response = $this->post(route('api.attribute_family.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }


    /** @test */
    public function on_creation_if_the_data_has_idenfier_attributes_must_be_of_type_of_array()
    {
        $data = ['title'=>'ola', 'attribute_identifiers'=>'reco', 'identifier' => 'required'];

        $response = $this->post(route('api.attribute_family.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors( 'attribute_identifiers');
    }

    /** @test */
    public function a_authorized_user_can_update_a_exiting_attribute_family()
    {
        $attribute_family = AttributeFamily::factory()->create();

        $data = ['title' => 'reco', 'attribute_identifiers' => $this->attributes->pluck('id')->toArray(), 'pt'=>['title'=>'reco']];

        $response = $this->put(route('api.attribute_family.update', ['attribute_family'=>$attribute_family->id]), $data);
        $response->assertStatus(200);

        $this->assertDatabaseHas('attribute_family_translations', ['title'=>$data['title']] );

        foreach($this->attributes as $attribute)
            $this->assertDatabaseHas('attribute_attribute_family', ['attribute_id' => $attribute->id, 'attribute_family_id'=>$attribute_family->id]);
    }

    /** @test */
    public function the_external_reference_must_exists_on_update()
    {
        $data = ['title' => 'reco', 'pt'=>['title'=>'reco'], 'attribute_identifiers'=>[]];

        $response = $this->put(route('api.attribute_family.update', ['attribute_family'=>32]), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('attribute_family');
    }

    protected function getPermissions()
    {
        return ['attribute_family_index', 'attribute_family_show', 'attribute_family_store', 'attribute_family_update', 'attribute_family_destroy'];
    }
}
