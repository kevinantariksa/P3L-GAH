@include('inc.headerlp')

<div class="container">
  <div class="row">
    <br>
    <legend><h2>Report New Customer each month</h2>
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

            @elseif ($i==1)
              <th>{{$i+1}}</th>
              <th>February</th>
              <th>{{$februari}}</th>

            @elseif ($i==2)
              <th>{{$i+1}}</th>
              <th>March</th>
              <th>{{$maret}}</th>

            @elseif ($i==3)
              <th>{{$i+1}}</th>
              <th>April</th>
              <th>{{$april}}</th>

            @elseif ($i==4)
              <th>{{$i+1}}</th>
              <th>May</th>
              <th>{{$mei}}</th>
            @elseif ($i==5)
              <th>{{$i+1}}</th>
              <th>June</th>
              <th>{{$juni}}</th>
            @elseif ($i==6)
              <th>{{$i+1}}</th>
              <th>July</th>
              <th>{{$juli}}</th>
            @elseif ($i==7)
              <th>{{$i+1}}</th>
              <th>August</th>
              <th>{{$agustus}}</th>
            @elseif ($i==8)
              <th>{{$i+1}}</th>
              <th>September</th>
              <th>{{$september}}</th>
            @elseif ($i==9)
              <th>{{$i+1}}</th>
              <th>October</th>
              <th>{{$oktober}}</th>
            @elseif ($i==10)
              <th>{{$i+1}}</th>
              <th>November</th>
              <th>{{$november}}</th>
            @elseif ($i==11)
              <th>{{$i+1}}</th>
              <th>December</th>
              <th>{{$desember}}</th>
            @else
              <th></th>
              <th>Total</th>
              <th>{{$count}}</th>

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
