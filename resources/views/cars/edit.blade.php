@extends('template/main')
@section('title')
<title>NyomanTransport | car-Edit</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">car</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">car</li>
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
                    <h3 class="card-title">Edit Mobil</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <form action="{{ route('cars.update',$car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $code }}" name="code"> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" value="{{ $car->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas</label>
                            <input type="number" name="phone" value="{{ $car->capacity }}" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Biaya</label>
                            <input type="text" name="price" value="{{ $car->price }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Lama(jam)</label>
                            <input type="text" name="per_hours" value="{{ $car->per_hours }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>



                          <input type="hidden" value="{{ $car->image }}" name="oldImage">
                          <div class="form-group">
                            <label for="exampleInputFile">File input(isi jika ingin mengganti gambar)</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
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