<?php

use Carbon\Carbon;
use App\Model\ProductCart;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use App\Model\Emailtemplates;
use Illuminate\Support\Facades\Mail as LaravelMail;

function changeStatus($data){
        
       
    $Emailtemplates = Emailtemplates::where('id','=', 00000003)->get();
    $temp= $Emailtemplates[0];
    $loaded_template = fillDataIntoTemplate($data['template_data'], $temp['template_content']);
    
    $data['template_data'] = $loaded_template;
   
  
   
     LaravelMail::send([], [], function($message) use($temp, $data, $loaded_template) {
        //die($loaded_template);
        $message->from("anishyadav.agt@mail.com", "manick");
        $message->to($data["mail_data"]["toAddress"], $data['template_data']);
       $message->subject($temp['template_subject']);
        $message->setBody($loaded_template, 'text/html');
       // $message->attach($data["attachments"]);
    });


}

function helperfunction2($data){
        
       
    $Emailtemplates = Emailtemplates::where('id','=', 00000002)->get();
    $temp= $Emailtemplates[0];
    $loaded_template = fillDataIntoTemplate($data['template_data'], $temp['template_content']);
    
    $data['template_data'] = $loaded_template;
   
  
   
     LaravelMail::send([], [], function($message) use($temp, $data, $loaded_template) {
        //die($loaded_template);
        $message->from("anishyadav.agt@mail.com", "manick");
        $message->to($data["mail_data"]["toAddress"], $data['template_data']);
       $message->subject($temp['template_subject']);
        $message->setBody($loaded_template, 'text/html');
       // $message->attach($data["attachments"]);
    });


}

   function helperfunction1($data){
        
       
        $Emailtemplates = Emailtemplates::get();
        $temp= $Emailtemplates[0];
        $loaded_template = fillDataIntoTemplate($data['template_data'], $temp['template_content']);
        
        $data['template_data'] = $loaded_template;
       // $data['template_subject'] =$Emailtemplates['template_subject'];
        //$data['mail_data']['subject'] = $Emailtemplates['template_subject'];
      
       
         LaravelMail::send([], [], function($message) use($temp, $data, $loaded_template) {
            //die($loaded_template);
            $message->from("anishyadav.agt@mail.com", "manick");
            $message->to($data["mail_data"]["toAddress"], $data['template_data']);
           $message->subject($temp['template_subject']);
            $message->setBody($loaded_template, 'text/html');
           // $message->attach($data["attachments"]);
        });

  
    }

    
    function fillDataIntoTemplate($replacements, $template) {

        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }

function temp_url($file){
    $client = new S3Client(['credentials' => ['key' => 'AKIA2FS7JDTZLRIIOSJ2', 'secret' => 'JIhwobZPRBwCfJ1RhNSCs0u8hPMpbVU6IhHc+ReN'],
        'region' => 'ap-south-1', 'version' => 'latest']);

        $object = $client->getCommand('GetObject', [
            'Bucket' => 'shreeagt-prod',
            'Key' => $file // file
        ]);

        $presignedRequest = $client->createPresignedRequest($object, '+15 minutes');
        $presignedUrl = (string)$presignedRequest->getUri();
        if ($presignedUrl) {
            return $presignedUrl; //presigned URL
        } else {
            throw new FileNotFoundException();
        }
    }


function presentPrice($price)
{
    return 'Rs.' . number_format(($price) / 100);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $tax = 18/ 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $cart_products=ProductCart::where('user_id','=',auth()->user()->id)->join('products','products.id','=','products_cart.product_id')->get();
     
    $cart_subtotal=0;
    foreach($cart_products as $item){
      
        // $cart_subtotal=$cart_subtotal+$item->product_quantity*$item->price;
        //added by py
        $cart_subtotal = $cart_subtotal+((int)$item['product_quantity'] * (int)$item['price']);
        
    }
    $newSubtotal = ($cart_subtotal - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'cart_subtotal'=>$cart_subtotal,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}


function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold', 5)) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

// function getPackNumbers(){
//     $tax = config('cart.tax') / 100;
//     $discount = session()->get('pack-coupon')['discount'] ?? 0;
//     $code = session()->get('pack-coupon')['name'] ?? null;
//     //('company_package.id','=',$pack_id)
//     $cart_products=CompanyPackage::where('company_package.pack_status','=','N')->where('company_package.user_id','=',auth()->user()->id)->join('package_cart','package_cart.pack_id','=','company_package.id')->join('products','products.id','=','package_cart.product_id')->select('*','package_cart.id AS pack_product_id')->get();
//     $cart_subtotal=0;
//     $pack_quantity=null;

//     foreach($cart_products as $item){
       
//         $cart_subtotal=$cart_subtotal+$item->selected_quantity*$item->price;
        
//       $pack_quantity=$item->pack_quantity;
//        }
//     $cart_subtotal*=$pack_quantity;
//     $newSubtotal = ($cart_subtotal - $discount);
   
//     if ($newSubtotal < 0) {
//         $newSubtotal = 0;
//     }
//     $newTax = $newSubtotal * $tax;
//     $newTotal = $newSubtotal * (1 + $tax);

//     return collect([
//         'tax' => $tax,
//         'discount' => $discount,
//         'code' => $code,
//         'cart_subtotal'=>$cart_subtotal,
//         'newSubtotal' => $newSubtotal,
//         'newTax' => $newTax,
//         'newTotal' => $newTotal,
//     ]);
// }