<x-app-layout>
    <main class="main p-4">
     
            <h2 class="alert alert-success font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <div class="container mx-auto px-4 py-8">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Users
                        </div>
                        <div class="bg-blue-500 text-white px-3 py-1 rounded-full">
                            100
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('users') }}" class="text-blue-500 hover:text-blue-600">View All Users</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('user.create') }}" class="text-blue-500 hover:text-blue-600">Add New User</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Products
                        </div>
                        <div class="bg-green-500 text-white px-3 py-1 rounded-full">
                            200
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('products') }}" class="text-green-500 hover:text-green-600">View All Products</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('product.create') }}" class="text-green-500 hover:text-green-600">Add New Product</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Games
                        </div>
                        <div class="bg-gray-500 text-white px-3 py-1 rounded-full">
                            300
                        </div>
                    </div>
                    <div>
                        <a href="#" class="text-gray-500 hover:text-gray-600">View All Games</a>
                    </div>
                    <div class="mt-2">
                        <a href="#" class="text-gray-500 hover:text-gray-600">Add New Game</a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Categories
                        </div>
                        <div class="bg-yellow-500 text-white px-3 py-1 rounded-full">
                            400
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('category') }}" class="text-yellow-500 hover:text-yellow-600">View All Categories</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('category.create') }}" class="text-yellow-500 hover:text-yellow-600">Add New Category</a>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Orders
                        </div>
                        <div class="bg-cyan-500 text-white px-3 py-1 rounded-full">
                            500
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('orders') }}" class="text-cyan-500 hover:text-cyan-600">View All Orders</a>
                    </div>
                    
                </div>

                 <!-- Card 6 -->
                 <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xl font-bold text-gray-800">
                            Reservations
                        </div>
                        <div class="bg-cyan-500 text-white px-3 py-1 rounded-full">
                            500
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('reservations') }}" class="text-cyan-500 hover:text-cyan-600">View All Reservations</a>
                    </div>
                    
                </div>
            </div>
       
    </main>
</x-app-layout>
