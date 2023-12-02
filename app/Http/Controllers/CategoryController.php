<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductCategories;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="categorys/' . $row->id . '" class="btn btn-primary btn-sm mr-3">
                    <i class="icon-sm fas fa-pencil-alt"></i>Edit</a>
                    <a href="delete-category/' . $row->id . '"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn btn-danger btn-sm mr-3" onclick="return confirm(`Are you sure to delete?`)"><i class="icon-sm fas fa-trash"></i>Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categorys.list');
    }

    public function create()
    {
        return view('admin.categorys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:categories',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'status' => 'nullable',
            'slug' => 'required',
        ]);


        $imageName = '';
        if (isset($request->image)) {
            $imageName =  fileUpload($request->image, 'categorys', 'images\categorys');
        }

        $tags = '';
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }

        $product = Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'tags' =>  $tags,
            'status' => $request->status,
            'slug' => $request->slug,
        ]);

        return redirect('admin/categorys')->with(['success' => 'Category created successfully']);
    }

    public function show(Category $category)
    {
        return view('admin.categorys.edit', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categorys.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'status' => 'required',
            'slug' => 'required',
        ]);


        $tags = $category->tags;
        if ($request->tags) {
            $tags = implode(',', array_column(json_decode($request->tags), 'value'));
        }


        $imageName = $category->getRawOriginal('image');
        if (isset($request->image)) {

            Storage::disk('categorys')->delete($imageName);

            $imageName =  fileUpload($request->image, '', 'categorys');
        }
        $category = $category->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'tags' =>  $tags,
            'status' => $request->status,
            'slug' => $request->slug,
        ]);

        return redirect('admin/categorys')->with(['success' => 'Category updated successfully']);
    }

    public function destroy(Request $request, $categoryId)
    {
        if (ProductCategories::where('category_id', $categoryId)->count()) {
            return redirect(route('categorys.index'))->with(['success' => 'Category can`t Delete']);
        }

        $productImageGallery = Category::where('id', $categoryId)->get()->first();

        Storage::disk('categorys')->delete($productImageGallery->getRawOriginal('image'));

        Category::where('id', $categoryId)->delete();
        return redirect(route('categorys.index'))->with(['success' => 'Category deleted successfully']);
    }

    public function removeCategoryImage(Category $product,  $categoryId)
    {
        $productImageGallery = Category::where('id', $categoryId)->get()->first();
        if ($productImageGallery->image) {

            Storage::disk('categorys')->delete($productImageGallery->getRawOriginal('image'));

            Category::where('id', $categoryId)->update([
                'image' => null,
            ]);
        }

        return redirect(route('categorys.show', ['category' => $categoryId]))->with(['success' => 'Image Deleted successfully']);
    }
}
