<x-app-layout>
    <main class="main p-4">

        <h2 class="alert alert-success font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <div class="container mx-auto px-4 py-8">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Users
                    </div>
                    <div class="bg-blue-500 text-white px-3 py-1 rounded-full">
                        {{ $users->count() }}
                    </div>
                </div>
                <div>
                    <a href="{{ route('users') }}" class="text-blue-500 hover:text-blue-600">View All Users</a>
                </div>
                <div class="mt-2">
                    <a href="{{ route('user.create') }}" class="text-blue-500 hover:text-blue-600">Add New User</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Products
                    </div>
                    <div class="bg-green-500 text-white px-3 py-1 rounded-full">
                        {{ $products->count() }}
                    </div>
                </div>
                <div>
                    <a href="{{ route('products') }}" class="text-green-500 hover:text-green-600">View All Products</a>
                </div>
                <div class="mt-2 mb-3">
                    <a href="{{ route('product.create') }}" class="text-green-500 hover:text-green-600">Add New
                        Product</a>
                </div>
                <div class="flex justify-between">
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Most
                                        Popular Products</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-1"></div>

                    </div>
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Most Ordered Products</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-2"></div>

                    </div>
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Most Value Ordered Products</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-3"></div>

                    </div>
                </div>
            </div>


            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Games
                    </div>
                    <div class="bg-gray-500 text-white px-3 py-1 rounded-full">
                        {{ $games->count() }}
                    </div>
                </div>
                <div>
                    <a href="{{ route('admin.games') }}" class="text-gray-500 hover:text-gray-600">View All Games</a>
                </div>
                <div class="mt-2 mb-3">
                    <a href="{{ route('game.create') }}" class="text-gray-500 hover:text-gray-600">Add New Game</a>
                </div>
                <div class="flex justify-between">
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Most
                                        Popular Games</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-4"></div>

                    </div>
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Most Ordered Games</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-5"></div>

                    </div>
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Most Value Ordered Games</h5>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6" id="products-pie-chart-6"></div>

                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Categories
                    </div>
                    <div class="bg-yellow-500 text-white px-3 py-1 rounded-full">
                        {{ $categories->count() }}
                    </div>
                </div>
                <div>
                    <a href="{{ route('category') }}" class="text-yellow-500 hover:text-yellow-600">View All
                        Categories</a>
                </div>
                <div class="mt-2">
                    <a href="{{ route('category.create') }}" class="text-yellow-500 hover:text-yellow-600">Add New
                        Category</a>
                </div>

            </div>

            <!-- Card 5 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Orders
                    </div>
                    <div class="bg-cyan-500 text-white px-3 py-1 rounded-full">
                        {{ $orders->count() }}
                    </div>
                </div>

                <div>
                    <a href="{{ route('orders') }}" class="text-cyan-500 hover:text-cyan-600">View All Orders</a>
                </div>
                <div class="flex justify-between">


                    <div class=" bg-white rounded-lg shadow-sm dark:bg-gray-800 p-2 md:p-4">
                        <h3 class="text-cyan-500 hover:text-cyan-600 text-lg">Total Sales : LKR
                            {{ $totalSales }}.00</h3>

                    </div>
                </div>

            </div>

            <!-- Card 6 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">
                        Reservations
                    </div>
                    <div class="bg-purple-500 text-white px-3 py-1 rounded-full">
                        {{ $reservations->count() }}
                    </div>
                </div>
                <div>
                    <a href="{{ route('reservations') }}" class="text-purple-500 hover:text-purple-600">View All
                        Reservations</a>
                </div>

            </div>
        </div>

    </main>

    <script>
        // most popular products
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.regular_price),
                    colors: ["#1C64F2", "#16BDCA", "#9061F9", "#F2C94C", "#F2994A", "#F26B4A", "#EB5757",
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9"
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($popularProducts) && count($popularProducts) > 0)
                const productsData = @json($popularProducts);
                if (document.getElementById("products-pie-chart-1") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-1"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });

        //most ordered products
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.regular_price),
                    colors: [
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9"
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($mostOrderedProducts) && count($mostOrderedProducts) > 0)
                const productsData = @json($mostOrderedProducts);
                if (document.getElementById("products-pie-chart-2") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-2"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });

        //most priced products
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.regular_price),
                    colors: [
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9",
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($mostPricedProducts) && count($mostPricedProducts) > 0)
                const productsData = @json($mostPricedProducts);
                if (document.getElementById("products-pie-chart-3") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-3"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });

        // most popular games
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.price),
                    colors: ["#1C64F2", "#16BDCA", "#9061F9", "#F2C94C", "#F2994A", "#F26B4A", "#EB5757",
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9"
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($popularGames) && count($popularGames) > 0)
                const productsData = @json($popularGames);
                if (document.getElementById("products-pie-chart-4") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-4"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });

        //most ordered games
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.price),
                    colors: [
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9"
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($mostOrderedGames) && count($mostOrderedGames) > 0)
                const productsData = @json($mostOrderedGames);
                if (document.getElementById("products-pie-chart-5") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-5"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });

        //most value ordered games
        window.addEventListener("load", function() {
            const getChartOptions = (products) => {
                return {
                    series: products.map(product => product.price),
                    colors: [
                        "#F26B4A", "#EB5757", "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9",
                        "#6FCF97", "#56CCF2", "#2F80ED", "#9B51E0", "#BB6BD9", "#F2C94C", "#F2994A",
                    ],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: products.map(product => product.name),
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            @if (isset($mostPricedGames) && count($mostPricedGames) > 0)
                const productsData = @json($mostPricedGames);
                if (document.getElementById("products-pie-chart-6") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("products-pie-chart-6"), getChartOptions(
                        productsData));
                    chart.render();
                }
            @endif

        });
    </script>

</x-app-layout>
