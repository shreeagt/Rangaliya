@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Tabs Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('Imagestabs.create') }}">Add Images</a></li>
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
        <table id="blogs_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image Name</th>
                    {{-- <th>Product Name</th> --}}
                    <th>Image</th>
                   
                    
                    <th>Status</th>
                    <th>Created At</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)   
                <tr>
                    <td>{{$image->id}}</td>
                    <td>{{$image->image_name}}</td>
                    
                    
                   
                    <td><img src="{{$image->images}}" height="150px"></td>
                    <td>{{$image->status}}</td>
                    <td>{{Carbon\Carbon::parse($image->created_at)->format('M d, Y')}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('image.edit',$image->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('image.delete',$image->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
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
