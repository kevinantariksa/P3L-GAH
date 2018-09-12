@include('inc.header3')
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="GET" action="{{url('/edits',array($season->id_season))}}">
            <fieldset>
              <legend>Update Season Data</legend>
              <br>

                            <div class="form-group">
                              <label class="control-label">Start date</label>
                              <div class="form-group">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">

                                  </div>
                                  <input name="mulai" type="date"  class="form-control" value="{{$season->tanggal_mulai}}">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label">End date</label>
                              <div class="form-group">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">

                                  </div>
                                  <input name="selesai" type="date"  class="form-control" value="{{$season->tanggal_selesai}}">
                                </div>
                              </div>
                            </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Facility Name: </label>
                <input type="text" min="1" class="form-control" name="facility"  value="<?php echo $season->nama_season; ?>" placeholder="Enter Facility">
              </div>

              <div class="form-group">
                <label class="control-label">Input Price</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">IDR</span>
                    </div>
                    <input name="price" type="number" min="50000" value="<?php echo $season->harga; ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                  </div>
                </div>
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

              <br>
              <button type="submit" class="btn btn-success">Update</button>
              <a href="{{url('/tampils')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>
@include('inc.footer')
