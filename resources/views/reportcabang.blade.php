@include('inc.headerlp')


<div class="container">
  <div class="row">
    <br>
    <legend><h2>Income report for each branch</h2>
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
          <th scope="col">Year</th>
          <th scope="col">Yogyakarta</th>
          <th scope="col">Bandung</th>
          <th scope="col">Total Income</th>

        </tr>
      </thead>
      <tbody>
          @for ($i=0; $i < 5; $i++)
        <tr class="table-light">
          @if ($i==0)
            <th>{{$i+1}}</th>
            <th>2015</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>


            @elseif ($i==1)
              <th>{{$i+1}}</th>
              <th>2016</th>
              <th>0</th>
              <th>0</th>
              <th>0</th>

            @elseif ($i==2)
              <th>{{$i+1}}</th>
              <th>2017</th>
              <th>0</th>
              <th>0</th>
              <th>0</th>

            @elseif ($i==3)
              <th>{{$i+1}}</th>
              <th>2018</th>
              <th>{{$jogja}}</th>
              <th>{{$bandung}}</th>
              <th>{{$count}}</th>

            @else
              <th></th>
              <th></th>
              <th></th>
              <th>TOTAL</th>
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
