@extends('layouts.app2')

@section('title','Complete Your Data')

@section('content')

  <form method="POST" action="{{ url('/createdatakartu') }}">
{{csrf_field()}}
      <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

          <div class="col-md-6">
              <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

              @if ($errors->has('nama'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nama') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="no_identitas" class="col-md-4 col-form-label text-md-right">{{ __('Identity Number') }}</label>

          <div class="col-md-6">
              <input id="no_identitas" type="text" class="form-control{{ $errors->has('no_identitas') ? ' is-invalid' : '' }}" name="no_identitas" value="{{ old('no_identitas') }}" required autofocus>

              @if ($errors->has('no_identitas'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('no_identitas') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

          <div class="col-md-6">
              <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ old('telp') }}" required autofocus>

              @if ($errors->has('telp'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('telp') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

          <div class="col-md-6">
              <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>

              @if ($errors->has('alamat'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('alamat') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="kartu" class="col-md-4 col-form-label text-md-right">{{ __('Credit card number: ') }}</label>

          <div class="col-md-6">
            <input id="kartu" type="text" class="form-control{{ $errors->has('kartu') ? ' is-invalid' : '' }}" name="kartu" value="{{ old('kartu') }}" maxlength="16" required autofocus>

              @if ($errors->has('kartu'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('kartu') }}</strong>
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

      <input type="hidden" name="id_role" value="5"/>





      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <input type="submit" name="submit" value="Book Now">

          </div>
      </div>
  </form>

@endsection
