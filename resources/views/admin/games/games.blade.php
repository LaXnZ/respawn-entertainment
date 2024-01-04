<x-app-layout>

    <section class="mt-50 pb-40">
        <div class="container bg-white rounded-lg p-6 border">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart">
                        <div class="card-holder">

                            <div class="row">
                                <div class="col-md-6 text-3xl font-extrabold">All Games</div>
                                <div class="col-md-6"><a href="{{ route('game.create') }}"
                                        class="btn btn-success float-end">Add New Game</a></div>
                            </div>
                        </div>
                        <div class="card-body">

                            @if (Session::has('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </p>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Game ID</th>
                                        <th>Image</th>
                                        <th>Game Name</th>
                                        <th>Genre</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($games->count() > 0)
                                        @foreach ($games as $game)
                                            <tr>
                                                <td>{{ $game->id }}</td>
                                                <td><img src="{{ asset('assets/imgs/games/') }}/{{ $game->image }}"
                                                        width="200" /></td>
                                                <td>{{ $game->name }}</td>
                                                <td>{{ $game->genre }}</td>
                                                <td>{{ $game->description }}</td>
                                                <td>LKR {{ $game->price }}.00</td>
                                                <td>
                                                    <div class="flex h-auto">
                                                        <a href="{{ route('game.edit', $game->id) }}"
                                                            class="btn bg-gray-700 hover:bg-gray-500  border-none mx-4 rounded">Edit</a>
                                                        <form action="{{ route('game.destroy', $game->id) }}"
                                                            method="POST" onsubmit="return confirmDelete();">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="btn bg-red-700 hover:bg-red-500 btn-danger border-none">Delete</button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No Games Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                            </div>
                            {{ $games->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>

<script>
    function confirmDelete() {
        // Display a confirmation dialog
        if (confirm('Are you sure you want to delete this record?')) {
            return true; // Continue with form submission
        } else {
            return false; // Cancel form submission
        }
    }
</script>
