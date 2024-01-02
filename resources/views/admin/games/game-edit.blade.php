<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span>Edit Game
                </div>
            </div>
        </div>
        <section class="mt-50 pb-52">
            <div class="container bg-white rounded-lg p-6 border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-holder">
                                <div class="row">
                                    <div class="col-md-6 text-3xl font-extrabold"> Edit Game </div>
                                    <div class="col-md-6"> <a href="{{ route('games') }}" class="btn btn-success float-end">All Games </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('game.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Game Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Game Name" value="{{ $game->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style="border: 1px solid #ccc; padding: 10px; text-align: center;">
                                                    <img src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}" width="400" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image" class="form-label">Game Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="genre" class="form-label">Genre</label>
                                        <select class="form-control" id="genre" name="genre">
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre }}" {{ $game->genre == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                                            @endforeach
                                        </select>
                                        @error('genre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{ $game->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Game Price" value="{{ $game->price }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Update Game</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
