@section('css_include')
    @extends('layouts.front.main', ['page_title' => isset($category->title) ? $category->title : 'All Products', 'description' => isset($category->description) ? $category->description : 'All Products', 'tags' => isset($category->tags) ? $category->tags : 'All Products'])

@section('content')
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- [if lte IE 9]>
        <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p>
        <![endif] -->

    <main>
        <!-- page title area start  -->
        <section class="page-title-area-2 breadcrumb-spacing bg-theme-4 section-spacing">
            <div class="d-none" data-background="d-none"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="page-title-wrapper-2 text-center">
                            <h1 class="page__title-2">{{ isset($category->title) ? $category->title : 'Products' }}</h1>
                            {{-- <div class="breadcrumb-menu-2 d-flex justify-content-center">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items-2">
                                    <li class="trail-item-2 trail-begin"><a href="/"><span>Home</span></a></li>
                                    <li class="trail-item-2 trail-end"><span>{{$category->title}}</span></li>
                                </ul>
                                <hr>
                                <span class="text-white">{{$category->description}}</span>
                            </nav>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area start  -->

        <!-- shop modal start -->
        <!-- <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row justify-content-between">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-box">
                                        <div class="tab-content" id="modalTabContent">
                                            <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product-01.webp" alt="product">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product-02.webp" alt="product">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product-13.webp" alt="product">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product-15.webp" alt="product">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                    <img src="assets/img/shop/product-01.webp" alt="product">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                                    <img src="assets/img/shop/product-02.webp" alt="product">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                                    <img src="assets/img/shop/product-13.webp" alt="product">
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                                    <img src="assets/img/shop/product-15.webp" alt="product">
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-content">
                                        <h4><a href="#">Basin Mixer DF-1</a></h4>
                                        <div class="product__modal-des mb-40">
                                            <p>Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum
                                                claritatem.
                                                Investigationes demonstraverunt
                                            </p>
                                        </div>
                                        <div class="product__stock">
                                            <span>Availability :</span>
                                            <span>In Stock</span>
                                        </div>
                                        <div class="product__stock sku mb-30">
                                            <span>SKU:</span>
                                            <span>Juicera C49J89: £875, Debenhams Plus</span>
                                        </div>
                                        <div class="product__review d-sm-flex">
                                            <div class="rating rating__shop mb-15 mr-35">
                                                <ul>
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__add-review mb-15">
                                                <span><a href="#">1 Review</a></span>
                                                <span><a href="#">Add Review</a></span>
                                            </div>
                                        </div>
                                        <div class="product__price">
                                            <span>$959.00</span>
                                        </div>
                                        <div class="product__modal-form">
                                            <div class="product-quantity-cart mb-30">
                                                <div class="product-quantity-form">
                                                    <form action="#">
                                                        <button class="cart-minus"><i class="far fa-minus"></i></button>
                                                        <input class="cart-input" type="text" value="1">
                                                        <button class="cart-plus"><i class="far fa-plus"></i></button>
                                                    </form>
                                                </div>
                                                <a href="# class="primary-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="product__modal-links">
                                            <ul>
                                                <li><a href="#" title="Add to Wishlist"><i class="fal fa-heart"></i></a></li>
                                                <li><a href="#" title="Compare"><i class="far fa-sliders-h"></i></a></li>
                                                <li><a href="#" title="Print"><i class="fal fa-print"></i></a></li>
                                                <li><a href="#" title="Share"><i class="fal fa-share-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- shop modal end -->
        <!-- product area start  -->
        {{-- @dd($data['categoryList'])ś --}}
        <div class="product-area section-spacing bg-theme-4 b-top b-bottom-2">
            <div class="container">
                <div class="row g-50">
                    <div class="col-xl-3 col-lg-4">
                        <div class="product-left-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="product-left-item mb-45">
                                <h6 class="product-widget-title">Product categories</h6>
                                <ul class="product-categories mt-5 pt-5 pt-lg-0 mt-lg-0 d-lg-block d-none">
                                    <li><a href="{{ route('all_products') }}"
                                            class="{{ Route::is('all_products') ? 'active' : '' }}">All</a></li>
                                    @if (isset($data['categoryList']))
                                        @foreach ($data['categoryList'] as $filterCategory)
                                            @if (isset($category->slug))
                                                <li><a href="{{ route('product_category', $filterCategory->slug) }}"
                                                        class="{{ $filterCategory->slug == $category->slug ? 'active' : '' }}">{{ $filterCategory->title }}</a>
                                                </li>
                                            @else
                                                <li><a
                                                        href="{{ route('product_category', $filterCategory->slug) }}">{{ $filterCategory->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="d-lg-none d-block">
                                <ul class="nav nav-pills mb-3 mobile-category-products-tab justify-content-center" id="pills-tab" role="tablist">
                                    @foreach($data['categoryList'] as $filterCategory )
                                    <li class="nav-item w-100" ><a href="{{ route('product_category', $filterCategory->slug) }}" class="nav-link {{$filterCategory->slug == $category->slug ? 'active' :'' }}">{{$filterCategory->title }}</a></li>
                                    {{-- <li class="nav-item w-100" ><a href="/category/{{$filterCategory->slug}}" class="nav-link {{$filterCategory->slug == $category->slug ? 'active' :'' }}">{{$filterCategory->title }}</a></li> --}}
                                    @endforeach
                                </ul>
                              </div>
                            <!-- <div class="product-left-item p-relative mb-45">
                                <div class="price-wrapper">
                                    <h6 class="product-widget-title">Price Range</h6>
                                    <div class="price-input">
                                        <div class="field">
                                            <span></span>
                                            <input type="number" class="input-min" value="2500">
                                        </div>
                                        <div class="separator mb-5"></div>
                                        <div class="field">
                                            <span></span>
                                            <input type="number" class="input-max" value="7500">
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                                    </div>
                                </div>
                            </div>
                            <div class="product-left-item mb-45">
                                <h6 class="product-widget-title">Products</h6>
                                <ul class="product_list_widget">
                                    <li class="d-flex align-items-start">
                                        <div class="product-widget-thumb">
                                            <div class="product-widget-thumb-inner">
                                                <a href="#">
                                                    <img src="assets/img/shop/product-01.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="product" loading="lazy" width="600" height="600"> </a>
                                            </div>
                                        </div>
                                        <div class="product-widget-info">
                                            <h4 class="product-widget-title">
                                                <a href="#">Basin Mixer DF-1</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="price-old">$959.00</span>
                                                <span class="price-now">$699.00</span>
                                            </div>
                                            <div class="rating">
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <div class="product-widget-thumb">
                                            <div class="product-widget-thumb-inner">
                                                <a href="#">
                                                    <img src="assets/img/shop/product-02.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="product" loading="lazy" width="600" height="600"> </a>
                                            </div>
                                        </div>
                                        <div class="product-widget-info">
                                            <h4 class="product-widget-title">
                                                <a href="#">Shower Enclosures</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="price-now">$699.00</span>
                                            </div>
                                            <div class="rating">
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-059-star_outline"></i></a>
                                                <a href="#"><i class="icon-059-star_outline"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <div class="product-widget-thumb">
                                            <div class="product-widget-thumb-inner">
                                                <a href="#">
                                                    <img src="assets/img/shop/product-13.webp" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="product" loading="lazy" width="600" height="600"> </a>
                                            </div>
                                        </div>
                                        <div class="product-widget-info">
                                            <h4 class="product-widget-title">
                                                <a href="#">DF Water Filter</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="price-now">$699.00</span>
                                            </div>
                                            <div class="rating">
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-059-star_outline"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-left-item">
                                <h6 class="product-widget-title">Product tags</h6>
                                <div class="sidebar-widget-tag">
                                    <a href="#">Plumber</a>
                                    <a href="#">DIYplumbing</a>
                                    <a href="#">Fixing</a>
                                    <a href="#">Plumbtips</a>
                                    <a href="#">Plumbmat</a>
                                    <a href="#">Plumb</a>
                                    <a href="#">Plumbingpros</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="product-area-wrapper mb-20 wow fadeInUp" data-wow-delay=".3s">
                            <div class="product-filter-wrapper mb-30">
                                <div class="row g-5">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="items-showing-text">
                                            <div class="items-showing capitalize">
                                                @php
                                                    $total = $productList->total();
                                                    $currentPage = $productList->currentPage();
                                                    $perPage = $productList->perPage();

                                                    $from = ($currentPage - 1) * $perPage + 1;
                                                    $to = min($currentPage * $perPage, $total);
                                                @endphp

                                                <p> Showing <span>{{{ $from }}}</span>–<span>{{ $to }}</span> of <span>{{ $total }}</span> Results</p>
                                                {{-- @if (isset($productList))
                                            @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-6">
                                        <div class="filter-buttons style-2">
                                            <select name="orderby" class="orderby" aria-label="Shop order" style="display: none;">
                                                <option value="menu_order" selected="selected">Default Sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by latest</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            @if (isset($productList))
                                <div class="product-wrapper">
                                    @foreach ($productList as $product)
                                        {{-- @dd($product->category->first()->slug) --}}
                                        @if (isset($product->imageGallery) && count($product->imageGallery) && isset($product->category->first()->slug))
                                            <div class="product-single card shadow-lg">
                                                <div class="product-thumb">
                                                    <a
                                                        href="{{ route('product_details', ['category_slug' => $product->category->first()->slug, 'product_slug' => $product->slug]) }}"><img
                                                            src="{{ count($product->imageGallery) && $product->imageGallery[0]->image ? $product->imageGallery[0]->image : '' }}"
                                                            alt="Product Image" width="100%" height="195px"></a>
                                                    {{-- <a href="/product/{{$product->slug}}"><img src="{{ count($product->imageGallery) && $product->imageGallery[0]->image ? $product->imageGallery[0]->image :'' }}"  alt="Product Image" width="100%" height="195px"></a> --}}
                                                    <div class="product-item-action">
                                                    </div>
                                                </div>
                                                <div class="product-description ">
                                                    <h4 class="product-name text-truncate"><a
                                                            href="{{ route('product_details', ['category_slug' => $product->category->first()->slug, 'product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <div class="product-price">
                                                        <!-- <span class="price-old">$959.00</span> -->
                                                        <span class="price-now">₹ {{ $product->price }}</span>
                                                    </div>

                                                    <!-- <div class="rating">
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                                <a href="#"><i class="icon-star"></i></a>
                                            </div> -->
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                {{-- original --}}
                                {{-- {{ $productList->links('vendor.pagination.default') }} --}}

                                {{-- bootstrap working --}}
                                {{ $productList->links('vendor.pagination.custom') }}
                            @endif
                            <!-- <div class="basic-pagination mt-30 wow fadeInUp" data-wow-delay=".3s">
                                <ul>
                                    <li><a class="prev page-numbers" href="#">
                                            <i class="icon-022-left"></i>
                                        </a>
                                    </li>
                                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                                    <li><a class="page-numbers" href="#">2</a></li>
                                    <li><a class="page-numbers" href="#">3</a></li>
                                    <li><a class="page-numbers" href="#">
                                            <i class="fa-light fa-ellipsis"></i>
                                        </a>
                                    </li>
                                    <li><a class="next page-numbers" href="#">
                                            <i class="icon-021-next"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product area end  -->



    </main>


    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
@endsection

<!-- back to top end -->
