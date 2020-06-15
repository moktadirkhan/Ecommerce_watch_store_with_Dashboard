
@extends ('layouts.admin')


@section("content")


                          <div class="row justify-content-center "style="padding:50px">
                            <div class="col-md-10">
                          <div class="card mb-4">
                            <div class="card-header">
                              {{isset($category) ? 'Edit Category':'Create Category'}}

                            </div>

                          @if($errors->any())
                              <div class="alert alert-danger">
                                  <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                    <li class="list-group-item text-danger">
                                        {{$error}}
                                    </li>
                                    @endforeach
                                  </ul>
                              </div>
                            @endif

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <form action="{{isset($category) ? route('categories.update', $category->id):route('categories.store')}}" method="POST">
                                        @csrf
                                        @if(isset($category))
                                        @method('PUT')
                                        @endif
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" name="name" id="name" value="{{isset($category) ? $category->name:''}}" class="form-control">
                                        </div>
                                        <button class="btn btn-success">
                                          {{isset($category) ? 'Update Category': 'Add Category'}}
                                        </button>

                                      </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>


@endsection
