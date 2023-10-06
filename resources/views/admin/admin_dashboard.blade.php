<x-app-layout>
    <div >
        <!-- Sidebar -->
        


        <!-- Main Content Area -->
        <main >
            <x-slot name="header">
                <h2 class="alert alert-success font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin Dashboard') }}
                </h2>
                <div class="container mx-auto px-4 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Card 1 -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-gray-800">
                                    Users
                                </div>
                                <div class="bg-blue-500 text-white px-3 py-1 rounded-full">
                                    100
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{route('users')}}" class="text-blue-500 hover:text-blue-600">View All Users</a>
                            </div>
                            <div class="mt-4">
                                <a href="{{route('user.create')}}" class="text-blue-500 hover:text-blue-600">Add New User</a>
                            </div>
                        </div>
            
                        <!-- Card 2 -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-gray-800">
                                    Products
                                </div>
                                <div class="bg-green-500 text-white px-3 py-1 rounded-full">
                                    200
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-green-500 hover:text-green-600">View All Products</a>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-green-500 hover:text-green-600">Add New Product</a>
                            </div>
                            
                        </div>
            
                        <!-- Card 3 -->
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-gray-800">
                                    Games
                                </div>
                                <div class="bg-gray-500 text-white px-3 py-1 rounded-full">
                                    300
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-gray-500 hover:text-gray-600">View All Games</a>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="text-gray-500 hover:text-gray-600">Add New Game</a>
                            </div>
                        </div>
                        
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-gray-800">
                                    Categories
                                </div>
                                <div class="bg-yellow-500 text-white px-3 py-1 rounded-full">
                                    400
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{route('category')}}" class="text-yellow-500 hover:text-yellow-600">View All Categories</a>
                            </div>
                            <div class="mt-4">
                                <a href="{{route('category.create')}}" class="text-yellow-500 hover:text-yellow-600">Add New Category</a>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </x-slot>

            {{-- Content --}}
            <div class="bg-white p-4 shadow-sm rounded-lg">
                @if(request()->routeIs('admin.products.*'))
                    @include('admin.products')
                @elseif(request()->routeIs('admin.cafes.*'))
                    @include('admin.cafes')
                @elseif(request()->routeIs('admin.games.*'))
                    @include('admin.games')
                @elseif(request()->routeIs('admin.users.*'))
                    @include('admin.users')
                @endif
            </div>
        </main>
    </div>
</x-app-layout>
