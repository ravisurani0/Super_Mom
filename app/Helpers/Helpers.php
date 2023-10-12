<?php

use Illuminate\Support\Facades\Storage;
use App\Model\GiftCard;
use Carbon\Carbon;

if (!function_exists('isPaginate')) {
    function isPaginate($value)
    {
        return is_null($value) || $value != 0;
    }
}

if (!function_exists('fileUpload')) {
    function fileUpload($file, $fileOriginalName = '', $disk = '', $muptipleFile = false,$keepFileOriginalName = false)
    {
        try {
            if ($muptipleFile) {
                $imageNames = [];
                if ($files = $file) {
                    $i = 0;
                    foreach ($files as $file) {
                        $fileName = time() + $i . '.' . $file->extension();
                        Storage::disk($disk)->putFileAs('/', $file, $fileName);
                        $imageNames[] = $fileName;
                        $i++;
                    }
                }
                return $imageNames;
            } else {
                if(isset($fileOriginalName) && !empty($fileOriginalName)){
                    if(isset($keepFileOriginalName)){
                        $name = pathinfo($fileOriginalName, PATHINFO_FILENAME);
                        $fileName = $name.'-'.date('Y-m-d h-i-s') . '.' . $file->extension();
                    }else{
                        $fileName = $fileOriginalName ;
                    }
                }else{
                    $fileName = time() . '.' . $file->extension();
                }
             
                
                Storage::disk()->putFileAs($disk, $file, $fileName);
                return $fileName;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
if (!function_exists('resizeImage')) {
    function resizeImage($file, $fileOriginalName = '', $disk = '', $muptipleFile = false)
    {

        try {
            if ($muptipleFile) {
                if ($files = $file) {
                    $i = 0;
                    foreach ($files as $file) {
                        $fileName = time()  + $i . '_thumb.' . $file->extension();
                        $originalfileName = time()  + $i . '_orignal.' . $file->extension();
                        $destinationPath =  public_path('storage/' . $disk);
                        $img = Image::make($file->path());
                        $img->resize(200, 200, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath . '/' . $fileName);

                        $originaldestinationPath =  public_path('storage/' . $disk);
                        $originalimg = Image::make($file->path());
                        $originalimg->resize(512, 512, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($originaldestinationPath . '/' . $originalfileName);
                        $i++;
                    }
                }
            } else {
                if($fileOriginalName){
                    $fileName = $fileOriginalName . '_thumb.' . $file->extension();
                    $originalfileName = $fileOriginalName . '_orignal.' . $file->extension();
                }else{
                    $fileName = time() . '_thumb.' . $file->extension();
                    $originalfileName = time() . '_orignal.' . $file->extension();
                }
                $destinationPath =  public_path('storage/' . $disk);
                $img = Image::make($file->path());
                $img->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $fileName);

                $originaldestinationPath =  public_path('storage/' . $disk);
                $originalimg = Image::make($file->path());
                $originalimg->resize(1080, 720, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($originaldestinationPath . '/' . $originalfileName);
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
if (!function_exists('getTotalWeight')) {
    function getTotalWeight($cartProduct)
    {

        try {
            $totalWeight  = 0;
            $response = [];
            $quantity = 0;
            $productCart = $cartProduct->productCart;
           foreach($productCart as $item){
            $quantity = $item->quantity;
                if($item->weights){
                     if($item->weights->unit == 'Kg' || $item->weights->unit == 'kg'){
                        $totalWeight += $item->weights->value * 1000;
                    }else{
                         $totalWeight += $item->weights->value;
                     }
                }
           }
           $response['totalWeight'] = ($totalWeight * $quantity) / 1000;
           $response['success'] = true;
           return $response;
        } catch (Exception $e) {
            $response['error'] = 'Sorry ,product`s weight not found.';
           $response['success'] = false;
        }
    }
}
if (!function_exists('couponCodeCheck')) {
    function couponCodeCheck($couponCode,$cartData,$hasSessionCouponCode = '')
    {
        try {

            $response = [];
            if(isset($cartData->coupon_id)){
                $response['success'] = false;
                $response['couponData'] = [];
                $response['message'] = 'One coupon can be used in a order.';
                return $response;
            }

            if($hasSessionCouponCode != ''){
                $couponCard =  GiftCard::where('id',$hasSessionCouponCode)->where('status',1)->whereDate('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();
                $total = $cartData->total;
                $discount = 0;
                if ($couponCard->type == 'Amount') {
                    $discount = $couponCard->amount;
                } else {
                    $percentageDiscount = ($total * $couponCard->amount) / 100;
                    $discount = $percentageDiscount;
                }
                Session::put('discount_id',$couponCard['id']);
                Session::put('discount_amount',$discount);
            }else{

            $couponCardData =  GiftCard::where('code',$couponCode)->where('status',1)->whereDate('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();

            if(isset($couponCardData) && count([$couponCardData]) > 0 && ($cartData->total < (int)$couponCardData->cart_value)){
                $response['success'] = false;
                $response['couponData'] = [];
                $response['message'] = 'Sorry you can`t apply this coupon,Minimum order value must be '. $couponCardData->cart_value .' to apply this coupon';
                return $response;
             }
             if(isset($couponCardData) && count([$couponCardData]) > 0){
                 $response['success'] = true;
                 $response['couponValid'] = true;
                 $response['couponData'] = $couponCardData->toArray();
                 $response['total'] = $cartData->total;
                 $response['message'] = 'Valid coupon code.';
             }
             else{
                 $response['success'] = false;
                 $response['couponData'] = [];
                 $response['total'] = 0;
                 $response['message'] = 'Coupon not valid,please enter valid coupon code.';
             }
            return $response;
        }
        } catch (Exception $e) {

            $response['message'] = 'Something went wrong.';
            $response['success'] = false;
            return $response;
        }
    }
}

if (!function_exists('metaTagSet')) {
    function metaTagSet($page,$request)
    {
        // dd($page,$request,$request->route('category_slug'),$request->route('product_slug'),explode('.',$request->route()->getName()));
        try {
            if ($page) {
                    if ($page->meta_page_title) {
                        Meta::set('page_title', $page->meta_page_title);
                    }else{
                        if($request->route()->getName() == 'customer.career'){
                            $careerRoute = explode('.',$request->route()->getName());
                            Meta::set('page_title', Str::ucfirst($careerRoute[1]));
                        }else if($request->route()->getName() == 'customer.contactus'){
                            $contactRoute = explode('.',$request->route()->getName());
                            Meta::set('page_title', Str::ucfirst($contactRoute[1]));
                        }else if($request->route()->getName() == 'news.events'){
                            Meta::set('page_title', Str::ucfirst(str_replace('.',' ',$request->route()->getName())));
                        }
                        else if($request->route('category_slug') && $request->route('product_slug')){
                            Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route('product_slug'))));
                        }else if($request->route('category_slug')){
                            Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route('category_slug'))));
                        }else{
                            Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route()->getName())));
                        }
                    }
                    if ($page->meta_title) {
                        Meta::set('title', $page->meta_title);
                    }else{
                        if($request->route()->getName() == 'customer.career'){
                            $careerRoute = explode('.',$request->route()->getName());
                            Meta::set('title', Str::ucfirst($careerRoute[1]));
                        }else if($request->route()->getName() == 'customer.contactus'){
                            $contactRoute = explode('.',$request->route()->getName());
                            Meta::set('title', Str::ucfirst($contactRoute[1]));
                        }else if($request->route()->getName() == 'news.events'){
                            Meta::set('title', Str::ucfirst(str_replace('.',' ',$request->route()->getName())));
                        }
                        else if($request->route('category_slug') && $request->route('product_slug')){
                            Meta::set('title', Str::ucfirst($request->route('product_slug')));
                        }else if($request->route('category_slug')){
                            Meta::set('title', Str::ucfirst($request->route('category_slug')));
                        }else{
                            Meta::set('title', Str::ucfirst($request->route()->getName()));
                        }
                    }
                    if ($page->meta_description) {
                        Meta::set('description', $page->meta_description);
                    }else{
                        if($request->route()->getName() == 'customer.career'){
                            $careerRoute = explode('.',$request->route()->getName());
                            Meta::set('description', Str::ucfirst($careerRoute[1] .'| Gopal Namkeen'));
                        }else if($request->route()->getName() == 'customer.contactus'){
                            $contactRoute = explode('.',$request->route()->getName());
                            Meta::set('description', Str::ucfirst($contactRoute[1].'| Gopal Namkeen'));
                        }else if($request->route()->getName() == 'news.events'){
                            Meta::set('description', Str::ucfirst(str_replace('.',' ',$request->route()->getName()).'| Gopal Namkeen'));
                        }
                        else if($request->route('category_slug') && $request->route('product_slug')){
                            Meta::set('description', Str::ucfirst($request->route('product_slug').'| Gopal Namkeen'));
                        }else if($request->route('category_slug')){
                            Meta::set('description', Str::ucfirst($request->route('category_slug').'| Gopal Namkeen'));
                        }else{
                            Meta::set('description', Str::ucfirst($request->route()->getName()));
                        }
                    }
                    if ($page->meta_keywords) {
                        Meta::set('description', $page->meta_description);
                    }
                }else{
                    if($request->route()->getName() == 'customer.career'){
                        $careerRoute = explode('.',$request->route()->getName());
                        Meta::set('page_title', Str::ucfirst($careerRoute[1]));
                        Meta::set('title', Str::ucfirst($careerRoute[1]));
                        Meta::set('description', \Str::ucfirst($careerRoute[1]) .'| Gopal Namkeen');
                    }else if($request->route()->getName() == 'customer.contactus'){
                        $contactRoute = explode('.',$request->route()->getName());
                        Meta::set('page_title', Str::ucfirst($contactRoute[1]));
                        Meta::set('title', Str::ucfirst($contactRoute[1]));
                        Meta::set('description', \Str::ucfirst($contactRoute[1]) .'| Gopal Namkeen');
                    }else if($request->route()->getName() == 'news.events'){
                        Meta::set('page_title', Str::ucfirst(str_replace('.',' ',$request->route()->getName())));
                        Meta::set('title', Str::ucfirst(str_replace('.',' ',$request->route()->getName())));
                        Meta::set('description', \Str::ucfirst(str_replace('.',' ',$request->route()->getName())) .'| Gopal Namkeen');
                    }
                    else if($request->route('category_slug') && $request->route('product_slug')){
                        Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route('product_slug'))));
                        Meta::set('title', Str::ucfirst($request->route('product_slug')));
                        Meta::set('description', Str::ucfirst($request->route('product_slug')));
                    }else if($request->route('category_slug')){
                        Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route('category_slug'))));
                        Meta::set('title', Str::ucfirst($request->route('category_slug')));
                        Meta::set('description', Str::ucfirst($request->route('category_slug')));
                    }else{
                        Meta::set('page_title', Str::ucfirst(str_replace('-',' ',$request->route()->getName())));
                        Meta::set('title', Str::ucfirst($request->route()->getName()));
                        Meta::set('description', \Str::ucfirst($request->route()->getName()) .'| Gopal Namkeen');
                    }
                }

                return true;

        } catch (Exception $e) {
            dd($e->getMessage());
            return false;
        }
    }
}
