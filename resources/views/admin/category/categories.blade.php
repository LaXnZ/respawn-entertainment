<x-app-layout>
   

  <section class="mt-50 pb-40">
    <div class="container bg-white rounded-lg p-6 border" >
        <div class="row">
            <div class="col-md-12">
                <div class="cart">
                    <div class="card-holder">
                       
                        <div class="row"> 
                            <div class="col-md-6 text-3xl font-extrabold">  All Categories</div>
                            <div class="col-md-6"><a href="{{route('category.create')}}" class="btn btn-success float-end" > Add New Category</a></div>
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
                                    <th>#</th>
                                    <th >Category ID</th>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($category->count()>0)
                                    @foreach ($category as $rs)
                                        <tr>
                                            <td class="align-middle">{{$loop->iteration}} </td>
                                            <td class="align-middle">{{$rs->id}} </td>
                                            <td class="align-middle">{{$rs->name}} </td>
                                            <td class="align-middle">{{$rs->slug}} </td>
                                            <td class="align-middle">
                                                <div class="btn-group  " role="group" aria-label="Basic example">
                                              
                                                    <a href="{{route('category.edit', $rs->id)}}" type="button" class="btn bg-gray-500  btn-warning mx-4 w-26"> Edit </a>
                                                    <form action="{{ route('category.destroy', $rs->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-red-400 btn-danger w-26">Delete</button>
                                                    </form>
                                                </div>
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