@include('inc.headeradm')

<div class="container">
  <div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="POST" action="{{url('/insertKamar')}}">
          {{csrf_field()}}
          <fieldset>
            <legend>Input New Admin Data</legend>
            <br>
            @if(count($errors)>0)
              @foreach($errors->all() as $error)
                <div class="alert alert-dismissible alert-danger">
                    {{$error}}
                </div>
              @endforeach
            @endif

            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" min="1" class="form-control" name="username" placeholder="Enter Username">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">E-mail</label>
              <input type="email" min="1" class="form-control" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Password</label>
              <input type="password" min="1" class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Re-enter Password</label>
              <input type="password" min="1" class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <label for="exampleSelect1">Branch</label>
              <select class="form-control" name="branch">

                  <?php foreach ($hotel as $hotel): ?>
                    <option value="{{$hotel->id_hotel}}">{{$hotel->alamat}}</option>
                  <?php endforeach; ?>

              </select>
            </div>

            <div class="form-group">
              <label for="exampleSelect1">Role</label>
              <select class="form-control" name="branch">
                @if(count($role)>0)
                  <?php foreach ($role as $rl): ?>
                    @if ($rl->id_role<5)
                        <option value="{{$rl->id_role}}">{{$rl->deskripsi}}</option>
                    @endif

                  <?php endforeach; ?>
                @endif
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" min="1" class="form-control" name="nama" placeholder="Enter Your Name">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Phone Number</label>
              <input type="number" min="1" class="form-control" name="telp" placeholder="Enter Phone Number">
            </div>


            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{url('/admin')}}" class="btn btn-danger">Back</a>
          </fieldset>
        </form>
    </div>
  </div>
</div>
@include('inc.footer')
