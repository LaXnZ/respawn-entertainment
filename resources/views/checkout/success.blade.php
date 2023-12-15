<x-app-layout>
    <main class="main">
        <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Thank you for your order!</h4>
                <p>Your order has been successfully placed. Below is the summary of your purchase:</p>
            </div>

            <div class="mt-4">
                <h5>Order Details</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        @foreach (session('cart') as $product_id => $details)
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>LKR {{ $details['price'] }}.00</td>
                                <td>LKR {{ $details['price'] * $details['quantity'] }}.00</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-end">Total</td>
                            <td>LKR {{ $total }}.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <h5>Shipping Address</h5>
    
                <p>
                    John Doe<br>
                    123 Street, City<br>
                    Country<br>
                    Phone: 123-456-7890<br>
                    Email: john.doe@example.com
                </p>
            </div>

            <div class="mt-4">
                <h5>Payment Information</h5>
              
                <p>
                    Payment Method: Cash On Delivery<br>
                    Payment Status: Paid
                </p>
            </div>

            @php
                session()->forget('cart');
            @endphp

            <div class="text-end mt-4">
                <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </main>
</x-app-layout>
