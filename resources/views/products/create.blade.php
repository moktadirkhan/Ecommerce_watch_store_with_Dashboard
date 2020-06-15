@extends ('layouts.admin')


@section("content")

<a class="btn btn-primary" href="{{route('products.index')}}" role="button">Go Back To List</a>

<div class="row justify-content-center "style="padding:50px">
  <div class="col-md-10">
<div class="card mb-4">
  <div class="card-header">
    {{isset($product) ? 'Edit product':'Create product'}}

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
    <form action="{{isset($product) ? route('products.update', $product->id):route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
    @method('PUT')
    @endif
   <div class="form-group">
     <label for="title">Title</label>
     <input class="form-control" type="text" name="title" value="{{isset($product) ? $product->title:''}}">
   </div>


   <div class="form-group">
     <label for="category_id">Category</label>

										<select class="form-control" name="category_id" id="category_id">
   @foreach($categories as $category)
										<option value="{{$category->id}}"
                        @if(isset($product))
                        @if($category->id = $product->category_id){
                      selected
                    }
                        @endif
                        @endif
                          >
                        {{$category->name}}
                      </option>

@endforeach
										</select>
                  	</div>


   <div class="form-group ">
     <label for="description">Description</label>
     <textarea class="form-control" rows="5" cols="15" type="text" name="description">{{isset($product) ? $product->description :''}}</textarea>
   </div>

   <div class="form-group ">
     <label for="content">Content</label>
     <textarea class="form-control" rows="5" cols="5" type="text" name="content">{{isset($product) ? $product->content:''}}</textarea>
   </div>

   <div class="form-group">
     <label for="published_At">Published At</label>
     <input type='text' class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="published_at" value="{{isset($product) ? $product->published_at:''}}" >
   </div>

@if(isset($product))
   <div class="form-group">
     <label for="image">Image</label>
     <img src="{{ asset('storage/' . $product->image) }}" width="100px" height="100px">
   </div>
@endif
<div class="form-group">
  <label for="image">Image</label>
  <input class="form-control" type="file" name="image">
</div>

 <label for="price">Price</label>
   <div class="input-group">

  <div class="input-group-prepend mb-3">
    <span class="input-group-text" id="">Tk.</span>
  </div>
  <input type="text" name="price" class="form-control" value="{{isset($product) ? $product->price:''}}">
</div>

<div class="form-group">
  <button type="submit" class="btn btn-success">{{isset($product) ? 'Update Product':'Create Product'}}</button>
</div>
            </form>
          </table>
      </div>
  </div>
</div>
</div>

@endsection

@section('script')

@endsection
