@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Image Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('Imagestabs.create') }}">Add Image</a></li>
           
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

        <form action="{{ route('image.edit',$images_details->id) }}" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label>Image Name</label>
                <input type="text" name="image_name" class="form-control" value="{{$images_details->image_name}}" required>
            </div>
            
            

            <div class="form-group">
                <label>Select Service</label>
                <select required class="form-control" id="product_name" name="product_name">
                    <option value=""></option>
                    @foreach ($product as $item)
                    <option {{isset($images_details)?$images_details->product_id==$item->product_id?'selected':'':''}} value="{{$item->product_title}}">{{$item->product_title}}</option>
                        
                    @endforeach
                </select>
                <span class="material-input"></span>
            </div>

            <div class="form-group">
                <label for="photo">Profile Image</label>
                <input type="file" name="image" class="form-control"/>
                <img src="{{isset($images_details)?$images_details->images:''}}" style="height: 200px;" 
                alt=""/>
            </div>


            <div class="form-group">
                <label>Status</label>
                <input type="checkbox" name="status" {{$images_details->status=="Y"?'checked':''}}>
            </div>
      
       
      

        <input type="submit" class="btn btn-primary" name="save" value="submit">


    </div>
</form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection