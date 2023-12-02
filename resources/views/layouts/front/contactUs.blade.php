@section('css_include')

@extends('layouts.front.main', ['page_title'=>$cmsValue->title,'description'=>$cmsValue->description,'tags'=>$cmsValue->tags])

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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="page-title-wrapper-2 text-center">
                        <h1 class="page__title-2"> {{$cmsValue->Page->title}}</h1>
                        {{-- <div class="breadcrumb-menu-2 d-flex justify-content-center">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items-2">
                                    <li class="trail-item-2 trail-begin"><a href="/"><span>Home</span></a></li>
                                    <li class="trail-item-2 trail-end"><span>{{$cmsValue->title}}</span></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area start  -->
    <section class="shop-details-area section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row wow fadeInUp" data-wow-delay=".3s">
                        {!! $cmsValue->cms_value !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row wow fadeInUp" data-wow-delay=".3s">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14768.843356892457!2d70.7991505!3d22.2700018!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cb2158a60acf%3A0x893be914796e7a85!2sYOGI%20PRODUCTS%20(%20APEX%20KITCHENWARE%20)!5e0!3m2!1sen!2sin!4v1700120029623!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    {{-- @dd($cmsValue) --}}
    <section class="bf-product-area bg-theme-4  py-5">

        <div class="container">

            <div class="row justify-content-center  rounded bg-theme-1- bg-white py-5">
                <div class="section__title-wrapper text-center ">
                    <div class="section__title-wrapper text-center section-title-spacing">
                        {{-- <span class="section__subtitle bg-lighter">CONTACT</span> --}}
                        <h2 class="section__title">Contact with Us</h2>
                    </div>

                </div>



                <div class="row justify-content-center  rounded bg-theme-1-">
                    <div class="col-xl-8 col-lg-10">
                        @if(session()->has('success'))
                        <div class="alert bg-lighter section__subtitle text-center text-white w-100">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert bg-lighter section__subtitle text-center text-white w-100">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                        @endif
                        <div class="df-booking2__form">
                            <form action="{{ route('contact_us') }}" method="POST">
                                @method('POST')
                                @csrf()
                                <div class="row gx-5">
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="text" id="name" name="name" value="{{ old('name')}}" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="text" id="email" name="email"  value="{{ old('email')}}" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="number" id="number" name="number" value="{{ old('number')}}" placeholder="Your Phone" min="10" required>
                                        </div>
                                    </div>
                                    @error('number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <select name="service" id="service">
                                                <option value="inquiry">Inquiry</option>
                                                <option value="suggestion">Suggestion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="df-input-field">
                                            <input type="text" id="address" name="address" value="{{ old('address')}}" placeholder="Office Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="df-input-field">
                                            <textarea id="user_message" name="user_message" placeholder="Write Message Here..." required>{{ old('user_message')}} </textarea>

                                        </div>
                                    </div>
                                    @error('user_message')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                    <div class="col-md-12 recaptcha">
                                        <div class="df-input-field">
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="df-booking2__form-btn">
                                            <button type="submit" class="primary-btn">send now
                                                <span class="icon__box">
                                                    <img class="icon__first" src="{{url('img/icon/arrow-white.webp')}}" alt="image not found">
                                                    <img class="icon__second" src="{{url('img/icon/arrow-white.webp')}}" alt="image not found">
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    

</main>

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
@endsection

<!-- back to top end -->

@endsection
@section('script_include')
    {!! NoCaptcha::renderJs() !!}

    <script>
        $(function() {
            function rescaleCaptcha() {
                let width = $('.g-recaptcha').parent().width();
                let scale;
                if (width < 302) {
                    scale = width / 302;
                } else{
                    scale = 1.0; 
                }

                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
            }

            rescaleCaptcha();
            $( window ).resize(function() { rescaleCaptcha(); });
        });
    </script>
@endsection