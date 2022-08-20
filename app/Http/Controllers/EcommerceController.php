<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EcommerceController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->limit(5)->get();

        /*$products = DB::table('buys')->select('product_id', DB::raw("sum(quantity) as quantity"))
            ->groupBy('product_id')
            ->join('products', 'product_id','=', 'products.id')
            ->get();*/


        $products = DB::table('buys')->join('products', 'product_id','=', 'products.id')
            ->select('buys.product_id', DB::raw("sum(buys.quantity) as quantity"), 'products.name as name')
            ->groupBy('buys.product_id', 'products.name')
            ->orderByDesc('quantity')
            ->limit(10)
            ->get();

        return view('ecommerce2', ['orders' => $orders, 'products'=>$products ]);
    }

    // в этой функции происходит выборка продаж за последний год, группировка продаж по месяцам и формирование
    // ассоциативного массива данных продаж для передачи в диаграмму продаж за последний год
    public function sales_month(){

        $year = date('Y').'-01-01';

        $sales_month = Order::where('created_at', '>=', $year)->where('paid', '1')->orderBy('created_at')->get()->groupBy(function($events) {
            return Carbon::parse($events->created_at)->format('m'); // А это то-же поле по нему мы и будем группировать
        });

        $arr_sales=[];

        foreach ($sales_month as $key => $value){
            $total = 0;
            $month = $key;
            foreach ($value as $sale){
                $total += $sale->total;
            }
            $arr_sales[$month]=$total;
        }

        return $arr_sales;

    }
}
