<x-app-layout>
    <main class="main">
        <div class="container mt-5 p-4">
            <h4 class="mb-3">Your Reservations</h4>

            @if ($reservations->count() > 0)
                @foreach ($reservations as $reservation)
                    <div class="mt-4 border-bottom pb-3 bg-white rounded-lg shadow-md p-4">
                        <h5 class="mb-3">Reservation Details</h5>
                        <p><strong>Reservation ID:</strong> {{ $reservation->id }}</p>
                        <p><strong>Reservation Date:</strong> {{ $reservation->date }}</p>
                        <p><strong>Reservation Time:</strong> {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</p>
                    </div>
                @endforeach

                <div class="mt-5">
                    {{ $reservations->links() }}
                </div>

                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Dashboard</a>
                </div>
            @else
                <div class="alert p-16 md:p-24 lg:p-32 xl:p-40 rounded-lg 2xl:p-50 bg-gray-100">
                    <h2 class="alert-heading text-2xl md:text-3xl lg:text-4xl xl:text-5xl 2xl:text-6xl">No Reservations!</h2>
                    <p class="text-base md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl">You have not made any reservations.</p>
                    <hr class="my-4">
                </div>

                <div class="text-end mt-4 pb-4">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Dashboard</a>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
