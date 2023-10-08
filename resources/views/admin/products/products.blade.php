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
                              <div class="alert alert-success" role="alert">
                                  {{Session::get('success')}}
                              </div>
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
                                                    <a href="{{route('product.edit',$rs->id)}}" class="btn bg-gray-500  btn-warning mx-4 w-26">Edit</a>
                                                    <form action="{{ route('product.destroy', $rs->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="mt-2 btn bg-red-400 btn-danger w-26">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                      @endforeach
                                  @else
                                      <tr>
                                          <td colspan="4" class="text-center">No Category Found</td>
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