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
        <table id="photos_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>User Email</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Price</th>
                    {{-- <th>Tax</th> --}}
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
              </tr>
            </thead>
            <tbody>
                <?php //dd($orders)?>
             @if($orders->isNotEmpty())
             @foreach($orders as $data)
             <tr>
               
                     {{-- <td>
                         <input type="checkbox" name="row_id" id="checkbox_{{ $data->id }}" value="{{ $data->id }}">
                     </td> --}}
               
                 {{-- @foreach($dataType->browseRows as $row) --}}
              
                     <td>{{$data->id}}</td>
                     <td>{{$data->user_id}}</td>
                     <td>{{$data->billing_email}}</td>
                     <td>{{$data->billing_name}}</td>
                     <td>{{$data->billing_address}}</td>
                     <td>{{$data->billing_city}}</td>
                     <td>Rs.{{($data->billing_subtotal)}}</td>
                     {{-- <td>{{$data->billing_tax/100}}</td> --}}
                     <td>Rs.{{($data->billing_total)}}</td>
                     <td>{{$data->order_status}}</td>
                     {{-- <td><p id="order_status"></p></td> --}}
                 {{-- @endforeach --}}
                 <td>
                
                    
          
                     
                         <a href="{{ route('orders.read', $data->id) }}">
                            View
                         </a>
                    
                 </td>

                 <td>
                    <select class="form-control"
                    id="mySelect{{ $data->id}}"
                    onchange="myFunction('<?php echo $data->id ?>','<?php echo $data->billing_email ?>','<?php echo $data->billing_name ?>')">
                    <option disabled selected>Select Status</option>
                    <option value="dispatched">Dispatch done</option>
                    <option value="shipped">Shipped</option>
                    {{-- <option value="order_placed">Time Out</option> --}}
                    <option value="delivered">Delivered</option>
                </select>
            </td>
             </tr>
             @endforeach
                @endif
        </table>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#photos_table').DataTable();
        } );

        function myFunction(id,billing_email,billing_name) {
                //  alert(id);
                var status = $("#mySelect" + id).val();
                //alert(status);

                $.ajax({
                    //type
                    //url: "/changeStatus",
                  
                    url:"{{route('changeStatus') }}",
                    type: "get",
                    data: {
                        "id": id,
                        "status": status,
                        "billing_name": billing_name,
                        "billing_email": billing_email
                    },
                    success: function(r) {
                        Swal.fire({
                                    icon: 'success',
                                    text:'order status changed to ' +r,
                                })
                           
                            $('#order_status').html(r); 
                            location.reload();

                    }
                })
            }
    </script>
@endsection      