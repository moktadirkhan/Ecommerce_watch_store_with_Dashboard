
@extends ('layouts.admin')


@section("content")
                <main>
                  <div class="row justify-content-center" style="margin-top:50px">

                  <div class="col-md-20">


                  <div class="d-flex justify-content-end mb-2">
                    <a class="btn btn-success pull-right"  href="{{route('products.create')}}" role="button">Add Product</a>

                  </div>



                  <div class="card mb-4">
                                              <div class="card-header"><i class="fas fa-table mr-1"></i>Products</div>


                                              <div class="card-body">
                                                <div class="search-container">
      <form action="{{route('products.index')}}" method="get" style="margin: 10px">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
                                                  <div class="table-responsive">
                                                      <table class="table table-bordered" id="bootstrap-data-table" >
                                                          <thead>
                                                              <tr>
                                                                <td>#</td>
                                                                <th>Image<i class="fa fa-fw fa-sort"></th>
                                                                <th>Name<i class="fa fa-fw fa-sort"></th>
                                                                <th>Category<i class="fa fa-fw fa-sort"></th>
                                                                <th>Author<i class="fa fa-fw fa-sort"></th>
                                                                <th>Total View<i class="fa fa-fw fa-sort"></th>
                                                                <th>Hot News</th>
                                                                <th>Publish</th>
                                                                <th>Action</th>
                                                                <th>Delete</th>
                                                              </tr>
                                                          </thead>
                                                          <tfoot>
                                                              <tr>
                                                                <td>#</td>
                                                                <th>Image<i class="fa fa-fw fa-sort"></th>
                                                                <th>Name<i class="fa fa-fw fa-sort"></th>
                                                                <th>Category<i class="fa fa-fw fa-sort"></th>
                                                                <th>Author<i class="fa fa-fw fa-sort"></th>
                                                                <th>Total View<i class="fa fa-fw fa-sort"></th>
                                                                <th>Hot News</th>
                                                                <th>Publish</th>
                                                                <th>Action</th>
                                                                <th>Delete</th>
                                                              </tr>
                                                          </tfoot>
                                                          @foreach($products as $product)
                                                          <tbody>
                                                              <tr>
                                                                <td>{{$product->id}}</td>
                                                                  <td>
                                                                    <img src="{{ asset('storage/' . $product->image) }}" width="100px" height="100px">

                                                                  </td>
                                                                  <td>{{$product->title}}</td>
                                                                      <td>{{$product->category->name}}</td>
                                                                      <td>{{$product->created_by}}</td>

                                                                      <td>{{$product->view_count}}</td>

                                                                      <td>
                                                                        @if(!$product->trashed())
                                                                        <form class="" action="products/{{$product->id}}/hot_news" method="POST">

                                                                        @csrf
                                                                        @method('PUT')

                                                                    @if(!$product->hot_news)
                                                                    <button  class="btn btn-danger btn-sm">No</button>
                                                                    @else
                                                                    <button  class="btn btn-success btn-sm">Yes</button>

                                                                    @endif

                                                                          </form>
                                                                          @endif
                                                                      </td>
                                                                          <td>
                                                                            @if(!$product->trashed())
                                                                            <form class="" action="products/{{$product->id}}/status" method="POST">

                                                                            @csrf
                                                                            @method('PUT')

                                                                        @if(!$product->status)
                                                                        <button  class="btn btn-success btn-sm">Publish</button>
                                                                        @else
                                                                        <button  class="btn btn-danger btn-sm">Unpublish</button>

                                                                        @endif

                                                                              </form>
                                                                              @endif
                                                                           </td>


                                                                        <td>
                                                                            @if(!$product->trashed())
                                                                          <button type="button" class="btn btn-success btn-sm">Comment</button>

                                                                          <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                                      @endif
                                                                    </td>


                                                                  <td>

                                                                    <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                                      @csrf
                                                                      @method('DELETE')
                                                                      <button type="submit" class="btn btn-danger">{{$product->trashed() ? 'Delete' : 'Trash'}}</button>
                                                                    </form>

                                                                    <!--
                                                                          <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"  class="btn btn-danger btn-sm">{{$product->trashed() ? 'Delete' : 'Trash'}}</button>
                                                                      </form>
                                                                    -->
                                                                  @endforeach
                                                                  </td>
                                                              </tr>

                                                          </tbody>
                                                      </table>

                                                        </div>
                                                      </div>
                                                      </div>
    </div>
</div>

                </main>
@endsection
