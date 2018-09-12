@include('inc.header')
  <div class="container">
    <div class="row">
      <br>
      <legend>List Of Rooms</legend>
      @if(session('info'))
        {{session('info')}}
      @endif
      <br>
      <table class="table table-hover">
        <thead>
          <form class="form-inline" method="GET" action="{{url('/kamarSearch')}}">
       <input type="text" class="form-control" name="search" placeholder="Enter Keywords" align="right">
       <button type="submit" class="btn btn-secondary">Search</button>
     </form>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Bed Type</th>
            <th scope="col">Branch</th>
            <th scope="col">Room Number</th>
            <th scope="col">Floor</th>
            <th scope="col">Room Type</th>
            <th scope="col">Capacity</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Smoking Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($kamar)>0)
            <?php foreach ($kamar as $kamar): ?>
          <tr class="table-light">
            <th>{{$kamar->id_kamar}}</th>
            <td>{{$kamar->jenis_kasur}}</td>
            <td>{{$kamar->alamat}}</td>
            <td>{{$kamar->nomor_ruangan}}</td>
            <td>{{$kamar->lantai}}</td>
            <td>{{$kamar->tipe_kamar}}</td>
            <td>{{$kamar->kapasitas}}</td>
            <td>IDR {{number_format($kamar->harga,2)}}</td>
            <td>{{$kamar->deskripsi}}</td>
            <td>{{$kamar->status_merokok}}</td>
            <td>
              <a href='{{url("/update/{$kamar->id_kamar}")}}' class="badge badge-success">Update</a>
              <a href='{{url("/delete/{$kamar->id_kamar}")}}' class="badge badge-danger">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
          @endif

        </tbody>
      </table>
    </div>
  </div>
@include('inc.footer')
