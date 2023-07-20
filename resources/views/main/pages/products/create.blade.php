@extends('main.layouts.app')
@section('content')
    <!-- @include('ckfinder::setup') -->
    <style>
        /* .ck-content ul li{ list-style-position: inside; }
     .ck-content {color:#000;}
     .ck.ck-editor__top.ck-reset_all { position:absolute !important; top:0px !important; width:100% !important; z-index:999;  }
    .ck.ck-editor__main { height:600px !important; overflow-y:scroll !important; padding-top:40px; }
    main .content-container  { overflow-x: hidden; color:black;}
    main .ck.ck-content { min-height:600px !important; }

    .blog_after_crop  { height:250px !important; margin-bottom:12px !important; }
    .ck-content a {text-decoration: underline;} */
    </style>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
            <h2> Product Page </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a> </li>
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('admin.create-product') }}">Add Products</a></li>

            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">

            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInUp">
            <form action="{{ route('admin.store-product') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="product_title" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="ckeditor" name="description" required></textarea>
                  
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Product URL</label>
                    <input type="text" class="form-control" name="product_url" required placeholder="Enter service URL">
                </div>

                <div class="form-group">
                    <label>Select Category</label>
                    <select required class="form-control" id="category" name="category">
                        <option value="">Select</option>
                        <?php foreach ($allCategory as $category) { ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    </select>
                    <span class="material-input"></span>
                </div>
                
                
                <div class="form-group">
                    <label for="formFileSm" class="form-label">Amount</label>
                    <input type="text" name="price" class="form-control" value="" maxlength="20" required>
                </div>

                <div class="form-group">
                    <label for="formFileSm" class="form-label">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="" maxlength="20" required>
                </div>
            
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Banner Image</label>
                    <input class="form-control form-control-sm" name="banner_image" id="banner_image" type="file">
                </div>

                <div class="form-group">
                    <label class="control-label">Top Seller</label>
                    <input type="checkbox" name="best_seller" value="1">

                    <label class="control-label">Home</label>
                    <input type="checkbox" name="home" value="1">

                    <div class="form-group">
                        <label for="sub_services">Sub-Services</label>
                        <select name="sub_services[]" multiple class="form-control h-75">
                            <option value="">Select</option>
                            @foreach($products as $sub_services)
                                <option value="{{$sub_services['product_title']}}">{{$sub_services['product_title']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <fieldset class="border p-2">
                    <legend  class="float-none w-auto p-2 text-center">Meta Details</legend>
                    
                    <div class="form-group">
                        <label class="control-label">MetaTitle</label>
                        <input type="text" name="meta_title" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <input class="form-control" required type="text" name="meta_desc" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Keywords</label>
                        <input class="form-control" required type="text" name="meta_keywords" />
                    </div>
                    
                 </fieldset>
                 {{-- OG Details --}}
                 <fieldset class="border p-2">
                    <legend  class="float-none w-auto p-2 text-center">OG Details</legend>
                    
                    <div class="form-group">
                        <label class="control-label">OG Title</label>
                        <input type="text" name="og_title" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">OG Description</label>
                        <input class="form-control" required type="text" name="og_desc" />
                    </div>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">OG Image</label>
                        <input class="form-control form-control-sm" name="og_image" id="og_image" type="file">
                    </div>
                    
                 </fieldset>

                <input style="margin:10px" type="submit" class="btn btn-primary" name="save" value="submit">
            </form>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    <script>
        CKFinder.config({
            connectorPath: '/ckfinder/connector'
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection
