@extends('template/main')
@section('title')
<title>NyomanTransport | Paket</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Paket</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Paket</li>
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
                    <h3 class="card-title">Data Paket</h3>
                    
                  </div>

                  <div class="card-header">
                    <button type="button"class="btn btn-primary"  data-toggle="modal" data-target="#modal-create">
                        <i class="fas fa-plus"></i>
                        Tambah Paket
                    </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      
                
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                        @foreach ($packages as $key => $item)
                        <tr>
                        <td>{{ $key = $key +1 }}</td>
                        <td>{{ $item->cars }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('packages.edit',$item->id) }}" class="btn btn-app">
                                <i class="fas fa-edit"></i> Edit
                              </a>
                              {{-- <a href="{{ route('packages.destroy',$item->id) }}" onclick="confirm('Yakin Hapus data')" class="btn btn-app">
                                <i class="fas fa-trash"></i> Delete
                              </a> --}}
                              <form action="{{ route('packages.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return myFunction();" class="btn btn-app">  <i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                      </tr>
                        @endforeach
                       
                     
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Mobil</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                      </tfoot>
                    </table>
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

          {{-- modal --}}
          <div class="modal fade" id="modal-create">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $code }}" name="code">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobil</label>
                        <input type="text" name="cars" class="form-control" id="exampleInputEmail1" placeholder="Enter cars">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lokasi</label>
                        <input type="text" name="location" class="form-control" id="exampleInputEmail1" placeholder="Enter capacity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                      </div>
                     

                 
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit">Save changes</button>
                </div>
            </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
@endsection