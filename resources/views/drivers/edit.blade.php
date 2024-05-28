@extends('template/main')
@section('title')
<title>NyomanTransport | Driver-Edit</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Driver</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Driver</li>
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
                    <h3 class="card-title">Edit Driver</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <form action="{{ route('drivers.update',$driver->id) }}" method="POST">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $code }}" name="code"> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" value="{{ $driver->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" value="{{ $driver->phone }}" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{ $driver->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="address" value="{{ $driver->address }}" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <div class="form-check">
                              <input class="form-check-input" {{ $driver->sex == "M" ? 'checked' : '' }} value="M" type="radio" name="sex">
                              <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" {{ $driver->sex == "F" ? 'checked' : '' }} value="F" type="radio" name="sex">
                              <label class="form-check-label">Perempuan</label>
                            </div>
                          </div>


                          <div class="form-group">
                            <label>Mobil</label>
                            <div class="select2-purple">
                              <select name="cars[]" class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($cars as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $car_select) ? "selected" : ""}} >{{ $item->name }}</option>
                                @endforeach
                                
                              </select>
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