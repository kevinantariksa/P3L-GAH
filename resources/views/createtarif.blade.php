@extends('layouts/master')

@section('title','Tariff CRUD')

@section('content')


  <form method="POST" action="{{ route('home') }}">
{{csrf_field()}}


      Rooms:
      <input type="radio" name="id_kasur" value="Double">
      <input type="radio" name="id_kasur" value="Twin">
      <input type="radio" name="id_kasur" value="2 Twin">
      <input type="radio" name="id_kasur" value="King">
      <br>

      Rooms:
      <input type="radio" name="id_hotel" value="Bandung">
      <input type="radio" name="id_hotel" value="Yogyakarta">
      <br>



      <div class="form-group row">
          <label for="nomor_ruangan" class="col-md-4 col-form-label text-md-right">{{ __('Room Number') }}</label>

          <div class="col-md-6">
              <input id="nomor_ruangan" type="text" class="form-control{{ $errors->has('Room Number') ? ' is-invalid' : '' }}" name="nomor_ruangan" value="{{ old('nomor_ruangan') }}" required autofocus>

              @if ($errors->has('nomor_ruangan'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nomor_ruangan') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="lantai" class="col-md-4 col-form-label text-md-right">{{ __('Floor') }}</label>

          <div class="col-md-6">
              <input id="lantai" type="number" class="form-control{{ $errors->has('lantai') ? ' is-invalid' : '' }}" name="lantai" value="{{ old('lantai') }}" required autofocus>

              @if ($errors->has('lantai'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('lantai') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      Room Type:
      <input type="radio" name="id_tipe_kamar" value="Superior">
      <input type="radio" name="id_tipe_kamar" value="Deluxe">
      <input type="radio" name="id_tipe_kamar" value="Executive Deluxe">
      <input type="radio" name="id_tipe_kamar" value="Junior Suite">
      <br>

      <div class="form-group row">
          <label for="kapasitas" class="col-md-4 col-form-label text-md-right">{{ __('Capacity') }}</label>

          <div class="col-md-6">
              <input id="kapasitas" type="text" class="form-control{{ $errors->has('kapasitas') ? ' is-invalid' : '' }}" name="kapasitas" value="{{ old('kapasitas') }}" required autofocus>

              @if ($errors->has('kapasitas'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('kapasitas') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Price(IDR): ') }}</label>

          <div class="col-md-6">
            <input id="harga" type="text" class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" value="{{ old('harga') }}" required autofocus>

              @if ($errors->has('harga'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('harga') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Description: ') }}</label>

          <div class="col-md-6">
            <input id="deskripsi" type="textarea" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>

              @if ($errors->has('deskripsi'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="vcc" class="col-md-4 col-form-label text-md-right">{{ __('VCC: ') }}</label>

          <div class="col-md-6">
            <input id="vcc" type="text" class="form-control{{ $errors->has('vcc') ? ' is-invalid' : '' }}" name="vcc" value="{{ old('vcc') }}"   maxlength="4" required autofocus>
              @if ($errors->has('vcc'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('vcc') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      Smoking:
      <input type="radio" name="status_merokok" value="Permitted">
      <input type="radio" name="status_merokok" value="Prohibited">
      <br>

      Avaibility Status:
      <input type="radio" name="status_tersedia" value="Available" checked>
      <input type="radio" name="status_tersedia" value="Unavailable">
      <br>

      <input type="hidden" name="gambar" value="11">

      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <a href="/p3l/public/">    <input type="submit" name="submit" value="Create">  </a>

          </div>
      </div>
  </form>

@endsection
