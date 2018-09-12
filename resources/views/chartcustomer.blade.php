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
    {!! $chart -> render()!!}
    <button onclick="myFunction()" class="no-print"><i class="fa fa-print"></i><a onclick="myFunction()" class="btn btn-default"><i class="fa fa-print"></i> Print</a></button>

  </div>
</div>



<script>
function myFunction() {
    window.print();
}
</script>
@include('inc.footer')
