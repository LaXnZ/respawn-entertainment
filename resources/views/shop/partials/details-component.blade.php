<x-app-layout>

    <main class="main p-4">

        <div class="page-header breadcrumb-wrap mr-10 flex mt-6">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span> <a class="nav_text" href="/shop" rel="nofollow">Shop</a>
                    <span></span> {{ $product->name }}
                </div>
            </div>
            @if (Auth::user()->usertype == 'user')
                <div class="relative inline-block text-left">
                    <button type="button"
                        class="inline-flex items-center px-2 py-1 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        id="cart-dropdown" aria-haspopup="true" aria-expanded="true">
                        <a href="{{ route('shop.cart') }}" class="relative">
                            <span
                                class="absolute top-0 right-0 inline-flex items-center justify-center px-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ count((array) session('cart')) }}</span>
                            <svg class="h-6 w-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </a>
                    </button>
                    <div id="cart-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">

                    </div>
                </div>
                <style>
                    #cart-dropdown:hover+#cart-menu {
                        display: block !important;
                    }
                </style>
            @endif
        </div>


        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail bg-white p-6 rounded-lg">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}"
                                                    alt="product image">
                                            </figure>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a
                                                        href="shop.html">{{ explode(' ', $product->name)[0] }}</a></span>

                                            </div>
                                           
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">LKR
                                                        {{ $product->regular_price }}.00</span></ins>

                                               
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->short_description }}</p>
                                        </div>



                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                           
                                            <div class="product-extra-link2">
                                                <button
                                                    onclick="window.location.href='{{ route('add_to_cart', $product->id) }}'"
                                                    class="button button-add-to-cart">Add to cart</button>

                                                
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5 ">SKU: <a class="nav_text"
                                                    href="#">{{ $product->SKU }}</a></li>
                                            <li>Availability:<span
                                                    class="in-stock text-success ml-5">{{ $product->quantity }} Items
                                                    {{ $product->stock_status }}</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="#Description">Description</a>
                                    </li>

                                   
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {{ $product->description }}

                                        </div>
                                    </div>

                                   
                                </div>
                            </div>
                            <div class="row mt-60 ">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Related products</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach ($rproducts as $rproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6 ">
                                                <div class="product-cart-wrap small hover-up bg-white border border-gray-600 p-2">
                                                    <div class="product-img-action-wrap rounded-lg">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', ['slug' => $rproduct->slug]) }}"
                                                                tabindex="0">
                                                                <img class="default-img "
                                                                    src="{{ asset('assets/imgs/product_crud/') }}/{{ $rproduct->image }}"
                                                                    alt="{{ $rproduct->name }}">
                                                            </a>
                                                        </div>
                                                       
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">Hot</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ route('product.details', ['slug' => $rproduct->slug]) }}"
                                                                tabindex="0">{{ $rproduct->name }}</a></h2>
                                                        
                                                        <div class="product-price">
                                                            <span>LKR {{ $rproduct->regular_price }}.00</span>
                                                            {{-- <span class="old-price">$645.8</span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30 bg-white p-4">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>

                            <ul class="categories">
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10 bg-white p-6">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach ($nproducts as $nproduct)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $nproduct->image }}"
                                            alt="{{ $nproduct->name }}">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="{{ route('product.details', ['slug' => $nproduct->slug]) }}"
                                                class="hover:text-orange-600">{{ $nproduct->name }}</a></h5>
                                        <p class="price mb-0 mt-5">LKR {{ $nproduct->regular_price }}.00</p>
                                        
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
