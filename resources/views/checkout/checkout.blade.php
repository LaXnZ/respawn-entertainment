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
                            @php $total = 0; @endphp
                            @if(session('cart') > 0) 
                                @foreach (session('cart') as $product_id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{$product_id}}">
                                        @foreach ($products as $product)
                                            @if ($product->id == $product_id)
                                                <td class="image product-thumbnail inline-block"><img src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}" alt="#" class="w-16"></td>
                                            @endif
                                        @endforeach 
                                        <td class="product-des product-name">
                                            <h5 class="product-name text-sm"><a href="product-details.html">{{ $details['name'] }}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span>LKR {{ $details['price'] }}.00</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <span>{{ $details['quantity'] }}</span>
                                        </td>
                                        <td class="text-center" data-title="Cart">
                                            <span>LKR {{ $details['price'] * $details['quantity'] }}.00</span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-end font-semibold">Total</td>
                                    <td class="font-semibold">LKR {{ $total }}.00</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p>No items in the cart</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
            
                <!-- Checkout form on the right side -->
                <div class="w-full md:w-4/12 mt-8 md:mt-0">
                    <div class="bg-gray-100 p-6 rounded-lg border">
                        <p class="mb-4 text-lg font-semibold">Are you sure you want to proceed with the order?</p>
                        <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="mb-4">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name:</label>
                                <input type="text" id="firstname" name="firstname" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name:</label>
                                <input type="text" id="lastname" name="lastname" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile:</label>
                                <input type="text" id="mobile" name="mobile" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="addressLine1" class="block text-sm font-medium text-gray-700">Address Line 1:</label>
                                <input type="text" id="addressLine1" name="line1" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('line1')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="line2" class="block text-sm font-medium text-gray-700">Address Line 2:</label>
                                <input type="text" id="addressLine2" name="line2" class="mt-1 p-2 w-full border rounded-md">

                            </div>

                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
                                <input type="text" id="city" name="city" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('city')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="postalCode" class="block text-sm font-medium text-gray-700">Postal Code:</label>
                                <input type="text" id="postalCode" name="postalcode" class="mt-1 p-2 w-full border rounded-md" required>
                                @error('postalCode')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <button type="submit" class="w-full p-2 bg-green-500 text-white rounded-md hover:bg-green-600">Confirm Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
