<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductCategories;
use App\Model\productImageGallery;
use App\Model\productAdditionalInfo;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="products/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                     <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                     <a href="delete-products/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.product.list');
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'short_name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'price' => 'nullable',
            'gst_rate' => 'required',
            'hsn_code' => 'required',
            'carton_capacity' => 'required',
            'status' => 'nullable',
            'order' => 'nullable',
            'sort_order' => 'nullable',
            'is_best_seller' => 'nullable',
            'is_new_product' => 'nullable',
            'long_description' => 'nullable',
            'tags' => 'nullable',
            'category' => 'nullable',
            'gallery_image' => 'nullable|array',
            'title' => 'nullable',
            'details' => 'nullable',
            'sortOrder' => 'nullable',
            'slug' => 'required',
        ]);

        $tags = '';
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }

        $product = Product::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'sort_order' => $request->sort_order,
            'status' =>  $request->status,
            'long_description' => $request->long_description,
            'is_best_seller' => (isset($request->is_best_seller) && $request->is_best_seller == 1) ? 1 : 0,
            'is_new_product' => (isset($request->is_new_product) && $request->is_new_product == 1) ? 1 : 0,
            'tags' => $tags,
            'slug' => $request->slug,
            // 'category' => $request->category,
        ]);

        if ($request->gallery_image && count($request->gallery_image)) {
            // resizeImage($request->gallery_image, '', 'productGallary', true);
            $fileResponse =  fileUpload($request->gallery_image, '', 'productGallary', true);
            if ($request->gallery_image  && count($fileResponse)) {
                foreach ($fileResponse as $image) {
                    $productImageGallery = new productImageGallery();
                    $productImageGallery->product_id  = $product->id;;
                    $productImageGallery->image = $image;
                    $productImageGallery->save();
                }
            }
        }
        $additionalInfo = [];
        if (isset($request->title) && count($request->title)) {
            foreach ($request->title as $index => $info) {
                if (!empty($request->title[$index])) {
                    array_push($additionalInfo, [
                        'product_id' => $product->id,
                        'title' => $request->title[$index],
                        'details' => $request->details[$index],
                        'sortOrder' => $request->sortOrder[$index],
                    ]);
                }
            }
            productAdditionalInfo::insert($additionalInfo);
            if ($request->category) {
                $product->category()->sync((isset($request->category) && !empty($request->category)) ? [$request->category] : []);
            }
        } else {
            productAdditionalInfo::where('product_id', $product->id)->delete();
        }
        return redirect('admin/products')->with(['success' => 'Product created successfully']);
    }

    public function show(Product $product)
    {
        $productCategories = $product->productCategories->pluck('category_id')->toArray();
        $categories = Category::where('status', 1)->get();
        $productAdditionalInfo = productAdditionalInfo::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('product', 'categories', 'productCategories', 'productAdditionalInfo'));
    }

    public function edit(Product $product)
    {
        $productCategories = $product->productCategories->pluck('category_id')->toArray();
        $categories = Category::where('status', 1)->get();
        $productAdditionalInfo = productAdditionalInfo::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('product', 'categories', 'productCategories', 'productAdditionalInfo'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'short_name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'price' => 'nullable',
            'gst_rate' => 'required',
            'hsn_code' => 'required',
            'carton_capacity' => 'required',
            'status' => 'nullable',
            'order' => 'nullable',
            'sort_order' => 'nullable',
            'is_best_seller' => 'nullable',
            'is_new_product' => 'nullable',
            'long_description' => 'nullable',
            'tags' => 'nullable',
            'category' => 'nullable',
            'gallery_image' => 'nullable|array',
            'title' => 'nullable',
            'details' => 'nullable',
            'sortOrder' => 'nullable',
            'slug' => 'required',
        ]);

        $imageName = $product->image;
        if (isset($request->image)) {
            // resizeImage($request->image, '', 'productGallary', false);
            $imageName =  fileUpload($request->image, '', 'productGallary', false);
        }

        $tags = $product->tags;
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }

        $product->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'gst_rate' => $request->gst_rate,
            'hsn_code' => $request->hsn_code,
            'carton_capacity' => $request->carton_capacity,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
            'is_best_seller' => $request->is_best_seller,
            'long_description' => $request->long_description,
            'is_new_product' => $request->is_new_product,
            'tags' => $tags,
            'slug' => $request->slug,
            // 'selling_price' => $request->selling_price,

        ]);
        $additionalInfo = [];
        
        if (isset($request->title) && count($request->title)) {

            foreach ($request->title as $index => $info) {
                if (!empty($request->title[$index])) {
                    array_push($additionalInfo, [
                        'product_id' => $product->id,
                        'title' => $request->title[$index],
                        'details' => $request->details[$index],
                        'sortOrder' => $request->sortOrder[$index],
                    ]);
                }
            }
            productAdditionalInfo::where('product_id', $product->id)->delete();
            productAdditionalInfo::insert($additionalInfo);
        } else {
            productAdditionalInfo::where('product_id', $product->id)->delete();
        }

        if ($request->gallery_image && count($request->gallery_image)) {
            resizeImage($request->gallery_image, '', 'productGallary', true);
            $fileResponse =  fileUpload($request->gallery_image, '', 'productGallary', true);
            if ($request->gallery_image  && count($fileResponse)) {
                foreach ($fileResponse as $image) {
                    $productImageGallery = new productImageGallery();
                    $productImageGallery->product_id  = $product->id;
                    $productImageGallery->image = $image;
                    $productImageGallery->save();
                }
            }
        }

        if ($request->category) {
            $product->category()->sync((isset($request->category) && !empty($request->category)) ? [$request->category] : []);
        }

        return redirect('admin/products')->with(['success' => 'Product created successfully']);
    }

    public function destroy(Product $product, $product_id)
    {
        $productImageGallery = productImageGallery::where('product_id', $product_id)->get();

        foreach ($productImageGallery as $image) {
            Storage::disk('productGallary')->delete($image->getRawOriginal('image'));
        }

        Product::where('id', $product_id)->delete();
        productImageGallery::where('product_id', $product_id)->delete();
        return redirect(route('products.index'))->with(['success' => 'Product Deleted successfully']);
    }

    public function removeProductImage(Product $product, $image_id, $product_id)
    {
        $productImageGallery = productImageGallery::where('product_id', $product_id)->get()->first();
        Storage::disk('productGallary')->delete($productImageGallery->getRawOriginal('image'));

        productImageGallery::where('id', $image_id)->delete();
        return redirect(route('products.show', ['product' => $product_id]))->with(['success' => 'Product Deleted successfully']);
    }

    public function importProduct()
    {
        return view('admin.product.import');
    }

    public function importProductList(Request $request)
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

            return redirect(route('products.index'))->with(['success' => 'Product Deleted successfully']);
            // return json_encode(['Success' => true]);
        } catch (Exception $e) {
            dd(json_encode($e));
            return  json_encode($e);
        }
    }


    // public function productGallery(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = productImageGallery::with('product')->groupBy('product_id')->get();
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $btn = '<a href="update-product-gallery/' . $row->product_id . '" class="btn btn-primary btn-sm mr-3">
    //                  <i class="icon-sm fas fa-pencil-alt"></i>Details</a>';
    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('admin.productGallery.list');
    // }

    // public function  addProductGallery()
    // {
    //     $productList = Product::where('status', 1)->get();
    //     return view('admin.productGallery.create', compact('productList'));
    // }

    // public function editProductGallery($id)
    // {
    //     $productList = Product::where('status', 1)->get();
    //     $galleryImages = productImageGallery::where('product_id', $id)->get();
    //     return view('admin.productGallery.edit', compact('productList', 'id', 'galleryImages'));
    // }

    // public function saveProductGallery(Request $request)
    // {
    //     $request->validate([
    //         'gallery_image' => 'required',
    //         'product_id' => 'required',
    //     ]);
    //     resizeImage($request->gallery_image, '', 'productGallary', true);
    //     $fileResponse =  fileUpload($request->gallery_image, '', 'productGallary', true);
    //     if ($request->gallery_image  && count($fileResponse)) {

    //         foreach ($fileResponse as $image) {
    //             $productImageGallery = new productImageGallery();
    //             $productImageGallery->product_id  = $request->product_id;
    //             $productImageGallery->image = $image;
    //             $productImageGallery->save();
    //         }
    //     }
    //     return redirect('admin/product-gallery')->with(['success' => 'Product Images Uploded successfully']);
    // }
}
