<!-- resources/views/games/index.blade.php -->

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
                        <a href="cart" class="relative">
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

        <section class="mt-20 ">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="container">

                <form class="relative m-4" action="{{ route('games.search') }}" method="GET">
                    @csrf
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 ps-10 text-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Search Games.." required>
                    @error('search')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-1  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Search</button>

                </form>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{ $games->total() }}</strong> games for
                                    you!</p>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach ($games as $game)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">

                                                <a href="{{ route('game.details', ['id' => $game->id]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/games/' . $game->image) }}"
                                                        alt="{{ $game->name }}">
                                                </a>

                                            </div>


                                        </div>
                                        <div class="product-content-wrap">
                                            <h2><a
                                                    href="{{ route('game.details', ['id' => $game->id]) }}">{{ $game->name }}</a>
                                            </h2>
                                            <p class="card-text">{{ $game->description }}</p>
                                            <div class="product-price">
                                                <span>LKR {{ $game->price }}.00 </span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                    href="{{ route('add_to_cart', ['id' => $game->id, 'type' => 'game']) }}">
                                                    <i class="fi-rs-shopping-bag-add"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $games->links() }}

                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar pt-6">
                        <div class="widget-category mb-30 bg-white">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                                
                                <ul class="categories">
                                    <li><a class="hover:text-orange-600 " href="{{ route('games.category', ['genre' => 'action']) }}">Action</a></li>
                                    <li><a class="hover:text-orange-600 "
                                            href="{{ route('games.category', ['genre' => 'adventure']) }}">Adventure</a>
                                    </li>
                                    <li><a  class="hover:text-orange-600 " href="{{ route('games.category', ['genre' => 'rpg']) }}">RPG</a></li>
                                    <li><a class="hover:text-orange-600 " href="{{ route('games.category', ['genre' => 'shooter']) }}">Shooter</a>
                                    </li>
                                    <li><a class="hover:text-orange-600 "
                                            href="{{ route('games.category', ['genre' => 'simulation']) }}">Simulation</a>
                                    </li>
                                    <li><a  class="hover:text-orange-600 " href="{{ route('games.category', ['genre' => 'strategy']) }}">Strategy</a>
                                    </li>
                                    <li><a class="hover:text-orange-600 " href="{{ route('games.category', ['genre' => 'battle-royale']) }}">Battle
                                            Royale</a></li>
                                </ul>
                            </div>
    
                            <!-- You can add more sidebar widgets as needed -->
    
                        </div>
    
    
    
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
