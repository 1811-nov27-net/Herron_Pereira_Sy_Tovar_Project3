<?php

namespace App\Http\Controllers;

use App\OrderHistory;
use App\Mail\InvoicesMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderMailRequest;
use Illuminate\Support\Facades\Session;

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

    public function send(OrderMailRequest $request)
    {
        $ids = $request->all()['orders'];

        $model = new OrderHistory();

        for($i=0;$i<count($ids); $i++)
        {
            $id = $ids[$i];

            if($i == 0)
                $model = $model->where(['id' => $id]);
            else
                $model = $model->orWhere(['id' => $id]);
        }

        $invoices = $model->get();

        try
        {
            Mail::to(Auth::user()->email)->send(new InvoicesMail($invoices));
            
            Session::flash('message', ['Sucessfully sent!']); 
            Session::flash('alert-type', 'alert-success'); 
        }
        catch(\Exception $e)
        {
            Session::flash('message', ['Error while sending email!<br/>'.$e->getMessage()]); 
            Session::flash('alert-type', 'alert-danger'); 
        }

        return redirect()->back();
    }
}
