<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\Images;
use App\Model\Product;

class ImagesController extends Controller
{

    private function storeFile($file) {
        $name = $file->getClientOriginalName();
        $name = pathinfo($name, PATHINFO_FILENAME);
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time() . '-' . $name . '.' . $file->extension();
        $filePath = 'blogs/' . $newImageName;
        #Store Image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        // $bucket_name = env('AWS_BUCKET');
        // $region = env('AWS_DEFAULT_REGION');

        $bucket_name = config("filestorage.AWS_BUCKET");
        $region = config("filestorage.AWS_DEFAULT_REGION");
        $url = 'https://' . $bucket_name . '.s3.' . $region . '.amazonaws.com/' . $filePath;
        return $url;
    }

    public function Imagetabs(){
        //dd('hii');
        $images=Images::get();
        
        return view('main.pages.imagesTabs.browse',['images'=>$images]);
       }

       public function addNewImagesTab (){

        $product = Product::all();
           // dd($product);
        return view('main.pages.Imagestabs.create',['product' => $product]);
    }


    public function storeImage(Request $request){
 
   //dd($request);
        $allFiles = $request->allFiles();
        $thumbnail = null;
        if (isset($allFiles['images'])) {
            $images = $this->storeFile($allFiles['images']);
        }

       // dd($images);
        $new_image=new Images();
        $new_image->product_id=$request->product_name;
        $new_image->image_name=$request->image_name;
        $new_image->images = $images;
        if($request->featured=="on"){
        $new_image->status="Y";
        }else{
        $new_image->status="N";
        }

        $new_image->save();
        return redirect()->route('admin-image.index')->with('success_message','New images Added!');
        

    }

    public function editImage($id)
    {
       //dd($id);
       $product = Product::all();
        $images_details = Images::find($id);
       //dd($images_details);
        return view('main.pages.imagesTabs.edit', ['images_details' => $images_details,'product'=>$product]);
        
    }


    public function editstoreImage(Request $request)
    {

        
        $allFiles = $request->allFiles();
        $image = $request->image;
        //dd($image);
        if (isset($allFiles['image'])) {
        $image = $this->storeFile($allFiles['image']);
        }
        //dd($image);
        $images = Images::find($request->id);
        $images->image_name = $request->image_name;
        if ($image != null) {
            $images->images = $image;
    
            }
        //$image = '';
        
       
        $images->status = $request->status; 
        $images->save();

        return redirect()->route('admin-image.index');
    }

    
    public function deleteImage($id){
        Images::find($id)->delete();
        return redirect()->back()->with('success_message','Tab Deleted!');
    }

}
