<x-app-layout>
    <main class="main pb-24">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="home" rel="nofollow">Home</a>
                    <span></span> <a class="nav_text" href="shop" rel="nofollow">Shop</a>
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50">
            <div class="container bg-white rounded-lg p-6 border" >
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; $count=1; $subtotal=array(); @endphp
                                    @if(session('cart') > 0) 
                                    @foreach (session('cart') as $product_id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    
                                    <tr  data-id="{{$product_id}}">
                                        @foreach ($products as $product)
                                            @if ($product->id == $product_id)
                                                <td class="image product-thumbnail inline-block"><img src="{{asset('assets/imgs/product_crud/')}}/{{$product->image}}" alt="#"></td>
                                            @endif
                                                                                                   
                                        @endforeach 
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="product-details.html">{{$details['name']}}</a></h5>
                                           
                                        </td>
                                        <td class="price" data-title="Price"><span>LKR {{$details['price']}}.00</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="w-16 m-auto flex-1">
                                                <input type="number" onchange="updateCart(event, this)" class="qty-val" value="{{ $details['quantity'] }}" min="0" />
                                            </div>
                                            
                                        </td>
                                        <td class="text-center" data-title="Cart">
                                            <span>LKR {{$details['price'] * $details['quantity']}}.00 </span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <button onclick="removeFromCart(event, this)" class="cart_remove">
                                                <a class="text-muted"><i class="fi-rs-trash"></i></a>
                                            </button>
                                        </td>
                                        
                                        
                                        
                                    </tr>
                                                                     
                                    @endforeach
                                
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a onclick="clearCart(event,this)" href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                    @else
                                    <p>No item in the cart</p>
                                   

                                                                
                                   
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                          
                            <a class="btn " href="shop"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">LKR {{$total}}.00</span></td>
                                                </tr>

                                                
                                                <tr>
                                                    <td class="cart_total_label">Delivery Cost</td>
                                                    <td class="cart_total_amount">
                                                        <span class="font-lg fw-900 text-brand">
                                                            @php
                                                                
                                                                if($cafe_member == 1){
                                                                    $deliveryCost = 0;
                                                                    echo "Free Delivery";
                                                                }else{
                                                                    $deliveryCost = 1000;
                                                                    echo "LKR 1000.00";
                                                                }
                                                            @endphp

                                                        </span> </td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">LKR {{$total + $deliveryCost}}.00</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if((session('cart')) > 0) 
                                    <a href="checkout" class="btn"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                @else
                                    <button class="btn" disabled> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</button>
                                @endif
                                
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            
        </section>
    </main>

 
    <script type="text/javascript">


        function updateCart(event, input) {

            event.preventDefault();

            var ele = $(input);
          
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents('tr').attr('data-id'),
                    quantity: ele.parents('tr').find('.qty-val').val()
                },
                success: function(response) {
                        console.log(response['status']);
                        window.location.reload();
                    }
                
            });
        }


        function removeFromCart(event, button) {
            event.preventDefault(); // Prevent the default behavior of the anchor tag.
    
            var ele = $(button);
    
            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents('tr').attr('data-id')
                    },
                    success: function(response) {
                        console.log(response['status']);
                        window.location.reload();
                    }
                });
            }
        }
        
        //remove all items in the cart
        function clearCart(event, button) {
            event.preventDefault(); // Prevent the default behavior of the anchor tag.
    
            var ele = $(button);
    
            if (confirm("Do you really want to remove all items in the cart?")) {
                $.ajax({
                    url: '{{ route('clear_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents('tr').attr('data-id')
                    },
                    success: function(response) {
                        console.log(response['status']);
                        window.location.reload();
                    }
                });
            }
        }




    </script>
    
    


</x-app-layout>


