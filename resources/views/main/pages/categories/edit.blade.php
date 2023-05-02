@extends('main.layouts.app')
@section('content')
@include('ckfinder::setup')
<style>

</style>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-8">
      <h2> Categories Page </h2>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a>  </li>
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
    <form role="form"
    class="form-edit-add"
    action="{{ route('categories.store') }}"
    method="POST" enctype="multipart/form-data">


<!-- CSRF TOKEN -->
{{ csrf_field() }}

<div class="panel-body">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input hidden name="table_id" value="{{$category->id}}"/>
    <div class="form-group col-md-12">
        <label class="control-label">Name</label>
        <input class="form-control" type="text" name="category_name" 
        value="{{$category->category_name}}"/>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label">Slug</label>
        <input class="form-control" type="text" name="slug_url" value="{{$category->slug_url}}" readonly/>
    </div>
    <div class="form-group col-md-12">
        <label class="control-label">Banner Image</label>
        <input class="form-control"  type="file" name="banner_image" 
        value="{{$category->banner_image}}"/>
        <img src="{{$category->banner_image}}" style="height: 100px;"/>
    </div>
    

    <fieldset class="border p-2">
        <legend  class="float-none w-auto p-2 text-center">Meta Details</legend>
        
        <div class="form-group">
            <label class="control-label">MetaTitle</label>
            <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}" required/>
        </div>

        <div class="form-group">
            <label class="control-label">Meta Description</label>
            <input class="form-control" required type="text" name="meta_desc" value="{{ $category->meta_desc }}" />
        </div>

        <div class="form-group">
            <label class="control-label">Meta Keywords</label>
            <input class="form-control" required type="text" name="meta_keywords"
             value="{{ $category->meta_keywords }}" />
        </div>
        
     </fieldset>
     {{-- OG Details --}}
     <fieldset class="border p-2">
        <legend  class="float-none w-auto p-2 text-center">OG Details</legend>
        
        <div class="form-group">
            <label class="control-label">OG Title</label>
            <input type="text" name="og_title" class="form-control"  value="{{ $category->og_title }}" required/>
        </div>

        <div class="form-group">
            <label class="control-label">OG Description</label>
            <input class="form-control" required type="text" name="og_desc"  value="{{ $category->og_desc }}"  />
        </div>

        <div class="mb-3">
            <label for="formFileSm" class="form-label">OG Image</label>
            <input class="form-control form-control-sm" name="og_image" id="og_image" type="file"  >
            <img src="{{ $category->og_image }}" style="width: 200px;" alt="OG Image" />
        </div>
        
     </fieldset>


    <div class="panel-footer">
        <button type="submit" class="btn btn-primary save">Save</button>
    </div>
</form>
</div>
</div>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection