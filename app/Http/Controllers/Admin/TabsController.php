<?php

namespace App\Http\Controllers\Admin;

use DB;
use Validator;
use App\Model\Tabs;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TabsController extends Controller
{
    private function storeFile($file) {
        
        $name = $file->getClientOriginalName();
        $name= pathinfo($name, PATHINFO_FILENAME);
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time().'-'.$name.'.'.$file->extension();
        $filePath = 'inocare/' . $newImageName;
        # store image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $bucket_name = 'shreeagt-prod';
        $region = 'ap-south-1';
        $url = 'https://'.$bucket_name.'.s3.'.$region.'.amazonaws.com/'.$filePath;
        return $url;

    }
    public function viewTabs(){
     $tabs=Tabs::get();

     return view('main.pages.tabs.browse',['tabs'=>$tabs]);
    }

    public function addNewTab(){

        $product = Product::all();

        return view('main.pages.tabs.create',['product' => $product]);
    }

    public function storeTab(Request $request){
 
   
        $new_tab=new Tabs();
        $new_tab->label=$request->tab_label;
        $new_tab->description=$request->description;
        $new_tab->product_title=$request->product_title;
        if($request->featured=="on"){
        $new_tab->status="Y";
        }else{
        $new_tab->status="N";
        }

        $new_tab->save();
        return redirect()->route('tabs.index')->with('success_message','New Tab Added!');

    }
    public function editTab($id){
        $product_data = Product::where('status', 'Y')->get();
        $tab_details=Tabs::where('tab_id','=',$id)->first();
        return view('main.pages.tabs.edit',['tab_details'=>$tab_details,'product_data'=>$product_data]);
        
    }

    public function editStoreTab(Request $request,$id){
       
        $edit_tab=Tabs::where('tab_id','=',$id)->first();
       
        $edit_tab->label=$request->tab_label;
        $edit_tab->description=$request->description;
        $edit_tab->product_title=$request->product_title;
        if($request->featured=="on"){
        $edit_tab->status="Y";
        }else{
        $edit_tab->status="N";
        }

        $edit_tab->save();
        return redirect()->route('tabs.index')->with('success_message','Tab Edited!');
    }

    public function deleteTab($id){
        Tabs::find($id)->delete();
        return redirect()->back()->with('success_message','Tab Deleted!');
    }
}