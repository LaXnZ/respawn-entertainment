<x-app-layout>
    <div class="main">
        <div class="page-header breadcrumb-wrap mr-10 mt-6">
            <div class="container">
                <div class="breadcrumb ">
                    <a class="nav_text" href="home" rel="nofollow">Home</a>
                    <span></span> Cafe
                </div>
            </div>

            <h2 class="text-center text-3xl font-bold my-4">
                Get Your Reservation Now
            </h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif




            <div class="p-4 bg-white rounded-lg shadow-md mt-6">
                <div class="swiper-container flex justify-center items-center overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="w-1/4">
                                    <img src="{{ asset('assets/images/cafe-1.jpg') }}" alt="Image 1"
                                        class="rounded-lg">
                                </div>
                                <div class="w-3/4 pl-4">
                                    <p class="text-2xl font-bold mb-2">Location:</p>
                                    <p class="text-xl bg-gray-100 p-4 rounded-lg">Welcome to Respawn Game Cafe, your
                                        portal to the vibrant world of pixelated adventures! We're located at 1/1/1
                                        Kolonnawa Road, Colombo, Western Province 1, ready to transport you to a gaming
                                        haven where thrills, challenges, and camaraderie await.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="w-1/4">
                                    <img src="{{ asset('assets/images/cafe-2.jpg') }}" alt="Image 2"
                                        class="rounded-lg">
                                </div>
                                <div class="w-3/4 pl-4">
                                    <p class="text-2xl font-bold mb-2">Services:</p>
                                    <p class="text-xl bg-gray-100 p-4 rounded-lg">Unleash your inner champion with
                                        Respawn's cutting-edge arsenal! We boast 12 RLG Gaming PCs and 2 Pro PCs loaded
                                        with GTX 1650 graphics cards, PlayStation Pros connected to 55-inch curved 4K
                                        TVs, and VR stations powered by next-gen headsets. Whether you're a solo slayer
                                        or a party of pixelated pioneers, we have the tools to conquer any digital
                                        challenge.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="w-1/4">
                                    <img src="{{ asset('assets/images/cafe-3.jpg') }}" alt="Image 3"
                                        class="rounded-lg">
                                </div>
                                <div class="w-3/4 pl-4">
                                    <p class="text-2xl font-bold mb-2">Reviews:</p>
                                    <ul class="text-xl bg-gray-100 p-4 rounded-lg">
                                        <li class="mb-4">
                                            <span class="font-bold">Don't just take our word for it!</span> Respawn has
                                            earned a 5-star rating from over 50 reviews on Google. Our customers praise
                                            our superior gaming experience, friendly staff, and hygienic environment.
                                            Here's what they say:
                                        </li>
                                        <li class="mb-2">
                                            <span class="font-bold">"Pixel Flux is the ultimate gaming oasis!"</span> -
                                            CyberNinja99
                                        </li>
                                        <li class="mb-2">
                                            <span class="font-bold">"I've never felt so immersed in a game
                                                before!"</span> - PixelPrincess
                                        </li>
                                        <li class="mb-2">
                                            <span class="font-bold">"This place is a gamer's dream come true."</span> -
                                            GameMaster420
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="swiper-pagination"></div> --}}
                </div>
            </div>

            @push('scripts')
                <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
                <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                <script>
                    var swiper = new Swiper('.swiper-container', {
                        loop: true,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                </script>
            @endpush




            <div class="overflow-x-auto p-4">
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
                                                <span class="bg-red-500 text-white px-2 py-1 rounded-full mr-2">Booked
                                                    {{ $time }}</span>
                                            @endif
                                        @endforeach
                                    @else
                                        <p class="text-center">Gaming Cafe is closed on {{ $appointment['day_name'] }}
                                        </p>
                                    @endif
                                </td>

                                <td class="py-3 px-4 text-left flex overflow-scroll gap-4">
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems, {
                twelveHour: false
            });

            var carousel = document.querySelector('.carousel');
            M.Carousel.init(carousel, {
                fullWidth: true,
                indicators: true
            });

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</x-app-layout>
