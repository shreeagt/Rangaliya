@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Product Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home</a></li>
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('admin.create-product') }}">Add Product</a></li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            {{-- <a href="#"><button class='btn btn-info'> List Users</button></a> --}}
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="animated fadeInUp">
     
        <table id="photos_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Product Title</td>
                    <td>Description</td>
                    <td>Product URL</td>
                    <td>Category ID</td>
                    <td>Price</td>
                    <td>Action</td>
                  </tr>
            </thead>
            <tbody>
                @if($products->isNotEmpty())
                @foreach ($products as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->product_title}}</td>
                    <td>  {!! $items->description !!}</td>
                  
                    <td>{{$items->product_url}}</td>
                    <td>{{$items->category}}</td>
                    <td>{{$items->price}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.edit-product',$items->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.destroy-product',$items->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#photos_table').DataTable();
        } );
    </script>
@endsection