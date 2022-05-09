<?php


namespace Packages\Orders\tests\Api;


use App\Models\Category;
use Laravel\Sanctum\Sanctum;
use Packages\Country\App\Models\Country;
use Packages\Orders\App\Constants\OrderStatus;
use Packages\Orders\App\Models\Order;
use Packages\Store\app\Models\Product;
use Tests\Feature\cms\CmsTestCase;

class OrderTest extends CmsTestCase {

    public $orders;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Sanctum::actingAs(
            $this->user_with_permissions,
            ['store_items']
        );
        $this->orders = Order::factory(5)->create(['country_id'=>Country::first()]);

    }

    /** @test */
    public function a_authorized_user_can_get_the_list_of_orders()
    {
        $response = $this->json('GET', route('api.order.get'));

        $response->assertStatus(200);

        $data_received = $response->baseResponse->original;
        $this->orders->each(function($item) use ($data_received)
        {
           $this->assertCount(1, $data_received->where('id', $item->id));
        });
        $this->assertCount(5, $data_received);
    }

    /** @test */
    public function a_authorized_user_can_update_the_state_for_a_given_order()
    {
        $order = Order::factory()->create(['status' => OrderStatus::AWAITING_SHIPPMENT]);

        $response = $this->json('PUT', route('api.order.update', ['id'=>$order->id]), ['status'=>OrderStatus::PARTIALY_SHIPPED ]);

        $response->assertStatus(200);

        $this->assertEquals(OrderStatus::PARTIALY_SHIPPED, $order->fresh()->status);

    }

    /** @test */
    public function when_a_status_changes_a_user_can_add_a_status_note()
    {
        $order = Order::factory()->create(['status' => OrderStatus::AWAITING_SHIPPMENT]);
        $status_note = 'olá mundo';
        $response = $this->json('PUT', route('api.order.update', ['id'=>$order->id]), ['status'=>OrderStatus::PARTIALY_SHIPPED, 'status_note'=>$status_note ]);

        $response->assertStatus(200);

        $this->assertEquals($status_note, $order->fresh()->status_note);
        $this->assertEquals($status_note, $order->fresh()->statusHistories->sortByDesc('id')->first()->text);
    }

    /** @test */
    public function a_authorized_user_can_change_the_tracking_url_for_a_given_order()
    {
        $order = Order::factory()->create(['status' => OrderStatus::AWAITING_SHIPPMENT]);
        $tracking_code_url = 'https://www.facebook.com';
        $response = $this->json('PUT', route('api.order.update', ['id'=>$order->id]), ['status'=>OrderStatus::PARTIALY_SHIPPED, 'tracking_code_url'=>$tracking_code_url ]);

        $response->assertStatus(200);

        $this->assertEquals('https://www.facebook.com', $order->fresh()->tracking_code_url);
    }

    /** @test */
    public function the_tracking_code_must_be_a_url()
    {
        $order = Order::factory()->create(['status' => OrderStatus::AWAITING_SHIPPMENT]);
        $tracking_code_url = 'fkdas';
        $response = $this->json('PUT', route('api.order.update', ['id'=>$order->id]), ['status'=>OrderStatus::PARTIALY_SHIPPED, 'tracking_code_url'=>$tracking_code_url ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['tracking_code_url']);
    }

    /** @test */
    public function a_authorized_user_can_set_a_tracking_code()
    {
        $order = Order::factory()->create(['status' => OrderStatus::AWAITING_SHIPPMENT]);
        $tracking_code = 'tracking';
        $response = $this->json('PUT', route('api.order.update', ['id'=>$order->id]), ['status'=>OrderStatus::PARTIALY_SHIPPED, 'tracking_code'=>$tracking_code ]);

        $response->assertStatus(200);
        $this->assertEquals($tracking_code, $order->fresh()->tracking_code);
    }



    /** @test */
    public function a_authorized_user_can_filter_orders_by_state()
    {
        $new_orders_pending = Order::factory(3)->create(['status'=>OrderStatus::AWAITING_SHIPPMENT]);

        $response = $this->json('GET', route('api.order.get', ['status'=>OrderStatus::AWAITING_SHIPPMENT]));

        $response->assertStatus(200);

        $data_received = $response->baseResponse->original;
        $new_orders_pending->each(function($item) use ($data_received)
        {
            $this->assertCount(1, $data_received->where('id', $item->id));
        });
        $this->assertCount(3, $data_received);
    }


    protected function getPermissions()
    {
        return ['order_index',  'order_update'];
    }
}