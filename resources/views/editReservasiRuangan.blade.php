@include('inc.header')

<br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" method="GET" action="{{url('/editReservasi',array($reservasi->id_reservasi))}}">
          {{csrf_field()}}
          <fieldset>
            <legend>Edit Reservation Data</legend>
            <br>
            @if(count($errors)>0)
              @foreach($errors->all() as $error)
                <div class="alert alert-dismissible alert-danger">
                    {{$error}}
                </div>
              @endforeach
            @endif

            <div class="form-group">
              <label for="exampleInputEmail1">Adult</label>
              <input type="number" min="0" class="form-control" name="adult" value="<?php echo $reservasi->dewasa; ?>" placeholder="Enter Floor of Room">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Child</label>
              <input type="number" min="0" class="form-control" name="child" value="<?php echo $reservasi->anak; ?>" placeholder="Enter Capacity">
            </div>

            <div class="form-group">
              <label for="exampleSelect1">Room Available</label>
              <select class="form-control" name="room">
                @if(count($ruangan)>0)
                  <?php foreach ($ruangan as $ruangan): ?>
                    <option value="{{$ruangan->id_kamar}}">{{$ruangan->nomor_ruangan}} - {{$ruangan->tipe_kamar}}</option>
                  <?php endforeach; ?>
                @endif
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Total Room</label>
              <input type="number" min="1" class="form-control" name="totalRoom" value="<?php echo $reservasi->jumlah_kamar; ?>" placeholder="Enter Capacity">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail2">Price before update IDR <?php echo $reservasiRuangan->total_harga_kamar ?></label>
            </div>

            </fieldset>

            <br>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{'/history/'}}" class="btn btn-danger">Back</a>
          </fieldset>
        </form>
    </div>
  </div>
</div>
<br>
<script>
  // HTML document is loaded. DOM is ready.
  $(function() {



    $('#hotelCarTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

        $('.date').datetimepicker({
            format: 'DD-MM-YYYY',minDate:new Date()
          });
          $('.date-time').datetimepicker();



    // https://css-tricks.com/snippets/jquery/smooth-scrolling/
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
  });

  // Load Flexslider when everything is loaded.
  $(window).load(function() {
    // Vimeo API nonsense

/*
      var player = document.getElementById('player_1');
      $f(player).addEvent('ready', ready);

      function addEvent(element, eventName, callback) {
        if (element.addEventListener) {
          element.addEventListener(eventName, callback, false)
        } else {
          element.attachEvent(eventName, callback, false);
        }
      }

      function ready(player_id) {
        var froogaloop = $f(player_id);
        froogaloop.addEvent('play', function(data) {
          $('.flexslider').flexslider("pause");
        });
        froogaloop.addEvent('pause', function(data) {
          $('.flexslider').flexslider("play");
        });
      }
*/



      // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
/*

      $(".flexslider")
        .fitVids()
        .flexslider({
          animation: "slide",
          useCSS: false,
          animationLoop: false,
          smoothHeight: true,
          controlNav: false,
          before: function(slider){
            $f(player).api('pause');
          }
      });
*/




//	For images only
      $('.flexslider').flexslider({
        controlNav: false
      });


    });
</script>

@include('inc.footer')
