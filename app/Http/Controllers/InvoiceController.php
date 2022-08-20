<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Client;
use App\Models\Order;
use App\Models\Organization;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($id){

        $organization = Organization::get()->first();
        $order = Order::where('id', $id)->get()->first();
        $bankAccount = $order->bancAccount;
        $client = $order->client;

        $buys = Buy::where('order_id', $id)->get();

        return view('email.order', [
            'organization'=> $organization,
            'order' => $order,
            'client' => $client,
            'bankAccount' => $bankAccount,
            'buys' => $buys,
        ]);
    }
}
