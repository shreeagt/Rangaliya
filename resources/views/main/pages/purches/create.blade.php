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
            <h2>add purches</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a class="btn btn-primary" href="dashboard"> Home </a> </li>
                {{-- <li class="breadcrumb-item"> <a class="btn btn-primary" href="{{ route('admin.create-product') }}">Add Purches</a></li> --}}

            </ol>
        </div>
        <div class="col-sm-4">
            <div class="title-action">

            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInUp">
            <?php //dd($product); ?>
            <form action="{{ route('admin.store-purchase') }}" method="post" enctype="multipart/form-data">
                @csrf

               
                
                
                <div class="form-group">
                    <label>product</label>
                    <input type="text" name="product" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="" required>
                </div>


                <div class="form-group">
                    <label>HSN</label>
                    <input type="text" name="hsn" class="form-control" value="" required>
                </div>

               

                <div class="form-group">
                    <label for="exampleInputPassword1">Billing Number</label>
                    <input type="text" class="form-control" name="billing_number" required placeholder="Enter service URL">
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
