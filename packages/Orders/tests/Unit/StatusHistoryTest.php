<?php

namespace Packages\Orders\tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Packages\Orders\App\Models\Order;
use Packages\Orders\App\Models\StatusHistory;
use Tests\TestCase;

class StatusHistoryTest extends TestCase {

    use DatabaseMigrations;

    public $order;


    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->order = Order::factory()->create();
    }

    /** @test */
    public function a_status_history_belongs_to_a_order()
    {
        $history = StatusHistory::factory()->create(['order_id' => $this->order->id]);

        $this->assertInstanceOf(Order::class, $history->order);
    }

    /** @test */
    public function a_status_history_can_have_a_text()
    {
        $history = StatusHistory::factory()->create(['order_id' => $this->order->id]);

        $this->assertArrayHasKey('text', $history->toArray());
        $this->assertNotNull($history->text);
    }

    /** @test */
    public function when_a_order_its_geneerated_a_history_status_its_generated()
    {
        $this->assertCount(1, $this->order->statusHistories);
        $this->assertInstanceOf(StatusHistory::class, $this->order->statusHistories->first());
    }

    /** @test */
    public function when_a_order_its_edited_and_the_field_status_dont_change_the_no_status_history_its_generated()
    {
        $this->order->total = 50;
        $this->order->save();

        $this->assertCount(1, $this->order->fresh()->statusHistories);
    }

    /** @test */
    public function when_a_order_status_changes_new_history_status_its_generated()
    {
        $this->order->status = $this->order->status+1;
        $this->order->save();
        $this->assertCount(2, $this->order->fresh()->statusHistories);

    }

    /** @test */
    public function when_o_order_status_changes_with_a_note_then_the_note_its_added_to_the_history()
    {
        $this->order->status = $this->order->status+1;
        $this->order->status_note = 'Olá mundo';
        $this->order->save();
        $this->assertCount(2, $this->order->fresh()->statusHistories);
        $this->assertEquals($this->order->status_note, $this->order->fresh()->statusHistories->sortByDesc('id')->first()->text);
    }



}