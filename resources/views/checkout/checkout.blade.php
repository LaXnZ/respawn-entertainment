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
        <section class="mt-50 pb-50">
            <div class="container bg-white p-6 rounded-lg border">
                <h4 class="mb-4">Order Confirmation</h4>

                <table class="table shopping-summery text-center clean">
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
                                            <td class="image product-thumbnail inline-block"><img src="{{ asset('assets/imgs/product_crud/') }}/{{ $product->image }}" alt="#"></td>
                                        @endif
                                    @endforeach 
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="product-details.html">{{ $details['name'] }}</a></h5>
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
                                <td colspan="4" class="text-end">Total</td>
                                <td>LKR {{ $total }}.00</td>
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
                
                <div class="text-end mt-4">
                    <p>Are you sure you want to proceed with the order?</p>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-fill-out btn-block mt-3">Confirm Order</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>


