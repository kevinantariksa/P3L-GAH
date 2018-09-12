@include('inc.header')
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="POST" action="{{url('/insertKamar')}}">
            {{csrf_field()}}
            <fieldset>
              <legend>Input Room Data</legend>
              <br>
              @if(count($errors)>0)
                @foreach($errors->all() as $error)
                  <div class="alert alert-dismissible alert-danger">
                      {{$error}}
                  </div>
                @endforeach
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Floor</label>
                <input type="number" min="1" class="form-control" name="floor" placeholder="Enter Floor of Room">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Capacity</label>
                <input type="number" min="1" class="form-control" name="capacity" placeholder="Enter Capacity">
              </div>

              <div class="form-group">
                <label class="control-label">Input Price</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">IDR</span>
                    </div>
                    <input name="price" type="number" min="100000" class="form-control" aria-label="Amount (to the nearest dollar)">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Branch</label>
                <select class="form-control" name="branch">
                  @if(count($jeniskasur)>0)
                    <?php foreach ($hotel as $hotel): ?>
                      <option value="{{$hotel->id_hotel}}">{{$hotel->alamat}}</option>
                    <?php endforeach; ?>
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Bed Type</label>
                <select class="form-control" name="bedType">
                  @if(count($jeniskasur)>0)
                    <?php foreach ($jeniskasur as $jeniskasur): ?>
                      <option value="{{$jeniskasur->id_kasur}}">{{$jeniskasur->jenis_kasur}}</option>
                    <?php endforeach; ?>
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Room Type</label>
                <select class="form-control" name="roomType">
                  @if(count($tipekamar)>0)
                    <?php foreach ($tipekamar as $tipekamar): ?>
                      <option value="{{$tipekamar->id_tipe_kamar}}">{{$tipekamar->tipe_kamar}}</option>
                    <?php endforeach; ?>
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Smoking Status</label>
                <select class="form-control" name="smokingStatus">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              </fieldset>

              <br>
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{url('/tampil')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>
@include('inc.footer')
