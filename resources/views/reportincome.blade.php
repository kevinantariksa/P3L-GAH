@include('inc.headerlp')

<div class="container">
  <div class="row">
    <br>
    <legend><h2>Report for each customer type</h2>
    <img src="{{url('/img/Capture.jpg')}}"></legend>
    @if(session('info'))
      {{session('info')}}
    @endif
    <br>
    <table class="table table-hover">
      <thead>
        Year : {{$getYear}}
        <tr>
          <th scope="col">NO</th>
          <th scope="col">Month</th>
          <th scope="col">Personal</th>
          <th scope="col">Grup</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
          @for ($i=0; $i < 13; $i++)
        <tr class="table-light">
          @if ($i==0)
            <th>{{$i+1}}</th>
            <th>January</th>
            <th>{{$januari}}</th>
            <th>{{$januari2}}</th>
            <th>{{$cjan}}</th>

            @elseif ($i==1)
              <th>{{$i+1}}</th>
              <th>February</th>
              <th>{{$februari}}</th>
              <th>{{$februari2}}</th>
              <th>{{$cfeb}}</th>

            @elseif ($i==2)
              <th>{{$i+1}}</th>
              <th>March</th>
              <th>{{$maret}}</th>
              <th>{{$maret2}}</th>
              <th>{{$cmar}}</th>

            @elseif ($i==3)
              <th>{{$i+1}}</th>
              <th>April</th>
              <th>{{$april}}</th>
              <th>{{$april2}}</th>
              <th>{{$capr}}</th>

            @elseif ($i==4)
              <th>{{$i+1}}</th>
              <th>May</th>
              <th>{{$mei}}</th>
              <th>{{$mei2}}</th>
              <th>{{$cmei}}</th>
            @elseif ($i==5)
              <th>{{$i+1}}</th>
              <th>June</th>
              <th>{{$juni}}</th>
              <th>{{$juni2}}</th>
              <th>{{$cjun}}</th>
            @elseif ($i==6)
              <th>{{$i+1}}</th>
              <th>July</th>
              <th>{{$juli}}</th>
              <th>{{$juli2}}</th>
              <th>{{$cjul}}</th>
            @elseif ($i==7)
              <th>{{$i+1}}</th>
              <th>August</th>
              <th>{{$agustus}}</th>
              <th>{{$agustus2}}</th>
              <th>{{$cagt}}</th>
            @elseif ($i==8)
              <th>{{$i+1}}</th>
              <th>September</th>
              <th>{{$september}}</th>
              <th>{{$september2}}</th>
              <th>{{$csep}}</th>
            @elseif ($i==9)
              <th>{{$i+1}}</th>
              <th>October</th>
              <th>{{$oktober}}</th>
              <th>{{$oktober2}}</th>
              <th>{{$cokt}}</th>
            @elseif ($i==10)
              <th>{{$i+1}}</th>
              <th>November</th>
              <th>{{$november}}</th>
              <th>{{$november2}}</th>
              <th>{{$cnov}}</th>
            @elseif ($i==11)
              <th>{{$i+1}}</th>
              <th>December</th>
              <th>{{$desember}}</th>
              <th>{{$desember2}}</th>
              <th>{{$cdes}}</th>
            @else
              <th></th>
              <th></th>
              <th></th>
              <th>TOTAL</th>
              <th>{{$ctot}}</th>

          @endif


        </tr>
            @endfor

      </tbody>
    </table>
    <button onclick="myFunction()" class="no-print"><i class="fa fa-print"></i><a onclick="myFunction()" class="btn btn-default"><i class="fa fa-print"></i> Print</a></button>

  </div>
</div>



<script>
function myFunction() {
    window.print();
}
</script>
@include('inc.footer')
