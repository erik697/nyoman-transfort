@extends('template/main')
@section('title')
<title>NyomanTransport | Promotion</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Promotion</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Promotion</li>
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
                    <h3 class="card-title">Data Promotion</h3>
                    
                  </div>

                  <div class="card-header">
                    <button type="button"class="btn btn-primary"  data-toggle="modal" data-target="#modal-create">
                        <i class="fas fa-plus"></i>
                        Tambah Promotion
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
                        <th>Image</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                        @foreach ($promotions as $key => $item)
                        <tr>
                        <td>{{ $key = $key +1 }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          <img src="{{ asset('promotionImage/'.$item->image) }}" style="height: 50px;width:100px;">
                        </td>
                        <td>
                            <a href="{{ route('promotions.edit',$item->id) }}" class="btn btn-app">
                                <i class="fas fa-edit"></i> Edit
                              </a>
                              <form action="{{ route('promotions.destroy',$item->id) }}" method="POST">
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
                          <th>Image</th>
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
                <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $code }}" name="code">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
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