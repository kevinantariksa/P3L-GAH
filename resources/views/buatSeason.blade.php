@include('inc.header3')
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <form class="form-horizontal" method="POST" action="{{url('/insertseason')}}">
            {{csrf_field()}}
            <fieldset>
              <legend>Input Season Data</legend>
              <br>

              <div class="form-group">
                <label class="control-label">Start date</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">

                    </div>
                    <input name="mulai" type="date"  class="form-control" id="datetimepicker1">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">End date</label>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">

                    </div>
                    <input name="selesai" type="date"  class="form-control" id="datetimepicker2">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail2">Season Name: </label>
                <input type="text" min="1" class="form-control" name="facility" placeholder="Enter Season Name">
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
                <label for="exampleSelect1">Room Type</label>
                <select class="form-control" name="roomType">
                  @if(count($tipekamar)>0)
                    <?php foreach ($tipekamar as $tipekamar): ?>
                      <option value="{{$tipekamar->id_tipe_kamar}}">{{$tipekamar->tipe_kamar}}</option>
                    <?php endforeach; ?>
                  @endif
                </select>
              </div>

              </fieldset>

              <br>
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{url('/tampils')}}" class="btn btn-danger">Back</a>
            </fieldset>
          </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
  $('.date').datetimepicker({
      format: 'DD/MM/YYYY',minDate:new Date()
    });
    $('.date-time').datetimepicker();

  </script>
@include('inc.footer')
