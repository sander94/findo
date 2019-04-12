@extends('layouts.main')

@section('content')
    <div class="hero-area js-hero-slides">
     <div class="hero-area__content-slides js-hero-height"><a class="hero-slider-arrow hero-slider-arrow--left js-change-hero-slide js-left" href="#"></a><a class="hero-slider-arrow hero-slider-arrow--right js-change-hero-slide js-right" href="#"></a>
       
     <?php $counter = 1;  ?>
      
      @foreach($promoevents as $promoevent)

       
        <div class="hero-area__each-content-slide js-hero-slide js-active-slide" style="background-image:url(
        {{ asset('images/events/sliders/'.$promoevent->slider_image.'') }} );" id="js-slide-{{ $counter }}">
          <div class="hero-area__outer-content-align">
           <!-- <div class="hero-area__banner-logo"><img src="{{ asset('images/temp/slider/logos/logo-olearys.svg') }}"></div> -->
            <div class="hero-area__content js-hero-content"><a href="event/{{ $promoevent->id }}">
                <h1>{{ $promoevent->title }}</h1></a></div>
          </div>
        </div>

        <?php $counter++; ?>

      @endforeach





      </div>
    </div>

  <form action="" method="get">
    <div class="event-list">




<script>

$(document).ready(function(){
    $('input:radio[name="month"]').change(function() {
        // alert
        $('#currentMonth').html($(this).attr('id'));;
    });

        $('input:radio[name="region"]').change(function() {
        // alert
        $('#currentRegion').html($(this).attr('id'));;
    });
});

</script>


    <div class="event-list__filter">
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle" id="currentMonth">Vali kuu</div>
          <div class="selectbox__content js-toggled-item js-multiselect">
            <input type="radio" name="month" class="month" value="01" id="Jaanuar"><label class="monthselect" for="Jaanuar"> Jaanuar</label>
            <input type="radio" name="month" class="month" value="02" id="Veebruar"><label class="monthselect" for="Veebruar"> Veebruar</label>
            <input type="radio" name="month" class="month" value="03" id="Märts"><label class="monthselect" for="Märts"> Märts</label>
            <input type="radio" name="month" class="month" value="04" id="Aprill"><label class="monthselect" for="Aprill"> Aprill</label>
            <input type="radio" name="month" class="month" value="05" id="Mai"><label class="monthselect" for="Mai"> Mai</label>
            <input type="radio" name="month" class="month" value="06" id="Juuni"><label class="monthselect" for="Juuni"> Juuni</label>
            <input type="radio" name="month" class="month" value="07" id="Juuli"><label class="monthselect" for="Juuli"> Juuli</label>
            <input type="radio" name="month" class="month" value="08" id="August"><label class="monthselect" for="August"> August</label>
            <input type="radio" name="month" class="month" value="09" id="September"><label class="monthselect" for="September"> September</label>
            <input type="radio" name="month" class="month" value="10" id="Oktoober"><label class="monthselect" for="Oktoober"> Oktoober</label>
            <input type="radio" name="month" class="month" value="11" id="November"><label class="monthselect" for="November"> November</label>
            <input type="radio" name="month" class="month" value="12" id="Detsember"><label class="monthselect" for="Detsember"> Detsember</label>





          </div>
        </div>


<!-- TOGGLE WRAP -->
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
                  <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle" id="currentRegion"> {{ $currentRegion }} </div>
          <div class="selectbox__content js-toggled-item js-multiselect">

          @foreach($regionals as $key)
           <input type="radio" name="region" class="region" value="{{ $key->id }}" id="{{ $key->region }}" <?php if(isset($_GET['region'])) { if($_GET['region'] == $key->id ) { echo "checked"; } } ?> >
           <label class="regionselect" for="{{ $key->region }}"> {{ $key->region }} </label>
          @endforeach

   




          </div>
        </div>

        </div>
<!-- TOGGLE WRAP END -->

      <button class="find-btn">Leia</button>

      </div>



 <div class="event-list__events">
      @foreach($events as $event)

     
        <div class="event-list__each-event"><a class="event-content" href="./event/{{ $event->id }}">
            <div class="event-date">{{ explode(".", $event->date)[0] }}</div>
            <div class="event-image" style="background-image: url({{ asset('images/events/thumb/'.$event->image.'') }} );"></div>
            <div class="event-heading">
              <h3>{{ $event->title }}</h3>
              <p class="location">{{ $event->location }}</p>
            </div></a>
          <div class="event-share js-toggle-wrap">
            <div class="event-share__dropdown js-slide-toggle">
              <ul class="social-share js-toggled-item align-right">
                <li class="facebook"><a href="#">Facebook</a></li>
                <li class="twitter"><a href="#">Twitter</a></li>
                <li class="email"><a href="#">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
      
      @endforeach
    </div>   

      
    </div></form>
@endsection