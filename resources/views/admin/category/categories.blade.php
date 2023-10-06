<x-app-layout>
   

  <section class="mt-50 pb-40">
    <div class="container bg-white rounded-lg p-6 border" >
        <div class="row">
            <div class="col-md-12">
                <div class="cart">
                    <div class="card-holder">
                       
                        <div class="row"> 
                            <div class="col-md-6">  All Categories</div>
                            <div class="col-md-6"><a href="{{route('category.create')}}" class="btn btn-success float-end" > Add New Category</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this record?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" onclick="submitDeleteForm()">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="deleteModal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex">
                            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                <!-- Modal content -->
                                <div class="modal-content py-4 text-left px-6">
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold">Confirm Deletion</p>
                                        <button onclick="hideDeleteConfirmation()" class="text-gray-400 hover:text-red-500 focus:outline-none">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-gray-600">Are you sure you want to delete this record?</p>
                                    <div class="mt-5">
                                        <!-- Confirm Button -->
                                        <button onclick="confirmDelete()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md mr-2">
                                            Confirm
                                        </button>
                                        <!-- Cancel Button -->
                                        <button onclick="hideDeleteConfirmation()" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded-md">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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