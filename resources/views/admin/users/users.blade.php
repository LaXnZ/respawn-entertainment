<x-app-layout>
   

    <section class="mt-50 pb-40">
      <div class="container bg-white rounded-lg p-6 border" >
          <div class="row">
              <div class="col-md-12">
                  <div class="cart">
                      <div class="card-holder">
                         
                          <div class="row"> 
                              <div class="col-md-6 text-3xl font-extrabold">  All Users</div>
                              <div class="col-md-6"><a href="{{route('user.create')}}" class="btn btn-success float-end" > Add New User</a></div>
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
                                      <th>User ID</th>
                                      <th>User Name</th>
                                      <th>User Email</th>
                                      <th>Email Verified Time</th>
                                      <th>Mobile Number</th>
                                      <th>Home Address</th>
                                      <th>DOB</th>
                                      
                                      <th>User Role</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @if ($users->count()>0)
                                    
                                
                                    @foreach ($users as $user)
                                        <tr> 
                                            <td class="align-middle">{{($users->currentPage()-1)*$users->perPage()+$loop->iteration}}</td>
                                            <td class="align-middle ">{{$user->id}}</td>
                                            <td class="align-middle">{{$user->name}}</td>
                                            <td class="align-middle">{{$user->email}}</td>
                                            <td class="align-middle">{{$user->email_verified_at}}</td>
                                            <td class="align-middle">{{$user->phone}}</td>
                                            <td class="align-middle">{{$user->address}}</td>
                                            <td class="align-middle">{{$user->dob}}</td>
                                            <td class="align-middle">
                                                @if ($user->usertype === 'user')
                                                    <span class="badge alert-success m-1 text-base">{{$user->usertype}}</span>
                                                @else
                                                    <span class="badge alert-warning m-1 text-base">{{$user->usertype}}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group  " role="group" aria-label="Basic example">
                                              
                                                    <a href="{{route('user.edit', $user->id)}}" type="button" class="btn bg-gray-500  btn-warning mx-4 w-26"> Edit </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"  onsubmit="return confirmDelete();">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-red-400 btn-danger w-26" >Delete</button>

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
                        {{ $users->links() }}
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
    