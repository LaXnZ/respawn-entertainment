<x-app-layout>
  
    <main class="main pb-36">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span>Edit User
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
                                    <div class="col-md-6 text-3xl font-extrabold"> Edit User </div>
                                    <div class="col-md-6"> <a href="{{route('users')}}" class="btn btn-success float-end">All Users </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                    
                                @endif
                                <form action="{{route('user.update', $user->id)}}" method="POST" >
                                    @csrf
                                    @method('PUT')
                                      <div class="mb-3 mt-3">
                                        <label for="name" class="form-label"> Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter User Name" value="{{$user->name}}" >
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="email" class="form-label"> Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter User Email" value="{{$user->email}}" >
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="password" class="form-label"> Password </label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter User Password" value="{{$user->password}}" >
                                        @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="phone" class="form-label"> Phone Number </label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Enter User's Phone Number" value="{{$user->phone}}" >
                                        @error('phone')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="address" class="form-label"> Home Address </label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter User's Address" value="{{$user->address}}" >
                                        @error('address')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="dob" class="form-label"> Date of Birth </label>
                                        <input type="date" name="dob" class="form-control" placeholder="Enter User's Date of Birth" value="{{$user->dob}}" >
                                        @error('dob')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3 mt-3">
                                        <label for="role" class="form-label"> User Role </label>
                                        <select name="role" class="form-control">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        @error('role')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>

                                    

                                 <button type="submit" class="btn btn-primary float-end">Update User</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>