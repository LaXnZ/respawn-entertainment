<x-app-layout>
    <div >
        <!-- Sidebar -->
        


        <!-- Main Content Area -->
        <main >
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
