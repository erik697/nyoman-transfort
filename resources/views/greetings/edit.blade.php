@extends('template/main')
@section('title')
<title>NyomanTransport | Greeting-Edit</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Greeting</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Greeting</li>
      </ol>
    </div><!-- /.col -->
  </div>
@endsection
@section('mainContent')
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-12">
               
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Kata Pembuka</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <form action="{{ route('greetings.update',$greeting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                      <div class="card-body">
                        <textarea id="summernote" name="description">
                         {{ $greeting->description }}
                        </textarea>
                      </div>
                      
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                </form>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->

          @endsection