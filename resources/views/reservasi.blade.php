@extends('layouts.master')

@section('title','Available Rooms');

@section('content')

Duration:{{$lama}}
  <script type="text/javascript">
   var clicks = 000;
   var clicks2 = 000;
   var tanggal= {{$generate}}
   const idpers = "P".concat([tanggal, clicks]);
   const idgrup = "G".concat([tanggal, clicks]);
   {{ $generate }}

   var temp = idpers;
   function pad(n,length){
     var len=length - (''+n).length;
     return (len > 0? new Array(++len).join('0'):' ')+n
   }

   function onClick() {
       clicks += 1;
       document.getElementById("idpers").innerHTML = "P".concat(tanggal, pad(clicks, 3));
       return temp = idpers;;
   };

   function onClick2() {
       clicks2 += 1;
       document.getElementById("idgrup").innerHTML = "G".concat(tanggal, pad(clicks2, 3));
   };

    console.log(idpers);
   </script>

{{--
   <p>Personal Order num generate: <a id="idpers"></a></p>
   <button type="button" onClick="onClick()">Generate Personal</button>

   <p>Group Order num generate:<a id="idgrup"></a></p>
   <button type="button" onClick="onClick2()">Generate Grup</button>

   <br> --}}


<form action="{{ route('konfirmasiReservasi')}}" method="POST">
   {{csrf_field()}}
   <h4>Available Room(s): </h4>

 @foreach ($tipekamar as $tkm)
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="tm-tours-box-1">
						<img src="img/tours-03.jpg" alt="image" class="img-responsive">
						<div class="tm-tours-box-1-info">
							<div class="tm-tours-box-1-info-left" align="center">
								<p class="text-uppercase margin-bottom-20"><input class="form-control{{ $errors->has('tipekamar') ? ' is-invalid' : '' }}"  type="checkbox" name="tipekamar" value="{{$tkm->id_tipe_kamar}}"/>{{$tkm->tipe_kamar}}</p>
                {{-- @if ($condition)

                @endif --}}
							</div>
							<div class="tm-tours-box-1-info-right">
								<p class="gray-text tours-1-description">Lorem quis bibendum auctor, nisi elit consequat ipsum, sec sagittis sem nibh id elit.</p>
							</div>
						</div>
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
                @if ($tkm->tipe_kamar=="Superior")
                 <input type="hidden" name="total" value="500000">Price: IDR {{ $price = 500000 }} <input type="hidden" name="tipe" value="1">
                 @elseif ($tkm->tipe_kamar=="Deluxe")
                    <input type="hidden" name="total" value="600000">Price: IDR {{ $price = 600000 }} <input type="hidden" name="tipe" value="2">
                  @elseif ($tkm->tipe_kamar=="Executive Deluxe")
                      <input type="hidden" name="total" value="700000">Price: IDR {{ $price = 700000 }} <input type="hidden" name="tipe" value="3">
                    @elseif ($tkm->tipe_kamar=="Junior Suite")
                        <input type="hidden" name="total" value="800000">Price: IDR {{ $price = 800000 }} <input type="hidden" name="tipe" value="4">
                @endif

                @if ($tkm->tipe_kamar == "Superior")
                  @elseif ($tkm->tipe_kamar == "Deluxe")
                    @elseif ($tkm->tipe_kamar == "Executive Deluxe")
                      @else

                @endif
							</div>
						</div>
					</div>
				</div>
     <br>
     @endforeach
   How Many Room(s)? :
   <input id="banyak_reservasi" name="banyak_reservasi" type="number" class="form-control{{ $errors->has('banyak_reservasi') ? ' is-invalid' : '' }}"  value="{{ old('banyak_reservasi') }}" required autofocus>
        <input type="hidden" name="id_hotel" value="{{$data['id_hotel']}}"/>
        <input type="hidden" name="tanggalCheckin"  value="{{$cekin}}"/>
        <input type="hidden" name="tanggalCheckout" value="{{$cekout}}"/>
        <input type="hidden" name="dewasa" value="{{$data['dewasa']}}"/>
        <input type="hidden" name="anak" value="{{$data['anak']}}"/>
        <input type="hidden" name="id_reservasi" value="{{$reservasiview['id_reservasi']}}"/>
        <input type="hidden" name="id_season" value="1"/>
        <input type="hidden" name="kode_reservasi" value='{{$reservasiview->kode_reservasi}}'/>
        <input type="hidden" name="id_reservasi_tipe" value="1"/>
        <input type="hidden" name="urutan_reservasi" value="11"/>
        <br>

        @foreach ($fasilitas as $fct)
             <input type="checkbox" value="{{$fct->id_fasilitas}}" name='idfasilitas'/>
             <input type="hidden" name="total_harga" value="{{$fct->harga}}"/>
               <label>{{$fct->nama_fasilitas}}</label>
               <label>{{$fct->harga}}</label>

               <br>
       @endforeach
       <input type="hidden" name="jumlah" value="1"/>


      <input type="submit" name="submit" value="Book Now">
</form>
<input type="hidden"  name="id_reservasi_status" value="1">

    {{-- <input type="hidden"  name="total_harga_kamar" value={{$lama*banyak_reservasi}}>

{{--  buat temp perhitungan disini, simpan sebagai total bayar-> total bayar= kamar*jml--}}


   <input type="hidden" name="_method" value="PUT">

   <script>
   function myFunction() {
       var checkBox = document.getElementById("myCheck");
       var text = document.getElementById("text");
       if (checkBox.checked == true){
           text.style.display = "block";
       } else {
          text.style.display = "none";
       }
   }
   </script>


@endsection
