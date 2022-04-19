@extends('master')
@section('main_content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add new category</h3>
        </div>
        <!-- /.card-header -->
       <form action="{{ route('storeCategory') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" style="width: 100%;" name="name"/>
                </div>
              </div>
            </div>
            <div class="row">
               <button type="submit" class="btn btn-success">Save</button>
              </div>
          </div>
       </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection