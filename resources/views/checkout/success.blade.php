<!-- resources/views/checkout/success.blade.php -->

<x-app-layout>
    <main class="main">
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Thank you for your order!</h4>
                <p>Your order has been successfully placed. Below is the summary of your purchase:</p>
            </div>

            <!-- Display Latest Order Details -->
            <div class="mt-4 border-bottom pb-3">
                <h5 class="mb-3">Latest Order Details</h5>
                <p><strong>Order ID:</strong> {{ $latestOrder->id }}</p>
                <p><strong>Order Date:</strong> {{ $latestOrder->created_at->format('Y-m-d H:i:s') }}</p>

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
                        @foreach ($latestOrder->orderDetails as $orderDetail)
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
                            <td colspan="4" class="text-end font-weight-bold">Total</td>
                            <td>LKR {{ $latestOrder->orderDetails->sum('total') }}.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Display Billing Details -->
            <div class="mt-4 border-bottom pb-3">
                <h5 class="mb-3">Billing Details</h5>
                <p><strong>First Name:</strong> {{ $latestOrder->firstname }}</p>
                <p><strong>Last Name:</strong> {{ $latestOrder->lastname }}</p>
                <p><strong>Mobile:</strong> {{ $latestOrder->mobile }}</p>
                <p><strong>Email:</strong> {{ $latestOrder->email }}</p>
                <p><strong>Address Line 1:</strong> {{ $latestOrder->line1 }}</p>
                <p><strong>Address Line 2:</strong> {{ $latestOrder->line2 }}</p>
                <p><strong>City:</strong> {{ $latestOrder->city }}</p>
                <p><strong>Postal Code:</strong> {{ $latestOrder->postalcode }}</p>
            </div>

            <!-- Display Other Orders if Available -->
            @if (!$otherOrders->isEmpty())
                <div class="mt-4">
                    <h5 class="mb-3">Other Orders</h5>
                    @foreach ($otherOrders as $order)
                        <div class="border-bottom pb-3">
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
                                        <td colspan="4" class="text-end font-weight-bold">Total</td>
                                        <td>LKR {{ $order->orderDetails->sum('total') }}.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-end mt-4 pb-4">
                <a href="{{ route('shop') }}" class="btn btn-primary" >Continue Shopping</a>
            </div>
        </div>
    </main>
</x-app-layout>
