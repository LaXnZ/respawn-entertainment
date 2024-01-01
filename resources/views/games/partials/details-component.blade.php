<x-app-layout>
    <main class="main pb-4">
        <div class="container mt-6">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-img">
                        <img src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}" alt="{{ $game->name }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h2 class="mb-3">{{ $game->name }}</h2>
                        <p class="price mb-3">LKR {{ $game->price }}.00</p>
                        <p class="mb-4">{{ $game->description }}</p>

                        <div class="product-action mt-3">
                            <a aria-label="Add To Cart" class="action-btn hover-up"
                            href="{{ route('add_to_cart', ['id' => $game->id, 'type' => 'game']) }}">
                            <i class="fi-rs-shopping-bag-add"></i>
                        </a>
                        
                           
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
    </main>
</x-app-layout>
