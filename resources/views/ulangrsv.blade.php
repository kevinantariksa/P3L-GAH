@extends('layouts/app')

@section('title','Repeat Reservation')

@section('content')

  <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active tm-white-bg" id="hotel">
        <div class="tm-search-box effect2">
        <form action="{{ route('reservasi')}}" method="POST" class="hotelw-search-form">
          @csrf
          <div class="tm-form-inner">
            <div class="form-group">
                <select class="form-control" name="id_hotel">
                  <option value="">-- Select City -- </option>
                  <option value="2">Bandung</option>
                  <option value="1">Jogjakarta</option>
                </select>
            </div>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepicker1'>
                          <input type='text' class="form-control"  name="tanggalCheckin" placeholder="Check-in Date" />
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class='input-group date'  id='datetimepicker2'>
                          <input type='text' class="form-control" name="tanggalCheckout" placeholder="Check-out Date" />
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
                  <div class="form-group margin-bottom-0">
                      <select class="form-control" name="dewasa">
                        <option value="0">-- Adult -- </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                      </select>
                  </div>

                  <div class="form-group margin-bottom-0">
                      <select class="form-control" name="anak">
                        <option value="0">-- Child -- </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                      </select>
                  </div>
          </div>

          <input type="hidden" name="id_reservasi_status" value="1">
          <input type="hidden" name="id_pel" value="2">
          <input type="hidden" name="nama_institusi" value="sigah">
          <input type="hidden" name="id_peg" value="6">
          <input type="hidden" name="id_user" value="2">
          <input type="hidden" name="kode_reservasi" value="37">
          <input type="hidden" name="urutan_reservasi" value="11">
          <input type="hidden" name="id_reservasi_tipe" value="1">
          <input type="hidden" name="periode_waktu_bayar" value="1:00:00">
          <input type="hidden" name="jumlah_kamar" value="12">
                <div class="form-group tm-yellow-gradient-bg text-center">
                  <button type="submit" name="submit" class="tm-yellow-btn">Check Now</button>
                </div>
        </form>
      </div>
      </div>
  </div>
</div>
</div>
@endsection
