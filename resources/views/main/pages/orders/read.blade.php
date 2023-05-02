@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Orders Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="/admin/orders"> Home </a>  </li>
          
           
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
         
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="animated fadeInUp">


        <div class="panel-body" style="padding-top:0;">
            <ul>
                
                    <li style="margin-bottom: 10px;list-style:none;">
                        <div>Order Id: {{ $order_details->id }}</div>
                        <div>Billing Email: {{ $order_details->billing_email }}</div>
                        <div>Billing City: {{ $order_details->billing_city }}</div>
                        <div>Order Total: ${{ $order_details->billing_total }}</div>
                        <div>payment id: {{ $order_details->payment_gateway }}</div>

                    </li>
           
            </ul>
        </div>
        <div class="panel-heading" style="border-bottom:0;">
            <h3 class="panel-title">Products for this Order</h3>
        </div>
            <div class="panel-body" style="padding-top:0;">
                <ul>
                    @foreach ($products as $product)
                        <li style="margin-bottom: 10px">
                            <div>Product Id: {{ $product->id }}</div>
                            <div>Product Name: {{ $product->name }}</div>
                            {{-- <div>Product Price: ${{ $product->price }}</div> --}}
                            <div>Product Quantity: {{ $product->product_quantity }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- <div class="panel-heading" style="border-bottom:0;">
                <a href="{{route('order.invoice', $order_details->id)}}"><button type="button" class="btn btn-info btn-lg">Invoice</button>
            </div> --}}


    </div>
</div>


@endsection 