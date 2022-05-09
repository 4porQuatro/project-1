<?php

namespace Packages\Orders\App\Observers;

use Packages\Orders\App\Models\Order;

class OrderObserver {

    /**
     * Handle the Order "created" event.
     *
     * @param Order $order
     * @return void
     */
    public function created(Order $order)
    {
        $order->statusHistories()->create(['status'=>$order->fresh()->status]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        $status_note = $order->isDirty('status_note') ? $order->status_note : '';
        if($order->isDirty('status')){
            $order->statusHistories()->create(['status'=>$order->status, 'text'=>$status_note]);
        }

    }
}
