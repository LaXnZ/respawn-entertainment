<!-- resources/views/checkout/orders.blade.php -->

<x-app-layout>
    <main class="main">
        @if ($orders->count()>0)
        <div class="container mt-5">
            <h4 class="mb-3">All Orders</h4>

            @foreach ($orders as $order)
                <div class="mt-4 border-bottom pb-3">
                    <h5 class="mb-3">Order Details</h5>
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

                    <table class="table mt-3">
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
                                    <td>
                                        <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $orderDetail->image }}" alt="{{ $orderDetail->product_name }}" class="w-16">
                                    </td>
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
                <a href="{{ route('shop') }}" class="btn btn-primary" >Continue Shopping</a>
            </div>
        </div>
        @else
            <div class="container mt-5">
                <div class="alert" >
                    <h4 class="alert-heading">No Orders!</h4>
                    <p>You have not placed any orders yet.</p>
                    <hr>
                    <p class="mb-0">Please visit our shop and place your order.</p>
                </div>
                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('shop') }}" class="btn btn-primary" >Continue Shopping</a>
                </div>
            </div>
            
        @endif
    </main>
</x-app-layout>
