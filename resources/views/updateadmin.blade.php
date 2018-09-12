@include('inc.headeradm')
{{csrf_token()}}
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="GET" action="{{url('/editAdmin',array($user->id_user))}}">
            <fieldset>
              <legend>Update Admin Data</legend>


              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" min="1" class="form-control" name="floor" value="<?php echo $user->username; ?>" placeholder="Enter Floor of Room">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Email</label>
                <input type="email" min="1" class="form-control" name="capacity" value="<?php echo $user->email; ?>" placeholder="Enter Email">
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
                <input type="text" min="1" class="form-control" name="nama" value="<?php echo $pegawai->nama; ?>" placeholder="Enter Your Name">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" min="1" class="form-control" name="telp" value="<?php echo $pegawai->telp; ?>"placeholder="Enter Phone Number">
              </div>


              <br>
              <button type="submit" class="btn btn-success">Update</button>
              <a href="{{url('/admdash')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>

@include('inc.footer')
