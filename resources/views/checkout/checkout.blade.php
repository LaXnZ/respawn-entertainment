<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="{{ route('home') }}" rel="nofollow">Home</a>
                    <span></span> <a class="nav_text" href="{{ route('shop') }}" rel="nofollow">Shop</a>
                    <span></span> Checkout Confirmation
                </div>
            </div>
        </div>
        <section class="mt-8 pb-8">
            <div class="container flex flex-wrap bg-white p-4 rounded-lg border">
                <!-- Order Confirmation on the left side -->
                <div class="w-full md:w-7/12 mb-8 md:mb-0 p-6 mr-14 rounded-lg ">
                    <h4 class="mb-4 text-lg font-semibold">Order Confirmation</h4>

                    <table class="table shopping-summery text-center clean bg-white p-4 rounded-lg border">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalGames = 0;
                                $totalProducts = 0;
                            @endphp


                            @foreach (session('cart') as $product_id => $details)
                                <tr data-id="{{ $product_id }}">
                                    @foreach ($products as $product)
                                        @if ($product->id == $product_id)
                                            @if ($details['type'] == 'game')
                                                @foreach ($allGames as $game)
                                                    @if ($game->id == $product_id)
                                                        <td class="image" data-title="No"><img
                                                                src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}"
                                                                alt="{{ $game->name }}" class="img-fluid"></td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($allProducts as $product)
                                                    @if ($product->id == $product_id)
                                                        <td class="image" data-title="No"><img
                                                            src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}"
                                                                alt="{{ $product->name }}" class="img-fluid"></td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach

                                    @foreach ($products as $product)
                                        @if ($product->id == $product_id)
                                            @if ($details['type'] == 'game')
                                                @foreach ($allGames as $game)
                                                    @if ($game->id == $product_id)
                                                        <td> {{ $game->name }}</td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($allProducts as $product)
                                                    @if ($product->id == $product_id)
                                                        <td> {{ $product->name }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach

                                    @foreach ($products as $product)
                                        @if ($product->id == $product_id)
                                            @if ($details['type'] == 'game')
                                                @foreach ($allGames as $game)
                                                    @if ($game->id == $product_id)
                                                        <td>LKR {{ $game->price }}.00</td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($allProducts as $product)
                                                    @if ($product->id == $product_id)
                                                        <td> LKR {{ $product->regular_price }}.00</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach



                                    <td class="text-center" data-title="Stock">
                                        <span>{{ $details['quantity'] }}</span>
                                    </td>
                                    @foreach ($products as $product)
                                        @if ($product->id == $product_id)
                                            @if ($details['type'] == 'game')
                                                @foreach ($allGames as $game)
                                                    @if ($game->id == $product_id)
                                                        <td> LKR {{ $game->price * $details['quantity'] }}.00</td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($allProducts as $product)
                                                    @if ($product->id == $product_id)
                                                        <td> LKR {{ $product->regular_price * $details['quantity'] }}.00</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach
                                    
                                </tr>


                                @if ($details['type'] == 'game')
                                    @foreach ($allGames as $game)
                                        @if ($game->id == $product_id)
                                            @php
                                                $totalGames += $game->price * $details['quantity'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($allProducts as $product)
                                        @if ($product->id == $product_id)
                                            @php
                                                $totalProducts += $product->regular_price * $details['quantity'];
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Display total for games and products separately --}}
                            <tr>
                                <td colspan="4" class="text-end font-semibold">Total of Games</td>
                                <td class="font-semibold">LKR {{ $totalGames }}.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end font-semibold">Total of Products</td>
                                <td class="font-semibold">LKR {{ $totalProducts }}.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end font-semibold">Total</td>
                                <td class="font-semibold">LKR {{ $totalGames + $totalProducts }}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- Checkout form on the right side -->
                <div class="w-full md:w-4/12 mt-8 md:mt-0">
                    <div class="bg-gray-100 p-6 rounded-lg border">
                        <p class="mb-4 text-lg font-semibold">Enter Billing Details</p>
                        <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="mb-4">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">First
                                    Name:</label>
                                <input type="text" id="firstname" name="firstname"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('firstname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name:</label>
                                <input type="text" id="lastname" name="lastname"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile:</label>
                                <input type="tel" id="mobile" name="mobile"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                                <input type="email" id="email" name="email"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="addressLine1" class="block text-sm font-medium text-gray-700">Address Line
                                    1:</label>
                                <input type="text" id="addressLine1" name="line1"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('line1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="line2" class="block text-sm font-medium text-gray-700">Address Line
                                    2:</label>
                                <input type="text" id="addressLine2" name="line2"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('line2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
                                <input type="text" id="city" name="city"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="postalCode" class="block text-sm font-medium text-gray-700">Postal
                                    Code:</label>
                                <input type="number" id="postalCode" name="postalcode"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('postalcode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <button type="submit"
                                class="w-full p-2 bg-green-500 text-white rounded-md hover:bg-green-600">Save
                                Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
