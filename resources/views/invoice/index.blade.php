@extends('template/main')
@section('title')
<title>NyomanTransport | Invoice</title>
@endsection
@section('directory')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Invoice</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
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
                    <h3 class="card-title">Data Mobil</h3>
                    
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                      
                
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Mobil</th>
                        <th>Nama Driver</th>
                        <th>No.Telp</th>
                        <th>Negara</th>
                        <th>Jumlah Penumpang</th>
                        <th>Tanggal Boking</th>
                        <th>Durasi Rental(/jam)</th>
                        <th>Lokasi Pickup</th>
                        <th>Jam Pickup</th>
                        <th>Dibuat Tgl</th>
                        <th>Status</th>
                        <th>Aksi</th>

                      </tr>
                      </thead>
                      <tbody>
                      
                        @foreach ($invoices as $key => $item)
                        <tr>
                        <td>{{ $key = $key +1 }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->cars ? $item->cars->name : "" }}</td>
                        <td>{{ $item->drivers ? $item->drivers->name : "" }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->country }}</td>
                        <td>{{ $item->passenger }}</td>
                        <td>{{ $item->date_booking }}</td>
                        <td>{{ $item->rental_duration }}</td>
                        <td>{{ $item->pickup_location }}</td>
                        <td>{{ $item->pickup_time }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            {{-- <a href="{{ route('invoices.approve',$item->id) }}" onclick="confirm('are you sure?')" class="btn btn-app">
                                <i class="fas fa-edit"></i> Setujui
                              </a> --}}
                              <a href="{{ route('invoices.edit',$item->id) }}" class="btn btn-app">
                                <i class="fas fa-edit"></i> Setujui/T0lak
                              </a>
                        </td>
                      </tr>
                        @endforeach
                       
                     
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Mobil</th>
                        <th>Nama Driver</th>
                        <th>No.Telp</th>
                        <th>Negara</th>
                        <th>Jumlah Penumpang</th>
                        <th>Tanggal Boking</th>
                        <th>Durasi Rental(/jam)</th>
                        <th>Lokasi Pickup</th>
                        <th>Jam Pickup</th>
                        <th>Dibuat Tgl</th>
                        <th>Status</th>
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
@endsection