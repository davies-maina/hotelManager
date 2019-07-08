@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-3">
        
        <div class="col-md-12">

            <p class="display-4">Orders for {{ $hotel->name }}</p> 
            

            <button type="button" class="btn btn-primary">
  Orders <span class="badge badge-light">{{ $orderCount->count() }}</span>
</button>
<div class="col-md-4 offset-10 mb-3"><a href="{{ route('hotel.orders.addorder',$hotel->id) }} "><button type="button" class="btn btn-success">Add order</button></a> </div>
        </div>


        
    </div>

    <div class="row">
        
        <div class="col-md-12">

        	

        	@if($orders->count()>0)
            <table class="table table-hover table-bordered table-striped">
            	
            	<thead>
            		
            		
            		<tr>
            			<th>Order Id</th>
            			<th>Amount</th>
            			<th>Status</th>
            			<th>Order details</th>
            		</tr>
            	</thead>
            	<tbody>
            		
            		@foreach($orders as $order)


            		<tr>
            			<td>{{ $order->id }}</td>
            			<td>{{ $order->amount }}</td>
            			<td>{{ ($order->isComplete) ? 'completed' : 'Incomplete'}}</td>
            			<td>

            				Name:{{ $order['order_details']['customer_name'] }}

            				<br>

            				Location:{{ $order['order_details']['customer_address'] }}

            				<br>

            				Customer phone:{{ $order['order_details']['customer_phone'] }}


            			</td>
            		</tr>

            		@endforeach
            	</tbody>

            </table>
            {{ $orders->render() }}
            @else

            <p class="lead">No Orders at the moment</p>
            @endif
        </div>


        
    </div>
    

           
@endsection
