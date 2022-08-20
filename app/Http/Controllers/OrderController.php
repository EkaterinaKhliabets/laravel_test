<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Jobs\SendEmailOrderJob;
use App\Models\BankAccount;
use App\Models\Client;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    public function create(\App\Services\Rate\Interfaces\RateServiceContract $rateService)
    {
        $clients = Client::all();
        $users = User::not_valid()->get();
        $bankAccounts = BankAccount::all();
        $currencies = Currency::all();
        $products = Product::all();


        return view('orders.create', ['clients' => $clients, 'users' => $users, 'bankAccounts' => $bankAccounts,
            'currencies' => $currencies, 'products' => $products]);
    }

    public function store(StoreOrderRequest $request)
        //public function store(Request $request)
    {
        //dd($request->validated());


        $order = Order::create($request->validated());

        $products = $request->get('product_id');
        $quantity = $request->get('quantity');
        $prices = $request->get('price');
        $kol = count($products);
        //$buys = [];
        for ($i = 0; $i < $kol; $i++) {
            $order->buys()->create([
                'product_id' => $products[$i],
                'quantity' => $quantity[$i],
                'price' => $prices[$i],
                'order_id' => $order->id,
            ]);
        }

        SendEmailOrderJob::dispatch($order);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $clients = Client::all();
        //$users = User::not_valid->get();
        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


}
