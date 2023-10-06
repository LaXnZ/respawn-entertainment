<x-app-layout>
  
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a class="nav_text" href="/home" rel="nofollow">Home</a>
                    <span></span>Edit Categories
                </div>
            </div>
        </div>
        <section class="mt-50">
            <div class="container bg-white rounded-lg p-6 border" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-holder">
                                All Categories
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $i = 1; @endphp

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td> {{$i++}}</td>
                                                <td> {{$category->name}}</td>
                                                <td> {{$category->slug}}</td>
                                                <td> </td>
                                            </tr>
                                        @endforeach
                                            
                                      
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>