@extends('template/main')
@section('title')
<title>NyomanTransport | paket-Edit</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">paket</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">paket</li>
      </ol>
    </div>
  </div>
@endsection
@section('mainContent')
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-12">
               
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Edit Paket</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <form action="{{ route('packages.update',$package->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $code }}" name="code"> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobil</label>
                            <input type="text" name="cars" value="{{ $package->cars }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input type="text" name="location" value="{{ $package->location }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name="price" value="{{ $package->price }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
    
                     
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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