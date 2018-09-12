@extends('layouts.master')

@section('title','Reservation Confirm')

@section('content')
 {{csrf_field()}}

 <section class="container tm-home-section-1" id="more">
		<div class="row">
			<!-- slider -->
			<div class="flexslider effect2 effect2-contact tm-contact-box-1">
				<ul class="slides">
					<li>
						<img src="img/world-map.png" alt="image" class="contact-image" />
						<div class="contact-text">
							<h1 class="slider-title">Confirm Your Reservation:</h1>
							<h3 class="slider-subtitle">


                  City: @if ($reservasi->id_hotel == 1)
                    Yogyakarta
                    @else
                      Bandung
                  @endif

                 @if ($reservasi->id_kamar == 1 )
                    <li>Room Type : Superior</li>
                  @elseif ($reservasi->id_kamar == 2)
                    <li>Room Type : Deluxe</li>
                  @elseif ($reservasi->id_kamar == 3)
                    <li>Room Type : Executive Deluxe</li>
                    @else
                      <li>Room Type : Junior Suite</li>
                @endif

              Room Price: IDR {{$reservasi->total_harga_kamar}}<br>
              Reserved for: {{$reservasi->tgl_check_in}}<br>
              Duration: {{$reservasiconf->id_peg}}
              <br>
              <li>How many room (s):  {{$reservasiconf->jumlah_kamar}} </li>
              <br>
              <h3>Special Request:</h3>
              @if ($fct->id_fasilitas == 1)
                Extra Bed
              @elseif($fct->id_fasilitas == 2)
                Laundry Regular
              @elseif ($fct->id_fasilitas == 3)
                Laundry Fast Service
              @elseif ($fct->id_fasilitas == 4)
                Massage
              @elseif ($fct->id_fasilitas == 5)
                Minibar
              @elseif ($fct->id_fasilitas == 6)
                Breakfast
              @elseif ($fct->id_fasilitas == 7)
                Lunch
              @elseif ($fct->id_fasilitas == 8)
                Dinner
              @elseif ($fct->id_fasilitas == 9)
                Meeting Room
              @elseif ($fct->id_fasilitas == 10)
                Extra Bed
              @elseif ($fct->id_fasilitas == 11)
                Laundry Regular
              @else
                Laundry Fast Service
              @endif
              <br>
              Request Price: IDR
              @if ($fct->id_fasilitas == 1)
                150000 *  {{$reservasiconf->jumlah_kamar}}
              @elseif($fct->id_fasilitas == 2)
                10000 *  {{$reservasiconf->jumlah_kamar}}
              @elseif ($fct->id_fasilitas == 3)
                25000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 4)
                75000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 5)
                20000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 6)
                50000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 7)
                100000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 8)
                100000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 9)
                200000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 10)
                150000 *  {{$reservasiconf->jumlah_kamar}}

              @elseif ($fct->id_fasilitas == 11)
                10000 *  {{$reservasiconf->jumlah_kamar}}

              @else
                25000 *  {{$reservasiconf->jumlah_kamar}}
              @endif room(s) = IDR {{$permintaanKhsus->total_harga}}


              <br><h3> Total price you have to pay: IDR {{$ttl}} </h3>
              <br>
              <a href="{{url('/datakartu')}}">    <input type="submit" name="submit" value="Proceed">  </a>
              <a href="{{url('/editreservasi')}}">    <input type="submit" name="submit" value="Edit">  </a>
            </h3>


						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>



{{-- Lama Bayar: {{$periode_waktu_bayar}} --}}

@endsection
