<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductCategories;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Meta;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        # Default title
        Meta::title('This is default page title to complete section title');

        # Default robots
        Meta::set('robots', 'index,follow');

        # Default image
        Meta::set('image', asset('images/logo.png'));
    }


    public function  productUpload(Request $request)
    {

        try {
            foreach ($request->name as $index => $item) {

                if (
                    (isset($request->name[$index]) && $request->name[$index] != '') &&
                    (isset($request->price[$index]) && $request->price[$index] != '') &&
                    (isset($request->gst_rate[$index]) && $request->gst_rate[$index] != '') &&
                    (isset($request->hsn_code[$index]) && $request->hsn_code[$index] != '') &&
                    (isset($request->carton_capacity[$index]) && $request->carton_capacity[$index] != '')
                ) {

                    $product = null;
                    // Get Product if exist
                    if ((isset($request->name[$index]) && $request->name[$index] != '')) {
                        $product = Product::where('name', 'like', '%' . $request->name[$index] . '%')->get()->first();
                    }

                    $category = null;
                    // Get Category if exist
                    if ((isset($request->category[$index]) && $request->category[$index] != '')) {
                        $category = Category::where('title', 'like', '%' . $request->category[$index] . '%')->get()->first();
                    }

                    // Product exist in ProductCategories
                    $productCategories = new ProductCategories();
                    if ($product) {
                        if ($category) {
                            $productCategories = $productCategories->where([['product_id', $product->id], ['category_id', $category->id]]);
                        }
                        // Category exist in ProductCategories
                        $productCategories = ProductCategories::where('product_id', $product->id)->get()->count();
                    } else {
                        $productCategories = null;
                    }

                    $productData = [
                        'name' => (isset($request->name[$index]) && $request->name[$index] != '') ? $request->name[$index] : '',
                        'short_name' => (isset($request->short_name[$index]) && $request->short_name[$index] != '') ? $request->short_name[$index] : '',
                        'description' => (isset($request->name[$index]) && $request->name[$index] != '') ? $request->name[$index] : '',
                        'price' => (isset($request->price[$index]) && $request->price[$index] != '') ? $request->price[$index] : '',
                        'gst_rate' => (isset($request->gst_rate[$index]) && $request->gst_rate[$index] != '') ? $request->gst_rate[$index] : '',
                        'hsn_code' => (isset($request->hsn_code[$index]) && $request->hsn_code[$index] != '') ? $request->hsn_code[$index] : '',
                        'carton_capacity' => (isset($request->carton_capacity[$index]) && $request->carton_capacity[$index] != '') ? $request->carton_capacity[$index] : '',
                        'sort_order' =>  0,
                        'tags' => ((isset($request->name[$index]) && $request->name[$index] != '') ? $request->name[$index] : '') . ',' . ((isset($request->short_name[$index]) && $request->short_name[$index] != '') ? $request->short_name[$index] : ''),
                        'long_description' => '',
                        'slug' => strtolower(str_replace(' ', '_', trim($request->name[$index]))),
                    ];
                    //  if same product with same category  is exist update product
                    if ($product || $productCategories) {

                        $product =  Product::where('id', $product->id)->update([
                            'name' => $productData['name'],
                            'short_name' => $productData['short_name'],
                            'description' => $productData['description'],
                            'price' => $productData['price'],
                            'gst_rate' => $productData['gst_rate'],
                            'hsn_code' => $productData['hsn_code'],
                            'carton_capacity' => $productData['carton_capacity'],
                            'sort_order' => $productData['sort_order'],
                            'tags' => $productData['tags'],
                            'long_description' => $productData['long_description'],
                            'slug' => $productData['slug'],
                        ]);
                    }
                    // Else | Product with Same Category Is Not Exist | Create New Product
                    else {
                        $category  = null;
                        // Category Not Exists | Create New Category
                        if (isset($request->category[$index]) && $request->category[$index] != '') {

                            $category = Category::where('title', 'like', '%' . $request->category[$index] . '%')->first();
                            // Category Not Exists | Create New Category
                            if (!$category) {
                                $category =  Category::create([
                                    'title' => $request->category[$index],
                                    'description' => $request->category[$index],
                                    'tags' => $request->category[$index],
                                    'slug' => strtolower(str_replace(' ', '_', trim($request->name[$index]))),
                                ]);
                            }
                        }

                        $product =  Product::create([
                            'name' => $productData['name'],
                            'short_name' => $productData['short_name'],
                            'description' => $productData['description'],
                            'price' => $productData['price'],
                            'gst_rate' => $productData['gst_rate'],
                            'hsn_code' => $productData['hsn_code'],
                            'carton_capacity' => $productData['carton_capacity'],
                            'sort_order' => $productData['sort_order'],
                            'tags' => $productData['tags'],
                            'long_description' => $productData['long_description'],
                            'slug' => $productData['slug'],
                        ]);

                        if ($category) {
                            ProductCategories::create([
                                'product_id' => $product->id,
                                'category_id' => $category->id
                            ]);
                        }
                    }
                }
            }

            // dd('asdas');
            return json_encode(['Success' => true]);
        } catch (Exception $e) {
            dd($e);
            return  json_encode($e);
        }
    }
}
