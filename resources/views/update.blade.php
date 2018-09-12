@include('inc.header')
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="GET" action="{{url('/edit',array($kamar->id_kamar))}}">
            <fieldset>
              <legend>Update Room Data</legend>
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
                <input type="number" min="1" class="form-control" name="floor" value="<?php echo $kamar->lantai; ?>" placeholder="Enter Floor of Room">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Capacity</label>
                <input type="number" min="1" class="form-control" name="capacity" value="<?php echo $kamar->kapasitas; ?>" placeholder="Enter Capacity">
              </div>

              <div class="form-group">
                <label class="control-label">Input Price</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">IDR</span>
                    </div>
                    <input name="price" type="number" min="50000" value="<?php echo $kamar->harga; ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
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
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" name="description" rows="3"><?php echo $kamar->deskripsi; ?></textarea>
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
              <button type="submit" class="btn btn-success">Update</button>
              <a href="{{url('/tampil')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>
@include('inc.footer')
