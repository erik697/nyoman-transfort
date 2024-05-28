@extends('customerMenu.template')
@section('title')
<title>NyomanTransport | Home</title>
@endsection
@section('content')

    {{-- <div class="container"> --}}
    

      <img src="{{ asset('supportImage/header.jpg') }}" class="img-fluid mb-4" alt="...">

      {{-- <h1 class="text-center text-bold">Welcome To Naura Transport</h1>
      <div class="col-10 text-dark m-auto">
      <h6 class="text-justify">
        
        &nbsp;&nbsp;&nbsp;&nbsp;  thank a lots for visiting our sites, Naura TRANSPORT is a local Bali Tour Operator and Transport Service in Bali

        &nbsp;&nbsp;&nbsp;&nbsp; Let’s explore Bali with experience Bali Local Driver, have a great knowledge of hospitality , places, attraction, culture and Adventure in Bali. And also friendly, honest will be help you with anything you require and drive you anywhere your please and at any time that suits to you.

        &nbsp;&nbsp;&nbsp;&nbsp; All you need to do is let me know your interest of Bali then we’ll do the rest. If you do not have much information about Bali, or are unsure as to what you would like to do and see, please do not hesitate to send me an Email or Call before visiting.
        <h6 class="text-right">We look forward to meeting you,</h6>
        <h6 class="text-right">Best regards</h6>
          <h6 class="text-right">Naura Transport</h6>
          
          
        </div>
        
       
      </div> --}}
      <div class="col-10 text-dark m-auto">
      <?php echo $greeting ? $greeting->description : '' ?>
      </div>
      {{-- <h3 class="text-center text-bold" id="pickup">Booking for Pickup</h3>
      <div class="my-5 text-center">
        <a href="{{ route('bookingPickup') }}">
          <button type="button" class="btn btn-primary py-3"><i class="fas fa-car"></i> Book Now</button>
        </a>

      </div> --}}

      <div class="col-10 text-dark m-auto">
      <h3 class="text-center text-bold" id="tour">Airport Tansfer</h3>
      <p>Our service offers both airport pickup and drop-off services, as well as hotel transfers. If you only require transportation from the airport to your hotel, we are is your best sulution for it. Our team will ensure a timely and comfortable journey, allowing you to relax and enjoy your trip and by choosing our service  will avoid you with the trouble of dealing with taxis when you arrive at BALI AIRPORT.
         
        </p>
        <p>Please let us know your specific travel details.</p>
      </div>
      <div class="mx-4">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cars</th>
            <th scope="col">Locations</th>
            <th scope="col">Price</th>
            <th scope="col">Booking</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($packages as $key => $item)
          <tr>
            <th scope="row">{{ $key = $key + 1 }}</th>
            <td>{{ $item->cars }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ "USD " . number_format($item->price,2,',','.') }}</td>
            <td>
                <a href="https://wa.me/6282340082044?text=Hello%20,%20i%20want%20to%20rent%20{{ $item->cars }}%0Date%20Booking%20:%20%0aRental%20Duration%20:%20%0aPickup%20Location%20:%20{{ "Airport" }}%0aDestination%20:%20{{  $item->location }}%0aName%20:%20%0aCountry%20:%20%0aPessenger%20:%20%0aNote%20:%20">
              <button type="button" class="btn btn-success float-right"><i class="fab fa-whatsapp"></i></button>
                </a>
          <a href="mailto:no-one@snai1mai1.com?subject=Hello I Want to Rent {{ $item->cars }}&body=Date Booking : %0D%0ARental Duration : %0D%0APickup Location : {{ "Airport" }}%0D%0ADestination : {{ $item->location }}%0D%0AName : %0D%0ACountry : %0D%0APessenger : %0D%0ANote : ">
                <button type="button" class="btn btn-secondary float-right ml-2"><i class="fas fa-envelope"></i></button>
              </a> 
          
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-10 text-dark m-auto">
    <h3 class="text-center text-bold" id="tour">Additional Info :</h3>
    <p># The price is based on per car, the regular car we used for pick up is 7 seater car (Toyota Innova – Avanza – Suzuki APV – Ertiga – Daihatsu Xenia )</p>
<p>#Private Car with good A/C can fit till 4 person inside with not much luggage and can fit up to 7 person without lugge, if you bring lot of luggage will need bigger car or using 2 car for pick up or drop off</p>
<p>#Our driver will coming with paper sign with your name on it , and waiting for you at the airport pick up zone </p>
<p>#please note that in the event of flight delays, airport parking fees may apply for the duration of the extended parking period beyond the initially scheduled arrival time</p>
    </div>



  </div>
   
      <h3 class="text-center text-bold" id="tour">Booking for Tour</h3>
      <div class="row">
        @foreach ($cars as $item)
        <div class="col-sm-4">
          <div class="card md-2 mx-auto" style="width: 18rem;">
          <img src="{{ asset('carImage/'.$item->image) }}" class="card-img-top" alt="...">
          <div class="card-body">
         <p class="card-text">{{ $item->name }}</p>
         <p class="card-text">{{ $item->capacity }} people</p>
         <p class="card-text">{{ "USD " . number_format($item->price,2,',','.') }}</p>
         <div class="">
          <a href="https://wa.me/6282340082044?text=Hello%20,%20i%20want%20to%20rent%20{{ $item->name }}%0Date%20Booking%20:%20%0aRental%20Duration%20:%20%0aPickup%20Location%20:%20%0aName%20:%20%0aCountry%20:%20%0aPessenger%20:%20%0aNote%20:%20">
            <button type="button" class="btn btn-success float-right"><i class="fab fa-whatsapp"></i> Book Now</button>
          </a>
          <a href="mailto:no-one@snai1mai1.com?subject=Hello I Want to Rent {{ $item->name }}&body=Date Booking : %0D%0ARental Duration : %0D%0APickup Location : %0D%0AName : %0D%0ACountry : %0D%0APessenger : %0D%0ANote : ">
            <button type="button" class="btn btn-secondary float-right ml-2"><i class="fas fa-envelope"></i> Book Now</button>   </div>
          </a>    
          </div>
              
      </div>
   

    </div>
        @endforeach
       
   

  </div>





  <h3 class="text-center text-bold" id="tour">Recomendation vacation</h3>
  <h5 class="text-center text-bold" id="tour">Contact us for detail</h5>
  <div class="row">
    @foreach ($promotions as $item)
    <div class="col-sm-6 py-4">
      <div class="card md-2 mx-auto" style="width: 22rem;">
      <img src="{{ asset('promotionImage/'.$item->image) }}" class="card-img-top" alt="...">
      
  </div>


</div>
    @endforeach
</div>
<div class="row d-flex justify-content-around p-4" style="background-color :midnightblue; margin-bottom: 70px ">
 
  <div class="col-sm-4">
<h3 class="text-white" id="contact_us">Contact Us</h3>
<div class="text-white"><i class="fas fa-envelope"></i> <a class="text-white" href="mailto: Nauratransport7316@gmail.com">Nauratransport7316@gmail.com</a></div>
<div class="text-white"><i class="fas fa-phone"></i> +6282340082044</div>

  <div class="text-white">
   
    </div>
  
  </div>
  {{-- <div class="col-sm-3">
    <h3 class="text-white">Information</h3>
    <ul>
      <li class="text-white"><a class="text-white link" href="">How to book</a></li>
      <li class="text-white"><a class="text-white link" href="">More Information</a></li>
    </ul> --}}
   
  {{-- </div> --}}
  <div class="col-sm-4">
    <h3 class="text-white" id="about_us">About Us</h3>
    <h6 class="text-justify text-white">&nbsp;&nbsp;&nbsp;&nbsp;We are an experienced local official company offers you a Private tour in Bali, car rental with English speaking driver in Bali, Bali Airport pick-up service, Hotel transfer service, and Online Booking service for all activities and adventure tours in Bali with our special rates.</h6>
  </div>
</div>

<div class="fixed-bottom bg-white">
  <div class=" ml-4 row">
    <div class="ml-1">
    <a href="https://wa.me/+6282340082044">
      <i class="fab fa-whatsapp-square text-success" style="font-size : 60px"></i>
    {{-- <img src="{{ asset('supportImage/logoWa.png') }}" width="80" alt="..." class=""> --}}
</a>
</div>
<div class="ml-1">
<a class="text-primary" href="https://www.facebook.com/profile.php?id=61554892711193&mibextid=ZbWKwL">
  <i class="fab fa-facebook-square" style="font-size : 60px"></i></a>
</div>
<div class="ml-1 text-danger">
  <i class="fab fa-instagram-square" style="font-size : 60px"></i>
</div>
<div class="ml-1 text-primary">
  <i class="fab fa-twitter-square" style="font-size : 60px"></i>
</div>
</div>
</div>
{{-- </div> --}}
    
@endsection
