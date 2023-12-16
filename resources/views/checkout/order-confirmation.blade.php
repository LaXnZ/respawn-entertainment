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

                            <button type="submit" class="w-full p-2 mt-4 bg-green-500 text-white rounded-md hover:bg-green-600">Proceed to checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
