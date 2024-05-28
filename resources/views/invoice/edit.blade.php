@extends('template/main')
@section('title')
<title>NyomanTransport | Invoice - edit</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Invoice</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
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
                    <h3 class="card-title">Edit Invoice</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <form action="{{ route('invoices.update',$invoice->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="modal-body">
                        <input type="hidden" value="{{ $invoice->email }}" name="email">

                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Driver</label>
                          <select class="form-control" name="driver_id" id="exampleFormControlSelect1">
                            <option value="">Pilih status</option>
                            @foreach($drivers as $data)
                            <option value="{{ $data->id }}" {{$invoice->driver_id == $data->id ? "selected" : ""}}>{{ $data->code | $data->name }}</option>
                            @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Status</label>
                          <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option>Pilih status</option>
                            <option value="pending" {{$invoice->status == "pending" ? "selected" : ""}}>Pending</option>
                            <option value="success" {{$invoice->status == "success" ? "selected" : ""}}>Setujui</option>
                            <option value="reject" {{$invoice->status == "reject" ? "selected" : ""}}>Tolak</option>
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