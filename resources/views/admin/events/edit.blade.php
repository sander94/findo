@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Muuda üritust</strong></div>

                <div class="card-body">
                	
                	<form action="{{ route('events.update', $event->id) }}" method=post autocomplete="off" enctype="multipart/form-data">
                		@csrf
                        @method('PUT')



                        <div class="form-group row">
                            <div class="col-md-8">
                                <strong><i class="fas fa-desktop"> </i> Desktopi pilt</strong>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-mobile-alt"> </i> Mobiili pilt</strong>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-8" style="border: 0px solid #000; height: 200px;">
                                <label style="width: 100%; height: 100%;">
                                <div style="width: 100%; margin: 0 auto; height: 100%; background-image: url({{ asset('images/events/sliders/'.$event->slider_image.'') }}); background-size: cover; background-position-x: center;">

                                <input id="slider_image" type="file" class="form-control" name="slider_image" style="border: 0; background: none;">
                                </div>
                                 </label>

                            </div>


                            <div class="col-md-4" style="border: 0px solid #000; height: 200px;">
                                <label style="width: 100%; height: 100%;">
                                <div style="width: 100%; margin: 0 auto; height: 100%; background-image: url({{ asset('images/events/sliders/'.$event->mobile_slider_image.'') }}); background-size: cover; background-position-x: center;">
                                 <input id="mobile_slider_image" type="file" class="form-control" name="mobile_slider_image" style="border: 0; background: none;">
                                </div>
                               </label>
                           </div>
                        </div>




                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Promoüritus slaideriga?</label>
                            <div class="col-md-6">
                                <input type="hidden" name="is_promoted" value="0">
                                <input type="checkbox" name="is_promoted" value="1" @if($event->is_promoted == "1") checked @endif>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Avalik?</label>
                            <div class="col-md-6">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" @if($event->is_active == "1") checked @endif>
                            </div>
                        </div>
                        
                	  	<div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Ürituse nimi</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $event->title }}">
                            </div>
                        </div>


                	  	<div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Toimumise kuupäev</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ $event->date }}">
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Toimumise kell</label>
                            <div class="col-md-6">
                                <select name="time" class="form-control" id="time">
                                      @foreach ($openingtimes as $openingtime)
                                        <option {{ $event->time == $openingtime->timeslot ? 'selected':'' }}>{{$openingtime->timeslot}}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Asukoht</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ $event->location }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">Regioon</label>
                            <div class="col-md-6">
                                <select name="region" class="form-control">

                                    @foreach($regions as $region)

                                        <option value="{{ $region->id }}" @if($event->region == $region->id) selected @endif>{{ $region->region }}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="googleInput" class="col-md-4 col-form-label text-md-right">Google Maps - vali täpne asukoht rippmenüüst</label>
                                <div class="col-md-6">
                                    <input type="text" name="google_address" class="form-control" id="googleInput" placeholder="Google aadress" value="{{ $event->google_address }} ">
                                 </div>

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


                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div id="map" style="height: 200px;"> </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Kirjeldus</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" style="height: 400px;">{{ $event->description }}</textarea>
                            </div>
                        </div>


                	  	<div class="form-group row">
                            <label for="ticket_price" class="col-md-4 col-form-label text-md-right">Pileti hind</label>
                            <div class="col-md-6">
                                <input id="ticket_price" type="text" class="form-control" name="ticket_price" value="{{ $event->ticket_price }} ">
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="additional_info" class="col-md-4 col-form-label text-md-right">Sissepääsu ja piletite lisainfo</label>
                            <div class="col-md-6">
                                <textarea id="additional_info" class="form-control" name="additional_info" style="height: 400px;">{{ $event->additional_info }}</textarea>
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="organizator" class="col-md-4 col-form-label text-md-right">Organisaator</label>
                            <div class="col-md-6">
                                <textarea id="organizator" class="form-control" name="organizator">{{ $event->organizator }}</textarea>
                            </div>
                        </div>


                	  	<div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Pilt</label>
                            <div class="col-md-6">
                                @if( $event->image )
                                <label for="image">
                                    <img src="{{ asset('/images/events/thumb/'.$event->image.'') }} " style="width: 300px; cursor: pointer;">
                                    <input id="image" type="file" class="form-control" name="image" style="display: none;">
                                </label>
                                @else
                                <input id="image" type="file" class="form-control" name="image" style="border: 0;">
                                @endif
                                
                            </div>
                        </div>


						<div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-success">Muuda üritust</button>
                            </div>
                        </div>




                	</form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $( "#date" ).datepicker({
            beforeShowDay: '',
            dateFormat: 'dd.mm.yy'
        });
    });
</script>  

@endsection