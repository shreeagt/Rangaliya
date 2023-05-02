@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Tabs Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('tabs.create') }}">Add Tab</a></li>
           
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

        <form action="{{ route('tabs.edit-store',$tab_details->tab_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tab Label</label>
                <input type="text" name="tab_label" class="form-control" value="{{$tab_details->label}}" required>
            </div>
            
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control"  required value="{{$tab_details->description}}">
            </div>

            <div class="form-group">
                <label>Select Service</label>
                <select required class="form-control" id="product_title" name="product_title">
                    <option value=""></option>
                    @foreach ($product_data as $item)
                    <option {{isset($tab_details)?$tab_details->product_title==$item->product_title?'selected':'':''}} value="{{$item->product_title}}">{{$item->product_title}}</option>
                        
                    @endforeach
                </select>
                <span class="material-input"></span>
            </div>


            <div class="form-group">
                <label>Status</label>
                <input type="checkbox" name="featured" {{$tab_details->status=="Y"?'checked':''}}>
            </div>
      
       
      

        <input type="submit" class="btn btn-primary" name="save" value="submit">


    </div>
</form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection