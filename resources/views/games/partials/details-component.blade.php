<x-app-layout>
    <main class="main pb-4">
        <div class="page-header breadcrumb-wrap mr-10 flex mt-6">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="home" rel="nofollow">Home</a>
                    <span></span> Games
                </div>
            </div>

            @if (Auth::user()->usertype == 'user')
                <div class="relative inline-block text-left">
                    <button type="button"
                        class="inline-flex items-center px-2 py-1 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        id="cart-dropdown" aria-haspopup="true" aria-expanded="true">
                        <a href="{{route('shop.cart')}}" class="relative">
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
                            @php
                                $totalGames = 0;
                                $totalProducts = 0;
                                $total = 0;
                            @endphp
                            @foreach ((array) session('cart') as $id => $details)
                                @php
                                    if ($details['type'] == 'game') {
                                        $totalGames += $allGames->find($id)->price * $details['quantity'];
                                    } elseif ($details['type'] == 'product') {
                                        $totalProducts += $allProducts->find($id)->regular_price * $details['quantity'];
                                    }
                                    $total = $totalGames + $totalProducts;
                                @endphp
                            @endforeach

                            @if (count((array) session('cart')) > 0)
                                {{-- Games --}}
                                @foreach (session('cart') as $product_id => $details)
                                    @if ($details['type'] == 'game')
                                        @foreach ($allGames as $game)
                                            @if ($game->id == $product_id)
                                                <div class="px-2 py-1 border border-gray-200 rounded-lg m-2">
                                                    <div class="flex justify-between items-center pr-2">
                                                        <img class="w-20 pr-2"
                                                            src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}"
                                                            alt="{{ $game->name }}" class="img-fluid">
                                                        <p class="text-sm text-gray-700">{{ $game->name }}</p>
                                                        <p class="text-sm font-semibold text-gray-700">LKR
                                                            {{ $game->price * $details['quantity'] }}.00</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Products --}}
                                @foreach (session('cart') as $product_id => $details)
                                    @if ($details['type'] == 'product')
                                        @foreach ($allProducts as $product)
                                            @if ($product->id == $product_id)
                                                <div class="px-2 py-1 border border-gray-200 rounded-lg m-2">
                                                    <div class="flex justify-between items-center pr-2">
                                                        <img class="w-20 pr-2"
                                                            src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}"
                                                            alt="#">
                                                        <p class="text-sm text-gray-700">{{ $details['name'] }}</p>
                                                        <p class="text-sm font-semibold text-gray-700">LKR
                                                            {{ $product->regular_price * $details['quantity'] }}.00</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Total --}}
                                <div class="text-right px-2 py-2">
                                    <p class="text-sm font-semibold text-gray-700">Total Games: <span
                                            class="text-info font-bold">LKR {{ $totalGames }}.00</span></p>
                                    <p class="text-sm font-semibold text-gray-700">Total Products: <span
                                            class="text-info font-bold">LKR {{ $totalProducts }}.00</span></p>
                                    <p class="text-sm font-semibold text-gray-700">Grand Total: <span
                                            class="text-info font-bold">LKR {{ $total }}.00</span></p>
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
        <div class="container mt-6">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-6 bg-white border border-gray-700 rounded-lg p-3">
                    <div class="product-details-img">
                        <img class="rounded-lg w-full" src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}" alt="{{ $game->name }}">
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="product-details-content border border-gray-700 bg-white rounded-lg p-4">
                        <h2 class="text-2xl font-semibold mb-3">{{ $game->name }}</h2>
                        <p class="text-lg font-bold mb-3">LKR {{ $game->price }}.00</p>
                        <p class="text-gray-600 mb-4">{{ $game->description }}</p>

                        <div class="product-action mt-3">
                            <a aria-label="Add To Cart" class="button button-add-to-cart action-btn hover-up"
                                href="{{ route('add_to_cart', ['id' => $game->id, 'type' => 'game']) }}">
                                <i class="fi-rs-shopping-bag-add"></i> Add To Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
