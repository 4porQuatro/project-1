<?php


namespace Packages\Reserved\tests\Feature;

use App\Models\Form;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Packages\Reserved\App\Constants\AddressesTypes;
use Packages\Reserved\App\Constants\FormTypes;
use Packages\Reserved\App\Models\Address;
use Packages\Reserved\App\Models\Customer;
use Packages\Reserved\App\Models\ReservedArea;
use Tests\TestCase;

class AddressTest extends TestCase {

    use DatabaseMigrations;

    public $reserved;
    public $customer;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        env('APP_COUNTRY', true);
        $this->reserved = ReservedArea::factory()->create(['prefix'=>'prefix_test']);
        $this->customer = Customer::factory()->create([
            'reserved_area_id'=>$this->reserved->id
        ]);
    }

    /** @test */
    public function a_unauthenticated_customer_cant_create_a_address()
    {
        $address_form = $this->generateAddressForm();
       $this->generateRequiredFields($address_form);

        $form_data = $this->generateData($address_form);
        $response = $this->post($address_form->end_point, $form_data);

        $this->assertEquals(route($this->reserved->prefix.'.address'), $address_form->end_point);

        $response->assertStatus(302);
        $response->assertRedirect($this->reserved->loginPage->path());
        $this->assertDatabaseMissing('addresses', ['user_id'=>$this->customer->id]);
    }

    /** @test */
    public function a_unauthenticated_user_cant_get_their_addresses()
    {
        $response = $this->get(route('address.get', ['type'=>AddressesTypes::BILLING, 'prefix_columns'=>true]));
        $response->assertStatus(302);

    }

    /** @test */
    public function the_authenticated_user_can_get_the_billing_addresses_stored_on_the_reserved_area_with_prefixed_columns()
    {
        $this->actingAs($this->customer);
        $billing_data = Address::factory(4)->create(['user_id'=>$this->customer->id, 'type'=>AddressesTypes::BILLING]);
        $expected_result = $billing_data->fresh()->map(function($item){
            $data = [];
            foreach($item->toArray() as $key=>$value)
            {
                if(! in_array($key, ['user_id', 'type', 'updated_at', 'created_at', 'additional_data']))
                    $data[AddressesTypes::BILLING.'_'.$key] = $value;

                if(in_array($key, ['country_id', 'region_id']))
                {
                    $new_key = AddressesTypes::BILLING.'_'.str_replace('_id', '',$key) ;
                    $data[$new_key] = $value;
                }

            }
            return $data;
        });
        $response = $this->get(route('address.get', ['type'=>AddressesTypes::BILLING, 'prefix_columns'=>1]));
        $response->assertStatus(200);
        $this->assertEquals($expected_result, $response->baseResponse->original);

    }

    /** @test */
    public function a_authenticated_customer_can_create_a_address()
    {
        $this->actingAs($this->customer);
        $this->withoutExceptionHandling();

        $address_form = $this->generateAddressForm();
        $this->generateRequiredFields($address_form);

        $form_data = $this->generateData($address_form);
        $this->assertDatabaseMissing('addresses', ['user_id'=>$this->customer->id]);
        $response = $this->post($address_form->end_point, $form_data);
        $this->assertEquals(route($this->reserved->prefix.'.address'), $address_form->end_point);

        $response->assertStatus(302);
        $this->assertDatabaseHas('addresses', ['user_id'=>$this->customer->id]);

    }

    /** @test */
    public function a_authenticated_customer_can_update_a_address()
    {
        $this->actingAs($this->customer);
        $this->withoutExceptionHandling();

        $address_form = $this->generateAddressForm(FormTypes::BILLING_ADDRESS);
        $inputs = $this->generateRequiredFields($address_form);

        $address = Address::factory()->create([
            'user_id'=>$this->customer->id,
            'type'=>AddressesTypes::BILLING
        ]);

        $form_data = $this->generateData($address_form);
        $form_data['address_id'] = $address->id;
        $form_data['name'] = 'new updated name';

        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);

        $response = $this->patch($address_form->end_point, $form_data);
        $this->assertEquals(route($this->reserved->prefix.'.address'), $address_form->end_point);

        $response->assertStatus(302);
        $this->assertDatabaseHas('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);
    }

    /** @test */
    public function a_authenticated_customer_can_only_update_their_own_address()
    {
        $address_form = $this->generateAddressForm(FormTypes::BILLING_ADDRESS);
        $inputs = $this->generateRequiredFields($address_form);

        $address = Address::factory()->create([
            'user_id'=>$this->customer->id,
            'type'=>AddressesTypes::BILLING
        ]);

        $another_customer = Customer::factory()->create([
            'reserved_area_id'=>$this->reserved->id
        ]);

        $this->actingAs($another_customer);

        $form_data = $this->generateData($address_form);
        $form_data['address_id'] = $address->id;
        $form_data['name'] = 'new updated name';

        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);

        $response = $this->patch($address_form->end_point, $form_data);

        $response->assertStatus(403);

        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);
    }

    /** @test */
    public function a_authenticated_user_can_delete_their_own_addresses()
    {
        $this->actingAs($this->customer);
        $this->withoutExceptionHandling();

        $address_form = $this->generateAddressForm(FormTypes::BILLING_ADDRESS);
        $inputs = $this->generateRequiredFields($address_form);

        $address = Address::factory()->create([
            'user_id'=>$this->customer->id,
            'type'=>AddressesTypes::BILLING
        ]);

        $response = $this->delete(route($this->reserved->prefix.'.address.delete', ['address'=>$address->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
        ]);
    }

    /** @test */
    public function a_authenticated_user_can_delete_only_their_own_address()
    {
        $address_form = $this->generateAddressForm(FormTypes::BILLING_ADDRESS);
        $inputs = $this->generateRequiredFields($address_form);

        $address = Address::factory()->create([
            'user_id'=>User::factory()->create()->id,
            'type'=>AddressesTypes::BILLING
        ]);

        $response = $this->delete(route($this->reserved->prefix.'.address.delete', ['address'=>$address->id]));

        $response->assertStatus(302);
        $this->assertDatabaseHas('addresses', [
            'id'=>$address->id,
        ]);
    }

    /** @test */
    public function when_a_user_deletes_a_default_address_the_system_allocated_default_address_to_other()
    {
        $this->actingAs($this->customer);

        $billing_data = Address::factory(4)->create(['user_id'=>$this->customer->id, 'type'=>AddressesTypes::BILLING]);
        $billing_default = Address::factory()->create(['user_id'=>$this->customer->id, 'type'=>AddressesTypes::BILLING, 'default'=>true]);

        $response = $this->json('delete',route($this->reserved->prefix.'.address.delete', ['address'=>$billing_default->id]));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('addresses', [
            'id'=>$billing_default->id,
        ]);

        $this->assertTrue($billing_data->first()->fresh()->default);
    }

    /** @test */
    public function a_user_can_update_the_default_address()
    {
        $this->actingAs($this->customer);

        $billing_data = Address::factory(4)->create(['user_id' => $this->customer->id, 'type' => AddressesTypes::BILLING]);
        $billing_default = Address::factory()->create(['user_id' => $this->customer->id, 'type' => AddressesTypes::BILLING, 'default' => true]);
        $new_default_address = $billing_data->first();

        $this->assertFalse($new_default_address->fresh()->default);
        $this->assertTrue($billing_default->fresh()->default);

        $response = $this->patch(route($this->reserved->prefix.'.address.update.default', ['address'=>$new_default_address->id]));

        $response->assertStatus(302);
        $this->assertTrue($new_default_address->fresh()->default);
        $this->assertFalse($billing_default->fresh()->default);


    }

    /** @test */
    public function a_address_id_is_required_to_update_a_address()
    {
        $this->actingAs($this->customer);

        $address_form = $this->generateAddressForm(FormTypes::BILLING_ADDRESS);
        $inputs = $this->generateRequiredFields($address_form);

        $address = Address::factory()->create([
            'user_id'=>$this->customer->id,
            'type'=>AddressesTypes::BILLING
        ]);

        $form_data = $this->generateData($address_form);
        $form_data['name'] = 'new updated name';

        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);

        $response = $this->patch($address_form->end_point, $form_data);
        $this->assertEquals(route($this->reserved->prefix.'.address'), $address_form->end_point);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('address_id');
        $this->assertDatabaseMissing('addresses', [
            'id'=>$address->id,
            'name'=>$form_data['name']
        ]);
    }

    private function generateAddressForm($type = FormTypes::BILLING_ADDRESS)
    {
        return Form::factory()->create([
            'type' => $type,
            'formable_type' => ReservedArea::class,
            'formable_id' => $this->reserved->id
        ]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $form
     * @return mixed
     */
    private function generateRequiredFields(\Illuminate\Database\Eloquent\Model $form)
    {
        foreach ($this->reserved->formRequiredFields()[$form->type] as $inputs)
        {
            $data = ['name' => $inputs['name'],'label'=>$inputs['label'], 'type' => $inputs['type'], 'rules' => $inputs['rules'], 'editable' => $inputs['editable']];
            $form->fields()->create($data);
        }
        return $inputs;
    }

    private function generateData($form)
    {
        $data = Address::factory()->raw();

        $data['cms_form_id'] = $form->id;

        return $data;
    }


}