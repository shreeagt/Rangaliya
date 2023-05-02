@extends('main.layouts.app')
@section('content')
@include('ckfinder::setup')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-8">
      <h2>News and artical Page</h2>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"> <a href="dashboard"> Home </a>  </li>
          <li class="breadcrumb-item"><a href="{{ route('admin-news.create') }}" >Add news</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{ route('admin-case-category.create') }}" >Add case Category</a></li> --}}
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
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if (isset($news_details))
  
    <input hidden value="{{$news_details->id}}" name="news_id"/>
    @endif
    <div class="form-group">
      <label for="exampleInputEmail1">News Title</label>
      <input type="text" class="form-control" name="news_title" required value="{{ isset($news_details)?$news_details->news_title:'' }}" aria-describedby="emailHelp" placeholder="Enter news Title">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">News URL</label>
      <input type="text" class="form-control" name="news_url" required value="{{isset($news_details)?$news_details->news_url:''}}" {{isset($news_details)?'readonly':''}}  placeholder="Enter news URL">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Select News Category</label>
    <select name="news_category_id" class="form-control" required>
      <option value="">select</option>
      @foreach ($news_categories as $item)
      <option {{isset($news_details)?$news_details->news_category_id==$item->id?'selected':'':''}} value="{{$item->category_title}}">{{$item->category_title}}</option>          
      @endforeach
    </select>
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">News Tag</label>
        <input type="text" class="form-control"  name="news_tag" value="{{isset($news_details)?$news_details->news_tag:''}}"  placeholder="Enter news Tag">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">News Description</label>
        <input type="text" class="form-control" name="news_description" value="{{isset($news_details)?$news_details->news_description:''}}"  placeholder="Enter news Description">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">News Keyword</label>
        <input type="text" class="form-control"  name="news_keyword" value="{{isset($news_details)?$news_details->news_keyword:''}}" placeholder="Enter news Keywords">
      </div>

      <div class="form-group">
        <label for="editor">News Body</label>
        <textarea class="editor" name="news_body" id="editor">{!! isset($news_details)?$news_details->news_body:'' !!}</textarea>
      </div>

      <div class="form-group">
        <label for="editor">News Thumbnail</label>
        <input type="file" name="news_thumbnail" class="form-control" value="{{isset($news_details)?$news_details->news_thumbnail:''}}"/>
        <img src="{{isset($news_details)?$news_details->news_thumbnail:''}}" style="height: 200px;" alt=""/>
      </div>
      <div class="form-group">
        <label for="editor">News Banner Type</label>
        <select name="news_banner_type" class="form-control">
          <option value="Image" {{isset($news_details)?$news_details->news_banner_type=='Image'?'selected':'':''}}>Image</option>
          <option value="Video" {{isset($news_details)?$news_details->news_banner_type=='Video'?'selected':'':''}}>Video</option>
        </select>
      </div>
      <div class="form-group">
        <label for="editor">News Banner</label>
        <input type="file" name="news_banner" class="form-control"/>
        <img src="{{isset($news_details)?$news_details->nesw_banner:''}}" style="height: 200px;" alt=""/>
      </div>
      <div class="form-group">
        <label for="editor">News Status</label>
        <select name="news_status" class="form-control">
          <option value="Draft" {{isset($news_details)?$news_details->news_status=='Draft'?'selected':'':''}}>Draft</option>
          <option value="Publish" {{isset($news_details)?$news_details->news_status=='Publish'?'selected':'':''}}>Publish</option>
          {{-- <option value="Archive">Archive</option> --}}
        </select>
      </div>

      <fieldset class="border p-2">
        <legend  class="float-none w-auto p-2 text-center">Meta Details</legend>
        
        <div class="form-group">
            <label class="control-label">MetaTitle</label>
            <input type="text" name="meta_title" class="form-control" required
            value="{{isset($news_details)?$news_details->meta_title:''}}"/>
        </div>

        <div class="form-group">
            <label class="control-label">Meta Description</label>
            <input class="form-control" required type="text" name="meta_desc" 
            value="{{isset($news_details)?$news_details->meta_desc:''}}"/>
        </div>

        <div class="form-group">
            <label class="control-label">Meta Keywords</label>
            <input class="form-control" required type="text" name="meta_keywords" 
            value="{{isset($news_details)?$news_details->meta_keywords:''}}"/>
        </div>
        
     </fieldset>
     {{-- OG Details --}}
     <fieldset class="border p-2">
        <legend  class="float-none w-auto p-2 text-center">OG Details</legend>
        
        <div class="form-group">
            <label class="control-label">OG Title</label>
            <input type="text" name="og_title" class="form-control" required
            value="{{isset($news_details)?$news_details->og_title:''}}"/>
        </div>

        <div class="form-group">
            <label class="control-label">OG Description</label>
            <input class="form-control" required type="text" name="og_desc" 
            value="{{isset($news_details)?$news_details->og_desc:''}}"/>
            
        </div>

        <div class="mb-3">
            <label for="formFileSm" class="form-label">OG Image</label>
            <input class="form-control form-control-sm" name="og_image" id="og_image" type="file"
            {{isset($news_details)?'':'required'}}>
            <img src="{{isset($news_details)?$news_details->og_image:''}}" style="height: 200px;" alt=""/>
        </div>
        
     </fieldset>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
  <link href="{{ url('css/bootstrap-tokenfield.css') }}" rel="stylesheet" />
  <script src="{{ url('js/bootstrap-tokenfield.js') }}"></script>

  <script>
    $('#case_tag').tokenfield({
  // autocomplete: {
    
  //   delay: 100
  // },
  // showAutocompleteOnFocus: true
});

$('#case_keyword').tokenfield({
  // autocomplete: {
    
  //   delay: 100
  // },
  // showAutocompleteOnFocus: true
});
  </script>
  <script>
      //  ClassicEditor
      //   .create( document.querySelector( '#editor' ) )
      //   .catch( error => {
      //       console.error( error );
      //   } );

      var IFRAME_SRC = "//cdn.iframe.ly/api/iframe";
var IFRAME_API_KEY = "987e17dcd381083dc5b148";
//Do not add WatchDog and Markdown plugins in ckeditor5
//Latest ckeditor5 v29.0.0
ClassicEditor.create(document.querySelector("#editor"), {
    removePlugins: ["Title","Markdown"],
    toolbar: {
        items: [
            "heading",
            "|",
            "fontSize",
            "fontFamily",
            "alignment",
            "bold",
            "italic",
            "underline",
            "link",
            "bulletedList",
            "numberedList",
            "|",
            "indent",
            "outdent",
            "|",
            "CKFinder",
            "ImageInsert",
            "ImageResize",
            "ImageUpload",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "undo",
            "redo",
            "fontColor",
            "fontBackgroundColor",
            "highlight",
            "|",
            "horizontalLine",
            "pageBreak",
            "superscript",
            "subscript",
            "codeBlock",
        ],
    },
    // autosave: {
    // 	save( editor ) {
    // 	var form = $("#saveblog")[0];
    // 	var formData= new FormData(form);
    // 	formData.append('editor',editor.getData());
    // 		return saveBlog(formData );
    // 	}
    // },
    fontFamily: {
        options: [
            "default",
            'Times, "Times New Roman", serif',
            "Helvetica, Arial, sans-serif",
            "Ubuntu Mono, Courier New, Courier, monospace",
            "Open Sans, sans-serif",
            "serif",
            "script",
            "sans-serif",
            "cursive",
            "fantasy",
            "Poly",
            "Good Times Rg",
            "Colus",
            "Amagro",
            "Butler",
            "Foundry Sterling",
            "Butler Stencil",
        ],
        supportAllValues: true,
    },
    language: "en",
    fontSize: {
        options: [
            "default", 9, 10, 11, 13, 15, 17, 18, 19, 21, 23, 25, 27, 29, 30, 32, 34, 35,
            37, 39, 40, 42, 44, 46, 48,
        ],
    },
    fontColor: {
        columns: 10,
        documentColors: 200,
        colors: [
            { color: "hsl(205, 62%, 67%)", label: " " },
            { color: "hsl(208, 53%, 26%)", label: " " },
            { color: "hsl(6, 54%, 95%)", label: " " },
            { color: "hsl(6, 54%, 89%)", label: " " },
            { color: "hsl(6, 54%, 78%)", label: " " },
            { color: "hsl(6, 54%, 68%)", label: " " },
            { color: "hsl(6, 54%, 57%)", label: " " },
            { color: "hsl(6, 63%, 46%)", label: " " },
            { color: "hsl(6, 63%, 41%)", label: " " },
            { color: "hsl(6, 63%, 35%)", label: " " },
            { color: "hsl(6, 63%, 29%)", label: " " },
            { color: "hsl(6, 63%, 24%)", label: " " },
            { color: "hsl(6, 78%, 96%)", label: " " },
            { color: "hsl(6, 78%, 91%)", label: " " },
            { color: "hsl(6, 78%, 83%)", label: " " },
            { color: "hsl(6, 78%, 74%)", label: " " },
            { color: "hsl(6, 78%, 66%)", label: " " },
            { color: "hsl(6, 78%, 57%)", label: " " },
            { color: "hsl(6, 59%, 50%)", label: " " },
            { color: "hsl(6, 59%, 43%)", label: " " },
            { color: "hsl(6, 59%, 37%)", label: " " },
            { color: "hsl(6, 59%, 30%)", label: " " },
            { color: "hsl(283, 39%, 95%)", label: " " },
            { color: "hsl(283, 39%, 91%)", label: " " },
            { color: "hsl(283, 39%, 81%)", label: " " },
            { color: "hsl(283, 39%, 72%)", label: " " },
            { color: "hsl(283, 39%, 63%)", label: " " },
            { color: "hsl(283, 39%, 53%)", label: " " },
            { color: "hsl(283, 34%, 47%)", label: " " },
            { color: "hsl(283, 34%, 40%)", label: " " },
            { color: "hsl(283, 34%, 34%)", label: " " },
            { color: "hsl(283, 34%, 28%)", label: " " },
            { color: "hsl(282, 39%, 95%)", label: " " },
            { color: "hsl(282, 39%, 89%)", label: " " },
            { color: "hsl(282, 39%, 79%)", label: " " },
            { color: "hsl(282, 39%, 68%)", label: " " },
            { color: "hsl(282, 39%, 58%)", label: " " },
            { color: "hsl(282, 44%, 47%)", label: " " },
            { color: "hsl(282, 44%, 42%)", label: " " },
            { color: "hsl(282, 44%, 36%)", label: " " },
            { color: "hsl(282, 44%, 30%)", label: " " },
            { color: "hsl(282, 44%, 25%)", label: " " },
            { color: "hsl(204, 51%, 94%)", label: " " },
            { color: "hsl(204, 51%, 89%)", label: " " },
            { color: "hsl(204, 51%, 78%)", label: " " },
            { color: "hsl(204, 51%, 67%)", label: " " },
            { color: "hsl(204, 51%, 55%)", label: " " },
            { color: "hsl(204, 64%, 44%)", label: " " },
            { color: "hsl(204, 64%, 39%)", label: " " },
            { color: "hsl(204, 64%, 34%)", label: " " },
            { color: "hsl(204, 64%, 28%)", label: " " },
            { color: "hsl(204, 64%, 23%)", label: " " },
            { color: "hsl(204, 70%, 95%)", label: " " },
            { color: "hsl(204, 70%, 91%)", label: " " },
            { color: "hsl(204, 70%, 81%)", label: " " },
            { color: "hsl(204, 70%, 72%)", label: " " },
            { color: "hsl(204, 70%, 63%)", label: " " },
            { color: "hsl(204, 70%, 53%)", label: " " },
            { color: "hsl(204, 62%, 47%)", label: " " },
            { color: "hsl(204, 62%, 40%)", label: " " },
            { color: "hsl(204, 62%, 34%)", label: " " },
            { color: "hsl(204, 62%, 28%)", label: " " },
            { color: "hsl(168, 55%, 94%)", label: " " },
            { color: "hsl(168, 55%, 88%)", label: " " },
            { color: "hsl(168, 55%, 77%)", label: " " },
            { color: "hsl(168, 55%, 65%)", label: " " },
            { color: "hsl(168, 55%, 54%)", label: " " },
            { color: "hsl(168, 76%, 42%)", label: " " },
            { color: "hsl(168, 76%, 37%)", label: " " },
            { color: "hsl(168, 76%, 32%)", label: " " },
            { color: "hsl(168, 76%, 27%)", label: " " },
            { color: "hsl(168, 76%, 22%)", label: " " },
            { color: "hsl(168, 42%, 94%)", label: " " },
            { color: "hsl(168, 42%, 87%)", label: " " },
            { color: "hsl(168, 42%, 74%)", label: " " },
            { color: "hsl(168, 42%, 61%)", label: " " },
            { color: "hsl(168, 45%, 49%)", label: " " },
            { color: "hsl(168, 76%, 36%)", label: " " },
            { color: "hsl(168, 76%, 31%)", label: " " },
            { color: "hsl(168, 76%, 27%)", label: " " },
            { color: "hsl(168, 76%, 23%)", label: " " },
            { color: "hsl(168, 76%, 19%)", label: " " },
            { color: "hsl(145, 45%, 94%)", label: " " },
            { color: "hsl(145, 45%, 88%)", label: " " },
            { color: "hsl(145, 45%, 77%)", label: " " },
            { color: "hsl(145, 45%, 65%)", label: " " },
            { color: "hsl(145, 45%, 53%)", label: " " },
            { color: "hsl(145, 63%, 42%)", label: " " },
            { color: "hsl(145, 63%, 37%)", label: " " },
            { color: "hsl(145, 63%, 32%)", label: " " },
            { color: "hsl(145, 63%, 27%)", label: " " },
            { color: "hsl(145, 63%, 22%)", label: " " },
            { color: "hsl(145, 61%, 95%)", label: " " },
            { color: "hsl(145, 61%, 90%)", label: " " },
            { color: "hsl(145, 61%, 80%)", label: " " },
            { color: "hsl(145, 61%, 69%)", label: " " },
            { color: "hsl(145, 61%, 59%)", label: " " },
            { color: "hsl(145, 63%, 49%)", label: " " },
            { color: "hsl(145, 63%, 43%)", label: " " },
            { color: "hsl(145, 63%, 37%)", label: " " },
            { color: "hsl(145, 63%, 31%)", label: " " },
            { color: "hsl(145, 63%, 25%)", label: " " },
            { color: "hsl(48, 89%, 95%)", label: " " },
            { color: "hsl(48, 89%, 90%)", label: " " },
            { color: "hsl(48, 89%, 80%)", label: " " },
            { color: "hsl(48, 89%, 70%)", label: " " },
            { color: "hsl(48, 89%, 60%)", label: " " },
            { color: "hsl(48, 89%, 50%)", label: " " },
            { color: "hsl(48, 88%, 44%)", label: " " },
            { color: "hsl(48, 88%, 38%)", label: " " },
            { color: "hsl(48, 88%, 32%)", label: " " },
            { color: "hsl(48, 88%, 26%)", label: " " },
            { color: "hsl(37, 90%, 95%)", label: " " },
            { color: "hsl(37, 90%, 90%)", label: " " },
            { color: "hsl(37, 90%, 80%)", label: " " },
            { color: "hsl(37, 90%, 71%)", label: " " },
            { color: "hsl(37, 90%, 61%)", label: " " },
            { color: "hsl(37, 90%, 51%)", label: " " },
            { color: "hsl(37, 86%, 45%)", label: " " },
            { color: "hsl(37, 86%, 39%)", label: " " },
            { color: "hsl(37, 86%, 33%)", label: " " },
            { color: "hsl(37, 86%, 27%)", label: " " },
            { color: "hsl(28, 80%, 95%)", label: " " },
            { color: "hsl(28, 80%, 90%)", label: " " },
            { color: "hsl(28, 80%, 81%)", label: " " },
            { color: "hsl(28, 80%, 71%)", label: " " },
            { color: "hsl(28, 80%, 61%)", label: " " },
            { color: "hsl(28, 80%, 52%)", label: " " },
            { color: "hsl(28, 74%, 46%)", label: " " },
            { color: "hsl(28, 74%, 39%)", label: " " },
            { color: "hsl(28, 74%, 33%)", label: " " },
            { color: "hsl(28, 74%, 27%)", label: " " },
            { color: "hsl(24, 71%, 94%)", label: " " },
            { color: "hsl(24, 71%, 88%)", label: " " },
            { color: "hsl(24, 71%, 77%)", label: " " },
            { color: "hsl(24, 71%, 65%)", label: " " },
            { color: "hsl(24, 71%, 53%)", label: " " },
            { color: "hsl(24, 100%, 41%)", label: " " },
            { color: "hsl(24, 100%, 36%)", label: " " },
            { color: "hsl(24, 100%, 31%)", label: " " },
            { color: "hsl(24, 100%, 26%)", label: " " },
            { color: "hsl(24, 100%, 22%)", label: " " },
            { color: "hsl(192, 15%, 99%)", label: " " },
            { color: "hsl(192, 15%, 99%)", label: " " },
            { color: "hsl(192, 15%, 97%)", label: " " },
            { color: "hsl(192, 15%, 96%)", label: " " },
            { color: "hsl(192, 15%, 95%)", label: " " },
            { color: "hsl(192, 15%, 94%)", label: " " },
            { color: "hsl(192, 5%, 82%)", label: " " },
            { color: "hsl(192, 3%, 71%)", label: " " },
            { color: "hsl(192, 2%, 60%)", label: " " },
            { color: "hsl(192, 1%, 49%)", label: " " },
            { color: "hsl(204, 8%, 98%)", label: " " },
            { color: "hsl(204, 8%, 95%)", label: " " },
            { color: "hsl(204, 8%, 90%)", label: " " },
            { color: "hsl(204, 8%, 86%)", label: " " },
            { color: "hsl(204, 8%, 81%)", label: " " },
            { color: "hsl(204, 8%, 76%)", label: " " },
            { color: "hsl(204, 5%, 67%)", label: " " },
            { color: "hsl(204, 4%, 58%)", label: " " },
            { color: "hsl(204, 3%, 49%)", label: " " },
            { color: "hsl(204, 3%, 40%)", label: " " },
            { color: "hsl(184, 9%, 96%)", label: " " },
            { color: "hsl(184, 9%, 92%)", label: " " },
            { color: "hsl(184, 9%, 85%)", label: " " },
            { color: "hsl(184, 9%, 77%)", label: " " },
            { color: "hsl(184, 9%, 69%)", label: " " },
            { color: "hsl(184, 9%, 62%)", label: " " },
            { color: "hsl(184, 6%, 54%)", label: " " },
            { color: "hsl(184, 5%, 47%)", label: " " },
            { color: "hsl(184, 5%, 40%)", label: " " },
            { color: "hsl(184, 5%, 32%)", label: " " },
            { color: "hsl(184, 6%, 95%)", label: " " },
            { color: "hsl(184, 6%, 91%)", label: " " },
            { color: "hsl(184, 6%, 81%)", label: " " },
            { color: "hsl(184, 6%, 72%)", label: " " },
            { color: "hsl(184, 6%, 62%)", label: " " },
            { color: "hsl(184, 6%, 53%)", label: " " },
            { color: "hsl(184, 5%, 46%)", label: " " },
            { color: "hsl(184, 5%, 40%)", label: " " },
            { color: "hsl(184, 5%, 34%)", label: " " },
            { color: "hsl(184, 5%, 27%)", label: " " },
            { color: "hsl(210, 12%, 93%)", label: " " },
            { color: "hsl(210, 12%, 86%)", label: " " },
            { color: "hsl(210, 12%, 71%)", label: " " },
            { color: "hsl(210, 12%, 57%)", label: " " },
            { color: "hsl(210, 15%, 43%)", label: " " },
            { color: "hsl(210, 29%, 29%)", label: " " },
            { color: "hsl(210, 29%, 25%)", label: " " },
            { color: "hsl(210, 29%, 22%)", label: " " },
            { color: "hsl(210, 29%, 18%)", label: " " },
            { color: "hsl(210, 29%, 15%)", label: " " },
            { color: "hsl(210, 9%, 92%)", label: " " },
            { color: "hsl(210, 9%, 85%)", label: " " },
            { color: "hsl(210, 9%, 70%)", label: " " },
            { color: "hsl(210, 9%, 55%)", label: " " },
            { color: "hsl(210, 14%, 39%)", label: " " },
            { color: "hsl(210, 29%, 24%)", label: " " },
            { color: "hsl(210, 29%, 21%)", label: " " },
            { color: "hsl(210, 29%, 18%)", label: " " },
            { color: "hsl(210, 29%, 16%)", label: " " },
            { color: "hsl(210, 29%, 13%)", label: " " },
        ],
    },
    image: {
        resizeOptions: [
            {
                name: 'resizeImage:original',
                value: null,
                icon: 'original'
            },
            {
                name: 'resizeImage:25',
                value: '25',
                icon: 'small'
            },
            {
                name: 'resizeImage:50',
                value: '50',
                icon: 'medium'
            },
            {
                name: 'resizeImage:75',
                value: '75',
                icon: 'large'
            }
        ],
        toolbar: [
            "imageTextAlternative",
            "|",
            "imageStyle:alignLeft",
            "imageStyle:block",
            "imageStyle:inline",
            "imageStyle:alignRight",
            'imageStyle:side',
            'resizeImage:25',
            'resizeImage:50',
            'resizeImage:75',
            'resizeImage:original',
            '|',
            'toggleImageCaption',
        ],
        styles: ["full", "alignLeft", "alignRight","side"],
        options: [ 'inline', 'block', 'side' ],
    },
    ckfinder: {
        uploadUrl: "/ckfinder/connector?command=QuickUpload&type=Files&responseType=json",
    },
    table: {
        contentToolbar: [
            "tableCellProperties",
            "tableColumn",
            "tableRow",
            "mergeTableCells",
            "tableProperties",
        ],
    },
    mediaEmbed: {
        // Previews are always enabled if there’s a provider for a URL (below regex catches all URLs)
        // By default `previewsInData` are disabled, but let’s set it to `false` explicitely to be sure
        previewsInData: false,

        providers: [
            {
                // hint: this is just for previews. Get actual HTML codes by making API calls from your CMS
                name: "iframely previews",

                // Match all URLs or just the ones you need:
                url: /.+/,

                html: (match) => {
                    const url = match[0];
                  
                    var iframeUrl =
                        IFRAME_SRC +
                        "?app=1&api_key=" +
                        IFRAME_API_KEY +
                        "&url=" +
                        encodeURIComponent(url);
                    // alternatively, use &key= instead of &api_key with the MD5 hash of your api_key
                    // more about it: https://iframely.com/docs/allow-origins
                    return (
                        // If you need, set maxwidth and other styles for 'iframely-embed' class - it's yours to customize
                        '<div class="iframely-embed">' +
                        '<div class="iframely-responsive">' +
                        `<iframe src="${iframeUrl}" ` +
                        'frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>' +
                        "</iframe>" +
                        "</div>" +
                        "</div>"
                    );
                },
            },
        ],
    },
})
    .then((editor) => {
        window.editor = editor;
    })
    .catch((error) => {
        console.error("Oops, Something gone wrong!");
        console.error("Please, report the following error.");
        console.warn("Build id: soklze91xmth-mb246bfgkmve");
        console.error(error);
    });
  </script>
@endsection