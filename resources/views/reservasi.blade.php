@extends('layouts.master')

@section('title','Available Rooms');

@section('content')
  <br>

  <script type="text/javascript">
   var clicks = 000;
   var clicks2 = 000;
   var tanggal= {{$generate}}
   var idpers = "P".concat(tanggal).concat(clicks);
   var idgrup = "G".concat(tanggal).concat(clicks2);
   {{ $generate }}
   function onClick() {
       clicks += 1;
       document.getElementById("idpers").innerHTML = idpers;
       document.getElementById("clicks").innerHTML = clicks;

   };

   function onClick2() {
       clicks2 += 1;
       document.getElementById("idgrup").innerHTML = idgrup;

   };
   </script>

   <p>Ini tanggal reservasi auto generate: <a id="idpers"></a></p>
   <button type="button" onClick="onClick()">Generate Personal</button>

   <p>Ini tanggal reservasi auto generate:<a id="idgrup"></a></p>
   <button type="button" onClick="onClick2()">Generate Grup</button>

   <br>
   <p>Kamar yang tersedia</p>

   

@endsection
