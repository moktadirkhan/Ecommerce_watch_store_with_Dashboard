
@extends ('layouts.admin')


@section("content")
                <main>
                  <div class="row justify-content-center" style="margin-top:50px">
                    <div class="col-md-10">
                      <a class="btn btn-success mb-3" style="float:right" href="{{route('categories.create')}}" role="button">Add Category</a>
                      </div>
                    </div>
                      <div class="row justify-content-center">
                        <div class="col-md-10">
                  <div class="card mb-4">
                                              <div class="card-header"><i class="fas fa-table mr-1"></i>Categories</div>
                                              <div class="card-body">
                                                  <div class="table-responsive">
                                                      <table class="table table-striped table-bordered" id="selectedColumn" width="100%" cellspacing="0">
                                                          <thead>
                                                              <tr>
                                                                  <th>Name<i class="fa fa-fw fa-sort"></i></th>
                                                                  <th>No. of Products<i class="fa fa-fw fa-sort"></i></th>
                                                                  <th>Action<i class="fa fa-fw fa-sort"></i></th>

                                                              </tr>
                                                          </thead>
                                                          <tfoot>
                                                              <tr>
                                                                <th>Name</th>
                                                                <th>No. of Products</th>
                                                                <th>Action</th>
                                                              </tr>
                                                          </tfoot>
                                                          @foreach($categories as $category)
                                                          <tbody>
                                                              <tr>
                                                                  <td>{{$category->name}}</td>
                                                                  <td>{{$category->product()->count()}}</td>
                                                                  <td>
                                                                    <a class="btn btn-primary btn-sm" href="{{route('categories.edit',$category->id)}}" role="button">Edit</a>
                                                                    <a class="btn btn-danger btn-sm" style="color:white" onclick="handleDelete({{$category->id}})">Delete</a>
                                                                  </td>
                                                                  @endforeach
                                                              </tr>

                                                          </tbody>
                                                      </table>
  <!-- Modal -->

  <form class="" action="index.html" method="POST" id="deleteCategoryForm">
  @csrf
  @method('DELETE')
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p class="text-center text-bold">Are you sure you want to delete this category?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger">Yes, delete</button>
        </div>
      </div>
    </div>
  </div>
</form>
                                                  </div>
                                              </div>
                                          </div>
                                          </div>
                                          </div>

                </main>
@endsection

@section('script')

<script>
function handleDelete(id){
  console.log('deleting.',id)
  var form=document.getElementById('deleteCategoryForm')
  form.action ='/categories/'+id
  console.log('deleting',form)
  $('#deleteModal').modal('show')
}

</script>
 @endsection
