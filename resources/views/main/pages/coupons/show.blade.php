@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Coupons Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"> <a href="{{ route('coupons.create') }}">Add Coupon</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('admin-videos-category.create') }}">Add Video Category</a></li> --}}
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
                <td>Code</td>
                <td>Type</td>
                <td>Percent Off</td>
                <td>Created At</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
             @if($coupons->isNotEmpty())
                    @foreach ($coupons as $item)
                    <tr>
                        <td>{{$item->id}}</td>

                        <td>{{$item->code}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->percent_off}}</td>
                        <td>{{Carbon\Carbon::parse($item->created_at)}}</td>
                        <td><a href="{{route('coupons.edit',$item->id)}}" class="btn btn-sucess btn-primary">Edit</a>
                            <a href="{{route('coupons.delete',$item->id)}}" class="btn btn-sucess btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#photos_table').DataTable();
    } );
</script>
@endsection