<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-gray-800 text-white p-6">
            <h2 class="text-xl font-semibold mb-4">Admin Dashboard</h2>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="text-blue-600 hover:underline hover:text-blue-800">Manage Products</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-blue-600 hover:underline hover:text-blue-800">Manage Cafes</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-blue-600 hover:underline hover:text-blue-800">Manage Games</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-blue-600 hover:underline hover:text-blue-800">Manage Users</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="w-3/4 p-6 bg-gray-100">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin Dashboard') }}
                </h2>
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
