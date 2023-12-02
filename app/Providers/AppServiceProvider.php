<?php

namespace App\Providers;

use App\Model\Category;
use App\Model\Cms;
use App\Model\Product;
use App\Model\ProductCategories;
use App\Model\productImageGallery;
use Illuminate\Http\Client\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        view()->composer('*', function ($view) {
            if (request()->wantsJson()) {
                return $view;
            } else {
                if (auth()->user() && !in_array(auth()->user()->role, [1, 2])) {
                    auth()->logout();
                    return redirect('admin/login')->send();
                } else {
                    $data = [
                        'appLogo' => Cms::where('cms_key', 'app_logo')->get()->first(),
                        // 'categoryList' => Category::whereIn('id', ProductCategories::groupBy('category_id')->pluck('category_id'))->where('status', 1)->get(),
                        'categoryList' => Category::where('status', 1)->get(),
                        'categoryTop5' => Category::where('status', 1)->limit(5)->get(),
                        'bannerProducts' => Product::where('status', 1)->with('category')->limit(3)->get(),
                        'bestSeller_newProduct' => Product::where('status', 1)->with('category')->where(function ($query) {
                            $query->where('is_best_seller', '=', 1)
                                ->orWhere('is_new_product', '=', 1);
                        })->whereIn('id', (function ($query) {
                            $query->from('product_image_galleries')
                                ->select('product_id')
                                ->groupBy('product_id');
                        }))->get(),
                        'contactDetails' => [
                            'contact_email' => Cms::where('cms_key', 'contact_email')->pluck('cms_value')->first(),
                            'contact_no' => Cms::where('cms_key', 'contact_no')->pluck('cms_value')->first(),
                            'website' => Cms::where('cms_key', 'website')->pluck('cms_value')->first(),
                            'address' => Cms::where('cms_key', 'address')->pluck('cms_value')->first(),
                            'working_time' => Cms::where('cms_key', 'working_time')->pluck('cms_value')->first(),
                            'location_link' => Cms::where('cms_key', 'location_link')->pluck('cms_value')->first(),
                        ],
                    ];
                    if ($this->app->request->getRequestUri() == '/privacy-policy') {
                        $data['privacy_policy'] = Cms::where('cms_key', 'privacy_policy')->pluck('cms_value')->first();
                    } else if ($this->app->request->getRequestUri() == '/terms-condition') {
                        $data['terms_condition'] = Cms::where('cms_key', 'terms_condition')->pluck('cms_value')->first();
                    }

                    return  $view->with('data',   $data);
                }
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
