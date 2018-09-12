@include('inc.header3')
  <div class="container">
    <div class="row">
      <br>
      <legend>List Of Season</legend>
      @if(session('info'))
        {{session('info')}}
      @endif
      <br>
      <table class="table table-hover">
        <thead>

          <tr>
            <th scope="col">ID</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Season Name</th>
            <th scope="col">Price</th>
            <th scope="col">Room Type</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($season)>0)
            <?php foreach ($season as $sea): ?>
          <tr class="table-light">
            <th>{{$sea->id_season}}</th>
            <th>{{$sea->tanggal_mulai}}</th>
            <th>{{$sea->tanggal_selesai}}</th>
            <th>{{$sea->nama_season}}</th>
            <td>IDR {{number_format($sea->harga,2)}}</td>
            <td>@if ($sea->id_tipe_kamar==1)
              Superrior
            @elseif ($sea->id_tipe_kamar==2)
              Deluxe
            @elseif ($sea->id_tipe_kamar==3)
              Executive Deluxe
              @else
                Junior Suite
            @endif</td>

            <td>
              <a href='{{url("/updates/{$sea->id_season}")}}' class="badge badge-success">Update</a>
              <a href='{{url("/deletes/{$sea->id_season}")}}' class="badge badge-danger">Delete</a>
            </td>
          </tr>
            <?php endforeach; ?>
          @endif

        </tbody>
      </table>
    </div>
  </div>
@include('inc.footer')
