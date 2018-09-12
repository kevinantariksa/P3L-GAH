@include('inc.headerlp')

<legend><img src="{{url('/img/Capture.jpg')}}"><h1>Report(s) based on several Categories</h1></legend>

<li><a href="{{url('/reportcust')}}">Report Customer</a></li>
<li><a href="{{url('/reportincomecst')}}">Report Income</a></li>
<li><a href="{{url('/reportincomeroom')}}">Report Room</a></li>
<li><a href="{{url('/reportbranch')}}">Report Branch</a></li>
<li><a href="{{url('/reportcusttype')}}">Report Customer Type </a></li>




@include('inc.footer')
