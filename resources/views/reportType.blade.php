@include('inc.headerlp')

<div class="container">
  <div class="row">
    <br>
    <legend><h2>Thoose are our TOP 5 customer(s)</h2>
    <img src="{{url('/img/Capture.jpg')}}"></legend>
    @if(session('info'))
      {{session('info')}}
    @endif

    <br>


    <table class="table table-hover">
      <thead>
        <br>


        <tr>
          <th scope="col">NO</th>
          <th scope="col">Name</th>
          <th scope="col">Reservation</th>
          <th scope="col">Total Payment(IDR)</th>

        </tr>
      </thead>
      <tbody>

        <input type="hidden" value="{{$key=0}}"></input>
          @foreach ($customer as $cst)
            <input type="hidden" value="{{{$key++}}}"></input>
        <tr class="table-light">
            <th>{{$key}}</th>
            <th>{{$cst->nama}}</th>
            <th>N/A</th>
            <th>{{$cst->total}}</th>





        </tr>

            @endforeach
Year : {{$getYear}}
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
