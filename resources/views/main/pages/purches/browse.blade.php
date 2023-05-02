@extends('main.layouts.app')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2> Purchase Page </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#"> Home </a> </li>
               

            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">

            </div>
        </div>
    </div>
    <?php //dd($purchase->quantity);
    ?>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInUp">
            <table id="photos_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        {{-- <th>User ID</th> --}}
                        <th>Quantity</th>
                        <th>Product Name</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product->isNotEmpty())
                        @foreach ($product as $data)
                            <tr>

                                {{-- <td>
                         <input type="checkbox" name="row_id" id="checkbox_{{ $data->id }}" value="{{ $data->id }}">
                     </td> --}}

                                {{-- @foreach ($dataType->browseRows as $row) --}}

                                <td>{{ $data->id }}</td>
                                {{-- <td>{{$data->user_id}}</td> --}}
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->product_title }}</td>
                                {{-- <td>{{$data->billing_address}}</td>
                     <td>{{$data->billing_city}}</td>
                     <td>Rs.{{($data->billing_subtotal)}}</td>
                     {{-- <td>{{$data->billing_tax/100}}</td> --}}
                                {{-- <td>Rs.{{($data->billing_total)}}</td>
                     <td>{{$data->shipped==0?'No':'Yes'}}</td>  --}}
                                {{-- @endforeach --}}
                                <td>


                                   <td> <button class="btn btn-primary" onclick="ShowProduct('<?php echo $data->product_title; ?>','<?php echo $data->id; ?>')">

                                        Purchase Entry
                                    </button>
                                   </td>


                                </td>
                            </tr>
                        @endforeach
                    @endif
            </table>

        </div>
    </div>
   

    <p>Purchase List</p>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInUp">
            <table  class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Billing Number</th>
                        <th>HSN</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($Purchaselog->isNotEmpty())
                        <?php $i = 1; ?>
                        @foreach ($Purchaselog as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->product_title }}</td>

                                <td>{{ $row->billing_number }}</td>
                                <td>{{ $row->hsn }}</td>
                                <td>{{ $row->quantity }}</td>



                            </tr>
                            <?php
                            $i++;
                            ?>
                        @endforeach
                    @endif
            </table>

        </div>
    </div>
    {{-- <div id="login-modal" class="modal">
        <form action="{{ route('admin.store-purchase') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>product</label>
                <input type="text" id="product_name" name="product"  value="" required>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity"  value="" required>
            </div>


            <div class="form-group">
                <label>HSN</label>
                <input type="text" name="hsn"  value="" required>
            </div>

           

            <div class="form-group">
                <label for="exampleInputPassword1">Billing Number</label>
                <input type="text" name="billing_number" required >
            </div>
            <input style="margin:10px" type="submit" class="btn btn-primary" name="save" value="submit">
        </form>
      </div> --}}

      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.store-purchase') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>product</label>
                        <input type="text" id="product_name" name="product" class="form-control"  value="" required>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity"   class="form-control"   value="" required>
                    </div>
        
                    <div class="form-group">
                        <label>HSN</label>
                        <input type="text" name="hsn"   class="form-control"   value="" required>
                    </div>
              
                    <div class="form-group">
                        <label for="exampleInputPassword1">Billing Number</label>
                        <input type="text" name="billing_number"  class="form-control"   required >
                    </div>
                    <input style="margin:10px" type="submit" class="btn btn-primary" name="save" value="submit">
                </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>





    <script>
        function ShowProduct(product_title,id){
           // alert(product_title)
      
           $('#product_name').val(product_title);
            // $('#login-modal').show();
            $('#login-modal').modal("show");
     
       
       
        }
        $(document).ready(function() {
            $('#photos_table').DataTable();
        });

        $(document).ready(function() {
            $('#photos_table1').DataTable();
        });
    </script>
@endsection
