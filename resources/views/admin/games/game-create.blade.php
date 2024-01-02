<x-app-layout>
    <main class="main pb-36">
        
        <section class="mt-50">
            <div class="container bg-white rounded-lg p-6 border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-holder">
                                <div class="row">
                                    <div class="col-md-6 text-3xl font-extrabold"> Add New Game </div>
                                    <div class="col-md-6"> <a href="{{ route('games') }}" class="btn btn-success float-end">All Games </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('game.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Game Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Game Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="genre" class="form-label">Genre</label>
                                                <select class="form-control" id="genre" name="genre">
                                                    @foreach ($genres as $genre)
                                                        <option value="{{ $genre }}">{{ $genre }}</option>
                                                    @endforeach
                                                </select>
                                                @error('genre')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="release_date" class="form-label">Release Date</label>
                                                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date') }}">
                                                @error('release_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="platform" class="form-label">Platform</label>
                                                <input type="text" class="form-control" id="platform" name="platform" placeholder="Enter Game Platform" value="{{ old('platform') }}">
                                                @error('platform')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="rating" class="form-label">Rating</label>
                                                <input type="number" class="form-control" id="rating" name="rating" placeholder="Enter Game Rating (0-5)" min="0" max="5" step="0.1" value="{{ old('rating') }}">
                                                @error('rating')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="publisher" class="form-label">Publisher</label>
                                                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter Game Publisher" value="{{ old('publisher') }}">
                                                @error('publisher')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label"> Game Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
         
                                           


                                            <div class="mb-3">
                                                <label for="developer" class="form-label">Developer</label>
                                                <input type="text" class="form-control" id="developer" name="developer" placeholder="Enter Game Developer" value="{{ old('developer') }}">
                                                @error('developer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="multiplayer" class="form-label">Multiplayer</label>
                                                <select class="form-control" id="multiplayer" name="multiplayer">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                @error('multiplayer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Game Price" value="{{ old('price') }}">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Add Game</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
