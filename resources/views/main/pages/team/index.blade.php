@extends('main.layouts.app')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Team </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
            <li class="breadcrumb-item">  <a href="{{route('admin-team.create')}}">Add Team Members</a></li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            {{-- <a href="#"><button class='btn btn-info'> List Team Members</button></a> --}}
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="animated fadeInUp">
        
        <table id="team_table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team as $item)
                    
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->designation}}</td>
                    <td>{{$item->email}}</td>
                    <td><img src="{{$item->profile_image}}" height="150px"></td>
                   
                    <td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</td>
                    <td>
                        <a href="{{route('admin-team.delete',$item->id)}}" style="color: white;" class="btn btn-danger">Delete</a>
                        
                    </td>
                    <td><a href="{{route('admin-team.edit',$item->id)}}" style="color: white;" class="btn btn-success">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                <th>ID</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </tfoot> -->
        </table>
  
    </div>
</div>

    <script>
        $(document).ready(function() {
    $('#team_table').DataTable();
} );
    </script>
    @include('main.Layouts.admin_footer')
@endsection