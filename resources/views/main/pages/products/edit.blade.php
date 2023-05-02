@extends('main.layouts.app')
@section('content')
    @include('ckfinder::setup')
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
            <h2> Product Page</h2>
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
                <input name="table_id" hidden value="{{ $product_details->id }}" />

                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="product_title" class="form-control" required
                        value="{{ $product_details->product_title }}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control"  required value="{{$product_details->description}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Product URL</label>
                    <input type="text" class="form-control" name="product_url" required placeholder="Enter service URL" value="{{$product_details->product_url}}">
                </div>

                
                <div class="form-group">
                    <label>Select Category</label>
                    <select required class="form-control" id="category" name="category">
                        <option value=""></option>
                        @foreach ($category_data as $item)
                        <option {{isset($product_details)?$product_details->category==$item->category_name?'selected':'':''}} value="{{$item->category_name}}">{{$item->category_name}}</option>
                            
                        @endforeach
                    </select>
                    <span class="material-input"></span>
                </div>
                
                <div class="form-group">
                    <label for="formFileSm" class="form-label">Amount</label>
                    <input type="text" name="price" class="form-control" 
                    value="{{ $product_details->price }}" maxlength="20" required>
                </div>

                <div class="form-group">
                    <label for="formFileSm" class="form-label">Quantity</label>
                    <input type="text" name="quantity" class="form-control" 
                    value="{{ $product_details->quantity }}" maxlength="20" readonly required>
                </div>
               
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Select Image</label>
                    <input type="file" class="form-control form-control-sm" name="banner_image" id="banner_image"   >
                    <img src="{{ $product_details->images }}" style="width: 200px;" alt="Product Image" />
                </div>

                <div class="form-group">
                    <label class="control-label">Best Seller</label>
                    <input type="checkbox" {{ $product_details->best_seller == '1' ? 'checked' :'' }}
                     name="best_seller" value="1">

                     <label class="control-label">Home</label>
                     <input type="checkbox" {{ $product_details->home == '1' ? 'checked' : '' }} name="home" value="1">
                </div>

                <div class="form-group">
                    <label for="tags">Sub-Services</label>
                    <select name="sub_services[]" multiple class="form-control">
                        <?php foreach ($products as $sub_services) { ?>
                            <option {{ $product_details->sub_services == $sub_services['product_title'] ? 'selected' : '' }}
                                value="{{ $sub_services['product_title'] }}"><?php echo $sub_services['product_title']; ?></option>
                            <?php } ?>
                    </select>
                </div>

                <fieldset class="border p-2">
                    <legend  class="float-none w-auto p-2 text-center">Meta Details</legend>
                    
                    <div class="form-group">
                        <label class="control-label">MetaTitle</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $product_details->meta_title }}" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Description</label>
                        <input class="form-control" required type="text" name="meta_desc" value="{{ $product_details->meta_desc }}" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Meta Keywords</label>
                        <input class="form-control" required type="text" name="meta_keywords"
                         value="{{ $product_details->meta_keywords }}" />
                    </div>
                    
                 </fieldset>
                 {{-- OG Details --}}
                 <fieldset class="border p-2">
                    <legend  class="float-none w-auto p-2 text-center">OG Details</legend>
                    
                    <div class="form-group">
                        <label class="control-label">OG Title</label>
                        <input type="text" name="og_title" class="form-control"  value="{{ $product_details->og_title }}" required/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">OG Description</label>
                        <input class="form-control" required type="text" name="og_desc"  value="{{ $product_details->og_desc }}"  />
                    </div>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">OG Image</label>
                        <input class="form-control form-control-sm" name="og_image" id="og_image" type="file"  >
                        <img src="{{ $product_details->og_image }}" style="width: 200px;" alt="OG Image" />
                    </div>
                    
                 </fieldset>
                <input type="submit" class="btn btn-primary" name="save" value="submit">
        </div>
        </form>
    </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
@endsection