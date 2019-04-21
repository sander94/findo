@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Lisa uus üritus</strong></div>

                <div class="card-body">
                	
                	<form action="{{ route('events.store') }}" method=post autocomplete="off" enctype="multipart/form-data">
                		@csrf






                        <div class="form-group row">
                            <div class="col-md-8">
                                <strong><i class="fas fa-desktop"> </i> Desktopi pilt</strong>
                            </div>
                            <div class="col-md-4">
                                <strong><i class="fas fa-mobile-alt"> </i> Mobiili pilt</strong>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-8" style="height: 200px;">
                                <label style="width: 100%; height: 100%;">
                                <div style="width: 100%; margin: 0 auto; height: 100%; border: 1px solid #dadada;">

                                <input id="slider_image" type="file" class="form-control" name="slider_image" style="border: 0; background: none;">
                                </div>
                                 </label>

                            </div>


                            <div class="col-md-4" style="height: 200px;">
                                <label style="width: 100%; height: 100%;">
                                <div style="width: 100%; margin: 0 auto; height: 100%; border: 1px solid #dadada;">
                                 <input id="mobile_slider_image" type="file" class="form-control" name="mobile_slider_image" style="border: 0; background: none;">
                                </div>
                               </label>
                           </div>
                        </div>











                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Promoüritus?</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" name="is_promoted">
                            </div>
                        </div>



                	  	<div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Ürituse nimi</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Kirjeldus</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" style="height: 400px;"></textarea>
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Toimumise kuupäev</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date">
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Toimumise kell</label>
                            <div class="col-md-6">
                                <select name="time" class="form-control" id="time">
                                      @foreach ($openingtimes as $openingtime)
                                        <option>{{$openingtime->timeslot}}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Asukoht</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">Regioon</label>
                            <div class="col-md-6">
                                <select name="region" class="form-control">

                                    @foreach($regions as $region)

                                        <option value="{{ $region->id }}">{{ $region->region }}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="googleInput" class="col-md-4 col-form-label text-md-right">Google Maps - vali täpne asukoht rippmenüüst</label>
                                <div class="col-md-6">
                                    <input type="text" name="google_address" placeholder="Google aadress" class="form-control" id="googleInput">
                                </div>
                        </div>

                        <script>
                        function initialize() {

                        var input = document.getElementById('googleInput');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key=AIzaSyCFGE2zSlkuGfx9Vg_71R2BQYP54I0OuDM&sensor=false&callback=initialize" async defer>
                        </script>

                	  	<div class="form-group row">
                            <label for="ticket_price" class="col-md-4 col-form-label text-md-right">Pileti hind</label>
                            <div class="col-md-6">
                                <input id="ticket_price" type="text" class="form-control" name="ticket_price">
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="additional_info" class="col-md-4 col-form-label text-md-right">Sissepääsu ja piletite lisainfo</label>
                            <div class="col-md-6">
                                <textarea id="additional_info" class="form-control" name="additional_info" style="height: 400px;"></textarea>
                            </div>
                        </div>

                	  	<div class="form-group row">
                            <label for="organizator" class="col-md-4 col-form-label text-md-right">Organisaator</label>
                            <div class="col-md-6">
                                <textarea id="organizator" class="form-control" name="organizator"></textarea>
                            </div>
                        </div>


                	  	<div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Pilt</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" style="border: 0;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Avalikusta kohe?</label>
                            <div class="col-md-6">
                                <input type="checkbox" value="1" name="is_active">
                            </div>
                        </div>

						<div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-success">Sisesta üritus</button>
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