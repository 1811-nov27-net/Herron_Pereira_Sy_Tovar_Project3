@foreach ($orders as $order)
    <tr>
        <td>
            <input 
                type='checkbox' 
                name='orders[]' 
                id='order_{{$order->id}}' 
                class='orderItem form-control' 
                value='{{$order->id}}'
            >
        </td>
        <td>{{$order->id}}</td>
        <td>{{$order->order_number}}</td>
        <td>{{$order->store_name}}</td>
        <td>{{$order->order_total}}</td>
        <td>{{$order->date_order->format('m/d/Y')}}</td>
        <td>{{$order->products}}</td>
    </tr>
@endforeach