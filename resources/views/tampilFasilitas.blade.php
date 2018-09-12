@include('inc.header2')
  <div class="container">
    <div class="row">
      <br>
      <legend>List Of Facility</legend>
      @if(session('info'))
        {{session('info')}}
      @endif
      <br>
      <table class="table table-hover">
        <thead>
          <form class="form-inline" method="GET" action="{{url('/fasilitasSearch')}}">
       <input type="text" class="form-control" name="search" placeholder="Enter Keywords" align="right">
       <button type="submit" class="btn btn-secondary">Search</button>
     </form>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Branch</th>
            <th scope="col">Facility Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Availibility Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($fasilitas)>0)
            <?php foreach ($fasilitas as $fct): ?>
          <tr class="table-light">
            <th>{{$fct->id_fasilitas}}</th>
            <td>@if ($fct->id_hotel==1)
              Yogyakarta
              @else
                Bandung
            @endif</td>
            <td>{{$fct->nama_fasilitas}}</td>
            <td>IDR {{number_format($fct->harga,2)}}</td>
            <td>{{$fct->deskripsi}}</td>
            <td>@if ($fct->status_tersedia==1)
              Available
              @else
                Unavailable
            @endif</td>
            <td>
              <a href='{{url("/updatefsl/{$fct->id_fasilitas}")}}' class="badge badge-success">Update</a>
              <a href='{{url("/deletefsl/{$fct->id_fasilitas}")}}' class="badge badge-danger">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
          @endif

        </tbody>
      </table>
    </div>
  </div>
@include('inc.footer')
