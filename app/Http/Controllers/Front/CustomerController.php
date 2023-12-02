<?php

namespace App\Http\Controllers\Front;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Model\Category;
use App\Model\Cms;
use App\Model\Product;
use App\Model\productAdditionalInfo;
use App\Model\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Meta;

class CustomerController extends Controller
{
    public function indexPage(Request $request)
    {
        $cmsValue = Cms::with('Page')->where('cms_key', 'app_logo')->get()->first();
        Meta::title(isset($cmsValue->Page->title) ? $cmsValue->Page->title : '');
        Meta::set('title', config('app.name', 'Laravel'));
        return view('layouts.front.index', compact('cmsValue'));
    }

    public function productDetails(Request $request, $categorySlug, $productSlug)
    {
        $category = Category::with(['product' => function($query) use ($productSlug) { $query->where(['slug' => $productSlug, 'status'=> 1])->get(); }])->where(['slug' => $categorySlug, 'status' => 1])->first();
        if (!$category || !count($category->product)) {
           return view('layouts.front.page-not-found');
        }

        $product =  product::with('imageGallery')->where(['slug' => $productSlug, 'status' => 1])->get()->first();
        $product['images'] = [$product->image, $product->imageGallery];
        // $category_id = $product->productCategories->pluck('category_id')->first();
        // $productIds = ProductCategories::where('category_id', $category_id)->pluck('product_id');
        $relatedProductList =  Product::where(['slug' => $productSlug, 'status' => 1])
        ->with('category')
        ->whereIn('id', ProductCategories::where('category_id', $product->productCategories->pluck('category_id')->first())->pluck('product_id'))
        ->where('id','!=',$product->id)->get();

        $productAdditionalInfo = productAdditionalInfo::where('product_id', $product->id)->orderBy('sortOrder')->get();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($product->title) ? $product->title : '');
        return view('layouts.front.productDetails', compact('product', 'relatedProductList', 'productAdditionalInfo'));
    }

    public function categoryDetails(Request $request, $categorySlug)
    {
        $category = Category::where(['slug' => $categorySlug, 'status' => 1])->get()->first();
        $productCategories = ProductCategories::where('category_id', $category->id)->pluck('product_id')->toArray();
        $productList =  product::where('status', 1)->with('imageGallery')->whereIn('id', $productCategories)->paginate(6);
        $productCount =  product::where('status', 1)->whereIn('id', $productCategories)->count();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($category->title) ? $category->title : '');
        return view('layouts.front.productListing', compact('category', 'productList', 'productCount'));
    }

    public function  contact(Request $request)
    {
        $cmsValue = Cms::where('cms_key', 'contact_us')->get()->first();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($cmsValue->title) ? $cmsValue->title : '');
        return view('layouts.front.contactUs', compact('cmsValue'));
    }

    public function  privacyPolicy(Request $request)
    {
        $cmsValue = Cms::where('cms_key', 'privacy_policy')->get()->first();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($cmsValue->title) ? $cmsValue->title : '');
        return view('layouts.front.cmsPage', compact('cmsValue'));
    }

    public function  termsCondition(Request $request)
    {
        $cmsValue = Cms::where('cms_key', 'terms_condition')->get()->first();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($cmsValue->title) ? $cmsValue->title : '');
        return view('layouts.front.cmsPage', compact('cmsValue'));
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|string|digits:10',
            'service' => 'nullable',
            'address' => 'nullable',
            'user_message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ],[
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                'captcha' => 'Captcha error! try again later.',
            ]
        ]);

        $data =  contactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'service' => $request->service,
            'address' => $request->address,
            'message' => $request->user_message,
        ]);
        $applogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();

        Mail::to($request->email)->send(new ContactUsMail($request->all(),  $applogo));
        return redirect()->back()->with('success', 'Email send successfully.');
    }

    public function  aboutUs(Request $request)
    {
        $cmsValue = Cms::where('cms_key', 'about_us')->get()->first();
        // dd($cmsValue);
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title',isset($cmsValue->title) ? $cmsValue->title : '');
        return view('layouts.front.aboutUs', compact('cmsValue'));
    }

    public function AllProductsView()
    {
        $data['category'] = Category::where('status', 1)->get();
        // $productCategories = ProductCategories::where('category_id', $category->id)->pluck('product_id')->toArray();
        $data['productList'] =  product::where('status', 1)->with('imageGallery', 'category')->paginate(12);
        // $data['productList'] =  product::with('imageGallery')->paginate(12);
        $data['productCount'] =  product::where('status', 1)->count();
        Meta::title(config('app.name', 'Laravel'));
        Meta::set('title','All Products');
        // return view('layouts.front.productListing', compact('category', 'productList', 'productCount'));
        return view('layouts.front.productListing')->with($data);
    }
}
