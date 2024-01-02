<x-app-layout>
    <main class="main">

        @if ($orders->count() > 0)
            <div class="container mt-5">
                <h4 class="mb-3 pt-4">All Orders</h4>

                @foreach ($orders as $order)
                    <div class="mt-4 border-bottom pb-3 bg-white p-4 rounded-lg">
                        <h5 class="mb-3">Order Details</h5>
                        <p><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

                        <table class="table mt-3 bg-gray-100">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->product_name }}</td>
                                        <td>{{ $orderDetail->quantity }}</td>
                                        <td>LKR {{ $orderDetail->product_price }}.00</td>
                                        <td>LKR {{ $orderDetail->total }}.00</td>
                                        @if ($orderDetail->order_type == 'product')
                                            <td>
                                                <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $orderDetail->image }}"
                                                    alt="{{ $orderDetail->product_name }}" class="w-16">
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{ asset('assets/imgs/games/') }}/{{ $orderDetail->image }}"
                                                    alt="{{ $orderDetail->product_name }}" class="w-16">
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end font-weight-bold">Total</td>
                                    <td colspan="2">LKR {{ $order->orderDetails->sum('total') }}.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach

                <div class="mt-5">
                    {{ $orders->links() }}
                </div>

                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        @else
            <div class="container mt-5">
                <div class="alert p-8 md:p-16 lg:p-24 xl:p-32 2xl:p-40 bg-white rounded-lg">
                    <h4 class="alert-heading text-2xl md:text-3xl lg:text-4xl xl:text-5xl 2xl:text-6xl">No Orders!</h4>
                    <p class="text-base md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl">You have not placed any orders
                        yet.</p>
                    <hr class="my-4">
                    <p class="mb-0 text-base md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl">Please visit our shop and
                        place your order.</p>
                </div>
                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        @endif
    </main>
</x-app-layout>
