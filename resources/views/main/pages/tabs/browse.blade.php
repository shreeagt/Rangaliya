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
     
        <table id="photos_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tab Name</td>
                    <td>Product Title</td>
                    <td>Description</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
             @if($tabs->isNotEmpty())
                    @foreach ($tabs as $items)
                    <tr>
                        <td>{{$items->tab_id}}</td>
                        <td>{{$items->label}}</td>
                        <td>{{$items->product_title}}</td>
                        <td>{!! $items->description !!}</td>
                        <td>{{$items->status}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('tabs.edit',$items->tab_id)}}">Edit</a> 
                          
                            <a class="btn btn-danger" href="{{route('tabs.delete',$items->tab_id)}}">Delete</a>
                           
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
