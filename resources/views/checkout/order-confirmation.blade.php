<!-- resources/views/checkout-confirmation.blade.php -->

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

                            @foreach ($latestOrder->orderDetails as $orderDetail)
                                <tr>
                                    {{-- {{dd($orderDetail)}} --}}
                                    @if ($orderDetail->order_type == 'game')
                                        <td class="image" data-title="No"><img
                                                src="{{ asset('assets/imgs/games/') }}/{{ $orderDetail->image }}"
                                                alt="{{ $orderDetail->product_name }}" class="img-fluid"></td>
                                    @else
                                        <td class="image" data-title="No"><img
                                                src="{{ asset('assets/imgs/product_crud/') }}/{{ $orderDetail->image }}"
                                                alt="{{ $orderDetail->product_name }}" class="img-fluid"></td>
                                    @endif
                                    @if ($orderDetail->order_type == 'game')
                                        <td class="product-des product-name">
                                            <h5 class="product-name text-sm">{{ $orderDetail->product_name }}</h5>
                                        </td>
                                    @else
                                        <td class="product-des product-name">
                                            <h5 class="product-name text-sm">{{ $orderDetail->product_name }}</h5>
                                        </td>
                                    @endif

                                    <td class="price" data-title="Price">
                                        <span>{{ $orderDetail->product_price }}</span>
                                    </td>
                                    <td class="text-center" data-title="Stock">
                                        <span>{{ $orderDetail->quantity }}</span>
                                    </td>
                                    <td class="text-center" data-title="Cart">
                                        <span>{{ $orderDetail->total }}</span>
                                    </td>
                                </tr>
                                @php $total += $orderDetail->total; @endphp
                            @endforeach

                            <tr>
                                <td colspan="4" class="text-end font-semibold">Total</td>
                                <td class="font-semibold">LKR {{ $total }}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- Checkout form on the right side -->
                <div class="w-full md:w-4/12 mt-8 md:mt-0">
                    <div class="bg-gray-100 p-6 rounded-lg border">
                        <p class="mb-4 text-lg font-semibold">Billing Details</p>
                        <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="mb-4">
                                <p><strong>First Name:</strong> {{ $latestOrder->firstname }}</p>
                                <p><strong>Last Name:</strong> {{ $latestOrder->lastname }}</p>
                                <p><strong>Mobile:</strong> {{ $latestOrder->mobile }}</p>
                                <p><strong>Email:</strong> {{ $latestOrder->email }}</p>
                                <p><strong>Address Line 1:</strong> {{ $latestOrder->line1 }}</p>
                                <p><strong>Address Line 2:</strong> {{ $latestOrder->line2 }}</p>
                                <p><strong>City:</strong> {{ $latestOrder->city }}</p>
                                <p><strong>Postal Code:</strong> {{ $latestOrder->postalcode }}</p>
                            </div>

                            <button type="submit"
                                class="w-full p-2 mt-4 bg-green-500 text-white rounded-md hover:bg-green-600">Proceed to
                                checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
