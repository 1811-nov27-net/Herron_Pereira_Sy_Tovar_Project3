<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderHistory;

class OrdersController  extends Controller
{
    public function index()
    {
        $orders = OrderHistory::all();

        foreach($orders as $order)
        {

            $order->products = explode('<br>',$order->products);
            $order->products = implode(', ', $order->products);
            $order->products = explode('<br/>',$order->products);
            $order->products = implode(', ', $order->products);
        }

        return view('orders.index', compact('orders'));
    }

    public function search($search = null)
    {
        if(!isset($search))
            $orders = OrderHistory::all();
        else if(is_numeric($search)) {
            $orders = OrderHistory::where(['id' => $search])
                        ->orWhere(['order_number' => $search])
                        ->get();
        }
        else
            $orders = OrderHistory::where([['store_name', 'like', '%'.$search.'%']])->get();

        foreach($orders as $order)
        {
            $order->products = explode('<br>',$order->products);
            $order->products = implode(', ', $order->products);
            $order->products = explode('<br/>',$order->products);
            $order->products = implode(', ', $order->products);
        }

        return view('orders._list', compact('orders'));
    }
}
