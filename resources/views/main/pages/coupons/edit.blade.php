@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Coupons Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"> <a href="{{ route('tabs.create') }}">Add Coupon</a></li>
           
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

        <form action="{{ route('coupons.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="coupon_id" value="{{$coupon->id}}"/>
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" class="form-control" value="{{$coupon->code}}" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value=""></option>
                    <option {{$coupon->type=="fixed"?"selected":""}} value="fixed">Fixed</option>
                    <option {{$coupon->type=="percent"?"selected":""}} value="percent">Percent</option>
                </select>
            </div>
            <div class="form-group">
                <label>Value</label>
                <input type="number" name="value" class="form-control" value="{{$coupon->value}}" required>
            </div>
            <div class="form-group">
                <label>Percent Off</label>
                <input type="number" name="percent_off" class="form-control" value="{{$coupon->percent_off}}"  required>
            </div>
           
          

            <input type="submit" class="btn btn-primary" name="save" value="submit">


        </div>
</form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection