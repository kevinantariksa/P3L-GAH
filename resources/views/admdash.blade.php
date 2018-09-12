@include('inc.headeradm')
<form action="{{ route('logout') }}" method="post">
  {{ csrf_field() }}
<h1>Welcome, {{Auth::user()->username}}</h1>
    <input type="submit" name="submit" value="LOGOUT">
</form>


<div class="container">
  <div class="row">

    <table class="table table-hover">
      <thead>

        <tr>
          <th scope="col">ID</th>
          <th scope="col">Role</th>
          <th scope="col">Username</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

          <?php foreach ($admin as $adm): ?>
        <tr class="table-light">
          <th>{{$adm->id_user}}</th>
          <td>@if ($adm->id_role==1)
            Owner
          @elseif ($adm->id_role==2)
            General Manager
          @elseif ($adm->id_role==3)
            Sales & Marketing
          @elseif ($adm->id_role==4)
            Front Office
            @else
              Customer
          @endif</td>
          <td>{{$adm->username}}</td>
          <td>
            <a href='{{url("/updateAdmin/{$adm->id_user}")}}' class="badge badge-success">Update</a>
            <a href='{{url("/deleteAdmin/{$adm->id_user}")}}' class="badge badge-danger">Delete</a>
          </td>
        </tr>
          <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>

@include('inc.footer')
