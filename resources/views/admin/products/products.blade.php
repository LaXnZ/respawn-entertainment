<x-app-layout>
   

    <section class="mt-50 pb-40">
      <div class="container bg-white rounded-lg p-6 border" >
          <div class="row">
              <div class="col-md-12">
                  <div class="cart">
                      <div class="card-holder">
                         
                          <div class="row"> 
                              <div class="col-md-6 text-3xl font-extrabold">  All Products</div>
                              <div class="col-md-6"><a href="{{route('product.create')}}" class="btn btn-success float-end" > Add New Product</a></div>
                          </div>
                      </div>
                      <div class="card-body">
                         
                        @if (Session::has('success'))
                        <p
       x-data="{ show: true }"
       x-show="show"
       x-transition
       x-init="setTimeout(() => show = false, 2000)"
       class="alert alert-success" role="alert">
       {{Session::get('success')}}
       
   </p>
                          @endif
                          
                          <table class="table table-striped ">
                              <thead>
                                  <tr>
                                      <th>Product ID</th>
                                      <th>Image</th>
                                      <th>Product Name</th>
                                      <th>Product Slug</th>
                                      <th>Short Description</th>
                                      <th>Description</th>
                                      <th>SKU</th>
                                      <th>Stock Status</th>
                                      <th>Quantity</th>
                                      <th>Category ID</th>
                                      <th>Regular Price</th>
                                        <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @if ($product->count()>0)
                                      @foreach ($product as $rs)
                                            <tr>
                                                <td>{{$rs->id}}</td>
                                                <td><img src="{{asset('assets/imgs/product_crud/')}}/{{$rs->image}}" width="400" /></td>
                                                <td>{{$rs->name}}</td>
                                                <td>{{$rs->slug}}</td>                          
                                                <td>{{$rs->short_description}}</td>
                                                <td>{{$rs->description}}</td>


                                                <td>{{$rs->SKU}}</td>
                                                <td>{{$rs->stock_status}}</td>
                                                <td>{{$rs->quantity}}</td>
                                                <td>{{$rs->category_id}}</td>
                                                <td>{{$rs->regular_price}}</td>
                                                <td>
                                                    <a href="{{route('product.edit',$rs->id)}}" class="btn bg-gray-700 hover:bg-gray-500  border-none mx-4 rounded">Edit</a>
                                                    <form action="{{ route('product.destroy', $rs->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  class="btn bg-red-700 hover:bg-red-500 btn-danger border-none">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                      @endforeach
                                  @else
                                      <tr>
                                          <td colspan="12" class="text-center">No Porduct Found</td>
                                      </tr>
                                  @endif
                              </tbody>
                          </table>
                          <div class="d-flex justify-content-center">
                        
                      </div>
                      {{ $product->links() }}
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