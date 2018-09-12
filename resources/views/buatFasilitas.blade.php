@include('inc.header2')
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="POST" action="{{url('/insertFasilitas')}}">
            {{csrf_field()}}
            <fieldset>
              <legend>Input Facility Data</legend>
              <br>



              <div class="form-group">
                <label for="exampleSelect1">Branch</label>
                <select class="form-control" name="branch">
                  <?php foreach ($hotel as $hotel): ?>
                      <option value="{{$hotel->id_hotel}}">{{$hotel->alamat}}</option>
                    <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Facility Name: </label>
                <input type="text" min="1" class="form-control" name="facility" placeholder="Enter Facility">
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
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Availibility Status</label>
                <select class="form-control" name="smokingStatus">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              </fieldset>

              <br>
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{url('/tampilfsl')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>
@include('inc.footer')
