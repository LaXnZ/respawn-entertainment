<x-app-layout>
  
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span>Edit Prodcut
                </div>
            </div>
        </div>
        <section class="mt-50 pb-52">
            <div class="container bg-white rounded-lg p-6 border" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-holder">
                                <div class="row">
                                    <div class="col-md-6 text-3xl font-extrabold"> Edit Product </div>
                                    <div class="col-md-6"> <a href="{{route('products')}}" class="btn btn-success float-end">All Products </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                    
                                @endif
                                <form action="{{route('product.update', $product->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                      <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{$product->name}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div style="border: 1px solid #ccc; padding: 10px; text-align: center;">
                                                    <img src="{{asset('assets/imgs/product_crud/')}}/{{$product->image}}" width="400" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image" class="form-label">Product Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Product Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Product Slug" value="{{$product->slug}}">
                                        @error('slug')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="short_description" name="short_description" rows="3">{{$product->short_description}}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="SKU" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="SKU" name="SKU" placeholder="Enter Product SKU" value="{{$product->SKU}}"  placeholder="Enter Product SKU (e.g., DIGI123)"  pattern="^DIGI\d{3}$">
                                        <small class="form-text text-muted">Format: DIGI followed by 3 numbers (e.g., DIGI123).</small>
                                        @error('SKU')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Stock Status</label>
                                        <select class="form-control" id="stock_status" name="stock_status">
                                            <option value="instock" {{$product->stock_status == 'instock' ? 'selected' : ''}}>InStock</option>
                                            <option value="outofstock" {{$product->stock_status == 'outofstock' ? 'selected' : ''}}>Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Product Quantity" value="{{$product->quantity}}">
                                        @error('quantity')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="regular_price" class="form-label">Regular Price</label>
                                        <input type="number" class="form-control" id="regular_price" name="regular_price" placeholder="Enter Product's Regular Price" value="{{$product->regular_price}}">
                                        @error('regular_price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="featured" class="form-label">Featured</label>
                                        <input type="number" class="form-control" id="featured" name="featured" placeholder="Featured (0 or 1)" value="{{ $product->featured }}" min="0" max="1" step="1">
                                        @error('featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category Id</label>
                                        <input type="number" class="form-control" id="category_id" name="category_id" placeholder="Enter Product's Category ID" value="{{$product->category_id }}" min="1" max="5">
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Update Product</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>