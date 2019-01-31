<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderHistory;
use Hamcrest\Type\IsInteger;
use Hamcrest\Type\IsString;

class OrderHistoryController extends Controller
{
    public function index($search = null)
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

        return $orders;
    }
}
