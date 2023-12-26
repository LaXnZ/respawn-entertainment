<x-app-layout>
    <main class="main">
        <div class="container mt-5 p-4">
            <h4 class="mb-3">All Orders</h4>

            <div class="mb-3">
                <label for="userSelect" class="form-label">Select User</label>
                <select id="userSelect" class="form-control" onchange="loadOrders()">
                    <option value="">All Users</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="mt-4 border-bottom pb-3 bg-white rounded-lg shadow-md p-4">
                        <h5 class="mb-3">Order Details</h5>
                        <p><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

                        <table class="table mt-3 bg-gray-100 rounded-md overflow-hidden w-full">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th class="p-2">Product</th>
                                    <th class="p-2">Quantity</th>
                                    <th class="p-2">Price</th>
                                    <th class="p-2">Subtotal</th>
                                    <th class="p-2">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td class="p-2">{{ $orderDetail->product_name }}</td>
                                        <td class="p-2">{{ $orderDetail->quantity }}</td>
                                        <td class="p-2">LKR {{ $orderDetail->product_price }}.00</td>
                                        <td class="p-2">LKR {{ $orderDetail->total }}.00</td>
                                        <td class="p-2">
                                            <img src="{{ asset('assets/imgs/product_crud/') }}/{{ $orderDetail->image }}" alt="{{ $orderDetail->product_name }}" class="w-16">
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end font-weight-bold p-2">Total</td>
                                    <td colspan="2" class="p-2">LKR {{ $order->orderDetails->sum('total') }}.00</td>
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
            @else
            <div class="alert p-16 md:p-24 lg:p-32 xl:p-40   rounded-lg 2xl:p-50 bg-gray-100">
                <h2 class="alert-heading text-2xl md:text-3xl lg:text-4xl xl:text-5xl 2xl:text-6xl ">No Orders!</h2>
                <p class="text-base md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl">User has not placed any orders yet.</p>
                <hr class="my-4">
            </div>
            
                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('shop') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            @endif
        </div>
    </main>

    <script>
        function loadOrders() {
            var selectedUserId = document.getElementById('userSelect').value;
            window.location.href = "{{ route('orders') }}" + "?user=" + selectedUserId;
        }
    </script>
</x-app-layout>
