<p>Hello {{Auth::user()->name}},</p>
<p>Here are the invoices you selected</p>

@foreach ($invoices as $invoice)
    <p>
        <strong>ID:</strong> {{$invoice->id}}<br/>
        <strong>Order Number:</strong> {{$invoice->order_number}}<br/>
        <strong>Store:</strong> {{$invoice->store_name}}<br/>
        <strong>Total:</strong> $ {{number_format($invoice->order_total, 2)}}<br/>
        <strong>Date:</strong> {{$invoice->date_order->format('m/d/Y H:i:s')}}<br/>
        <strong>Products:</strong><br/> 
        {!!$invoice->products!!}
    </p>
@endforeach