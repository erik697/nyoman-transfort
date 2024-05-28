@extends('template/main')
@section('title')
<title>NyomanTransport | Driver</title>
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
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
               
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Data Driver</h3>
                    
                  </div>

                  <div class="card-header">
                    <button type="button"class="btn btn-primary"  data-toggle="modal" data-target="#modal-create">
                        <i class="fas fa-plus"></i>
                        Tambah Driver
                    </button>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      
                
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>phone</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Mobil</th>
                        <th>L/P</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                     
                        @foreach ($drivers as $key => $item)
                        <tr>
                        <td>{{ $key = $key +1 }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                          <ul>
                          @foreach ($item->cars as $subItem)
                            
                              <li>{{ $subItem->name }}</li>
                            
                          @endforeach
                        </ul>
                        </td>
                        <td>{{ $item->sex == "M" ? "Laki-laki" : "Perempuan" }}</td>
                        <td>
                            <a href="{{ route('drivers.edit',$item->id) }}" class="btn btn-app">
                                <i class="fas fa-edit"></i> Edit
                              </a>

                              <form action="{{ route('drivers.destroy',$item->id) }}" method="POST">
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
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>phone</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Mobil</th>
                        <th>L/P</th>
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
                <form action="{{ route('drivers.store') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $code }}" name="code">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter address">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <div class="form-check">
                          <input class="form-check-input" value="M" type="radio" name="sex" checked>
                          <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="F" type="radio" name="sex">
                          <label class="form-check-label">Perempuan</label>
                        </div>
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
        </div>
@endsection