@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2>Contact Page</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item">  <a href="#">Contact</a></li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="animated fadeInUp">
        
        <table id="blogs_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)   
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->message}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->state}}</td>
                    <td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <script>
    $(document).ready(function() {
        $('#blogs_table').DataTable();
    } );
    </script>
    
@endsection