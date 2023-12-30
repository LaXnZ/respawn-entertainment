<x-app-layout>

    <div class="container mx-auto">
        <h1 class="text-center text-4xl font-bold my-8">
            Gaming Cafe Reservations
        </h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap rounded-lg overflow-hidden my-6 bg-white">
                <thead class="text-black">
                    <tr class="bg-orange-100 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Date</th>
                        <th class="py-3 px-6 text-left">Day</th>
                        <th class="py-3 px-6 text-left">Booked Slots</th>
                        <th class="py-3 px-6 text-left">Available Slots</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-medium">
                    @foreach ($appointments as $appointment)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $appointment['date'] }}</td>
                            <td class="py-3 px-6 text-left">{{ $appointment['day_name'] }}</td>
                            <td class="py-3 px-6 text-left">
                                @if (!$appointment['off'])
                                    @foreach ($appointment['business_hours'] as $time)
                                        @if (in_array($time, $appointment['reserved_hours']))
                                            <span class="bg-red-500 text-white px-2 py-1 rounded-full mr-2">Booked {{ $time }}</span>
                                        @endif
                                    @endforeach
                                @else
                                    <p class="text-center">Gaming Cafe is closed on {{ $appointment['day_name'] }}</p>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-left">
                                @if (!$appointment['off'])
                                    @foreach ($appointment['business_hours'] as $time)
                                        @if (!in_array($time, $appointment['reserved_hours']))
                                            <form action="{{ route('appointments.reserve.post') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="date" value="{{ $appointment['full_date'] }}">
                                                <input type="hidden" name="time" value="{{ $time }}">
                                                <button class="px-4 py-2 my-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue" type="submit">
                                                    Reserve {{ $time }}
                                                </button>
                                            </form>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems, {
                twelveHour: false
            });

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</x-app-layout>
