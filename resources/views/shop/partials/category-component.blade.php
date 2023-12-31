<x-app-layout>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <main class="main pb-4 ">
        <div class="page-header breadcrumb-wrap mr-10 flex ">

            <div class="container">
                <div class="breadcrumb ">
                    <a class="nav_text" href="home" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>

            @if (Auth::user()->usertype == 'user')

                <div class="relative inline-block text-left">
                    <button type="button"
                        class="inline-flex items-center px-2 py-1 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        id="cart-dropdown" aria-haspopup="true" aria-expanded="true">
                        <a href="/cart" class="relative">
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
                    <div class="origin-top-right absolute right-0 mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="cart-dropdown" id="cart-menu"
                        style="z-index: 999;">
                        <div class="py-1" role="none">
                            @php $total = 0 @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                            @if (count((array) session('cart')) > 0)
                                @foreach (session('cart') as $product_id => $details)
                                    @foreach ($allProducts as $product)
                                        @if ($product->id == $product_id)
                                            <div class="px-2 py-1 border-b border-gray-200">
                                                <div class="flex justify-between items-center pr-2">
                                                    <img class="w-20"
                                                        src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}"
                                                        alt="#">
                                                    <p class="text-sm text-gray-700">{{ $details['name'] }}</p>
                                                    <p class="text-sm font-semibold text-gray-700">LKR
                                                        {{ $details['price'] * $details['quantity'] }}.00</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                                <div class="text-right px-2 py-2">
                                    <p class="text-sm font-semibold text-gray-700">Total: <span
                                            class="text-info font-bold">${{ $total }}.00</span></p>
                                </div>
                            @else
                                <p class="text-sm text-gray-700 px-2 py-1">No items in the cart</p>
                            @endif
                        </div>
                    </div>
                </div>

                <style>
                    #cart-dropdown:hover+#cart-menu {
                        display: block;
                    }
                </style>

            @endif


        </div>





        <section class="mt-50 mb-50">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{ $products->total() }}</strong> items for you
                                    from <strong class="text-brand"><b>{{ $category_name }}</b></strong> category!</p>
                            </div>

                        </div>
                        <div class="row product-grid-3">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">

                                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                    {{-- @if ($product)
                                                    <img class="default-img" src="{{asset('assets/imgs/product_crud/')}}/{{$product->image}}" alt="{{ $product->name }}">
                                                    <img class="hover-img" src="{{ asset('assets/imgs/shop/product-' . $product->id . '-2.jpg') }}" alt="{{ $product->name }}">
                                                @endif --}}
                                                    <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}"
                                                        alt="{{ $product->name }}">
                                                </a>


                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            @foreach ($categories as $category)
                                                @if ($product->category_id == $category->id)
                                                    <div class="product-category">
                                                        <a href="#">{{ $category->name }}</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <h2><a href="product-details.html">{{ $product->name }}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>LKR {{ $product->regular_price }}.00 </span>
                                                {{-- <span class="old-price">{{$product->}}</span> --}}
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                    href="{{ route('add_to_cart', $product->id) }}"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $products->links() }}
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>

                        <div class="widget-category mb-30 bg-white">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                    <li><a
                                            href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30 bg-white  ">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Fill by price</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price"
                                                placeholder="Add Your Price">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                                Fillter</a>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10 bg-white">
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
                                        <h5><a
                                                href="{{ route('product.details', ['slug' => $nproduct->slug]) }}">{{ $nproduct->name }}</a>
                                        </h5>
                                        <p class="price mb-0 mt-5">{{ $nproduct->regular_price }}</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
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
