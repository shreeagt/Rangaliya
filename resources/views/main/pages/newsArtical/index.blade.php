@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2>News and artical</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item"><a href="{{ route('admin-news.create') }}" >
                Add News</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('admin-case-category.create') }}" >Add News Category</a></li> --}}
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
     
        <table id="videos_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Title</th>
                    <th>News Url</th>
                    <th>News Tags</th>
                    <th>News Description</th>
                    <th>News Thumbnail</th>
                    <th>News Status</th>
                    <th>Created At</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->news_title}}</td>
                    <td>{{$item->news_url}}</td>
                    <td>{{$item->news_tag}}</td>
                    <td>{{$item->news_description}}</td>
                    <td><img src="{{$item->news_thumbnail}}" height="150px"/></td>
                    <td>{{$item->news_status}}</td>
                    <td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</td>
                    <td>
                        <a href="{{route('admin-news.delete',$item->id)}}" style="color: white;" class="btn btn-danger">Delete</a>
                        <a href="{{route('admin-news.edit',$item->id)}}" style="color: white;" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#videos_table').DataTable();
        } );
    </script>
@endsection