<x-app-layout >
    <link href="assets/styles/style.css" rel="stylesheet" />
        

    <div class="pl-20">
        <div id="section1" class="section flex flex-row pt-12 pl-32 pb-20 ">
          <div class="basis-1/2 self-center pl-20">
            <img alt="main-para" width="350" src="assets/images/main-para.png" />
            <button
              type="button"
              class="ml-20 mt-6 bg-orange-600 text-white font-semibold rounded border-r border-gray-100 py-2 hover:bg-orange-700 px-3"
            >
              <a href="/">Browse Games</a>
            </button>
          </div>
  
          <div class="basis-1/2 self-center">
            <img 
              alt="main-image"
              width="600"
              src="assets/images/main-image.png" 
            />
          </div>
        </div>
        <div id="section2" class="section flex flex-row pt-12 pl-32 pb-20 ">
          <div class="basis-1/2 self-center">
            <img
              alt="cafe-image"
              width="600"
              src="assets/images/cafe-image.png"
            />
          </div>
          <div class="basis-1/2 self-center pl-24">
            <img
              alt="cafe-intro"
              width="350"
              src="assets/images/cafe-intro.png"
            />
            <button
              type="button"
              class="ml-24 mt-6 bg-orange-600 text-white font-semibold rounded border-r border-gray-100 py-2 hover:bg-orange-700 px-3"
            >
              <a href="/">Browse Cafes</a>
            </button>
          </div>
        </div>
        <div id="section3" class="section flex flex-row pt-12 pl-32 pb-32">
          <div class="basis-1/2 self-center pl-12">
            <img
              alt="product-intro"
              width="500"
              src="assets/images/product-intro.png"
            />
            <button
              type="button"
              class="ml-32 mt-6 bg-orange-600 text-white font-semibold rounded border-r border-gray-100 py-2 hover:bg-orange-700 px-3"
            >
              <a href="/shop">Browse Products</a>
            </button>
          </div>
  
          <div class="basis-1/2 self-center">
            <img
              alt="product-image"
              width="600"
              src="assets/images/product-image.png"
            />
          </div>
        </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/intersection-observer/2.0.0/intersection-observer.min.js"></script>

    <script src="assets/scripts/main.js"></script>
</x-app-layout>
