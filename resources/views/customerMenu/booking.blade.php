@extends('customerMenu.template')
@section('title')
<title>NyomanTransport | Home</title>
@endsection
@section('content')
<div class="container">
  <h4 class="text-center mt-4 font-weight-bold">Book Form</h4>
  <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="hidden" value={{ $car->id }} name="car_id">
      <label for="exampleInputEmail1">Car</label>
      <input type="text" class="form-control" value="{{ $car->name }}" id="exampleInputEmail1" placeholder="car" required>
        </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="input name..." required>
      </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="input email...">
           </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Phone Number *</label>
        <input type="number" class="form-control" name="phone" id="exampleInputEmail1" placeholder="Enter phone number" required>
         </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Country *</label>
        <input type="text" class="form-control" name="country" id="exampleInputEmail1" placeholder="Enter country" required>
         </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Passenger *</label>
        <input type="number" class="form-control" name="passenger" id="exampleInputEmail1" placeholder="Enter passenger" required>
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date Booking</label>
        <input type="date" class="form-control" name="date_booking" id="exampleInputEmail1" placeholder="Enter date booking" required>
          </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Rental Duration(day)</label>
        <input type="number" class="form-control" name="rental_duration" id="exampleInputEmail1" placeholder="Enter rental duration">
        </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Pickup Location *</label>
        <textarea class="form-control" name="pickup_location" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Pickup Time *</label>
        <input type="time" class="form-control" name="pickup_time" id="exampleInputEmail1" placeholder="Enter pickup time" required>
        </div>
      
        <div class="form-group">
          <label for="exampleInputEmail1">Note</label>
          <textarea class="form-control" name="memo" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

    <button type="submit" class="btn btn-primary float-right">Send</button>
  </form>
</div>
@endsection
