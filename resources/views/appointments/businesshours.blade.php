<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-center text-3xl font-semibold mt-8">
            Business Hours
        </h1>

        <div class="flex justify-center mt-4 mb-4">

            <form action="{{ route('appointments.update') }}" method="post" class="w-full max-w-screen-md bg-white p-4 rounded-lg">
                @csrf
                @foreach ($businessHours as $businessHour)
                    <div class="flex items-center mb-4">
                        <div class="w-1/4">
                            <h4 class="text-lg">
                                {{ $businessHour->day }}
                            </h4>
                        </div>
                        <input type="hidden" name="data[{{ $businessHour->day }}][day]" value="{{ $businessHour->day }}">
                        <div class="w-1/4">
                            <input type="text" class="timepicker appearance-none border border-gray-300 p-2 w-full"
                                value="{{ $businessHour->from }}" name="data[{{ $businessHour->day }}][from]"
                                placeholder="From">
                        </div>

                        <div class="w-1/5 ml-2">
                            <input type="text" class="timepicker appearance-none border border-gray-300 p-2 w-full"
                                value="{{ $businessHour->to }}" name="data[{{ $businessHour->day }}][to]"
                                placeholder="To">
                        </div>
                        <div class="w-1/12 ml-2">
                            <input type="number" name="data[{{ $businessHour->day }}][step]"
                                value="{{ $businessHour->step }}" placeholder="Step"
                                class="appearance-none border border-gray-300 p-2 w-full">
                        </div>

                        <div class="w-1/4 ml-2">
                            <label class="flex items-center">
                                <input value="true" name="data[{{ $businessHour->day }}][off]" type="checkbox"
                                    class="form-checkbox h-5 w-5 text-gray-600" @checked($businessHour->off)>
                                <span class="ml-2">OFF</span>
                            </label>
                        </div>
                    </div>
                @endforeach

                <div class="w-full mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  rounded" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems, {
                twelveHour: false
            });
        });
    </script>
</x-app-layout>
