@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2>Add More Product </h2>
        {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a> </li>
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('admin.create-product') }}">Add Products</a></li>

        </ol> --}}
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="animated fadeInUp d-flex justify-content-between">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Add More Images
        </button>
        <a href="{{ route('admin-products.index') }}" type="button" class="btn btn-primary">
            Back to List
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">More Products</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.storemoreimage') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Choose Image</label>
                                <input name="image" class="form-control" type="file" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="video" class="form-label">Choose Video</label>
                                <input name="video" class="form-control" type="file" id="video">
                            </div>
                            <div class="mb-3">
                                <label for="youtube-link" class="form-label">Add Youtube Link</label>
                                <input name="youtube_link" type="text" class="form-control" id="youtube-link" placeholder="Add Youtube Link">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                </div>
            </div>
        </div>

    </div>
</div>
</div>



@endsection