<?php

namespace App\Jobs;

use App\Models\Buy;
use App\Models\Order;
use App\Models\Organization;
use App\Notifications\OrderEmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    //после того, как создан Заказ, отправляется клиенту email
    public function handle()
    {
        $organization = Organization::get()->first();
        $bankAccount = $this->order->bancAccount;
        $client = $this->order->client;

        $buys = Buy::where('order_id', $this->order->id)->get();

        $this->order->client->notify(new OrderEmailNotification($this->order, $organization, $bankAccount, $client, $buys));
    }
}
