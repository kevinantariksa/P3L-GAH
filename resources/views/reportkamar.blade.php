@include('inc.headerlp')


<div class="container">
  <div class="row">
    <br>
    <legend><h2>Income report for each room type(s)</h2>
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
          <th scope="col">Personal Income</th>
          <th scope="col">Grup Income</th>
          <th scope="col">Total Income</th>
          <th scope="col">Personal Customer</th>
          <th scope="col">Grup Customer</th>
          <th scope="col">Total Customer</th>

        </tr>
      </thead>
      <tbody>
          @for ($i=0; $i < 5; $i++)
        <tr class="table-light">
          @if ($i==0)
            <th>{{$i+1}}</th>
            <th>Superior</th>
            <th>{{$superiorpersonal}}</th>
            <th>{{$superiorgrup}}</th>
            <th>{{$countsup}}</th>
            <th>{{$cssuperiorpersonal}}</th>
            <th>{{$cssuperiorgrup}}</th>
            <th>{{$cscountsup}}</th>

            @elseif ($i==1)
              <th>{{$i+1}}</th>
              <th>Double Deluxe</th>
              <th>{{$deluxepersonal}}</th>
              <th>{{$deluxegrup}}</th>
              <th>{{$countdd}}</th>
              <th>{{$csdeluxepersonal}}</th>
              <th>{{$csdeluxegrup}}</th>
              <th>{{$cscountdd}}</th>

            @elseif ($i==2)
              <th>{{$i+1}}</th>
              <th>Executive Deluxe</th>
              <th>{{$execpersonal}}</th>
              <th>{{$execgrup}}</th>
              <th>{{$countexec}}</th>
              <th>{{$csexecpersonal}}</th>
              <th>{{$csexecgrup}}</th>
              <th>{{$cscountexec}}</th>

            @elseif ($i==3)
              <th>{{$i+1}}</th>
              <th>Junior Suite</th>
              <th>{{$jspersonal}}</th>
              <th>{{$jsgrup}}</th>
              <th>{{$countjs}}</th>
              <th>{{$cjspersonal}}</th>
              <th>{{$cjsgrup}}</th>
              <th>{{$cscountjs}}</th>


            @else
              <th></th>
              <th></th>
              <th>TOTAL</th>
              <th>{{$total}}</th>
              <th></th>
              <th></th>
              <th>TOTAL</th>
              <th>{{$totalcs}}</th>

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
