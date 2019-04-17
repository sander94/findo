@extends('layouts.main')

@section('content')
<a class="navigate-back" href="/"> <span>Tagasi avalehele</span></a>
    <article class="content-area content-area--event-details has-media">
      <div class="event-details__content-block event-details__intro-content">
        <div class="event-details__intro-content__image" style="
        background-image: url(        {{ asset('images/events/thumb/'.$event->image.'') }}          );"></div>
        <div class="event-details__intro-content__text">
          <h1>{{ $event->title }}</h1>
          <div class="time">{{ $event->date }}, kell {{ $event->time }}</div>
          <div class="location">{{ $event->location }}</div>
          <div class="event-share js-toggle-wrap">
            <div class="event-share__dropdown js-slide-toggle">Jaga
              <ul class="social-share js-toggled-item align-left">
                <li class="facebook"><a href="#">Facebook</a></li>
                <li class="twitter"><a href="#">Twitter</a></li>
                <li class="email"><a href="#">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="event-details__content-block long-description">
        <div class="play-media">
          <div class="play-media__inner">
            <div class="play-media__btn js-toggle-active"></div><!-- <img src="{{ asset('images/temp/dragons.png') }}"> -->
          </div>
        </div>
        <p>{!! nl2br($event->description) !!}</p>
      </div>
      <div class="event-details__content-block">
        <h3>Hinnainfo</h3>
        <p class="ticket-price">Pilet: {{ $event->ticket_price }} €</p>
        <p>{!! nl2br($event->additional_info) !!}</p>
      </div>
      <div class="event-details__content-block">
        <h3>Korraldaja:</h3>
        <p>{!! nl2br($event->organizator) !!}</p>
      </div>
    <!--  <div class="event-details__content-block">
        <ul class="event-tags">
          <li>muusika</li>
          <li>kontsert</li>
          <li>väliüritused</li>
          <li>staarid</li>
        </ul>
      </div> -->
      <div class="event-details__content-block">
                                    <script>
                              var geocoder;
                              var map;
                              var address = "{{ $event->google_address }}";



                              function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 16,
                                  center: {lat: -34.397, lng: 150.644}
                                });
                                geocoder = new google.maps.Geocoder();
                                codeAddress(geocoder, map);
                                var input = document.getElementById('googleInput');
                                var autocomplete = new google.maps.places.Autocomplete(input);
                              }

                              function codeAddress(geocoder, map) {
                                geocoder.geocode({'address': address}, function(results, status) {
                                  if (status === 'OK') {
                                    map.setCenter(results[0].geometry.location);
                                    var marker = new google.maps.Marker({
                                      map: map,
                                      position: results[0].geometry.location
                                    });
                                  } else {
                                    
                                  }
                                });
                              }
                            </script>


                            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key=AIzaSyCFGE2zSlkuGfx9Vg_71R2BQYP54I0OuDM&sensor=false&callback=initMap" async defer>
                            </script>

                            <div id="map" class="location-map"> </div>
      </div>
    </article>
   
    
@endsection