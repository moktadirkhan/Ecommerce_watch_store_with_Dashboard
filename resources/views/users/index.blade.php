
@extends ('layouts.admin')


@section("content")
                <main>

                      <div class="row justify-content-center">
                        <div class="col-md-10">
                  <div class="card mb-4">
                                              <div class="card-header"><i class="fas fa-table mr-1"></i>Users</div>
                                              <div class="card-body">
                                                  <div class="table-responsive">
                                                      <table class="table table-striped table-bordered" id="selectedColumn" width="100%" cellspacing="0">
                                                          <thead>
                                                              <tr>
                                                                  <th>Name<i class="fa fa-fw fa-sort"></i></th>
                                                                  <th>Email<i class="fa fa-fw fa-sort"></i></th>
                                                                  <th>Action<i class="fa fa-fw fa-sort"></i></th>

                                                              </tr>
                                                          </thead>
                                                          <tfoot>
                                                              <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                              </tr>
                                                          </tfoot>
                                                          @foreach($users as $user)
                                                          <tbody>
                                                              <tr>
                                                                  <td>{{$user->name}}</td>
                                                                  <td>{{$user->email}}</td>
                                                            <td>
                                                              @if(!$user->isAdmin())
                                                              <form class="" action="{{route('users.make-admin',$user->id)}}" method="post">
                                                              @csrf
                                                              <button type="submit" class="btn btn-primary">Make Admin</button>
                                                              </form>
                                                              @endif
                                                                @if(!$user->isModerator())
                                                              <form class="" action="{{route('users.make-moderator',$user->id)}}" method="post">
                                                              @csrf
                                                              <button type="submit" class="btn btn-success">Make moderator</button>
                                                              </form>
                                                                @endif
                                                                  </td>
                                                                  @endforeach
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
