@extends('main.layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-8">
        <h2> Tabs Page </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a> </li>
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

        <form action="{{ route('tabs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
     
    
        <div class="form-group">
            <label>Tab Label</label>
            <input type="text" name="tab_label" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="ckeditor" name="description" required></textarea>
            
        </div>


        <div class="form-group">
            <label>Select Service</label>
            <select required class="form-control" id="category" name="product_title">
                <option value="">Select</option>
                <?php foreach ($product as $item) { ?>
                <option value="<?php echo $item['product_title']; ?>"><?php echo $item['product_title']; ?></option>
                <?php } ?>
            </select>
            <span class="material-input"></span>
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <input type="checkbox" name="featured" >
        </div>
       
      

        <input type="submit" class="btn btn-primary" name="save" value="submit">


    </div>
</form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection