<x-app-layout>
  
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span>Edit Category
                </div>
            </div>
        </div>
        <section class="mt-50">
            <div class="container bg-white rounded-lg p-6 border" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-holder">
                                <div class="row">
                                    <div class="col-md-6 text-3xl font-extrabold"> Edit Category </div>
                                    <div class="col-md-6"> <a href="{{route('category')}}" class="btn btn-success float-end">All Categories </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                    
                                @endif
                                <form action="{{route('category.update', $category->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                   <div class="mb-3 mt-3"> 
                                    <label for="name" class="form-label"> Name </label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{$category->name}}" >
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                 </div>
                                   <div class="mb-3 mt-3"> 
                                    <label for="name" class="form-label"> Slug </label>
                                    <input type="text" name="slug" class="form-control" placeholder="Enter Category Slug" value="{{$category->slug}}" >
                                    @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                                </div>
                                 <button type="submit" class="btn btn-primary float-end">Update Category</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>