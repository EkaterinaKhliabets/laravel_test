<?php

namespace App\Observers;

use App\Models\Buy;
use App\Models\Order;
use App\Models\Organization;
use App\Notifications\OrderEmailNotification;

class OrderObserver
{
    public $afterCommit = true;

    //после того, как создан Заказ, отправляется клиенту email
    public function created(Order $order)
    {
        /*
        $organization = Organization::get()->first();
       // $order = Order::where('id', $id)->get()->first();
        $bankAccount = $order->bancAccount;
        $client = $order->client;

        $buys = Buy::where('order_id', $order->id)->get();

        $order->client->notify(new OrderEmailNotification($order, $organization, $bankAccount, $client, $buys));*/
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
