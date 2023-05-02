@extends('main.layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2> Categories Page </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a> </li>
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('category.show') }}">Add Category</a></li>

            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">

            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInUp">
            <table id="photos_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Banner Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->category_name }}</td>
                            <td>{{ $data->slug_url }}</td>
                            <td><img height="100px;" src="{{ $data->banner_image }}" /></td>
                            <td class="no-sort no-click" id="bread-actions">
                                <a href="{{ route('categories.edit', $data->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <a href="{{ route('categories.delete', $data->id) }}"
                                    class="btn btn-sm btn-danger">Delete</a>
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
        });
    </script>

@endsection
